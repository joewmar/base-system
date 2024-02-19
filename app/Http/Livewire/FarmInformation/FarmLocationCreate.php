<?php

namespace App\Http\Livewire\FarmInformation;

use App\Models\Farm;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class FarmLocationCreate extends Component
{
    // public $farm_name;
    public $location_name;
    public $farms;
    public $farm_id;
    protected $rules = [
        'farm_id' => 'required',
        'location_name' => 'required',
    ];
    public function mount()
    {
        $farms = DB::table('farms')->get()->toArray();
        foreach ($farms as $farm) $this->farms[encrypt($farm->id)] = $farm->farm_name;
    }
    public function add()
    {
        $validatedData = $this->validate();
        // dd(decrypt($this->farm_id));
        $farm = Farm::find(decrypt($this->farm_id));
        $farm->location()->create(['farm_location' => $validatedData['location_name']]);
        session()->flash('success', 'Farm Location successfully created!');
        $this->redirect(route('farm.information.location'));
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.farm-information.farm-location-create');
    }
}
