<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use Illuminate\Http\Request;

class VisitaController extends Controller
{
  //

  public function contarVisita(Request $request)
  {

    $visitas = 0;
    /* $visitas = $request->session()->get('visitas', 0); */
    $visitas++;

    $anuncio = Anuncio::find(1);

    $anuncio->visitas = $visitas;
    
    /* return $visitas; */
    /* $request->session()->put('visitas', $visitas);   */
  }
}
