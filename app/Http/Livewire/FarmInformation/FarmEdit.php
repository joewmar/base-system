<?php

namespace App\Http\Livewire\FarmInformation;

use App\Models\Farm;
use Livewire\Component;

class FarmEdit extends Component
{
    
    public $farm_name;
    public $active_status;
    public $farm;
    public $modalEdit = false;

    protected $rules = [
        'farm_name' => 'required',
    ];

    public function mount($id)
    {
        $this->farm = Farm::findOrFail(decrypt($id));
        $this->farm_name = $this->farm->farm_name;
        $this->active_status = $this->farm->active_status;
    }

    public function save()
    {
        session()->flash('pending', true);
        $this->modalEdit = false;
        $validated = $this->validate([
            'farm_name' => 'required',
        ]);
        $this->farm->update($validated);
        session()->flash('sucesss', 'Farm Updated Successfully');
        session()->flash('pending', false);

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
    public function confirmModal()
    {
        $this->modalEdit = !$this->modalEdit;
    }
}
