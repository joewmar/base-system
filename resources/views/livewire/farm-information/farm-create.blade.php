@section('title') Create Farm @endsection

<div>
    <section class="h-full m-5 ">
        <div class="h-fit m-5">
            <div class="pt-12 w-full h-full flex flex-col space-y-10 justify-center">
                <x-back-button link="{{route('farm.information.farm')}}" />
                <div class="p-4 text-center font-bold text-3xl">
                    <h3>Farm</h3>
                </div>
                <div class="flex justify-end">
                    <div>
                        <x-button name="Show List" link="{{route('farm.information.farm')}}" />
                    </div>
                </div>

                <div>
                    <h1 class="text-2xl font-bold">Add Farm</h1>
                    <form wire:submit.prevent="add" class="space-y-5">
                        <x-input type="text" title="Farm Name" :lwModel="'farm_name'" />
                        <div class="flex justify-start">
                            <x-button name="Add" lwClick="add()" ngClick="processDialog = true" />
                        </div>
                    </form>
                </div>
            {{-- <x-modal title="Post Wala" message="Hello Success"/> --}}
            </div>
        </div>
    </section>
</div>
