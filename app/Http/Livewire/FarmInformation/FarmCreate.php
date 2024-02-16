<?php

namespace App\Http\Livewire\FarmInformation;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Farm;

class FarmCreate extends Component
{
    #[Rule('required|max:255')]
    public $name;

    public function save()
    {
        $this->validate();
        Farm::create([
            'farm_name' => $this->name,
        ]);
        $this->redirect(route('farm.information.home'));
    }
    public function render()
    {
        return view('livewire.farm-information.farm-create');
    }
}
