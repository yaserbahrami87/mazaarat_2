<?php

namespace App\Http\Controllers\Referee;

use App\Comment;
use App\competiton;
use App\festival;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\refereeing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefereeingController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
        $dateNow = verta();
        $this->dateNow = $dateNow->format('Y/m/d');
        $this->timeNow = $dateNow->format('H:i:s');

        $this->festival=festival::latest()->first();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $festival=festival::latest()->first();
        $competition=competiton::where('festival_id','=',$festival->id)
                                    ->get();

        //آثاری که توسط هیچکس داوری نشده
        //$unrefereedCompetitions = competiton::unrefereed()->get();



        $unrefereedCompetitions = competiton::unrefereedBy(Auth::user()->id)
                                            ->where('festival_id',$festival->id)
                                            ->first();

        return view('referee_en.competition.competion')
                        ->with('competition',$unrefereedCompetitions);


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


        $request->validate([
            'competition_id' => 'required|exists:competitons,id',
            'score' =>          'required|integer|between:1,10',
            'description' =>    'nullable|string',
        ]);

        $competition=competiton::where('id', $request->competition_id)
                            ->first();

        $status=refereeing::create([
            'competiton_id' => $request->competition_id,
            'user_id'       => Auth::user()->id,
            'score'         => $request->score,
            'description'   => $request->description,
            'festival_id'   => $competition->festival_id,
            'date_fa'       => $this->dateNow,
            'time_fa'       => $this->timeNow,

        ]);

        if($status)
        {
            alert()->success('رای با موفقیت ثبت شد')->persistent('بستن');
        }
        else
        {
            alert()->error('خطا در ثبت رای')->persistent('بستن');
        }

        return back();



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\refereeing  $refereeing
     * @return \Illuminate\Http\Response
     */
    public function show(refereeing $refereeing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\refereeing  $refereeing
     * @return \Illuminate\Http\Response
     */
    public function edit(refereeing $refereeing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\refereeing  $refereeing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, refereeing $refereeing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\refereeing  $refereeing
     * @return \Illuminate\Http\Response
     */
    public function destroy(refereeing $refereeing)
    {
        //
    }

    public function judged()
    {
        $refereeing=refereeing::where('user_id',Auth::user()->id)
                            ->where('festival_id','=',$this->festival->id)
                            ->paginate(16);


        return view('referee_fa.referee.judge')
                            ->with('refereeing',$refereeing);
    }

    public function complaint_create(competiton $competiton)
    {
        return view('referee_fa.complaint.complaint')
            ->with('competiton',$competiton);
    }

    public function complaint_store(competiton $competiton,Request $request)
    {
        $status=Comment::create([
            'user_id'=>Auth::user()->id,
            'comment'=>$request->comment,
            'product_id'=>$competiton->id,
            'type'      =>'complaint',

        ]);

        if($status)
        {
            alert()->success('اعتراض با موفقیت ثبت شد');
        }
        else
        {
            alert()->error('خطا در ثبت اعتراض');
        }

        return back();
    }
}
