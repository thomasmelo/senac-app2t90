@extends('layouts.base')

@section('menu')    
@endsection
@section('conteudo')   
<h1 class="h-1">
    <i class="fa-brands fa-product-hunt"></i>
    Produtos - 
    <a class="btn btn-dark" href="{{ route('produto.create') }}">
        <i class="fa-solid fa-circle-plus"></i>
        Novo produto
    </a>
</h1>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Produto</th>
            <th>Foto</th>
            <th>Descrição</th>
            <th>Atualizado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produtos as $produto)                   
            <tr>
                <td>
                    <div class="d-flex flex-column">
                        <a class="btn btn-success" 
                        href="{{ route('produto.show', ['id'=>$produto->id_produto]) }}">
                            <i class="fa-solid fa-eye"></i>
                            Ver
                        </a>
                        <a class="btn btn-primary mt-1" 
                        href="{{ route('produto.edit', ['id'=>$produto->id_produto]) }}">
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
                    {{ $produto->produto }}
                </td>
                <td>
                    foto
                </td>
                <td>
                    {!! $produto->descricao !!}                        
                </td>
                <td>
                    {{ $produto->updated_at->format('d/m/Y H:i') }}h
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- conteudo --}}
@endsection