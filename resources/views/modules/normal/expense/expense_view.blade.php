<x-app-layout>
    <x-slot name="title">
        Update Expense
    </x-slot>
    <div class="row">
        <a href="{{ url('expense') }}" class="hover:no-underline mb-3 col-1">
            <button class="btn btn-primary btn-sm px-3 py-1 rounded flex items-center mb-3">
                <i class="mdi mdi-arrow-left text-2xl"></i> Back
            </button>
        </a>
    </div>
    @livewire('expenses.view',["user" => $user])


    @push('scripts')
        {{-- @vite('resources/js/add_expenses.js') --}}
    @endpush
</x-app-layout>
