@section('title') Farm @endsection


<div wire:init class="pt-12 w-full h-full flex flex-col space-y-10 justify-center">
    <x-back-button link="{{route('farm.information.home')}}" />
    <div class="p-4 text-center font-bold text-3xl">
        <h3>Farm</h3>
    </div>
    <div class="flex justify-between items-center">
        <div>
            <x-button icon="plus" dark label="Add Farm" href="{{route('farm.information.farm.create')}}" />
        </div>
    </div>
    <div class="h-full">
        <livewire:farm-table />

    </div>   
    {{-- <button onclick="Livewire.emit('openModal', 'remove-modal')">Open Modal</button> --}}

    @section('scripts')
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script>

        <script>
            Livewire.on('showDeleteModal', (fID) => {
                // Use fID to fetch details and show the modal
                $('#deleteModal').modal('show');
            });
        </script> --}}
    @endsection
</div>

