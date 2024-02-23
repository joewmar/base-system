<?php

namespace App\Http\Livewire\FarmInformation;

use App\Models\Farm;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class FarmHome extends Component
{
    use Actions;

    // use WithPagination;
    protected $listeners = [
        'editFarm' => 'edit',
        'deleteFarm' => 'confirmDelete',
    ];
    public $editFarmData;
    public $deleteFarmData;
    public function edit($data)
    {
        // dd($data);
        $this->redirect(route('farm.information.farm.edit', encrypt($data['farmID'])));
    }

    public function confirmDelete()
    {
        // $farmId = $data['farmID'];
        dd("Hello");
        // $this->dialog()->confirm([
        //     'title'       => 'Are you Sure?',
        //     'description' => 'Save the information?',
        //     'acceptLabel' => 'Yes, save it',
        //     'method'      => 'save',
        //     'params'      => 'Saved',
        // ]);
        // Retrieve the farm record from the database based on $farmId
        // $farm = Farm::find($farmId);
        // $this->emit('showDeleteModal', $farmId);


    }
    // public function remove($id)
    // {
    //     dd($id);
    // }

    public function render()
    {
        return view('livewire.farm-information.farm-home');
    }
}
