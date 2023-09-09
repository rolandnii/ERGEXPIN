<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <h2 class="text text-gray-700 text-2xl mb-3">Welcome admin</h2>

    {{-- Section for the cards --}}
    <section class="grid grid-cols-1 gap-3 lg:gap-[0.6rem] min-h-[120px] md:grid-cols-2 lg:grid-cols-9 mb-5">
        {{-- Total --}}
        <div class="card h-full bg-cyan-200 text-gray-700 col-span-3">
            <div class="card-body">
                <div class="flex justify-between items-center mb-2">
                    <span class="text text-gray-500">Total users</span>
                    <div class="bg-white p-1 px-2 rounded"><i class="mdi mdi-arrow-up text-gray-700"></i></div>
                </div>

                <p class="text-2xl">
                    {{ $totalUsers }}
                </p>

            </div>
        </div>

        {{-- Net --}}
        <div class="card h-full bg-blue-200 text-gray-700 col-span-3">
            <div class="card-body">
                <div class="flex justify-between items-center mb-2">
                    <span class="text text-gray-500">Active Users</span>
                    <div class="bg-white p-1 px-2 rounded"><i class="mdi mdi-arrow-top-left text-gray-700"></i></div>
                </div>

                <p class="text-2xl">
                    {{ $activeUsers }}
                </p>

            </div>
        </div>


        <div class="card h-full bg-cyan-200 text-gray-700 col-span-3">
            <div class="card-body">
                <div class="flex justify-between items-center mb-2">
                    <span class="text text-gray-500">Deleted users</span>
                    <div class="bg-white p-1 px-2 rounded"><i class="mdi mdi-arrow-down text-gray-700"></i></div>
                </div>

                <p class="text-2xl">
                    {{ $deletedUsers }}
                </p>

            </div>
        </div>

        {{-- Income --}}
        <div class="card h-full bg-green-200 text-gray-700 col-span-3">
            <div class="card-body">
                <div class="flex justify-between items-center mb-2">
                    <span class="text text-gray-500">Income recordings</span>
                    <div class="bg-white p-1 px-2 rounded"><i
                            class="mdi mdi-arrow-up-bold-circle-outline text-gray-700"></i></div>
                </div>

                <p class="text-2xl">
                    {{ $incomeRecordings }}
                </p>

            </div>
        </div>

        <div class="card h-full bg-green-200 text-gray-700 col-span-3">
            <div class="card-body">
                <div class="flex justify-between items-center mb-2">
                    <span class="text text-gray-500">Expense recordings</span>
                    <div class="bg-white p-1 px-2 rounded"><i
                            class="mdi mdi-arrow-down-bold-circle-outline text-gray-700"></i></div>
                </div>

                <p class="text-2xl">
                    {{ $expenseRecordings }}
                </p>

            </div>
        </div>
    </section>

    <section class="grid grid-cols-1  lg:grid-cols-2 gap-3 lg:gap-2 mb-5">
        <div class="card">
            <div class="card-body">
                <h3 class="text-gray-700 mb-3 font-bold">Users chart</h3>
                <div>
                    <canvas id="users-chart"></canvas>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h3 class="text-gray-700 mb-3 font-bold">Recordings chart</h3>
                <div>
                    <canvas id="recordings-chart"></canvas>
                </div>
            </div>
        </div>
    </section>

    <section class="w-full">
        <div class="card">
            <div class="card-body">
                <h3 class="text-gray-700 font-bold mb-3">Users</h3>
                <div class="mb-3">
                    <a href="{{ url('user') }}">
                        <button class="btn btn-sm btn-primary">View all</button>
                    </a>
                </div>
                <div class="responsive">
                    <table class="w-full table-auto border-spacing-1 border-separate">
                        <thead>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Name</th>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Email</th>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Status</th>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Account Date</th>

                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td class="bg-gray-100 p-2 rounded-sm text-gray-600">{{ $user->name }}</td>
                                    <td class="bg-gray-100 p-2 rounded-sm text-gray-600">{{ $user->email }}</td>
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
                                    <td class="bg-gray-100 p-2 rounded-sm text-gray-600">
                                        {{ date('jS F ,Y', strtotime($user->created_at)) }}</td>
                                </tr>
                            @empty
                                <td class="bg-gray-100 p-2 rounded-sm text-gray-600 text-center" colspan="5">No
                                    incomes
                                    available</td>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    @push('scripts')
        <script>
            let deleted_users = @json($deletedUsers);
            let active_users = @json($activeUsers);
            let income_recordings = @json($incomeRecordings);
            let expense_recordings = @json($expenseRecordings);
        </script>
        @vite('resources/js/admin.js')
    @endpush

</x-app-layout>
