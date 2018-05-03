@extends('layouts.app')

@section('content')
<div class="container">
    @include('pagini.mesaje')
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body">
                        <h3 class="p-2">Lista subcategorii</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Nume categorie</th>
                                <th>Pozitie</th>
                                <th>Categorie</th>
                                <th>Optiuni</th>
                            </tr>
                            @foreach($subcategories as $subcategorie)
                                <tr>
                                    <td class="align-middle">{{$subcategorie->name}}</td>
                                    <td class="align-middle">{{$subcategorie->position}}</td> 
                                    <td class="align-middle">{{$subcategorie->position}}</td> 
                                    <td class="align-middle">
                                        <img src="/brand/edit.svg" alt="">
                                        <img src="/brand/del.svg" alt="">
                                        <img src="/brand/foto.svg" alt="">
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
