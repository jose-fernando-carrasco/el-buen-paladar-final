<?php

namespace App\Http\Livewire\Admin\Especial;

use App\Models\OfertaEspecial;
use Livewire\Component;
use Livewire\WithPagination;

class EspecialIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    /* public $activo1; */

    public function updatingSearch(){
        $this->resetPage();
    }

/*     public function activar(OfertaEspecial $especiale){
        $especiales = OfertaEspecial::all();
        $especiale->estado = strval($especiale->estado ^ 1);
        $especiale->saveQuietly();
         if ($especiale->estado == 1) {
            foreach ($especiales as $especial1) {
                if ($especial1 != $especiale) {
                    $especial1->estado = '0';
                    $especial1->saveQuietly();
                }
            }
        }
    } */

    public function render()
    {
        $especiales = OfertaEspecial::where('nombre', 'like', '%' . $this->search . '%')
                        ->paginate(10);
        return view('livewire.admin.especial.especial-index', compact('especiales'));
    }
}
