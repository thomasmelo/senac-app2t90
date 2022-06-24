@extends('layouts.base')
@section('menu')    
@endsection

@section('conteudo')

    <h1>
        <i class="fa-solid fa-list-check"></i>
        @if ($lista)
            Editar lista Cód.: {{ $lista->id_lista }}
        @else
            Nova lista 
        @endif        
    </h1>

    {{-- FORMULARIO --}}
    @if($lista)
        {{-- EDITAR --}}
        <form method="POST" action="{{ route('lista.update',['id'=>$lista->id_lista]) }}">
    @else 
        {{-- CADASTRAR --}}
        <form method="POST" action="{{ route('lista.store') }}">
    @endif
            @csrf

        <div class="row g-3">
            <div class="col-md-10">        
                <label for="nome" class="form-label">Nome da Lista*</label>
                <input type="text" class="form-control" id="nome"
                    name="nome"
                    value="{{ $lista ? $lista->nome : '' }}"                    
                    placeholder="nome da lista Ex.: Festa das férias"
                    required 
                    >
            </div>
            <div class="col-md-2">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="0" 
                    {{ ($lista && $lista->status ==0) ? 'selected="selected"' : '' }}
                    > 
                        Andamento 
                    </option>
                    <option value="1"
                    {{ ($lista && $lista->status == 1) ? 'selected="selected"' : '' }}
                    > 
                        Concluído
                    </option>
                </select>
            </div>                   
            <div class="col-md-2 offset-md-10">
                <button class="btn btn-primary" type="submit">
                    @if ($lista)
                        <i class="fa-solid fa-pen-to-square"></i>
                        Atualizar Lista
                    @else
                        <i class="fa-solid fa-floppy-disk"></i>
                        Nova Lista
                    @endif                    
                </button>
            </div>
        </div>
        
    </form>
    {{-- /FORMULARIO --}}

@endsection

@section('script')    
@endsection