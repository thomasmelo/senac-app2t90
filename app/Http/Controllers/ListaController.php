<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;

# EMAILS
use App\Mail\EnviarLista;
#MODELS
use App\Models\{
    Lista,
    Produto,
    ListaProduto
};


class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listas = Lista::all();
        return view('lista.index')
                ->with(compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista = null;
        return view('lista.form')
                ->with(compact('lista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lista = new Lista($request->all());
        $lista->id_user = Auth::user()->id;
        $lista->save();

        return redirect()
                ->route('lista.index')
                ->with('success', 'Lista Criada com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $lista = Lista::find($id);
        $produtos = Produto::orderBy('produto')->get();
        return view('lista.show')
                ->with(compact('lista', 'produtos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $lista = Lista::find($id);
        return view('lista.form')
                ->with(compact('lista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $lista = Lista::find($id);
        $lista->fill($request->all());
        $lista->save();
        return redirect()
                ->route('lista.index')
                ->with('success', 'Lista Atualizada com Sucesso!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lista  $lista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lista $lista)
    {
        //
    }

    /**
     * Cadastra um produto a lista
     *
     * @param integer $idLista
     * @param Request $request
     * @return Response
     */
    public function adicionarProduto(int $idLista, Request $request)
    {
        $listaProduto = new ListaProduto($request->all());
        $listaProduto->id_lista = $idLista;
        $listaProduto->save();

        return redirect()
               ->route('lista.show',['id'=>$idLista])
               ->with('success','Produtos adicionado com sucesso!');

    }

    /**
     * Remove um item da lista de compras
     *
     * @param integer $id_lista_produto
     * @return void
     */
    public function removerProduto(int $id_lista_produto)
    {
        $listaProduto = ListaProduto::find($id_lista_produto);
        $listaProduto->delete();
        $listaProduto->save();
        return redirect()
                ->back()
                ->with('danger','Removido com sucesso!');
    }

    public function confirmarProduto(int $id_lista_produto)
    {
        $listaProduto = ListaProduto::find($id_lista_produto);        
        $listaProduto->status = 1;
        $listaProduto->save();
        return redirect()
                ->back()
                ->with('success','Confirmado com sucesso!');
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return void
     */
    public function enviarListaPorEmail(int $id)
    {
        $lista = Lista::find($id);

        // Enviar a lista por e-mail
        Mail::to($lista->usuario->email)
            ->send(new EnviarLista($lista));
        return redirect()
                ->back()
                ->with('success','E-mail enviado com sucesso!');        
        
    }


}
