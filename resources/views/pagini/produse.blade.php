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
                                    <td><img src="/storage/imagini/{{$product->images}}" alt="" class="img-fluid"></td>
                                    <td class="align-middle">{{$product->id}}</td>
                                    <td class="align-middle">{{$product->name}}</td>
                                    <td class="align-middle">
                                        @foreach($categories as $category)
                                            @if($product->category === $category->id)
                                                {{$category->name}}
                                            @endif
                                        @endforeach
                                        
                                        @foreach($subcategories as $subcategory)
                                            @if($product->subcategory === $subcategory->id)
                                                @if($product->subcategory >0 )
                                                    ->{{$subcategory->name}}
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="align-middle">{{$product->display_order}}</td>
                                    <td class="align-middle">{{$product->created_at}}</td>   
                                    <td class="align-middle">
                                        <a href="/product/{{$product->id}}/edit"><img src="/brand/edit.svg" alt=""></a>
                                        {!! Form::open(['action' => ['ProductController@destroy', $product->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Sigur stergeti produsul?")']) !!}
                                            {{-- {{Form::hidden}} --}}
                                            {{Form::submit(' ', ['style' => 'background:url(/brand/del.svg) no-repeat; padding-right: 12px; border: none; '])}}
                                        {!! Form::close() !!}
                                        
                                        {{-- <img src="/brand/del.svg" alt=""> --}}
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
