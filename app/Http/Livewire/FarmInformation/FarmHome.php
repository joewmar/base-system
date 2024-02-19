<?php

namespace App\Http\Livewire\FarmInformation;

use App\Models\Farm;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class FarmHome extends Component
{
    // use WithPagination;

    public $farms;
    public $modalDelete;
    public $sortBy = 'farm_name';
    public $sortDirection = 'asc';

    public $search;
 
    protected $queryString = ['search'];
    public function mount()
    {
        $this->modalDelete = [];
        $this->farms = DB::table('farms')->get();
        // $this->farms = DB::table('farms')->paginate(5);
    }
    public function remove(string $id)
    {
        $farm = Farm::find(decrypt($id));
        $farm->delete();
        session()->flash('success', 'Farm successfully deleted.');
        $this->redirect(route('farm.information.farm'));
    }

    public function updated()
    {
        // $this->resetPage();
    }
    public function render()
    {
        $this->farms = DB::table('farms')->where('farm_name', 'like', '%' . $this->search . '%')->orderBy($this->sortBy, $this->sortDirection)->get();
        return view('livewire.farm-information.farm-home');
    }
    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
            $this->sortBy = $field;
        }
        $this->modalDelete = false;
    }
    public function confirmModal($variable)
    {
        if(isset($this->modalDelete[$variable])) $this->modalDelete[$variable] = !$this->modalDelete[$variable];
        else $this->modalDelete[$variable] = true;
    }
}
