@extends('layouts.app')

@section('content')
<div class="container">
    @include('pagini.mesaje')
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">

                <div class="card-body">
                    <h2>Adaugare subcategorie</h2>
                    {!! Form::open(['action' => 'SubcategorieController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}   
                        <div class="form-group">
                            {{Form::label('category_id', 'Categoria')}}
                            {!! Form::select('category_id', $categories, null ) !!}
                        </div> 
                        <div class="form-group">
                            {{Form::label('name', 'Denumire')}}
                            {{Form::text('name', '', ['class' => 'form-control'])}}
                        </div> 
                        <div class="form-group">
                            {{Form::label('position', 'Pozitie')}}
                            {{Form::text('position', '', ['class' => 'form-control', 'placeholder' => 'se completeaza numeric'])}}
                        </div> 
                        <div class="form-group">
                            {{Form::label('description', 'Descriere')}}
                            {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Descriere produs'])}}
                        </div>   

                        {{Form::submit('Adauga categorie', ['class' => 'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}
                    <hr>
                    <h3>Detalii:</h3>
                    <p>Subcategoriile sunt afisate in ordinea descrescatoare a pozitiei.</p>
                    <p>Subcategoriile cu aceeasi pozitie sunt afisate in ordine alfabetica.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
