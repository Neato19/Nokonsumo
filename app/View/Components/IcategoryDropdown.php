<?php

namespace App\View\Components;

use App\Models\Icategory;
use Illuminate\View\Component;

class IcategoryDropdown extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.icategory-dropdown', [
            'icategories' => Icategory::all(),
            'currentIcategory' => Icategory::firstWhere('slug', request('icategory'))
        ]);
    }
}
