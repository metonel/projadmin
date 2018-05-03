@extends('layouts.app')

@section('content')
<div class="container">
    @include('pagini.mesaje')
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}
                    <h2>Editare produs</h2>
                    {!! Form::open(['action' => ['ProductController@update', $product->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Denumire')}}
                            {{Form::text('name', $product->name, ['class' => 'form-control'])}}
                        </div> 
                        <div class="form-group">
                            {{Form::label('code', 'Cod')}}
                            {{Form::text('code', $product->code, ['class' => 'form-control'])}}
                        </div> 
                        <div class="form-group">
                            {{Form::label('sell_price', 'Pret de vanzare')}}
                            {{Form::text('sell_price', $product->sell_price, ['class' => 'form-control'])}}
                        </div>  
                        <div class="form-group">
                            {{Form::label('123', 'Pret intreg')}}
                            {{Form::text('123', '', ['class' => 'form-control', 'placeholder' => 'se completeaza doar daca exista un discount'])}}
                        </div>   
                        <div class="form-group">
                                {{Form::label('currency', 'Moneda')}}
                                {{Form::select('currency', ['RON' => 'RON', 'EUR' => 'EUR'], $product->currency)}}
                        </div>     
                        <div class="form-group">
                                {{Form::label('category', 'Categorie')}}
                                {!! Form::select('category', $categories, $product->category) !!}
                        </div>    
                        <div class="form-group">
                                {{Form::label('subcategory', 'Subcategorie')}}
                                {!! Form::select('subcategory', $subcategories, $product->subcategory) !!}
                        </div>    
                        <div class="form-group">
                                {{Form::label('images', 'Poze:')}}
                                {{Form::file('images')}}
                        </div>   
                        <div class="form-group">
                            {{Form::label('123', 'Youtube URL')}}
                            {{Form::text('123', '', ['class' => 'form-control'])}}
                        </div>  
                        <div class="form-group">
                            {{Form::label('description', 'Descriere')}}
                            {{Form::textarea('description', $product->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Descriere produs'])}}
                        </div>     
                        <div class="form-group">
                                {{Form::label('show', 'Vizibil pe site')}}
                                {{Form::select('show', ['1' => 'Da', '0' => 'Nu'], $product->show)}}
                        </div>   
                        <div class="form-group">
                            {{Form::label('display_order', 'Pozitie produs')}}
                            {{Form::text('display_order', $product->display_order, ['class' => 'form-control', 'placeholder' => 'se va afisa in ordine descrescatoare'])}}
                        </div> 

                        {{Form::submit('Salveaza modificarile', ['class' => 'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
