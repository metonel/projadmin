@extends('layouts.app')

@section('content')
<div class="container">
    @include('pagini.mesaje')
    <div class="row justify-content-center">
        <div class="container">
            <div class="card">
                <div class="card-body">
                        <h3 class="p-2">Lista stiri</h3>
                        @if(count($news)>0)
                        <table class="table table-striped">
                            <tr>
                                <th>Titlu</th>
                                <th>Subtitlu</th>
                                <th>Data adaugarii</th>                                
                                <th>Optiuni</th>
                            </tr>
                            @foreach($news as $stire)
                                <tr>
                                    <td class="align-middle">{{$stire->title}}</td>
                                    <td class="align-middle">{{$stire->subtitle}}</td> 
                                    <td class="align-middle">{{$stire->created_at}}</td> 
                                    <td class="align-middle">
                                        <img src="/brand/edit.svg" alt="">
                                        <img src="/brand/del.svg" alt="">
                                        <img src="/brand/foto.svg" alt="">
                                    </td>
                                </tr>
    
                            @endforeach
                        </table>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
