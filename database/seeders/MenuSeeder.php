<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            $menu = Menu::create([
                'name' => 'Menu ' . $i,
                'url' => '/menu-' . $i,
                'position' => $i - 1,
            ]);

            // Create submenus for each menu
            for ($j = 1; $j <= 3; $j++) {
                $menu->children()->create([
                    'name' => 'Submenu ' . $i . '.' . $j,
                    'url' => '/submenu-' . $i . '-' . $j,
                    'position' => $j - 1,
                ]);
            }
        }
    }
}
