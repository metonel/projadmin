@extends('layouts.app')

@section('content')
<div class="container">
    @include('pagini.mesaje')
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body">
                        <h3 class="p-2">Lista comenzi</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Data</th>
                                <th>Client</th>
                                <th>Adresa</th>
                                <th>Telefon</th>
                                <th>Email</th>
                                <th>Persoana fizica</th>
                                <th>Firma</th>
                                <th>Status</th>
                                <th>Nr prod</th>
                                <th>optiuni</th>
                                
                            </tr>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="align-middle">{{$order->created_at}}</td>
                                    <td class="align-middle">{{$order->fullname}}</td>
                                    <td class="align-middle">{{$order->address}}</td>
                                    <td class="align-middle">{{$order->phone}}</td>
                                    <td class="align-middle">{{$order->email}}</td>
                                    <td class="align-middle">
                                        @if($order->invoice_private != NULL)
                                            -link factura-
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if($order->invoice_company != NULL)
                                            -link factura-
                                        @endif</td>
                                    <td class="align-middle">{{$order->status}}</td>
                                    <td class="align-middle">{{$order->name}}</td>  
                                    <td class="align-middle">
                                        <a href="/orders/{{$order->id}}/edit"><img src="/brand/edit.svg" alt=""></a>
                                        {!! Form::open(['action' => ['OrderController@destroy', $order->id], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Sigur stergeti comanda?")']) !!}
                                            {{-- {{Form::hidden}} --}}
                                            {{Form::submit(' ', ['style' => 'background:url(/brand/del.svg) no-repeat; padding-right: 12px; border: none; '])}}
                                        {!! Form::close() !!}
                                        
                                        {{-- <img src="/brand/del.svg" alt=""> --}}
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
