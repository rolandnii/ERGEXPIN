<div class="card max-w-4xl">

    <div class="p-4 mt-0 border-none text-gray-800 card-body">

        {{-- <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button> --}}
        <div class="flex justify-between items-center mb-3">
            <h3 class="text-xl ">Delete income <span class="text-danger">#{{ $user->id }}</span> </h3>
        </div>
        @if (session('message'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert" id="alert-con">
                <span class="font-medium">Income deleted!</span>

            </div>
        @endif
        {{-- <hr class="border-[1px] border-gray-700 mb-3"> --}}
        @if (!session('message'))
        <div class="text-gray-600">
            Would you like to delete this income?
        </div>
        @endif

        <div class="text-end space-x-2">
            @if (!session('message'))
                <button class="btn btn-danger bg-danger" wire:click="remove" wire:loading.remove
                    type="submit">Delete</button>
            @endif
            <div wire:loading>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
        </div>
    </div>


</div>
