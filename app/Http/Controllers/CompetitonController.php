<?php

namespace App\Http\Controllers;

use App\competiton;
use App\festival;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CompetitonController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $festival=festival::latest()->first();
        return view('user_fa.competition.competition_all')
            ->with('festival',$festival);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $festival=festival::latest()->first();
        return view('user_fa.competition.competion')
            ->with('festival',$festival);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,
        [
           'image'                    =>'required|mimes:jpg,jpeg|max:2048',
           'description'              =>'nullable|string|max:200',
           'competiton_category_id'   =>'required|numeric',
           'name_place'               =>'required|string|max:200',
           'location'                 =>'nullable|string|max:200',
        ]);

        $festival=festival::latest()->first();
       if($request->has('image'))
       {

           if($request->competiton_category_id==1)
           {
               $gallery_category='mausolea';
           }
           elseif($request->competiton_category_id==2)
           {
               $gallery_category='prayer';
           }


           $competition= competiton::create([
               'description'            =>$request['description'],
               'name_place'             =>$request['name_place'],
               'location'               =>$request['location'],
               'date_fa'                =>$this->dateNow,
               'time_fa'                =>$this->timeNow,
               'competiton_category_id' =>$request['competiton_category_id'],
               'user_id'                =>Auth::user()->id,
               'festival_id'            =>$festival->id,
           ]);

           $image=Auth::user()->fname.'_'.Auth::user()->lname.'_'.$gallery_category.'_'.time().'.'.$request->file('image')->extension();
           $image_thumbnail='thumbnail_'.Auth::user()->fname.'_'.Auth::user()->lname.'_'.$gallery_category.'_'.time().'.'.$request->file('image')->extension();
           $path=public_path('/images/competition/');
           $files=$request->file('image')->move($path, $image);
           $request->image=$image;
           $img=Image::make($files->getRealPath())
               ->resize(200,null,function ($constraint) {
                   $constraint->aspectRatio();
               })
               ->save($path.$image_thumbnail);
           $competition->image=$image;
           $competition->save();
       }


       alert()->success('عکس  با موفقیت در جشنواره ثبت شد')->persistent('بستن');
       return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\competiton  $competiton
     * @return \Illuminate\Http\Response
     */
    public function show(competiton $competiton)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\competiton  $competiton
     * @return \Illuminate\Http\Response
     */
    public function edit(competiton $competiton)
    {
            if(Auth::user()->id==$competiton->user_id)
            {
                return view('user_fa.competition.competition_edit')
                                ->with('competiton',$competiton);
            }
            else
            {
                return abort(403);
            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\competiton  $competiton
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, competiton $competiton)
    {

        $this->validate($request,
            [
                'image'                    =>'nullable|mimes:jpg,jpeg|max:2048',
                'description'              =>'nullable|string|max:200',
                'competiton_category_id'   =>'nullable|numeric',
                'name_place'               =>'nullable|string|max:200',
                'location'                 =>'nullable|string|max:200',
            ]);

        $status=$competiton->update($request->all());
        if($request->has('image')&&$request->file('image')->isValid())
        {
            $image=$competiton->image;
            $image_thumbnail='thumbnail_'.$competiton->image;
            $path=public_path('/images/competition/');
            $files=$request->file('image')->move($path, $image);
            $request->image=$image;
            $img=Image::make($files->getRealPath())
                ->resize(200,null,function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($path.$image_thumbnail);
            $request->image=$image;
            $competiton->image=$image;
            $competiton->save();
        }

        if($status)
        {
            alert()->success('عکس بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return redirect('/panel/competiton/create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\competiton  $competiton
     * @return \Illuminate\Http\Response
     */
    public function destroy(competiton $competiton,Request $request)
    {
        $competiton=competiton::where('id','=',$request->competition_id)
                            ->first();
        if($competiton)
        {
            if($competiton->user_id==Auth::user()->id)
            {
                $status=$competiton->delete();
                if($status)
                {
                    alert()->success('عکس با موفقیت حذف شد');
                }
                else
                {
                    alert()->error('خطا در حذف');
                }
            }
            else
            {
                abort(403);
            }
        }
        else
        {
            return abort(403);
        }

        return back();

    }
}
