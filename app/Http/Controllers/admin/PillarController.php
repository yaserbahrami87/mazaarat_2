<?php

namespace App\Http\Controllers\admin;

use App\festival;
use App\Http\Controllers\Controller;
use App\pillar;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PillarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pillars=pillar::orderby('id','desc')
                    ->get();
        return view('admin.pillars.pillar_all')
                        ->with('pillars',$pillars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $festivals=festival::where('status','=',1)
                    ->get();
        return view('admin.pillars.pillar_insert')
                            ->with('festivals',$festivals);
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
            'fname_fa'      =>'required|persian_alpha|max:100',
            'lname_fa'      =>'required|persian_alpha|max:100',
            'position_fa'   =>'required|persian_alpha|max:100',
            'biography_fa'  =>'required|string|',
            'image'         =>'required|mimes:jpg,bmp,png|max:2048',
            'festival_id'   =>'required|numeric',
            'fname_en'      =>'required|string|max:100',
            'lname_en'      =>'required|string|max:100',
            'position_en'   =>'required|string|max:100',
            'biography_en'  =>'required|string|',
        ]);

        if($request->has('image')&&$request->file('image')->isValid())
        {

            $file=$request->file('image');
            $image="pillar_".$request->festival_id."_".$request->fname_en.$request->lname_en.'.'.$request->file('image')->extension();
            $image_thumbnail='thumbnail_'."pillar_".$request->festival_id."_".$request->fname_en.$request->lname_en.'.'.$request->file('image')->extension();
            $path=public_path('/images/pillars/');
            $files=$request->file('image')->move($path, $image);
            $request->image=$image;

            $img=Image::make($files->getRealPath())
                                            ->resize(150,150)
                                            ->save($path.$image_thumbnail);
        }

        $pillar=pillar::create($request->all()+
        [
            'insert_user_id' =>Auth::user()->id,
        ]);

        $pillar->image=$image;
        $pillar->save();

        if($pillar)
        {
            alert()->success('ارکان با موفقیت به جشنواره اضافه شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بارگذاری ارکان')->persistent('بستن');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pillar  $pillar
     * @return \Illuminate\Http\Response
     */
    public function show(pillar $pillar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pillar  $pillar
     * @return \Illuminate\Http\Response
     */
    public function edit(pillar $pillar)
    {
        return view('admin.pillars.pillar_edit')
                    ->with('pillar',$pillar);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pillar  $pillar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pillar $pillar)
    {

        $this->validate($request,[
            'fname_fa'      =>'required|persian_alpha|max:100',
            'lname_fa'      =>'required|persian_alpha|max:100',
            'position_fa'   =>'required|persian_alpha|max:100',
            'biography_fa'  =>'required|string|',
            'image'         =>'nullable|mimes:jpg,bmp,png|max:2048',
            'festival_id'   =>'required|numeric',
            'fname_en'      =>'required|string|max:100',
            'lname_en'      =>'required|string|max:100',
            'position_en'   =>'required|string|max:100',
            'biography_en'  =>'required|string|',
        ]);

        $pillar->update($request->all()+[
                'insert_user_id' =>Auth::user()->id,
            ]);

        if($request->has('image')&&$request->file('image')->isValid())
        {
            $file=$request->file('image');
            $image="pillar_".$request->festival_id."_".$request->fname_en.$request->lname_en.'.'.$request->file('image')->extension();
            $image_thumbnail='thumbnail_'."pillar_".$request->festival_id."_".$request->fname_en.$request->lname_en.'.'.$request->file('image')->extension();
            $path=public_path('/images/pillars/');
            $files=$request->file('image')->move($path, $image);
            $request->image=$image;
            $img=Image::make($files->getRealPath())
                    ->resize(150,150)
                    ->save($path.$image_thumbnail);
            $request->image=$image;
            $pillar->image=$image;
            $pillar->save();
        }




        if($pillar)
        {
            alert()->success('ارکان با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی ارکان')->persistent('بستن');
        }

        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pillar  $pillar
     * @return \Illuminate\Http\Response
     */
    public function destroy(pillar $pillar)
    {
        $status=$pillar->delete();
        if($status)
        {
            alert()->success('رکن با موفقیت حذف شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف رکن')->persistent('بستن');
        }

        return redirect('/admin/pillar');

    }
}
