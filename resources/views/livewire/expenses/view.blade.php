<div class="card max-w-4xl">
   
    <div class="p-4 mt-0 border-none text-gray-800 card-body">
        
        {{-- <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button> --}}
        <div class="flex justify-between items-center mb-3">
            <h3 class="text-xl">View   expenses <span class="text-success">#{{ $user->id }}</span> details</h3>
            {{-- <button class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal"><i
                    class="mdi mdi-close"></i></button> --}}
        </div>
       
        {{-- <hr class="border-[1px] border-gray-700 mb-3"> --}}
        <div class="w-full">

            <div class="mb-3">
                <div class="mb-1">Title</div>
                <div class="w-full p-3 bg-gray-100 text-gray-700 rounded">
                    {{ $user->exp_title }}
                </div>
            </div>


            <div class="mb-3">
                <div class="mb-1">Amount</div>
                <div class="w-53 p-3 bg-gray-100 text-gray-700 rounded">
                    ₵ {{ $user->exp_amount }}

                </div>
            </div>


            <div class="mb-3">
                <div class="mb-1">Category</div>
                <div class="w-full p-3 bg-gray-100 text-gray-700 rounded">
                    {{ $user->category->label }}

                </div>
            </div>

            <div  class="mb-3">
                <div class="mb-1">Descrption</div>
                <div class="w-full p-3 bg-gray-100 text-gray-700 rounded">
                    {{ $user->exp_description }}

                </div>
            </div>

            <div  class="mb-3">
                <div class="mb-1">Date created</div>
                <div class="w-full p-3 bg-gray-100 text-gray-700">
                    {{ date("F jS, Y",strtotime($user->created_at)) }}

                </div>
            </div>
            

        </div>
    </div>


    
</div>
