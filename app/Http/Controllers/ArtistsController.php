<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Http\Requests\ArtistsRequest;

class ArtistsController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){

    $artists = Artist::orderBy('name','asc')->get();
		return response()->json($artists);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id) {

    $artist = Artist::find($id);

		if(is_null($artist))
      return response()->json("Registro no encontrado", 404);
    else
      return response()->json($artist);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ArtistsRequest $request) {

    $artist = new Artist($request->all());
		$artist->save();
		return response()->json($artist);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(ArtistsRequest $request, $id) {

    $artist = Artist::find($id);

		if(is_null($artist)) {
      return response()->json('Registro no encontrado', 404);
    }
    else {
      $artist->update($request->all());
      return response()->json($artist);
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id) {

    $artist = Artist::find($id);

    if(is_null($artist))
      return response()->json('Registro no encontrado', 404);
    else {

      $artist->delete();
      return response()->json("Registro eliminado satisfactoriamente");
    }
  }
}
