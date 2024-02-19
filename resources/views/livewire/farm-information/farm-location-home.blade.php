@section('title') Location @endsection

<div class="pt-12 w-full h-full flex flex-col space-y-10 justify-center">
    <x-back-button link="{{route('farm.information.home')}}" />
    <div class="p-4 text-center font-bold text-3xl">
        <h3>Location</h3>
    </div>
    <div class="flex justify-between items-center">
        <x-search />
        <div>
            <x-button name="Add Location" link="{{route('farm.information.location.create')}}" />
        </div>
    </div>


    <div class="overflow-x-auto" >
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
                <tr>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 ">
                        <x-sort-button sortDirection="{{$sortDirection}}" title="Location" lwClick="sortBy('farm_location')" />
                    </th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                        <x-sort-button sortDirection="{{$sortDirection}}" title="Farm" lwClick="sortBy('farm_id')" />
                    </th>
                    <th class="px-4 py-2"></th>
                </tr>
            </thead>
        
            <tbody class="divide-y divide-gray-200">
                @foreach ($locations as $location)
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-900">{{ $location->farm_location }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-900">{{ $location->farm->farm_name }}</td>
                        <td class="whitespace-nowrap px-4 py-2">
                            <a href="{{ route('farm.information.location.edit', encrypt($location->id)) }}" class="inline-block rounded bg-blue-500 px-4 py-2 text-xs font-medium text-white hover:bg-blue-700" >
                                Edit
                            </a>
                            <button type="button" wire:click="confirmModal('{{Str::camel($location->farm_location)}}')" class="inline-block rounded bg-red-500 px-4 py-2 text-xs font-medium text-white hover:bg-red-700" >
                                Remove
                            </button>
                        </td>
                    </tr>
                    @if (!empty($modalDelete[Str::camel($location->farm_location)]) && $modalDelete[Str::camel($location->farm_location)])
                        <x-confirm-dialog lwID="{{Str::camel($location->farm_location)}}" lwClick="remove('{{encrypt($location->id)}}')" header="Are you sure?" message="You want to remove this: {{$location->farm_location}} " confirm="Yes, I want delete it" cancel="No, Cancel" />
                    @endif

                @endforeach
        
            </tbody>
        </table>
    </div>
</div>
