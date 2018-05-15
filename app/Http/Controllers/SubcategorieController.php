<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategorie;
use App\Category;

class SubcategorieController extends Controller
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
        $subcategories = Subcategorie::all();
        return view('pagini.subcategorii')->with('subcategories', $subcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        return view('pagini.addsubcat')->with('categories', $categories);
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
            'name' => 'required',
            'category_id' => 'required',
            'position' => 'required',
            'description' => 'nullable'
        ]);

        $subcategorie = new Subcategorie;
        $subcategorie->category_id = $request->input('category_id');
        $subcategorie->name = $request->input('name');
        $subcategorie->description = $request->input('description');
        $subcategorie->position = $request->input('position');
        $subcategorie->save();
        return redirect('/subcategorie/create')->with('success', 'Subcategoria a fost adaugata');
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
        $subcategorie = Subcategorie::find($id);
        $categories = Category::pluck('name', 'id')->toArray();
        return view('/pagini/editsubcategorii', ['subcategorie' => $subcategorie, 'categories' => $categories]);
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
            'name' => 'required',
            'category_id' => 'required',
            'position' => 'required',
            'description' => 'nullable'
        ]);

        $subcategorie = Subcategorie::find($id);
        $subcategorie->category_id = $request->input('category_id');
        $subcategorie->name = $request->input('name');
        $subcategorie->description = $request->input('description');
        $subcategorie->position = $request->input('position');
        $subcategorie->save();
        return redirect('/subcategorie')->with('success', 'Subcategoria a fost modificata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategorie = Subcategorie::find($id);
        $subcategorie->delete();
        return redirect('/subcategorie')->with('success', 'Subcategoria a fost stearsa');
    }
}
