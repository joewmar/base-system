<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AccountingBillsCreate extends Component
{

    public $electric_cost;
    public $date_now;
    public $modalAdd;
    public $processLoading;

    // public function mount()
    // {

    // }
    protected $rules = [
        'electric_cost' => 'required|numeric',
        'date_now' => 'required|date|after_or_equal:today',
    ];
    public function updated($propertyName)
    {
        // $this->electric_cost = intval(str_replace(',','', $this->electric_cost));
        $this->validateOnly($propertyName);
    }
    public function add()
    {
        $this->validate();
        $this->modalAdd = false;
        session(['pending' => true]);

        DB::table('electric_costs')->insert([
            'electric_cost' => $this->electric_cost,
            'created_at' => $this->date_now,
        ]);
        session()->flash('success', 'Electric Bill successfully created!');
        session(['pending' => false]);
        $this->redirect(route('accounting.bills.home'));
    }
    public function render()
    {
        return view('livewire.reports.accounting-bills-create');
    }
    public function confirmAdd()
    {
        $this->modalAdd = !$this->modalAdd;
    }
}
