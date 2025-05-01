<?php

namespace App\Http\Controllers\admin;

use App\Comment;
use App\competiton_category;
use App\festival;
use App\Http\Controllers\Controller;
use App\competiton;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use ZanySoft\Zip\Zip;

class CompetitonController extends Controller implements ShouldQueue
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

    public function category(festival $festival,competiton_category $competiton_category,Request $request)
    {

        if(($request->has('start_date'))&&($request->has('end_date')))
        {
            $competitons=competiton::where('competiton_category_id','=',$competiton_category->id)
                ->where('festival_id',$festival->id)
                ->wherebetween('date_fa',[$request->start_date,$request->end_date])
                ->orderby('id','desc')
                ->paginate(20);
        }
        else
        {
            $competitons=competiton::where('competiton_category_id','=',$competiton_category->id)
                ->where('festival_id',$festival->id)
                ->orderby('id','desc')
                ->paginate(20);
        }




        return view('admin.competition.competition_all')
                            ->with('competiton_category',$competiton_category->id)
                            ->with('competitions',$competitons);

    }

    public function download()
    {
        $festival=festival::latest()->first();
        $competiton_category=competiton_category::where('id','=',1)
                        ->first();
        $competitons=competiton::where('competiton_category_id','=',$competiton_category->id)
                        ->where('festival_id',$festival->id)
                        ->get();



        $zip=Zip::create($festival->festival_en.'.zip');
        foreach ($competitons as $competiton)
        {
            ini_set('max_execution_time', 0);
            if(!is_null($competiton->image))
            {

                if(file_exists(public_path()."/images/competition/".$competiton->image))
                {
                    $zip->add(public_path()."/images/competition/".$competiton->image);

                }
            }

        }

        $zip->close();
        //return Response()->download(public_path()."/".$festival->festival_en.'.zip');
//        return Response()->download(public_path()."/".$festival->festival_en.'.zip')->deleteFileAfterSend();

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


    public function showScores(festival $festival,competiton $competiton)
    {

        $competition = competiton::with(['refereeScores', 'publicScore'])->findOrFail($competiton->id);


        return view('admin.refereeing.competition_scores', compact('competition'));
    }

    public function complaints()
    {
        $complaints=Comment::where('type','complaint')
                        ->where('status',0)
                        ->get();

        return view('admin.complaints.complaints')
                                ->with('complaints',$complaints);
    }

    public function complaints_changeStatus(Request $request,Comment $comment)
    {
        $this->validate($request,[
            'status'    =>'required|boolean'
        ]);

        $comment->status=$request->status;
        $status=$comment->save();
        if($status)
        {
            alert()->success('تغییرات با موفقیت اعمال شد');
        }
        else
        {
            alert()->error('خطا در تغییر');
        }

        return back();
    }


}
