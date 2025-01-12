<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Actor;
use Livewire\WithPagination;

class BeneficiariesSearch extends Component
{
    use WithPagination;

    public $search = '';
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['as' => 'page_beneficiaries'],
    ];

        
    public function render()
    {
        $beneficiaries = Actor::whereHas('accountType', function ($query) {
            $query->where('accountType', 'beneficiaries');
        })
        ->where('fullname', 'like', '%' . $this->search . '%')
        ->orderBy('fullname', 'asc')
        ->paginate(5);

        return view('livewire.admin.beneficiaries-search', [
            'beneficiaries' => $beneficiaries,
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reset pagination when search changes
    }
}