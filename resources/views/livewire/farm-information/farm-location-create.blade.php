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
                    <h1 class="text-2xl font-bold">Add Location</h1>
                    <form  class="space-y-5">
                        <x-select title="Farm" :items="$farms" lwModel="farm_id" />
                        @if ($farm_id != null)
                            <x-input type="text" title="Location" id="location" lwModel="location_name" />
                            <div class="flex justify-start">
                                <x-button name="Add"  lwClick="add()" />
                            </div>
                        @endif
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
