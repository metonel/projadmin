@extends('layouts.app')

@section('content')
<div class="container">
    @include('pagini.mesaje')
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body">
                        <h3 class="p-2">Lista categorii</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Nume categorie</th>
                                <th>Pozitie</th>
                                <th>Optiuni</th>
                            </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="align-middle">{{$category->name}}</td>
                                    <td class="align-middle">{{$category->position}}</td> 
                                    <td class="align-middle">
                                        <a href="/category/{{$category->id}}/edit"><img src="/brand/edit.svg" alt=""></a>
                                        {!! Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Sigur stergeti categoria?")']) !!}
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
