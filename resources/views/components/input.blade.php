<div class="w-full my-3">
    <label
        for="{{$id ?? ''}}"
        class="relative h-10 block rounded-md border  border-black shadow-sm focus-within:border-gray-700 focus-within:ring-1 focus-within:ring-gray-700"
        >
        <input
            type="{{$type ?? 'text'}}"
            @isset($id) id="{{$id}}" @endisset
            @isset($name) name="{{$name}}" @endisset
            class="pt-2 pl-3 peer border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0"
            placeholder="{{$title}}"
            @isset($lwModel) wire:model.live="{{$lwModel}}" @endisset
        />

        <span
            class="pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs"
        >
            {{$title}}
        </span>
    </label>
    @error($lwModel)
        <div class="text-red-500">
            <span>{{$message}}</span>
        </div>
    @enderror
</div>