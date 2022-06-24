@extends('layouts.base')

@section('menu')   
@endsection

@section('conteudo')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>Cod.: {{ $lista->id_lista }} - {{ $lista->nome}}</h1>
<p>Status: {{$lista->status }} - Usuário: {{ $lista->id_user}}</p>

{{-- FORMULARIO --}}
<form action="{{ route('lista.adicionarProduto', ['idLista'=>$lista->id_lista]) }}" 
   method="post">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label class="form-label" for="id_produto">Produto*</label>
            <select class="form-control" name="id_produto" id="id_produto" required>
                <option value="">Escolha</option>
                @foreach ($produtos as $item)
                   <option value="{{ $item->id_produto }}">
                    {{ $item->produto }}
                   </option> 
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label">&nbsp;</label>
            <button class="btn btn-primary form-control">
                <i class="fa-solid fa-floppy-disk"></i>
                Adicionar Produto
            </button>
        </div>
    </div>    
</form>
{{-- /FORMULARIO --}}

{{-- TABELA --}}
<div class="row mt-4">
    <h1>Relação de Produtos</h1>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <th>Ações</th>
            <th>Status</th>
            <th>Produto</th>
            <th>Atualizado</th>
        </thead>
        <tbody>
            @foreach ($lista->produtos()->get() as $item)               
            <tr>
                <td class="col-md-1">
                    <div class="d-flex flex-column">
                        <a class="btn btn-success" href="#">
                            Confirmar
                        </a>
                        <a class="btn btn-danger mt-1" href="#">
                            Remover
                        </a>
                    </div>
                </td>
                <td></td>
                <td>{{ $item->produto->produto }}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- /TABELA --}}

@endsection 