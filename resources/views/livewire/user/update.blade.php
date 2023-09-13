<div class="card max-w-4xl">
   
    <div class="p-4 mt-0 border-none text-gray-800 card-body">
        
        {{-- <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button> --}}
        <div class="flex justify-between items-center mb-3">
            <h3 class="text-xl ">Edit  User </h3>
            {{-- <button class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal"><i
                    class="mdi mdi-close"></i></button> --}}
        </div>
        @if (session()->has('message'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:text-green-400"  role="alert"
                id="alert-con">
                <span class="font-medium">User updated!</span>  new  changes successfully saved 
            </div>
        @endif
        {{-- <hr class="border-[1px] border-gray-700 mb-3"> --}}
        <form id="expense-form" wire:submit.prevent="save">
            <div class="grid grid-cols-2 gap-4">
                <div class="md:col-span-2">
                     
                    <label class="block mb-1 text-base font-medium text-gray-700" for="title">Name</label>
                    <input wire:model.defer="name" type="text" 
                        class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        id="name">
                    @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror

                </div>
                <div class="md:col-span-2">
                    <label for="email" class="block mb-1 text-base font-medium text-gray-700"> Email</label>
                    <input wire:model.defer="email" type="text" id="email"
                        class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    @error('email')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 text-base font-medium text-gray-700">User Type</label>
                    <select wire:model.defer="usertype"
                    class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
    
                        <option value="admin" @selected($user->user_type == "admin")>Admin</option>
                        <option value="normal" @selected($user->user_type == "normal")>Normal</option>
                    </select>
                    @error('usertype')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label class="block mb-2 text-base font-medium text-gray-700">Status</label>
                    <select  wire:model.defer="status"
                    class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="active" @selected($user->deleted_at == null)>Active</option>
                        <option value="deleted" @selected($user->deleted_at != null)>Deleted</option>
                    </select>
                    @error('usertype')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
    
            </div>
            
            
        </form>
        <div class="text-end space-x-2">
            <div wire:loading>
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden"></span>
                </div>
            </div>
            <button class="btn btn-primary bg-primary" form="expense-form" wire:loading.remove type="submit">Save</button>
        </div>
    </div>
    
</div>
