<div class="card max-w-4xl">
   
    <div class="p-4 mt-0 border-none text-gray-800 card-body">
        
        {{-- <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button> --}}
        <div class="flex justify-between items-center mb-3">
            <h3 class="text-xl ">Update  expenses <span class="text-primary">#{{ $user->id }}</span> </h3>
            {{-- <button class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal"><i
                    class="mdi mdi-close"></i></button> --}}
        </div>
        @if (session()->has('message'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:text-green-400"  role="alert"
                id="alert-con">
                <span class="font-medium">Expenses updated!</span>  new  changes successfully saved
            </div>
        @endif
        {{-- <hr class="border-[1px] border-gray-700 mb-3"> --}}
        <form id="expense-form" wire:submit.prevent="save">
            <div class="row gap-0 mb-3">
                <div class="col-12 col-md-8 pr-0">
                     
                    <label class="block mb-1 text-base font-medium text-gray-700" for="title">Title</label>
                    <input wire:model.defer="title" type="text" value="{{ $user['exp_title']}}"
                        class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        id="title">
                    @error('title')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror

                </div>
                <div class="col-12 col-md-4">
                    <label for="amount" class="block mb-1 text-base font-medium text-gray-700"> Amount(¢)</label>
                    <input wire:model.defer="amount" type="number" id="amount"
                        class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    @error('amount')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror

                </div>
            </div>

            <div class="row mb-3">
                <label class="block mb-2 text-base font-medium text-gray-700">Please select one
                    category</label>

                <div class="flex gap-2  flex-wrap col-12">
                    @foreach ($expenses as $expense)
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="type{{ $expense->id }}" type="radio" wire:key="{{ $expense->id }}"
                                    wire:model.defer="category" value="{{ $expense->id }}" name="category"
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                            </div>
                            <label for="type{{ $expense->id }}"
                                class="ml-2 text-sm font-medium text-gray-700">{{ $expense->label }}</label>
                        </div>
                    @endforeach
                </div>
                @error('category')
                    <span class="text-danger text-sm">{{ $message }}</span>
                @enderror

            </div>

            <div class="mb-5">
                <label class="block mb-1 text-base font-medium text-gray-700" for="description">Description</label>
                <textarea name="description" id="description" wire:model.defer="description"
                    class="bg-gray-100 border border-gray-300 text-gray-700 resize-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    rows="6"></textarea>
            </div>

        </form>
        <div class="text-end space-x-2">
            <button class="btn btn-primary bg-primary" form="expense-form" type="submit">Save</button>
        </div>
    </div>


    
</div>
