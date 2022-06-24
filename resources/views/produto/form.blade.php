@extends('layouts.base')
@section('menu')    
@endsection

@section('conteudo')

    <h1>
        <i class="fa-brands fa-product-hunt"></i>
        @if ($produto)
            Editar produto Cód.: {{ $produto->id_produto }}
        @else
            Novo produto 
        @endif        
    </h1>

    {{-- FORMULARIO --}}
    @if($produto)
        {{-- EDITAR --}}
        <form method="POST" action="{{ route('produto.update',['id'=>$produto->id_produto]) }}">
    @else 
        {{-- CADASTRAR --}}
        <form method="POST" action="{{ route('produto.store') }}">
    @endif
            @csrf

        <div class="row g-3">
            <div class="col-md-6">        
                <label for="produto" class="form-label">Produto*</label>
                <input type="text" class="form-control" id="produto"
                    name="produto"
                    value="{{ $produto ? $produto->produto : '' }}"                    
                    placeholder="nome do produto"
                    required 
                    >
            </div>
            <div class="col-md-6">
                <label for="foto" class="form-label">foto</label>
                <input type="file" class="form-control"
                id="foto"
                name="foto">
            </div>            
            <div class="col-md-12">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" 
                 id="descricao"
                 name="descricao"
                 rows="3">{{ $produto ? $produto->descricao : '' }}</textarea>
            </div>
            <div class="col-md-2 offset-md-10">
                <button class="btn btn-primary" type="submit">
                    @if ($produto)
                        <i class="fa-solid fa-pen-to-square"></i>
                        Atualizar Produto
                    @else
                        <i class="fa-solid fa-floppy-disk"></i>
                        Novo Produto
                    @endif                    
                </button>
            </div>
        </div>
        
    </form>
    {{-- /FORMULARIO --}}

@endsection

@section('script')    
@endsection