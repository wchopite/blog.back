<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArtistsRequest extends FormRequest {

  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {

    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {

    // Validation rule for field name by default (Http POST method, action store)
    $name_validation = 'required|unique:artists|min: 3|max:120';

    // Validation rule for field name on action update
    if($this->method() == "PUT" || $this->method() == "PATCH") {

      $name_validation = 'required|min: 3|max:120|unique:artists,name,'.$this->artist;
    }

    return [
      'name' => $name_validation
    ];
  }

  /**
   * [messages description]
   * @return [type] [description]
   */
  public function messages() {

    return [
      'name.required' => 'Debe indicar el nombre',
      'name.unique' => 'El nombre indicado ya fue registrado',
      'name.min' => 'Minimo 3 caracteres para el campo nombre',
      'name.max' => 'Maximo 120 caracteres para el campo nombre'
    ];
  }
}
