<?php

namespace Tjventurini\VoyagerProjects\Seeds;

use TCG\Voyager\Models\Menu;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\MenuItem;
use Illuminate\Support\Facades\DB;

class VoyagerProjectsMenuItemsSeeder extends Seeder
{
    /**
     * Run the voyager tags package database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            // get the admin menu
            $menu = Menu::where('name', 'admin')->firstOrFail();

            // create url
            $route = 'voyager.projects.index';

            // create the menu item
            $menuItem = MenuItem::updateOrCreate([
                'route' => $route,
            ], [
                'menu_id' => $menu->id,
                'title' => trans('projects::projects.label_plural'),
                'url' => '',
                'target' => '_self',
                'icon_class' => 'voyager-lab',
                'color' => null,
                'parent_id' => null,
                'order' => 99
            ]);

            // add menu item to menu
            $menu->items->add($menuItem);
        });
    }
}
