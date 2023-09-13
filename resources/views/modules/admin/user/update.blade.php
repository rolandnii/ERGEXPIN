<x-app-layout>
    <x-slot name="title">
       Edit User
    </x-slot>
    <div class="row">
        <a href="{{ url('user') }}" class="hover:no-underline mb-3 col-1">
            <button class="btn btn-primary btn-sm px-3 py-1 rounded flex items-center mb-3">
                <i class="mdi mdi-arrow-left text-2xl"></i> Back
            </button>
        </a>
    </div>
    @livewire('user.update',['user' => $user])

    @push('scripts')
    @endpush
</x-app-layout>
