<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Actor;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class VolunteerSearch extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $search = '';
    // public $sort = 'a_to_z';
    protected $queryString = ['search'];

    public function render()
    {
        $volunteers = Actor::whereHas('accountType', function ($query) {
            $query->where('accountType', 'volunteers');
        })
        ->where('fullname', 'like', '%' . $this->search . '%')
        ->orderBy('fullname', 'asc') // Default sorting
        ->paginate(5);

        return view('livewire.admin.volunteer-search', [
            'volunteers' => $volunteers,
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reset pagination when search changes
    }
}
