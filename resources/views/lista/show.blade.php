@extends('layouts.base')

@section('menu')   
@endsection

@section('conteudo')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<h1>Cod.: {{$lista->id_lista }} - {{ $lista->nome}}</h1>
<p>Status: {{$lista->status }} - Usuário: {{ $lista->id_user}}</p>

{{-- FORMULARIO --}}
<form action="" method="post">
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
            <button class="btn btn-primary mt-4">
                <i class="fa-solid fa-floppy-disk"></i>
                Adicionar Produto
            </button>
        </div>
    </div>
    
</form>
{{-- /FORMULARIO --}}

{{-- TABELA --}}
{{-- /TABELA --}}

@endsection 