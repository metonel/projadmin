@extends('layouts.app')

@section('content')
<div class="container">
    @include('pagini.mesaje')
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body">
                        <h3 class="p-2">Lista produse</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Poza</th>
                                <th>ID</th>
                                <th>Denumire</th>
                                <th>Categorie</th>
                                <th>Pozitie</th>
                                <th>Data</th>
                                <th>optiuni</th>
                                
                            </tr>
                            @foreach($products as $product)
                                <tr>
                                    <td><img src="/storage/imagini/{{$product->images}}" alt=""></td>
                                    <td class="align-middle">{{$product->id}}</td>
                                    <td class="align-middle">{{$product->name}}</td>
                                    <td class="align-middle">{{$product->category}}</td>
                                    <td class="align-middle">{{$product->display_order}}</td>
                                    <td class="align-middle">{{$product->created_at}}</td>   
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
