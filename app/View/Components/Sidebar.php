<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public $list;
    public function __construct()
    {
        $this->list = [
            [
                "name" => "Dashboard",
                "link" => "",
            ],
            [
                "name" =>  "Formulation Storage",
                "sub" =>  array(
                    ["name" => "Micro Storage", "link" => ""],
                    ["name" => "Macro Storage", "link" => ""],
                    ["name" => "Medicine Storage", "link" => ""],
                    ["name" => "Formulation", "link" => ""],
                ),
            ],
            [
                "name" => "Records Inventory Management",
                "sub" =>  array(
                    ["name" => "Feed Request Record", "link" => ""],
                    ["name" => "Farm Information", "link" => route('farm.information.home')],
                    ["name" => "Accounting Bills", "link" => ""],
                    ["name" => "Accounting Payrolls", "link" => ""],
                    ["name" => "Pivot Logs", "link" => ""],
                    ["name" => "Audit Logs", "link" => ""],
                ),
            ],
            [
                "name" => "Forecasting",
                "sub" =>  array(
                    ["name" => "Monitoring Inventory Levels", "link" => ""],
                    ["name" => "Message on ASANA", "link" => ""],
                ),
            ],
            [
                "name" => "Production Management",
                "sub" =>  array(
                    ["name" => "Production Order", "link" => ""],
                    ["name" => "Premixes on ASANA", "link" => ""],
                    ["name" => "Feed Information", "link" => ""],
                ),
            ], 
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar')->with(['list' => $this->list]);
    }
}
