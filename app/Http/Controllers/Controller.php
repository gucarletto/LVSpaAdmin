<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $aModels = $this->getModelClass()::all()->toArray();
    return array_reverse($aModels);
  }

  abstract protected function getModelClass();

  /**
   * Retorna uma instância do modelo preenchida
   *
   * @param Request $request
   * @return Model
   */
  protected abstract function getModelFromRequest(Request $request);

  /**
   * Valida os dados vindos do request antes de inserir ou atualizar
   *
   * @param Request $request
   * @return void
   */
  protected abstract function validateRequest(Request $request);

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    $this->validateRequest($request);
    $this->createFromRequest($request);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $oModel = $this->getModelFromRequest($request);
    $oModel->save();

    return response()->json('Registro inserido com sucesso!');
  }

  /**
   * Display the specified resource.
   *
   * @param  Model $model
   * @return \Illuminate\Http\Response
   */
  public function show(Model $model)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  Model $model
   * @return \Illuminate\Http\Response
   */
  public function edit(Model $model)
  {
    return response()->json($model);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  Model  $model
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Model $model)
  {
    $book = Model::find($model);
    $book->update($request->all());

    return response()->json('Registro alterado com sucesso!');
  }
}
