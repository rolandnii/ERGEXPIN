<div class="card max-w-4xl">

    <div class="p-4 mt-0 border-none text-gray-800 card-body">

        {{-- <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button> --}}
        <div class="flex justify-between items-center mb-3">
            <h3 class="text-xl">User Details </span> details</h3>
            {{-- <button class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal"><i
                    class="mdi mdi-close"></i></button> --}}
        </div>

        {{-- <hr class="border-[1px] border-gray-700 mb-3"> --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div class="mb-3">
                <div class="mb-1 text-gray-600">Name</div>
                <div class="w-full px-3 py-3 bg-gray-100 text-gray-700 rounded">
                    {{ $user->name }}
                </div>
            </div>


            <div class="mb-3">
                <div class="mb-1 text-gray-600">Id</div>
                <div class="w-full px-3 py-3 bg-gray-100 text-gray-700 rounded">
                    {{ $user->id }}
                </div>
            </div>


            <div class="mb-3">
                <div class="mb-1 text-gray-600">Email</div>
                <div class="w-full px-3 py-3 bg-gray-100 text-gray-700 rounded">
                    {{ $user->email }}
                </div>
            </div>

            <div class="mb-3">
                <div class="mb-1 text-gray-600">User Type</div>
                <div class="w-full px-3 py-3 bg-gray-100 text-gray-700 rounded">
                    {{ $user->user_type }}
                </div>
            </div>

            <div class="mb-3">
                <div class="mb-1 text-gray-600">Status</div>
                <div class="w-full px-3 py-3 bg-gray-100 text-gray-700 rounded">
                    @if ($user->deleted_at)
                        <div class="w-44 px-2 py-1 bg-red-500 text-gray-100 rounded-sm text-center">
                            {{ _('Deleted') }}</div>
                    @else
                        <div>
                            <div class="w-44 px-2 py-1 bg-emerald-500 text-gray-100 rounded-sm text-center">
                                {{ _('Active') }}</div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <div class="mb-1 text-gray-600">Date created</div>
                <div class="w-full px-3 py-3 bg-gray-100 text-gray-700 rounded">
                    {{ date('F jS, Y', strtotime($user->created_at)) }}
                </div>
            </div>


        </div>
    </div>

</div>
