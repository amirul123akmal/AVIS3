<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class showActivity extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $imagePath,
        public int $num,
        public string $location,
        public string $date,
        public string $title,
        public string $link,
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.show-activity');
    }
}