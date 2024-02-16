@dd($names)

<div>
    <div class="sm:hidden">
        <label for="Tab" class="sr-only">Tab</label>

        <select id="Tab" class="w-full rounded-md border-gray-200">
            @foreach($names as $list)
                <option ng-click="{{$list}}">{{$list}}</option>
            @endforeach
        </select>   
    </div>
    <div class="hidden sm:block">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex gap-6" aria-label="Tabs">
                @foreach($names as $list)
                    <a ng-click="{{$list}}" class="inline-flex shrink-0 items-center gap-2 border-b-2 border-transparent px-1 pb-4 text-sm font-medium text-gray-500 hover:border-gray-300 hover:text-gray-700" >
                        {{$list}}
                    </a>
                @endforeach

            </nav>
        </div>
    </div>
</div>