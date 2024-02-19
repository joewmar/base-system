@section('title') Accounting Bills @endsection
<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <h2 class="text-start text-2xl pt-3 m-3 font-bold">Accounting Bills - Electric Cost</h2>
    {{-- <h2 class="text-start text-2xl pt-3 m-3 font-bold">REPORTS</h2> --}}
    <div class="pt-5 w-full flex justify-between items-center">
        <div class="w-52"><x-input type="date" title="Date" :lwModel="'searchDate'" /></div>
        <x-button name="Add Bills" link="{{route('accounting.bills.create')}}" />
    </div>
    <x-table>
        @section('table-heads')
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 ">
                <x-sort-button sortDirection="{{$sortDirection}}" title="Date" lwClick="sortBy('created_at')" />
            </th>
            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 ">
                <x-sort-button sortDirection="{{$sortDirection}}" title="Electric Cost" lwClick="sortBy('electric_cost')" />
            </th>
            <th class="px-4 py-2"></th>
        @endsection
        @section('table-rows')
            @foreach ($bills as $bill)
                <tr>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{Carbon\Carbon::parse($bill->created_at)->format('F d, Y')}}</td>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{number_format($bill->electric_cost, 2)}}</td>

                    <td class="whitespace-nowrap px-4 py-2">
                        <a href="{{route('accounting.bills.edit', encrypt($bill->id))}}" class="inline-block rounded bg-blue-500 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700" >
                            Edit
                        </a>
                        <button type="button" wire:click="confirmModal('mdl{{$loop->index}}')" class="inline-block rounded bg-red-500 px-4 py-2 text-xs font-medium text-white hover:bg-red-700" >
                            Remove
                        </button>
                    </td>
                </tr>
                @if (!empty($modalDelete['mdl'.$loop->index]) && $modalDelete['mdl'.$loop->index])
                    <x-confirm-dialog lwID="mdl{{$loop->index}}" lwClick="remove('{{encrypt($bill->id)}}')" header="Are you sure?" message="You want to remove this: {{Carbon\Carbon::parse($bill->created_at)->format('F d, Y')}} - {{number_format($bill->electric_cost, 2)}}" confirm="Yes, I want delete it" cancel="No, Cancel" />
                @endif
            @endforeach
        @endsection
    </x-table>
</div>
