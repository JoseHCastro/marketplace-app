<?php

namespace App\Livewire\Admin;

use App\Models\Anuncio;
use Illuminate\Http\Resources\Json\PaginatedResourceResponse;
use Livewire\Component;

use Livewire\WithPagination;

class AnuncioIndex extends Component
{
  use WithPagination;

  protected $paginationTheme = "bootstrap";

  public $search;

  public function updatingSearch()
  {
    $this->resetPage();
  }
  public function render()
  {
    $anuncios = Anuncio::where('user_id', auth()->user()->id)
      ->where('titulo', 'LIKE', '%' . $this->search . '%')
      ->latest('id')   
      ->paginate();
    return view('livewire.admin.anuncio-index', compact('anuncios'));
  }
}
