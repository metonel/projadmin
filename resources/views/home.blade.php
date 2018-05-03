@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">

                {{-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                {{-- @if(count($sold_products)>0) --}}
                        <h3 class="p-2">Lista produse vandute</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Denumire</th>
                            <th>COD</th>
                            <th>Categorie</th>
                            <th>Marime</th>
                            <th>Cantitate</th>
                            <th>Pret</th>
                            <th>Data</th>
                            <th>Vanzator</th>
                            
                        </tr>
                        @foreach($sold_products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->code}}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->size}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->sell_price}}</td>
                                <td>{{$product->created_at}}</td>
                                @if($product->sold_by == 1)
                                <td>Jimmy</td>
                                @endif                                
                            </tr>

                        @endforeach
                    </table>
                {{-- @endif --}}

                {{-- @if(count($shops)>0) --}}
                <hr>
                <h3 class="p-2">Lista magazine</h3>
                    <table class="table table-striped">
                        <tr>
                            <th>Nume magazin</th>
                            <th>Data deschiderii</th>
                            
                        </tr>
                        @foreach($shops as $shop)
                            <tr>
                                <td>{{$shop->shop}}</td>
                                <td>{{$shop->created_at}}</td>
                                
                            </tr>

                        @endforeach
                    </table>
                {{-- @endif --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
