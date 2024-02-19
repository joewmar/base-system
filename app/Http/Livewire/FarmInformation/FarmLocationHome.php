<?php

namespace App\Http\Livewire\FarmInformation;

use Livewire\Component;
use App\Models\FarmLocation;
use Illuminate\Support\Facades\DB;

class FarmLocationHome extends Component
{
    public $locations;
    public $modalDelete;

    public $search;
    public $sortBy = 'farm_location';
    public $sortDirection = 'asc';
 
    protected $queryString = ['search'];

    protected $rules = [
        'farm_id' => 'required',
        'location_name' => 'required',
    ];
    
    public function mount()
    {
        $this->modalDelete = [];
        $this->locations = FarmLocation::all();
        // dd($this->locations);
    }
    public function remove(string $id)
    {
        $location = FarmLocation::find(decrypt($id));
        $location->active_status = 0;
        $location->save();
        session()->flash('success', 'Farm Location successfully deleted.');
        $this->redirect(route('farm.information.location'));
    }
    public function render()
    {
        $this->locations =  FarmLocation::where('active_status', '1')->where('farm_location', 'like', '%' . $this->search . '%')->orderBy($this->sortBy, $this->sortDirection)->get();
        return view('livewire.farm-information.farm-location-home');
    }
    public function confirmModal($variable)
    {
        if(isset($this->modalDelete[$variable])) $this->modalDelete[$variable] = !$this->modalDelete[$variable];
        else $this->modalDelete[$variable] = true;
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


}
