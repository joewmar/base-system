@section('title') Edit Biils @endsection
<div>
    <x-back-button link="{{route('accounting.bills.home')}}" />
    <h2 class="text-start text-2xl pt-3 m-3 font-bold">Edit Bills</h2>
    <form class="grid grid-rows-2 items-start pt-10 w-60 space-y-3">
        <x-input type="date" title="Date" :lwModel="'date_now'" />
        <x-input useMoney type="number" title="Electric Cost" :lwModel="'electric_cost'" />
        <x-button name="Save" lwClick="confirmModal()" />
    </form>
    @if ($modalEdit)
        <x-confirm-dialog lwID="editBill" lwClick="save()" header="Are you sure?" message="You want to update this cost" confirm="Yes, I want update it" cancel="No, Cancel" />
    @endif
</div>