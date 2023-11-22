<?php

namespace App\View\Components;

use App\Models\Articulo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArticulosData extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(public Articulo $articulo)
    {
    }


    public function render(): View|Closure|string
    {
        return view('components.articulos-data');
    }
}
