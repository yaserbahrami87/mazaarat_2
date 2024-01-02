<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\setting;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }

    public function basic_create()
    {
        $settings=setting::get();
        return view('admin.settings.basic')
            ->with('settings',$settings);
    }

    public function basic(Request $request)
    {

        if(!is_null($request->address))
        {
            $settings=setting::updateOrInsert([
                'setting' =>'address',

            ],[
                'value'   =>$request->address,
            ]);
        }

        if(!is_null($request->tel))
        {
            $settings=setting::updateOrInsert([
                'setting' =>'tel',


            ],[
                'value'   =>$request->tel,
            ]);
        }

        if(!is_null($request->email))
        {

            $settings=setting::updateOrInsert([
                'setting'   =>'email',


            ],[
                'value'   =>$request->email,
            ]);
        }

        if(!is_null($request->facebook))
        {

            $settings=setting::updateOrInsert([
                'setting'   =>'facebook',


            ],[
                'value'   =>$request->facebook,
            ]);
        }

        if(!is_null($request->telegram))
        {

            $settings=setting::updateOrInsert([
                'setting'   =>'telegram',


            ],[
                'value'   =>$request->telegram,
            ]);
        }

        if(!is_null($request->instagram))
        {

            $settings=setting::updateOrInsert([
                'setting'   =>'instagram',


            ],[
                'value'   =>$request->instagram,
            ]);
        }

        if(!is_null($request->whatsapp))
        {

            $settings=setting::updateOrInsert([
                'setting'   =>'whatsapp',


            ],[
                'value'   =>$request->whatsapp,
            ]);
        }

        //EN
        if(!is_null($request->address_en))
        {
            $settings=setting::updateOrInsert([
                'setting' =>'address_en',

            ],[
                'value'   =>$request->address_en,
            ]);
        }

        if(!is_null($request->tel_en))
        {
            $settings=setting::updateOrInsert([
                'setting' =>'tel_en',


            ],[
                'value'   =>$request->tel_en,
            ]);
        }

        if(!is_null($request->email_en))
        {

            $settings=setting::updateOrInsert([
                'setting'   =>'email_en',


            ],[
                'value'   =>$request->email_en,
            ]);
        }



        if($request->has('logo'))
        {
            $image='logo.'.$request->file('logo')->extension();
            $image_thumbnail='thumbnail_'.$image;
            $path=public_path('/images/');
            $files=$request->file('logo')->move($path, $image);

            $img=Image::make($files->getRealPath())
                ->resize(200,null,function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($path.$image_thumbnail);
            $settings=setting::updateOrInsert([
                'setting'   =>'logo',
            ],[
                'value'   =>$image,
            ]);
        }



        if($settings)
        {
            alert()->success('اطلاعات با موفقیت بروزرسانی شد')->persistent('بستن');
        }
        else
        {
            alert()->success('خطا در بروزرسانی')->persistent('بستن');
        }



        return back();
    }

    public function sliders_home()
    {
        $sliders=setting::where('setting','sliders_home')
            ->get();
        return view('admin.settings.sliders_home.sliders_home')
            ->with('sliders',$sliders);
    }

    public function sliders_home_store(Request $request)
    {

        $request->validate([
            'value' =>'required|mimes:jpg,jpeg,png|max:10240',
            'option'=>'nullable|url'
        ]);




        if($request->has('value'))
        {
            $image=time().'_'.$request->file('value')->getClientOriginalName();
            $image_thumbnail='thumbnail_'.$image;
            $path=public_path('/images/');
            $files=$request->file('value')->move($path, $image);

            $img=Image::make($files->getRealPath())
                ->resize(200,null,function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($path.$image_thumbnail);

            $settings=setting::create([
                'setting'   =>'sliders_home',
                'value'     =>$image,
                'option'     =>$request->option,
                ''
            ]);

        }

        if($settings)
        {
            alert()->success('اسلایدر با موفقیت اضافه شد')->persistent('بستن');
        }
        else
        {
            alert()->success('خطا در اضافه کردن اسلایدر')->persistent('بستن');
        }

        return back();

    }

    public function sliders_home_edit(setting $setting)
    {
        return view('admin.settings.sliders_home.sliders_home_edit')
            ->with('setting',$setting);
    }

    public function sliders_home_update(Request $request,setting $setting)
    {
        $request->validate([
            'value' =>'nullable|mimes:jpg,jpeg,png|max:10240',
            'option'=>'nullable|url'
        ]);
        $fileName=$setting->value;
        $status=$setting->update($request->all());

        if($request->has('value'))
        {
            $image=$fileName;
            $image_thumbnail='thumbnail_'.$image;
            $path=public_path('/images/');
            $files=$request->file('value')->move($path, $image);

            $img=Image::make($files->getRealPath())
                ->resize(200,null,function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($path.$image_thumbnail);
            $setting->value=$image;
            $setting->save();

        }

        if($status)
        {
            alert()->success('اسلایدر با موفقیت به روزرسانی شد')->persistent('بستن');

        }
        else
        {
            alert()->error('خطا در بروزرسانی')->persistent('بستن');
        }

        return back();
    }

    public function sliders_home_destory(setting $setting)
    {
        $files=array('images/'.$setting->value,'images/thumbnail_'.$setting->value);
        $status=File::delete($files);
//        $file2=File::delete('image/thumbnail_'.$setting->value);
        if($status)
        {
            $setting->delete();
            alert()->success('فایل با موفقیت حذف شذ')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در حذف فایل ها')->persistent('بستن');
        }

        return back();
    }


    public function colleagues()
    {
        $colleagues=setting::where('setting','colleagues')
            ->get();
        return view('admin.settings.colleagues.colleagues')
            ->with('colleagues',$colleagues);
    }

    public function colleagues_store(Request $request)
    {

        $request->validate([
            'value' =>'required|mimes:jpg,jpeg,png|max:10240',
            'option'=>'nullable|url'
        ]);




        if($request->has('value'))
        {
            $image=time().'_'.$request->file('value')->getClientOriginalName();
            $image_thumbnail='thumbnail_'.$image;
            $path=public_path('/images/');
            $files=$request->file('value')->move($path, $image);

            $img=Image::make($files->getRealPath())
                ->resize(200,null,function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save($path.$image_thumbnail);

            $settings=setting::create([
                'setting'   =>'colleagues',
                'value'     =>$image,
                'option'     =>$request->option,
                ''
            ]);

        }

        if($settings)
        {
            alert()->success('اسلایدر با موفقیت اضافه شد')->persistent('بستن');
        }
        else
        {
            alert()->success('خطا در اضافه کردن اسلایدر')->persistent('بستن');
        }

        return back();

    }

    public function colleagues_edit(setting $setting)
    {
        return view('admin.settings.colleagues.colleagues_edit')
            ->with('setting',$setting);
    }

}
