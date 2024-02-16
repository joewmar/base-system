<?php

namespace App\Http\Livewire\FarmInformation;

use Livewire\Component;

class FarmLocationHome extends Component
{
    #[Rule('required|max:255')]    
    public $name;
    public function mount()
    {

    }
    public function saveLocation()
    {
        $this->validate();
    }
    public function render()
    {
        return view('livewire.farm-information.farm-location-home');
    }

}
