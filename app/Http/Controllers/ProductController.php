<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Subcategorie;

class ProductController extends Controller
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
        $products = Product::all();
        $categories = Category::all();
        $subcategories = Subcategorie::all();
        return view('pagini.produse', ['products' => $products, 'categories' => $categories, 'subcategories' => $subcategories]);
        // return view('pagini.produse')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->toArray();
        $subcategories = Subcategorie::pluck('name', 'id')->toArray();
        return view('pagini.addprod', ['categories' => $categories, 'subcategories' => $subcategories]);
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
            'sell_price' => 'required',
            'images' => 'image|nullable|max:1999',
            'description' => 'nullable'
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

        $product = new Product;
        $product->name = $request->input('name');
        $product->sell_price = $request->input('sell_price');
        $product->currency = $request->input('currency');
        $product->category = $request->input('category');
        $product->subcategory = $request->input('subcategory');
        $product->images = $filenameToStore;
        $product->description = $request->input('description');
        $product->show = $request->input('show');
        $product->display_order = $request->input('display_order');
        $product->shop_id = 1;
        $product->code = $request->input('code');
        $product->aquisition_price = 200;
        $product->discount = 0;
        $product->size = '200x150';
        $product->sizes = 0;
        $product->colors = 0;
        $product->quantity = 0;
        $product->tags = '';
        $product->same = 1;
        $product->special = 1;
        $product->added_by = auth()->user()->id;
        $product->last_updated = now();
        $product->last_visited = now();       
        $product->save();
        return redirect('/addprod')->with('success', 'Produsul a fost adaugat');
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
        $categories = Category::pluck('name', 'id')->toArray();
        $subcategories = Subcategorie::pluck('name', 'id')->toArray();
        $product = Product::find($id);
        return view('/pagini/editprod', ['categories' => $categories, 'subcategories' => $subcategories, 'product' => $product]);
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
            'sell_price' => 'required',
            'images' => 'image|nullable|max:1999',
            'description' => 'nullable'
        ]);
        $product = Product::find($id);

            if($request->hasFile('images')){
                $filenameWithExt = $request->file('images')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $ext = $request->file('images')->getClientOriginalExtension();
                $filenameToStore = $filename.'_'.time().'.'.$ext;
                $path = $request->file('images')->storeAs('public/imagini', $filenameToStore);
            } else {
                $filenameToStore = $product->images;
            }

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->sell_price = $request->input('sell_price');
        $product->currency = $request->input('currency');
        $product->category = $request->input('category');
        $product->subcategory = $request->input('subcategory');
        $product->images = $filenameToStore;
        $product->description = $request->input('description');
        $product->show = $request->input('show');
        $product->display_order = $request->input('display_order');
        $product->shop_id = 1;
        $product->code = $request->input('code');
        $product->aquisition_price = 200;
        $product->discount = 0;
        $product->size = '200x150';
        $product->sizes = 0;
        $product->colors = 0;
        $product->quantity = 0;
        $product->tags = '';
        $product->same = 1;
        $product->special = 1;
        $product->added_by = auth()->user()->id;
        $product->last_updated = now();
        $product->last_visited = now();       
        $product->save();
        return redirect('/product')->with('success', 'Produsul a fost modificat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/product')->with('success', 'Produsul a fost sters');
    }
}
