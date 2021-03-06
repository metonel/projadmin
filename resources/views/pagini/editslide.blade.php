@extends('layouts.app')

@section('content')
<div class="container">
    @include('pagini.mesaje')
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">

                <div class="card-body">
                    <h2>Editeaza slide</h2>
                    {!! Form::open(['action' => ['SliderController@update', $slide->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('url', 'URL slide:')}}
                            {{Form::text('url', $slide->url, ['class' => 'form-control'])}}
                        </div>   
                        <div class="form-group">
                                {{Form::label('images', 'Slide (imagine):')}}
                                {{Form::file('images')}}
                        </div>  
                        <div class="form-group">
                            {{Form::label('position', 'Pozitie:')}}
                            {{Form::text('position', $slide->position, ['class' => 'form-control', 'placeholder' => 'se afiseaza in ordine descrescatoare'])}}
                        </div>  

                        {{Form::submit('Salveaza modificari', ['class' => 'btn btn-primary btn-block'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
