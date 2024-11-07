<?php

namespace App\Http\Controllers;

use App\competiton;
use App\festival;
use App\refereeing;
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
        if(($this->dateNow > $festival->start_date_fa)&& ($this->dateNow < $festival->end_date_fa) )
        {
            return view('user_fa.competition.competion')
                ->with('festival',$festival);
        }
        else
        {
            alert()->error('شما خارج از زمان ارسال محتوی اقدام کرده اید')->persistent('بستن');
            return redirect('/');
        }

    }

    public function create_en()
    {
        $festival=festival::latest()->first();
        if(($this->dateNow > $festival->start_date_fa)&& ($this->dateNow < $festival->end_date_fa) ) {
            return view('user_en.competition.competion')
                ->with('festival', $festival);
        }
        else
        {
            alert()->error('You have acted outside the content posting time')->persistent('Close');
            return redirect('/');
        }
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
           'name_place'               =>'required_if:competiton_category_id,1|max:200',
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

           $image=Auth::user()->id.'_'.$gallery_category.'_'.time().'.'.$request->file('image')->extension();
           $image_thumbnail='thumbnail_'.Auth::user()->id.'_'.$gallery_category.'_'.time().'.'.$request->file('image')->extension();
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

       if((session('lang'))=='farsi')
       {
           alert()->success('عکس  با موفقیت در جشنواره ثبت شد')->persistent('بستن');
       }
       else
       {
           alert()->success('Upload successfully')->persistent('بستن');
       }

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

    public function edit_en(competiton $competiton)
    {
        if(Auth::user()->id==$competiton->user_id)
        {
            return view('user_en.competition.competition_edit')
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

        return back();
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

    public function showNextCompetitionForVote()
    {
        $festival=festival::latest()->first();
        // یافتن اولین اثری که کاربر به آن رأی نداده
        $competition = competiton::whereDoesntHave('publicScore', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })
        ->where('festival_id',$festival->id)
        ->first();

        // اگر اثری پیدا نشد، کاربر به صفحه‌ای برای اطلاع‌رسانی هدایت می‌شود
        if (!$competition) {
            alert()->error('اثری برای رای گیری وجود ندارد')->persistent('بستن');
            return redirect('/');
        }

        return view('user_fa.referee.referee', compact('competition'));
    }

    public function storeUserVote(Request $request,competiton $competiton)
    {
        $festival=festival::latest()->first();
        $request->validate([
            'score' => 'required|integer|min:1|max:10',
        ]);

        refereeing::create([
            'competiton_id' => $competiton->id,
            'user_id' => Auth::user()->id,
            'score' => $request->score,
            'festival_id'  =>$festival->id,
            'description' => $request->description,
            'is_public' => true,
            'date_fa'   =>$this->dateNow,
            'time_fa'   =>$this->timeNow,
        ]);
        alert()->success('رای شما با موفقیت ثبت شد')->persistent('بستن');
        return redirect('/panel/competitions/next-vote');
    }



}
