@extends('layouts.base')

@section('menu')   
@endsection

@section('conteudo')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>{{ $produto->produto}}</h1>
<p>{!! nl2br($produto->descricao) !!}</p>

<p>
    <a class="btn btn-primary mt-1" 
    href="{{ route('produto.edit', ['id'=>$produto->id_produto]) }}">
        <i class="fa-solid fa-pen-to-square"></i>
        Editar
    </a> 
</p>
@endsection 