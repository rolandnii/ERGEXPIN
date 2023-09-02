<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <h2 class="text text-gray-700 text-2xl mb-3">Welcome to dashboard</h2>

    <section class="grid grid-cols-1 gap-2 min-h-[120px] md:grid-cols-4">
        <div class="card h-full bg-indigo-200 text-gray-700 ">
            <div class="card-body" >
                 <div class="flex justify-between items-center mb-2">
                    <span class="text text-gray-500">Total</span>
                    <div></div>
                 </div>

                 <p class="text-2xl">
                    ₵100,000
                 </p>

            </div>
        </div>

    </section>

    @push('scripts')
        @vite('resources/js/user.js')
    @endpush

</x-app-layout>
