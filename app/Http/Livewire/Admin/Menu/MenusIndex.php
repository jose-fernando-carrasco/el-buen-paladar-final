<?php

namespace App\Http\Livewire\Admin\Menu;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class MenusIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;
    public $activo1;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function activar(Menu $menu){
        $menus = Menu::all();
        /* $menu->update(['estado' => strval($menu->estado ^ 1)]); */
        $menu->estado = strval($menu->estado ^ 1);
        $menu->saveQuietly();
         if ($menu->estado == 1) {
            foreach ($menus as $menu1) {
                if ($menu1 != $menu) {
                    /* $menu1->update(['estado' => strval($menu->estado ^ 1)]); */
                    $menu1->estado = '0';
                    $menu1->saveQuietly();
                }
            }
        }

    }

    public function render()
    {
        $menus = Menu::where('nombre', 'like', '%' . $this->search . '%')
                        ->paginate(10);
        return view('livewire.admin.menu.menus-index', compact('menus'));
    }
}
