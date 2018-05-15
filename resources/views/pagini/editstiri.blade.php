@extends('layouts.app')

@section('content')
<div class="container">
    @include('pagini.mesaje')
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">

                <div class="card-body">
                    <h2>Editare stire</h2>
                    {!! Form::open(['action' => ['NewsController@update', $news->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Titlu:')}}
                            {{Form::text('title', $news->title, ['class' => 'form-control'])}}
                        </div> 
                        <div class="form-group">
                            {{Form::label('subtitle', 'Subtitlu:')}}
                            {{Form::text('subtitle', $news->subtitle, ['class' => 'form-control'])}}
                        </div>   
                        <div class="form-group">
                                {{Form::label('images', 'Imagine:')}}
                                {{Form::file('images')}}
                        </div>  
                        <div class="form-group">
                            {{Form::label('text', 'Text:')}}
                            {{Form::textarea('text', $news->text, ['id' => 'article-ckeditor', 'class' => 'form-control'])}}
                        </div> 

                        {{Form::submit('Salveaza modificarile', ['class' => 'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
