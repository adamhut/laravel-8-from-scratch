@if(session()->has('success'))

    <div x-data="{ show:true }" 
        x-init="
            setTimeout(()=>{
                show=false
            },3000);
        "
        x-show="isOpen" 
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 transform translate-x-8 "
        x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 transform translate-x-0"
        x-transition:leave-end="opacity-0 transform translate-x-8"
        class="fixed bottom-3 right-3 bg-blue-500 text-white py-2 px-4 text-sm">
        <p>
            {{ session()->get('success') }}
        </p>
    </div>
@endif