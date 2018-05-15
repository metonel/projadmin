@extends('layouts.app')

@section('content')
<div class="container">
    @include('pagini.mesaje')
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">

                <div class="card-body">
                    <h2>Adaugare categorie</h2>
                    {!! Form::open(['action' => ['CategoryController@update', $category->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('name', 'Denumire')}}
                            {{Form::text('name', $category->name, ['class' => 'form-control'])}}
                        </div> 
                        <div class="form-group">
                            {{Form::label('position', 'Pozitie')}}
                            {{Form::text('position', $category->position, ['class' => 'form-control', 'placeholder' => 'se completeaza numeric'])}}
                        </div> 
                        <div class="form-group">
                            {{Form::label('description', 'Descriere')}}
                            {{Form::textarea('description', $category->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Descriere categorie'])}}
                        </div>   

                        {{Form::submit('Salveaza modificari', ['class' => 'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}
                    <hr>
                    <h3>Detalii:</h3>
                    <p>Categoriile sunt afisate in ordinea descrescatoare a pozitiei.</p>
                    <p>Categoriile cu aceeasi pozitie sunt afisate in ordine alfabetica.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
