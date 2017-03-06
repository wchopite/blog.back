<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gender;
use App\Http\Requests\GendersRequest;

class GendersController extends Controller {

	/**
	 * Retorna la lista de generos musicales
	 * @var 		Illuminate\Http\Request
	 * @return 	Illuminate\Http\Response
	 */
	public function index() {

		$genders = Gender::orderBy('name','asc')->get();
		return response()->json($genders);
	}

	/**
	 * [show description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function show($id) {

		$gender = Gender::find($id);

		if(is_null($gender))
      return response()->json("Registro no encontrado", 404);
    else
      return response()->json($gender);
	}

	/**
	 * [store description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function store(GendersRequest $request) {

		$gender = new Gender($request->all());
		$gender->save();
		return response()->json($gender);
	}

	/**
	 * [update description]
	 * @param  GenderRequest $request [description]
	 * @param  [type]        $id      [description]
	 * @return [type]                 [description]
	 */
	public function update(Request $request, $id) {

    $gender = Gender::find($id);

		if(is_null($gender)) {
      return response()->json('Registro no encontrado', 404);
    }
    else {
      $gender->update($request->all());
      return response()->json($gender);
    }
  }

	/**
	 * [destroy description]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function destroy($id) {

    $gender = Gender::find($id);

    if(is_null($gender))
      return response()->json('Registro no encontrado', 404);
    else {
			
      $gender->delete();
      return response()->json("Registro eliminado satisfactoriamente");
    }
  }
}
