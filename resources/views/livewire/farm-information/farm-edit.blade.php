@section('title') Edit Farm @endsection

<div>
    <section class="h-full m-5 ">
        <div class="h-fit m-5">
            <div class="pt-12 w-full h-full flex flex-col space-y-10 justify-center">
                <x-back-button link="{{route('farm.information.farm')}}" />
                <div class="p-4 text-center font-bold text-3xl">
                    <h3>{{$farm->farm_name}}</h3>
                </div>

                <div>
                    <form wire:submit.prevent="save" class="space-y-5">
                        <x-input type="text" title="Farm Name" :lwModel="'farm_name'" />
                        <div class="flex space-x-2 items-center ">
                            <x-toggle title="Active" lwModel="active_status" />
                            @if ($active_status == 1)
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            @else 
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                            @endif
                        </div>
                        <div class="flex justify-start">
                            <x-button name="Save"  lwClick="save()" />
                        </div>
                    </form>
                </div>
            {{-- <x-modal title="Post Wala" message="Hello Success"/> --}}
            </div>
        </div>
    </section>
</div>
