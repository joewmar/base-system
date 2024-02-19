<?php

namespace App\Http\Livewire\Reports;

use App\Models\ElectricCost;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AccountingBillsHome extends Component
{
    public $bills;
    public $search;
    public $sortBy = 'created_at';
    public $sortDirection = 'asc';
    public $searchDate;
    public $modalDelete = [];
    
    public function render()
    {
        $this->bills = DB::table('electric_costs')->where('active_status', '1')->where('created_at', 'like', '%' . $this->searchDate . '%')->orderBy($this->sortBy, $this->sortDirection)->get();
        return view('livewire.reports.accounting-bills-home');
    }
    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
            $this->sortBy = $field;
        }
        $this->modalDelete = [];
    }
    public function remove($id)
    {
        $this->modalDelete = [];
        $location = ElectricCost::find(decrypt($id));
        $location->active_status = 0;
        $location->save();
        session()->flash('success', 'Electric Cost successfully deleted.');
        $this->redirect(route('accounting-bills.home'));
    }
    public function confirmModal($variable)
    {
        if(isset($this->modalDelete[$variable])) $this->modalDelete[$variable] = !$this->modalDelete[$variable];
        else $this->modalDelete[$variable] = true;
    }
}
