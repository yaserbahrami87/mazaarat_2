<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=news::orderby('id','desc')
                        ->get();
        return view('admin.news.news_all')
                    ->with('news',$news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.news_insert');
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
            'title_fa'      =>'required|string|max:200|unique:news,title_fa',
            'description_fa'=>'required|string|max:200',
            'content_fa'    =>'required|string|',
            'festival_id'   =>'required|numeric',
            'title_en'      =>'required|string|max:200|unique:news,title_en',
            'description_en'=>'required|string|max:200',
            'content_en'    =>'required|string',
            'image'         =>'required|mimes:jpg,jpeg,png,bmp|max:2048',
        ]);





        $news=news::create($request->all()+
        [
            'insert_user_id'    =>Auth::user()->id,
            'date_fa'           =>$this->dateNow,
            'time_fa'           =>$this->timeNow,
        ]);

        if($request->has('image')&&$request->file('image')->isValid())
        {
            $file=$request->file('image');
            $image="news_".time().'.'.$request->file('image')->extension();
            $path=public_path('/images/news/');
            $files=$request->file('image')->move($path, $image);
        }

        $news->image=$image;
        $news->save();

        if($news)
        {
            alert()->success('خبر با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت خبر')->persistent('بستن');
        }

        return redirect('/admin/news');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function show(news $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(news $news)
    {
        return view('admin.news.news_edit')
                    ->with('news',$news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, news $news)
    {

        $this->validate($request,[
            'title_fa'      =>'required|string|max:200|unique:news,title_fa,'.$news->id,
            'description_fa'=>'required|string|max:200',
            'content_fa'    =>'required|string|',
            'festival_id'   =>'required|numeric',
            'title_en'      =>'required|string|max:200|unique:news,title_en,'.$news->id,
            'description_en'=>'required|string|max:200',
            'content_en'    =>'required|string',

        ]);



        $status=$news->update($request->all()+[
                'insert_user_id'    =>Auth::user()->id,
            ]);

        if($request->has('image')&&$request->file('image')->isValid())
        {
            $file=$request->file('image');
            $image="news_".time().'.'.$request->file('image')->extension();
            $path=public_path('/images/news/');
            $files=$request->file('image')->move($path, $image);
            $news->image=$image;
            $news->save();
        }

        if($news)
        {
            alert()->success('خبر با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در بروزرسانی خبر')->persistent('بستن');
        }

        return redirect('/admin/news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\news  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(news $news)
    {
        $status=$news->delete();
        if($status)
        {
            alert()->success('خبر با موفقیت حذف شذ')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف خبر');
        }

        return back();
    }
}
