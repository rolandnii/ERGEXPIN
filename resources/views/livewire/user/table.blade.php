<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-lg text-gray-700 font-semibold mb-3">Users</h3>
                    <div class="w-full flex items-center justify-between mb-3">
                        <div>
                            <select name="" wire:model="category"
                                class="bg-gray-100 border border-gray-300  text-gray-600 w-52 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                                id="">
                                <option value="" selected disabled>Filter by Status</option>
                                <option value="">All</option>
                                <option value="active">Active</option>
                                <option value="deleted">Deleted</option>
                            

                            </select>
                        </div>
                        <div>
                            <input type="text" wire:model="search" placeholder="Search"
                                class="bg-gray-100 border border-gray-300 text-gray-600 w-52 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                                id="title">
                        </div>
                    </div>
                    <table class="w-full table-auto border-spacing-1 border-separate">
                        <thead>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Name</th>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Email</th>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Account Type</th>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Status</th>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="bg-gray-100 p-2 rounded-sm text-gray-600">{{ $user->name }}</td>
                                    <td class="bg-gray-100 p-2 rounded-sm text-gray-600">{{ $user->email }}
                                    </td>
                                    <td class="bg-gray-100 p-2 rounded-sm text-gray-600">{{ $user->user_type }}</td>
                                    <td class="bg-gray-100 p-2 rounded-sm text-gray-600">
                                        @if ($user->deleted_at)
                                            <div class="px-2 py-1 bg-red-500 text-gray-100 rounded-sm text-center">
                                                {{ _('Deleted') }}</div>
                                        @else
                                            <div>
                                                <div class="px-2 py-1 bg-emerald-500 text-gray-100 rounded-sm text-center">
                                                    {{ _('Active') }}</div>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="bg-gray-100 p-2 rounded-sm text-center">
                                        <a href="{{ url("update/user/$user->id") }}" class="hover:no-underline">
                                            <button class="btn btn-sm btn-primary rounded-sm border-none"
                                                title="edit"><i class="mdi mdi-import"></i>
                                            </button>
                                        </a>
                                        <a href="{{ url("delete/user/$user->id") }}" class="hover:no-underline">

                                            <button class="btn btn-sm btn-danger rounded-sm border-none bg-red-600"
                                                title="delete"><i class="mdi mdi-delete"></i>
                                            </button>
                                        </a>
                                        <a href="{{ url("view/user/$user->id") }}" class="hover:no-underline">

                                            <button class="btn btn-sm btn-info rounded-sm border-none bg-blue-600"
                                                title="view details"><i class="mdi mdi-ticket-account"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <td class="bg-gray-100 p-2 rounded-sm text-gray-600 text-center" colspan="5">No
                                    user account created</td>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
