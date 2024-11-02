<?php

namespace App\Http\Controllers\admin;

use App\competiton;
use App\festival;
use App\Http\Controllers\Controller;
use App\refereeing;
use Illuminate\Http\Request;

class RefereeingController extends Controller
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

    public function showRankedCompetitions(festival $festival)
    {

        $competitions = competiton::with('refereeScores')
            ->withCount(['refereeScores as total_score' => function ($query) {
                $query->select(\DB::raw('SUM(score)'))->where('is_public', false);
            }])
            ->having('total_score', '>', 0) // فقط آثاری که داوری شده‌اند
            ->orderByDesc('total_score')     // مرتب‌سازی بر اساس جمع امتیاز
            ->get();


        // جمع امتیازات مردمی برای آثاری که فقط داوری مردمی دارند
        $competitions_public = competiton::with('publicScore')
            ->withCount(['publicScore as total_public_score' => function ($query) {
                $query->select(\DB::raw('SUM(score)'))->where('is_public', true);
            }])
            ->having('total_public_score', '>', 0) // فقط آثاری که امتیاز مردمی دارند
            ->orderByDesc('total_public_score')     // مرتب‌سازی بر اساس جمع امتیاز مردمی
            ->get();

        return view('admin.competition.competitions_ranked', compact('competitions','competitions_public'));
    }
}
