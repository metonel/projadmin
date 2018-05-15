<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
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
        $news = News::all();
        return view('pagini.stiri')->with('news', $news);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pagini.addstiri');
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
            'title' => 'required',
            'subtitle' => 'required',
            'images' => 'image|nullable|max:1999',
            'text' => 'required'
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

        $news = new News;
        $news->title = $request->input('title');
        $news->subtitle = $request->input('subtitle');
        $news->filename = $filenameToStore;
        $news->text = $request->input('text');
        $news->added_by = auth()->user()->id;
        $news->changed_by = auth()->user()->id;    
        $news->last_change = now();
        $news->save();
        return redirect('/news')->with('success', 'Stirea a fost adaugata');
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
        $news = News::find($id);
        return view('/pagini/editstiri', ['news' => $news]);
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
        $this -> validate($request, [
            'title' => 'required',
            'subtitle' => 'required',
            'images' => 'image|nullable|max:1999',
            'text' => 'required'
        ]);
        
        $news = News::find($id);
            if($request->hasFile('images')){
                $filenameWithExt = $request->file('images')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $ext = $request->file('images')->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$ext;
                $path = $request->file('images')->storeAs('public/imagini', $filenameToStore);
            } else {
                $filenameToStore = $news->filename;
            }

        $news->title = $request->input('title');
        $news->subtitle = $request->input('subtitle');
        $news->filename = $filenameToStore;
        $news->text = $request->input('text');
        $news->added_by = auth()->user()->id;
        $news->changed_by = auth()->user()->id;    
        $news->last_change = now();
        $news->save();
        return redirect('/news')->with('success', 'Stirea a fost modificata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('/news')->with('success', 'Stirea a fost stearsa');
    }
}
