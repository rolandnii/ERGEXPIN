<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <div>

    </div>
    @push('scripts')
    @vite('resources/js/dashboard.js')
    @endpush
   
</x-app-layout>
