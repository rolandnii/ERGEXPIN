<x-app-layout>
    <x-slot name="title">
        Users
    </x-slot>

    <div class=" flex justify-between" >
        @livewire('user.filter')
        {{-- <section>
            <div data-aos="flip-up">
                <a href="{{ url('add/income') }}" class="h hover:no-underline">
                <button class="btn btn-primary rounded flex items-center gap-1"><i class="mdi mdi-plus-circle-outline"></i> Add new income</button>

                </a>
            </div>
        </section> --}}
    </div>

    <div class="row row-cols-1 gap-3 lg:gap-2 row-cols-md-2 my-10">
        <section class="col">
            <div class="card" data-aos="flip-up">
               
            </div>
        </section>
        <section class="col">
           
        </section>


    </div>

    @livewire('user.table',)

    
    
    @push('scripts')
        {{-- @vite('resources/js/expenses.js') --}}
    @endpush
</x-app-layout>
