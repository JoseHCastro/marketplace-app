<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnuncioRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {

    if ($this->user_id == auth()->user()->id) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    $reglas = [
      'titulo' => 'required|min:5|max:100',
      'precio' => 'required|numeric',
      'descripcion' => 'required|min:5|max:500',

      /* 'etiquetas' => 'required|array',
            'etiquetas.*' => 'exists:etiquetas,id', */
      /* 'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', */
    ];

    /* if ($this->estadoanuncio == 2) {
      $reglas = array_merge($reglas, [
        'categoria_id' => 'required', /* |exists:categorias,id */
    //   'descripcion' => 'required|min:5|max:500',

    /* 'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio', */
    //   ]);
    // } */
    return $reglas;
  }
}
