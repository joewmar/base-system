<div> 
    <label class="inline-flex items-center cursor-pointer">
        <input type="checkbox" wire:model='{{$lwModel}}' class="sr-only peer">
        <div class="relative w-11 h-6 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-gray-400 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-400 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gray-700"></div>
        <span class="ms-3 text-sm font-medium text-gray-900 ">{{$title}}</span>
    </label>
</div>
  