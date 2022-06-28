@extends('layouts.base')

@section('menu')   
@endsection

@section('conteudo')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                        {{-- REMOVER --}}
                        <button class="btn btn-danger mt-1"
                            data-bs-toggle="modal" 
                            data-bs-target="#modalRemover"
                            data-bs-nomeProduto = "{{ $item->produto->produto }}"
                            data-bs-url="{{ route('lista.removerProduto', ['idListaProduto'=>$item->id_lista_produto]) }}"
                        >
                            Remover
                        </button>
                        {{-- /REMOVER --}}
                        

                    </div>
                </td>
                <td>{!! $item->iconeStatus() !!}</td>
                <td>{{  $item->produto->produto }}</td>
                <td>{!! $item->updated_at->format('d/m/Y \a\s H:i') !!}h</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- /TABELA --}}

{{-- MODAL --}}        
<div class="modal fade" id="modalRemover" tabindex="-1" aria-labelledby="modalRemoverLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formRemover" method="post" action >
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                {{-- TITULO --}}        
                <h5 class="modal-title" id="modalRemoverLabel"></h5>        
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p class="col-12">Tem certeza que deseja remover o produto:</p>            
                    <p id="produto"></p>            
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-danger">Confirmar Remoção.</button>
            </div>
        </div>
    </form>
  </div>
</div>
{{-- MODAL --}}

@endsection
@section('script')
@parent
    <script>
        const modalRemover = document.getElementById('modalRemover')
        modalRemover.addEventListener('show.bs.modal', event => {       
        const button = event.relatedTarget        
        const nomeProduto = button.getAttribute('data-bs-nomeProduto');
        const url = button.getAttribute('data-bs-url');        
        $('#produto').text(nomeProduto);
        $('.modal-title').text(nomeProduto);
        $('#formRemover').attr('action', url);       
        });
    </script>


@endsection