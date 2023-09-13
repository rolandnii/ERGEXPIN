<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>
    <h2 class="text text-gray-700 text-2xl mb-3">Welcome to dashboard</h2>

    {{-- Section for the cards --}}
    <section class="grid grid-cols-1 gap-3 lg:gap-[0.6rem] min-h-[120px] md:grid-cols-2 lg:grid-cols-4">
        {{-- Total --}}
        <div class="card h-full bg-cyan-200 text-gray-700 ">
            <div class="card-body">
                <div class="flex justify-between items-center mb-2">
                    <span class="text text-gray-500">Total</span>
                    <div class="bg-white p-1 px-2 rounded"><i class="mdi mdi-arrow-up text-gray-700"></i></div>
                </div>

                <p class="text-2xl">
                    ₵{{ $total }}
                </p>

            </div>
        </div>

        {{-- Net --}}
        <div class="card h-full bg-blue-200 text-gray-700 ">
            <div class="card-body">
                <div class="flex justify-between items-center mb-2">
                    <span class="text text-gray-500">Net</span>
                    <div class="bg-white p-1 px-2 rounded"><i class="mdi mdi-arrow-top-left text-gray-700"></i></div>
                </div>

                <p class="text-2xl {{ (int) $net < 0 ? 'text-red-600' : '' }}">
                    ₵{{ $net }}
                </p>

            </div>
        </div>

        {{-- Income --}}
        <div class="card h-full bg-green-200 text-gray-700 ">
            <div class="card-body">
                <div class="flex justify-between items-center mb-2">
                    <span class="text text-gray-500">Income</span>
                    <div class="bg-white p-1 px-2 rounded"><i class="mdi mdi-arrow-top-right text-gray-700"></i></div>
                </div>

                <p class="text-2xl">
                    ₵{{ $income }}
                </p>

            </div>
        </div>

        {{-- Expense --}}
        <div class="card h-full bg-red-200 text-gray-700 ">
            <div class="card-body">
                <div class="flex justify-between items-center mb-2">
                    <span class="text text-gray-500">Expenses</span>
                    <div class="bg-white p-1 px-2 rounded"><i class="mdi mdi-arrow-down text-gray-700"></i></div>
                </div>

                <p class="text-2xl">
                    ₵{{ $expenses }}
                </p>

            </div>
        </div>

    </section>
    {{--End Section for the cards --}}

    <section class="text-gray-700 my-10">
        <div class="card">
            <div class="card-body py-3">
                <h3 class="font-bold text-lg text-gray-700 mb-3">Income and Expenses</h3>
                <div class="text-end mb-3">
                    <div class="flex">
                        <button class="p-2 btn btn-primary text-white rounded-l-sm rounded-r-none active filter-btn"  aria-pressed="true"  data-filter="days">Days</button>
                        <button class="p-2 btn-primary btn rounded-none text-white filter-btn" data-filter="months">Months</button>
                        <button class="p-2 btn btn-primary text-white rounded-l-none rounded-r-sm filter-btn" data-filter="years">Years</button>
                    </div>
                </div>
                <div class="h-full">
                    <canvas id="chart" height="250"></canvas>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="grid gap-3 grid-cols-2 lg:gap-2 lg:grid-cols-4">
            <div class="card col-span-2">
                <div class="card-body">
                    <h3 class="font-bold text-gray-700">Total income and expense chart</h3>
                    <div>
                        <canvas id="pie-chart"></canvas>
                    </div>
                </div>
            </div>
 
            <div class="card col-span-2 text-gray-700">
                <div class="card-body">
                    <h3 class="font-bold text-gray-700 mb-3">Recent income or expense</h3>
                    @forelse ( $recentIncExp as $inc_exp)
                    <div class="bg-light p-4 rounded mb-3">
                        <div class="flex items-center justify-between">
                            <div class="flex gap-3">
                                <div class="bg-{{ $inc_exp->color }} pt-1 flex items-center justify-center h-10 rounded-full w-10"><i
                                        class="mdi mdi-{{ $inc_exp->icon }} text-gray-50"></i></div>
                                <div>
                                    <div>{{ $inc_exp->title }}</div>
                                    <div class="text-sm text-gray-400">{{ $inc_exp->category_label }}</div>
                                </div>
                            </div>
                            <div class="flex items-center flex-col justify-start">
                                <span class="text-gray-700">₵{{ $inc_exp->amount }}</span>
                                <div class="text-gray-700">{{ date('j M',strtotime($inc_exp->date)) }}</div>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        let income = @json($income);
        let expense = @json($expenses);
        let app_url = @json(env("APP_URL"));
        let user_id = @json($user_id);
    </script>
        @vite('resources/js/user.js')
    @endpush

</x-app-layout>
