<?php

namespace App\Observers;

use App\Models\Menu;

class MenuObserver
{

    public function creating(Menu $menu)
    {
        $menus = Menu::all();
        if ($menu->estado == 1) {
            foreach ($menus as $menu1) {
                if ($menu1 != $menu) {
                    $menu1->estado = '0';
                    $menu1->saveQuietly();
                }
            }
        }
    }


    public function updating(Menu $menu)
    {

        $menus = Menu::all();
        if ($menu->estado == 1) {
            foreach ($menus as $menu1) {
                if ($menu1 != $menu) {
                    $menu1->estado = '0';
                    $menu1->saveQuietly();
                }
            }
        }
    }

    public function deleted(Menu $menu)
    {
        //
    }


    public function restored(Menu $menu)
    {
        //
    }


    public function forceDeleted(Menu $menu)
    {
        //
    }
}
