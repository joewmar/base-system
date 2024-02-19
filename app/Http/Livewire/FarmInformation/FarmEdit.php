<?php

namespace App\Http\Livewire\FarmInformation;

use App\Models\Farm;
use Livewire\Component;

class FarmEdit extends Component
{
    public $farm_name;
    public $active_status;
    public $farm;

    protected $rules = [
        'farm_name' => 'required',
        'active_status' => 'required',
    ];

    public function mount($id)
    {
        $this->farm = Farm::findOrFail(decrypt($id));
        $this->farm_name = $this->farm->farm_name;
        $this->active_status = $this->farm->active_status;
    }

    public function save()
    {
        $validated = $this->validate([
            'farm_name' => 'required',
            'active_status' => 'required',
        ]);

        $this->farm->update($validated);
        session()->flash('sucesss', 'Farm Updated Successfully');
        $this->redirect(route('farm.information.farm'));
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.farm-information.farm-edit');
    }
}
