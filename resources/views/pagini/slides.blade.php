@extends('layouts.app')

@section('content')
<div class="container">
    @include('pagini.mesaje')
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body">
                        <h3 class="p-2">Lista slide-uri</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Slide</th>
                                <th>ID</th>
                                <th>URL</th>
                                <th>Pozitie</th>
                                <th>Data</th>
                                <th>Optiuni</th>
                                
                            </tr>
                            @foreach($slides as $slide)
                                <tr>
                                    <td><img src="/storage/imagini/{{$slide->filename}}" alt="" class="img-fluid"></td>
                                    <td class="align-middle">{{$slide->id}}</td>
                                    <td class="align-middle">{{$slide->url}}</td>
                                    <td class="align-middle">{{$slide->position}}</td>
                                    <td class="align-middle">{{$slide->created_at}}</td>   
                                    <td class="align-middle">
                                        <a href="/slider/{{$slide->id}}/edit"><img src="/brand/edit.svg" alt=""></a>
                                        {!! Form::open(['action' => ['SliderController@destroy', $slide->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Sigur stergeti slide-ul?")']) !!}
                                            {{-- {{Form::hidden}} --}}
                                            {{Form::submit(' ', ['style' => 'background:url(/brand/del.svg) no-repeat; padding-right: 12px; border: none; '])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
    
                            @endforeach
                        </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
