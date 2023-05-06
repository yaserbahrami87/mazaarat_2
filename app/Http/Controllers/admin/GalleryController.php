<?php

namespace App\Http\Controllers\admin;

use App\gallery_category;
use App\Http\Controllers\Controller;
use App\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries=gallery::orderby('id','desc')
                    ->paginate(10);
        return view('admin.gallery.gallery_all')
                            ->with('galleries',$galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery_categories=gallery_category::where('status','=','1')
                                ->get();
        return view('admin.gallery.gallery_insert')
                            ->with('gallery_categories',$gallery_categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery=gallery::latest()->first();

        $this->validate($request,[
            'fname_fa'              =>'required|persian_alpha|max:100',
            'lname_fa'              =>'required|persian_alpha|max:100',
            'description_fa'        =>'nullable|string|max:200',
            'fname_en'              =>'required|string|max:100',
            'lname_en'              =>'required|string|max:100',
            'description_en'        =>'nullable|string|max:200',
            'gallery_category_id'   =>'required|numeric',
            'festival_id'           =>'required|numeric',
            'image'                 =>'required|mimes:jpeg,jpg|max:2048',
        ]);
        $gallery=gallery::create($request->all()+[
                'insert_user_id'    =>Auth::user()->id,
            ]);
        if($request->has('image')&&$request->file('image')->isValid())
        {
            $image=$gallery->fname_en.'_'.$gallery->lname_en.'_'.$gallery->gallery_category->category_en.'_'.time().'.'.$request->file('image')->extension();
            $image_thumbnail='thumbnail_'.$gallery->fname_en.'_'.$gallery->lname_en.'_'.$gallery->gallery_category->category_en.'_'.time().'.'.$request->file('image')->extension();
            $path=public_path('/images/gallery/');
            $files=$request->file('image')->move($path, $image);
            $request->image=$image;
            $img=Image::make($files->getRealPath())
                        ->resize(200,null,function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save($path.$image_thumbnail);
            $request->image=$image;
            $gallery->image=$image;
            $gallery->save();
        }

        if($gallery)
        {
            alert()->success('عکس با موفقیت اضافه شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در اضافه کردن عکس')->persistent('بستن');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(gallery $gallery)
    {
        $gallery_categories=gallery_category::where('status','=','1')
                                ->get();
        return view('admin.gallery.gallery_edit')
                            ->with('gallery_categories',$gallery_categories)
                            ->with('gallery',$gallery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gallery $gallery)
    {
        $this->validate($request,[
            'fname_fa'              =>'required|persian_alpha|max:100',
            'lname_fa'              =>'required|persian_alpha|max:100',
            'description_fa'        =>'nullable|string|max:200',
            'fname_en'              =>'required|string|max:100',
            'lname_en'              =>'required|string|max:100',
            'description_en'        =>'nullable|string|max:200',
            'gallery_category_id'   =>'required|numeric',
            'festival_id'           =>'required|numeric',
        ]);
        $status=$gallery->update($request->all());
        if($status)
        {
            alert()->success('بروزرسانی با موفقیت انجام شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی');
        }

        return redirect('/admin/gallery/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(gallery $gallery)
    {
        $status=$gallery->delete();
        if($status)
        {
            alert()->success('عکس از گالری حذف شد')->persistent();
        }
        else
        {
            alert()->error('خطا در حذف عکس');
        }

        return back();
    }
}
