<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\Models\ElectricCost;
use Illuminate\Support\Carbon;

class AccountingBillsEdit extends Component
{
    public $electric_cost;
    public $date_now;
    public $modalEdit;
    protected $rules = [
        'electric_cost' => 'required|numeric',
        'date_now' => 'required',
    ];
    public function mount($id)
    {
        $electric_cost = ElectricCost::findOrFail(decrypt($id));
        $this->electric_cost = $electric_cost->electric_cost;
        $this->date_now = Carbon::createFromFormat('Y-m-d H:i:s', $electric_cost->created_at)->format('Y-m-d');
    }
    public function save()
    {
        $this->validate();
        $electric_cost = ElectricCost::findOrFail($this->electric_cost->id);
        $electric_cost->update([
            'electric_cost' => $this->electric_cost,
            'created_at' => $this->date_now,
        ]);
        session()->flash('success', 'Electric Bill successfully updated!');
        $this->redirect('/reports/accounting-bills');
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        // dd($this->date_now);
        return view('livewire.reports.accounting-bills-edit');
    }
    public function confirmModal()
    {
        $this->modalEdit = !$this->modalEdit;
    }
}
