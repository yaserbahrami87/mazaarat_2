<?php

namespace App\Http\Controllers;

use App\festival;
use App\gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
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
     * @param  \App\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(festival $festival,Request $request)
    {
        $galleries=gallery::where('festival_id','=',$festival->id)
                            ->paginate(12);

        return view('farsi.gallery')
                        ->with('galleries',$galleries)
                        ->with('festival',$festival);
    }

    public function show_en(festival $festival)
    {
        $galleries=gallery::where('festival_id','=',$festival->id)
            ->paginate(12);

        return view('english.gallery')
            ->with('galleries',$galleries)
            ->with('festival',$festival);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(gallery $gallery)
    {
        //
    }

    public function incrementView(Request $request)
    {
        $galleryId = $request->input('gallery_id');

        $gallery = gallery::find($galleryId);

        if ($gallery) {
            $gallery->increment('view');
            return response()->json(['success' => true, 'views' => $gallery->view]);
        }

        return response()->json(['success' => false]);
    }

}
