<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\gallery_category;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery_categories=gallery_category::orderby('id','desc')
                        ->paginate(10);
        return view('admin.gallery.galleryCategory.galleryCategory_all')
                            ->with('gallery_categories',$gallery_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.galleryCategory.galleryCategory_insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
           'category_fa'    =>'required|string|max:100|unique:gallery_categories,category_fa',
           'category_en'    =>'required|string|max:100|unique:gallery_categories,category_en',
        ]);

        $gallery_category=gallery_category::create($request->all());
        if($gallery_category)
        {
            alert()->success('دسته بندی با موفقیت اضافه شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در اضافه کردن دسته بندی')->persistent('بستن');
        }

        return redirect('/admin/gallery_category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\gallery_category  $gallery_category
     * @return \Illuminate\Http\Response
     */
    public function show(gallery_category $gallery_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\gallery_category  $gallery_category
     * @return \Illuminate\Http\Response
     */
    public function edit(gallery_category $gallery_category)
    {
        return view('admin.gallery.galleryCategory.galleryCategory_edit')
                        ->with('gallery_category',$gallery_category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\gallery_category  $gallery_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gallery_category $gallery_category)
    {

        $this->validate($request,[
            'category_fa'    =>'required|string|max:100|unique:gallery_categories,category_fa,'.$gallery_category->id,
            'category_en'    =>'required|string|max:100|unique:gallery_categories,category_en,'.$gallery_category->id,
            'status'         =>'required|boolean',
        ]);
        $status=$gallery_category->update($request->all());
        if($status)
        {
            alert()->success('دسته بندی با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی دسته بندی')->persistent('بستن');
        }

        return redirect('/admin/gallery_category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gallery_category  $gallery_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(gallery_category $gallery_category)
    {
        //
    }
}
