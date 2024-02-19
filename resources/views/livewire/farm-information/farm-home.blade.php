@section('title') Farm @endsection


<div class="pt-12 w-full h-full flex flex-col space-y-10 justify-center">
    <x-back-button link="{{route('farm.information.home')}}" />
    <div class="p-4 text-center font-bold text-3xl">
        <h3>Farm</h3>
    </div>
    <div class="flex justify-between items-center">
        <x-search />
        <div>
            <x-button name="Add Farm" link="{{route('farm.information.farm.create')}}" />
        </div>
    </div>
    {{-- <div class="overflow-x-auto" >
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 ">
                        <x-sort-button sortDirection="{{$sortDirection}}" title="Name" lwClick="sortBy('farm_name')" />
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 flex justify-center w-full">
                        <x-sort-button sortDirection="{{$sortDirection}}" title="Active Status" lwClick="sortBy('active_status')" />
                    </th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
        
            <tbody class="divide-y divide-gray-200">
                @foreach ($farms as $farm)
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$farm->farm_name}}</td>
                        <td class="whitespace-nowrap flex justify-center items-center p-4">
                            @if ($farm->active_status == 1)
                                <div class="bg-green-500 rounded-full w-3 h-3"></div>
                            @else 
                                <div class="bg-red-500 rounded-full w-3 h-3"></div>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-2">
                            <a href="{{route('farm.information.farm.edit', encrypt($farm->id))}}" class="inline-block rounded bg-blue-500 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700" >
                                Edit
                            </a>
                            <button type="button" wire:click="confirmModal('{{Str::camel($farm->farm_name)}}')" class="inline-block rounded bg-red-500 px-4 py-2 text-xs font-medium text-white hover:bg-red-700" >
                                Remove
                            </button>
                        </td>
                    </tr>
                    @if (!empty($modalDelete[Str::camel($farm->farm_name)]) && $modalDelete[Str::camel($farm->farm_name)])
                        <x-confirm-dialog lwID="{{Str::camel($farm->farm_name)}}" lwClick="remove('{{encrypt($farm->id)}}')" header="Are you sure?" message="You want to remove this: {{$farm->farm_name}} " confirm="Yes, I want delete it" cancel="No, Cancel" />
                    @endif
                @endforeach
        
            </tbody>
        </table>

    </div> --}}

    {{-- <x-table :titles="['Name', 'Active Status', 'Action']">
        <x-table-head  />
        <x-table-rows>
        </x-table-rows>
    </x-table> --}}
</div>

