@section('title') Add Biils @endsection
<div>
    <x-back-button link="{{route('accounting.bills.home')}}" />
    <h2 class="text-start text-2xl pt-3 m-3 font-bold">Add Bills</h2>
    <form class="grid grid-rows-2 items-start pt-10 w-60 space-y-3">
        <x-input type="date" title="Date" :lwModel="'date_now'" />
        <x-input useMoney type="number" title="Electric Cost" :lwModel="'electric_cost'" />
        <x-button name="Add" lwClick="confirmAdd()" />
    </form>
    @if ($modalAdd)
        <x-confirm-dialog lwID="addBill" lwClick="add()" header="Are you sure?" message="You want to add this bill" confirm="Yes, I want add it" cancel="No, Cancel" />
    @endif
</div>