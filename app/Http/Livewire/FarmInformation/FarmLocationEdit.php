<?php

namespace App\Http\Livewire\FarmInformation;

use Livewire\Component;
use App\Models\FarmLocation;
use Illuminate\Support\Facades\DB;

class FarmLocationEdit extends Component
{
    public $farm_location;
    public $farm_info;
    public $active_status;
    public $farms;
    public $location;
    public $modalEdit = false;

    
    protected $rules = [
        'farm_location' => 'required',
        'farm_info' => 'required',
        'active_status' => 'required',
    ];
    public function mount($id)
    {
        $this->location = FarmLocation::findOrFail(decrypt($id));
        $farms = DB::table('farms')->get()->toArray();
        $this->farm_location = $this->location->farm_location;
        $this->farm_info = $this->location->farm->id;
        $this->active_status = $this->location->active_status;
        foreach ($farms as $farm) {
            if ($farm->id == $this->farm_info) {
                $this->farm_info = encrypt($farm->id);
                $this->farms[$this->farm_info] = $farm->farm_name;
            }
            else{
                $this->farms[encrypt($farm->id)] = $farm->farm_name;
            }
        }

    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $validatedData = $this->validate();
        $validatedData['farm_id'] = decrypt($validatedData['farm_info']);
        unset($validatedData['farm_info']);
        $this->location->update($validatedData);
        session()->flash('sucesss', 'Farm Location Updated Successfully');
        return redirect()->route('farm.information.location');
    }
    public function render()
    {
        return view('livewire.farm-information.farm-location-edit');
    }
    public function confirmModal()
    {
        $this->modalEdit = !$this->modalEdit;
    }
}
