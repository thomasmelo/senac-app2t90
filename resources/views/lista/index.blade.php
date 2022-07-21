@extends('layouts.base')

@section('menu')    
@endsection
@section('conteudo')   
<h1 class="h-1">
    <i class="fa-solid fa-list-check"></i>
    Listas - 
    <a class="btn btn-dark" href="{{ route('lista.create') }}">
        <i class="fa-solid fa-circle-plus"></i>
        Nova Lista de compras
    </a>
</h1>
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<table class="table table-hover">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Status</th>
            <th>Lista</th>
            <th>Total de Produtos</th>
            <th>Usuário</th>
            <th>Atualizado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listas as $lista)                   
            <tr>
                <td>
                    <div class="d-flex flex-column">
                        <a class="btn btn-success" 
                        href="{{ route('lista.show', ['id'=>$lista->id_lista]) }}">
                            <i class="fa-solid fa-eye"></i>
                            Ver
                        </a>
                        <a class="btn btn-info mt-1"
                            href="{{ route('lista.enviarListaPorEmail', ['id'=>$lista->id_lista]) }}">
                            <i class="fa-solid fa-paper-plane"></i>  
                            Enviar lista por E-mail
                        </a>
                        <a class="btn btn-primary mt-1" 
                        href="{{ route('lista.edit', ['id'=>$lista->id_lista]) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                            Editar
                        </a>
                        <a class="btn btn-danger mt-1" href="#">
                            <i class="fa-solid fa-trash-can"></i>
                            Remover
                        </a>
                    </div>
                </td>
                <td>
                    {{ $lista->status }}
                </td>
                <td>
                    {{ $lista->nome }}
                </td>
                <td>
                    {!! $lista->produtos->count() !!}
                </td>
                <td>
                    {!! $lista->usuario->name !!}                       
                </td>
                <td>
                    {{ $lista->updated_at->format('d/m/Y H:i') }}h
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- conteudo --}}
@endsection