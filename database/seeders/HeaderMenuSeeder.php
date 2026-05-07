<?php

namespace Database\Seeders;

use App\Models\HeaderMenu;
use Illuminate\Database\Seeder;

class HeaderMenuSeeder extends Seeder
{
    /**
     * Seed the header menus.
     */
    public function run(): void
    {
        $menus = [
            [
                'label' => 'Beranda',
                'route_name' => 'home',
                'sort_order' => 10,
            ],
            [
                'label' => 'Profil',
                'url' => '#',
                'sort_order' => 20,
                'children' => [
                    [
                        'label' => 'Tentang Kami',
                        'url' => '#',
                        'sort_order' => 10,
                    ],
                    [
                        'label' => 'Struktur Organisasi',
                        'url' => '#',
                        'sort_order' => 20,
                    ],
                    [
                        'label' => 'Visi dan Misi',
                        'url' => '#',
                        'sort_order' => 30,
                    ],
                ],
            ],
            [
                'label' => 'Layanan',
                'url' => '#',
                'sort_order' => 30,
                'children' => [
                    [
                        'label' => 'Perizinan',
                        'url' => '#',
                        'sort_order' => 10,
                        'children' => [
                            [
                                'label' => 'Izin Usaha',
                                'url' => '#',
                                'sort_order' => 10,
                            ],
                            [
                                'label' => 'Izin Bangunan',
                                'url' => '#',
                                'sort_order' => 20,
                                'children' => [
                                    [
                                        'label' => 'Persyaratan Izin Bangunan',
                                        'url' => '#',
                                        'sort_order' => 10,
                                    ],
                                    [
                                        'label' => 'Alur Izin Bangunan',
                                        'url' => '#',
                                        'sort_order' => 20,
                                    ],
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Non Perizinan',
                        'url' => '#',
                        'sort_order' => 20,
                    ],
                    [
                        'label' => 'Tracking Permohonan',
                        'url' => '#',
                        'sort_order' => 30,
                    ],
                ],
            ],
            [
                'label' => 'Informasi',
                'url' => '#',
                'sort_order' => 40,
                'children' => [
                    [
                        'label' => 'Berita',
                        'url' => '#',
                        'sort_order' => 10,
                    ],
                    [
                        'label' => 'Agenda',
                        'url' => '#',
                        'sort_order' => 20,
                    ],
                    [
                        'label' => 'Data dan Statistik',
                        'url' => '#',
                        'sort_order' => 30,
                    ],
                    [
                        'label' => 'Pengumuman Standar Pelayanan',
                        'url' => '#',
                        'sort_order' => 40,
                    ],
                ],
            ],
            [
                'label' => 'Standar Pelayanan',
                'url' => '#',
                'sort_order' => 50,
            ],
            [
                'label' => 'Pengaduan',
                'url' => '#',
                'sort_order' => 60,
            ],
            [
                'label' => 'Galeri',
                'url' => '#',
                'sort_order' => 70,
            ],
            [
                'label' => 'Kontak',
                'url' => '#',
                'display_type' => 'button',
                'sort_order' => 80,
            ],
        ];

        foreach ($menus as $menu) {
            $this->seedMenu($menu);
        }
    }

    /**
     * Seed a menu and all of its children.
     *
     * @param  array<string, mixed>  $menu
     */
    private function seedMenu(array $menu, ?HeaderMenu $parent = null): HeaderMenu
    {
        $children = $menu['children'] ?? [];

        unset($menu['children']);

        $menu = array_merge([
            'parent_id' => $parent?->id,
            'url' => null,
            'route_name' => null,
            'route_parameters' => null,
            'target' => '_self',
            'icon' => null,
            'display_type' => 'link',
            'sort_order' => 0,
            'is_active' => true,
        ], $menu);

        $headerMenu = HeaderMenu::withTrashed()->updateOrCreate(
            [
                'parent_id' => $menu['parent_id'],
                'label' => $menu['label'],
            ],
            $menu,
        );

        if ($headerMenu->trashed()) {
            $headerMenu->restore();
        }

        foreach ($children as $child) {
            $this->seedMenu($child, $headerMenu);
        }

        return $headerMenu;
    }
}
