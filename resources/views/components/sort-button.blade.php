<button wire:click="{{$lwClick}}" class="group flex items-center space-x-2">
    <div>{{$title}}</div>
    <div class="hidden group-hover:block">
        @if($sortDirection == 'desc')
            <i class="fa-solid fa-sort-up"></i>
        @else 
            <i class="fa-solid fa-sort-down"></i>
        @endif
    </div>
</button>