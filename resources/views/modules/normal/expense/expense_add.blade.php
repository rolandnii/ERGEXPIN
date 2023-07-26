<x-app-layout>
    <x-slot name="title">
        Expense
    </x-slot>
    
    @livewire('expenses.add')

    @push('scripts')
        @vite('resources/js/add_expenses.js')
    @endpush
</x-app-layout>
