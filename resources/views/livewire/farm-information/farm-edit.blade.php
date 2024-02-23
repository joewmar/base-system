@section('title') Edit Farm @endsection

<div>
    <section class="h-full m-5 ">
        <div class="h-fit m-5">
            <div class="pt-12 w-full h-full flex flex-col space-y-10 justify-center">
                <x-back-button link="{{route('farm.information.farm')}}" />
                <div class="p-4 text-center font-bold text-3xl">
                    <h3>Edit {{$farm->farm_name}}</h3>
                </div>

                <div>
                    <form wire:submit.prevent="save" >
                        <div class="mt-3 space-y-5">
                            <x-input label="Farm Name" wire:model="farm_name" />
                            <x-button dark label="Save" wire:click="save()" />
                        </div>
                    </form>
                </div>


            {{-- <x-modal title="Post Wala" message="Hello Success"/> --}}
            </div>
        </div>
    </section>
</div>
