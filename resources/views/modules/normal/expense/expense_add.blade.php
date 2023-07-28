<x-app-layout>
    <x-slot name="title">
        Expense
    </x-slot>
    <div>
        <a href="{{ url('expense') }}" class="hover:no-underline mb-3">
            <button class="btn btn-primary btn-sm px-3 py-1 rounded flex items-center mb-3">
                <i class="mdi mdi-arrow-left text-2xl"></i> Back
            </button>
        </a>
    </div>
    @livewire('expenses.add')

    @push('scripts')
        @vite('resources/js/add_expenses.js')
    @endpush
</x-app-layout>
