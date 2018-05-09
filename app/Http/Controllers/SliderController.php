<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slider::all();
        return view('pagini.slides', ['slides' => $slides]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagini.addslide');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'position' => 'required',
            'images' => 'image|nullable|max:1999'
        ]);

        if($request->hasFile('images')){
            $filenameWithExt = $request->file('images')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $ext = $request->file('images')->getClientOriginalExtension();
            $filenameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('images')->storeAs('public/imagini', $filenameToStore);
        } else {
            $filenameToStore = 'noImage.jpg';
        }

        $slide = new Slider;
        
        $slide->url = $request->input('url');
        $slide->position = $request->input('position');
        $slide->filename = $filenameToStore;
        $slide->added_by = auth()->user()->id;
        $slide->last_change = now();       
        $slide->save();
        return redirect('/slider/create')->with('success', 'Produsul a fost adaugat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('/pagini/editslide', ['slide' => $slide]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
