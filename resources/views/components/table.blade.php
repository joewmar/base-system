<div class="overflow-x-auto" >
    <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
        {{$slot}}
        <thead class="ltr:text-left rtl:text-right">
            <tr>
                @yield('table-heads')
            </tr>
        </thead>
    
        <tbody class="divide-y divide-gray-200">
            @yield('table-rows')
        </tbody>

        
    </table>

</div>