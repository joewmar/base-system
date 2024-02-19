@section('title') Add Location @endsection

<div>
    <section class="h-full m-5 ">
        <div class="h-fit m-5">
            <div class="pt-12 w-full h-full flex flex-col space-y-10 justify-center">
                <div class="p-4 text-center font-bold text-3xl">
                    <h3>Location</h3>
                </div>
                <div class="flex justify-end">
                    <x-button name="Show List" link="{{route('farm.information.location')}}" />
                </div>
                <div>
                    <h1 class="text-2xl font-bold">Edit Location</h1>
                    <form  class="space-y-5">
                        <x-select title="Farm" :items="$farms" lwModel="farm_info" />
                        @if ($farm_info != null)
                            <x-input type="text" title="Location" id="location" lwModel="farm_location" />
                            <div class="flex space-x-2 items-center ">
                                <x-toggle title="Active" lwModel="active_status" />
                                @if ($active_status == 1)
                                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                @else 
                                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                @endif
                            </div>
                            <div class="flex justify-start">
                                <x-button name="Save"  lwClick="confirmModal()" />
                            </div>
                            @if ($modalEdit)
                                <x-confirm-dialog lwID="saveFarm" lwClick="save()" header="Are you sure?" message="You want to update this: {{$farm->farm_name}}" confirm="Yes, I want save it" cancel="No, Cancel" />
                            @endif
                        @endif
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
