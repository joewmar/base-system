<?php

namespace App\Http\Livewire\FarmInformation;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Farm;

class FarmCreate extends Component
{
    protected $rules = [
        'farm_name' => 'required|unique:farms,farm_name',
    ];
    public $farm_name;

    public function add()
    {
        $validatedData = $this->validate([
            'farm_name' => 'required|unique:farms,farm_name',
        ]);
        Farm::create($validatedData);
        session()->flash('success', 'Farm successfully created.');
        $this->redirect(route('farm.information.farm'));
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.farm-information.farm-create');
    }
}
