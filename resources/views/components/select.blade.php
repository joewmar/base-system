<div class="my-3">
    <label @isset($id) for="{{$id}}" @endisset class="block text-sm font-medium text-gray-900"> {{$title}} </label>
  
    <select
    @isset($id) id="{{$id}}" @endisset
    @isset($name) name="{{$name}}" @endisset
      @isset($lwModel) wire:model.live="{{$lwModel}}" @endisset

      class="pl-3 mt-1.5 h-10 w-full rounded-lg text-gray-700 sm:text-sm border border-gray-900"
    >
        <option value="">Please select</option>

        @foreach ($items ?? [] as $key => $value )
            <option value="{{$key}}" @if((isset($selectByValue) && $value == $selectByValue) || (isset($selectByKey) && $value == $selectByKey)) selected @endif >
              {{$value}} 
            </option>
        @endforeach
    </select>
    @error($lwModel)
        <div class="text-red-500">
            <span>{{$message}}</span>
        </div>
    @enderror
  </div>