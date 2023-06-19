<?php

namespace App\Http\Controllers\admin;

use App\competiton_category;
use App\festival;
use App\Http\Controllers\Controller;
use App\competiton;
use Illuminate\Http\Request;
use ZanySoft\Zip\Zip;

class CompetitonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'festival' => 'requried|',
            'q' => 'required|'
        ]);
        return view('admin.competition.competition_all');

    }

    public function category(festival $festival,competiton_category $competiton_category)
    {
        $competitons=competiton::where('competiton_category_id','=',$competiton_category->id)
                        ->where('festival_id',$festival->id)
                        ->orderby('id','desc')
                        ->paginate(20);

        return view('admin.competition.competition_all')
                            ->with('competiton_category',$competiton_category->id)
                            ->with('competitions',$competitons);

    }

    public function download(festival $festival,competiton_category $competiton_category)
    {
        $competitons=competiton::where('competiton_category_id','=',$competiton_category->id)
            ->where('festival_id',$festival->id)
            ->get();

        ini_set('max_execution_time', '0');

        $zip=Zip::create($festival->festival_en.'.zip');
        foreach ($competitons as $competiton)
        {
            if(!is_null($competiton->image))
            {

                if(file_exists(public_path()."/images/competition/".$competiton->image))
                {
                    $zip->add(public_path()."/images/competition/".$competiton->image);

                }
            }

        }

        $zip->close();
        return Response()->download(public_path()."/".$festival->festival_en.'.zip')->deleteFileAfterSend();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\competiton  $competiton
     * @return \Illuminate\Http\Response
     */
    public function destroy(competiton $competiton)
    {
        //
    }
}
