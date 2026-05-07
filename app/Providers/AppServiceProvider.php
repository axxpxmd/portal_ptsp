<?php

namespace App\Providers;

use App\Models\HeaderMenu;
use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View as ViewContract;
use Throwable;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureDefaults();
        $this->shareHeaderMenus();
    }

    /**
     * Configure default behaviors for production-ready applications.
     */
    protected function configureDefaults(): void
    {
        Date::use(CarbonImmutable::class);

        DB::prohibitDestructiveCommands(
            app()->isProduction(),
        );

        Password::defaults(fn (): ?Password => app()->isProduction()
            ? Password::min(12)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised()
            : null,
        );
    }

    /**
     * Share active header menus with the header layout.
     */
    protected function shareHeaderMenus(): void
    {
        View::composer('layouts.header', function (ViewContract $view): void {
            $view->with('headerMenus', collect());

            try {
                if (! Schema::hasTable('header_menus')) {
                    return;
                }

                $menus = HeaderMenu::query()
                    ->where('is_active', true)
                    ->orderBy('parent_id')
                    ->orderBy('sort_order')
                    ->orderBy('label')
                    ->get();

                $view->with('headerMenus', $this->buildHeaderMenuTree($menus));
            } catch (Throwable) {
                $view->with('headerMenus', collect());
            }
        });
    }

    /**
     * Build an unlimited-depth menu tree from flat database rows.
     *
     * @param  Collection<int, HeaderMenu>  $menus
     * @return Collection<int, HeaderMenu>
     */
    protected function buildHeaderMenuTree(Collection $menus): Collection
    {
        $groupedMenus = $menus->groupBy(fn (HeaderMenu $menu): int => $menu->parent_id ?? 0);

        $buildTree = function (int $parentId) use (&$buildTree, $groupedMenus): Collection {
            return $groupedMenus
                ->get($parentId, collect())
                ->map(function (HeaderMenu $menu) use ($buildTree): HeaderMenu {
                    $menu->setRelation('children', $buildTree($menu->id));

                    return $menu;
                })
                ->values();
        };

        return $buildTree(0);
    }
}
