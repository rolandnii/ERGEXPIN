<x-app-layout>
    <x-slot name="title">
        Expense
    </x-slot>

    <div class=" flex justify-between">
        <section class="">
            <div class="text-lg text-gray-700 mb-2">Expenses overview</div>
            <div>
                <small class="text text-gray-500 ">total expense record</small>
                <div class="text-primary text-2xl my-1 mb-2">$2001,230</div>
                <div class="">
                    <form class="bg-white p-1 px-2 text-sm rounded flex items-center justify-center h-fit gap-1">
                        <div><i class="mdi mdi-calendar text-primary text-base"></i></div>
                        <input type="text"
                            placeholder="{{ date('M d, Y') . ' - ' . date('M d, Y', strtotime('-30 days', strtotime(date('Y-m-d')))) }}"
                            class="text-sm text-primary border-none outline-none cursor-pointer rounded  outline-offset-0 p-1 input"
                            id="date" readonly>
                    </form>
                </div>
            </div>
            
        </section>

        <section>

            <div>
                <a href="{{ url('add/expense') }}" class="h hover:no-underline">
                <button class="btn btn-primary rounded flex items-center gap-1" ><i class="mdi mdi-plus-circle-outline"></i> Add new expenses</button>

                </a>
            </div>
        </section>
    </div>

    <div class="row row-cols-1 row-cols-md-2 my-10">
        <section class="col">

            <div class="card">
                <div class="card-body">
                    <h3 class="text-lg text-gray-700 font-semibold mb-2"> Expenses Statistics</h3>

                    <div class="w-full mb-3">
                        <div class="flex items-center gap-2 w-full mb-2">
                            <div
                                class="bg-blue-100 text-primary font-bold w-10 h-10 text-lg flex items-center justify-center rounded-full">
                                U</div>
                            <div class="text-base">Utility bills</div>
                        </div>

                        <div class="progress mb-1">
                            <div class="progress-bar w-50 bg-primary" role="progressbar" aria-label="Basic example"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>$1,200,000</span>
                            <span>50%</span>
                        </div>
                    </div>

                    {{-- <div class="w-full">
                        <div class="flex items-center gap-2 w-full mb-2">
                            <div class="bg-primary  w-10 h-10 flex items-center justify-center rounded-full"><i
                                    class="mdi mdi-cash text-light text-2xl"></i></div>
                            <div>Utility bills</div>
                        </div>

                        <div class="progress mb-1">
                            <div class="progress-bar w-50 bg-red-500" role="progressbar" aria-label="Basic example"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>$1,200,000</span>
                            <span>50%</span>
                        </div>
                    </div> --}}

                </div>
            </div>
        </section>
        <section class="col">
            <div class="card">
                <div class="card-body text-gray-700">
                    <h3 class="text-lg text-gray-700 font-semibold mb-3">Latest Expenses</h3>
                    <div class="bg-light p-4 rounded mb-3">
                        <div class="flex items-center justify-between">
                            <div class="flex gap-3">
                                <div class="bg-warning pt-1 flex items-center justify-center h-10 rounded-full w-10"><i
                                        class="mdi mdi-archive text-gray-50"></i></div>
                                <div>
                                    <div>Monday cruise</div>
                                    <div class="text-sm text-gray-400">Health</div>
                                </div>
                            </div>
                            <span class="text-danger">-$1000</span>
                        </div>
                    </div>
                    <div class="bg-light p-4 rounded mb-3">
                        <div class="flex items-center justify-between">
                            <div class="flex gap-3">
                                <div class="bg-warning pt-1 flex items-center justify-center h-10 rounded-full w-10"><i
                                        class="mdi mdi-archive text-gray-50"></i></div>
                                <div>
                                    <div>Monday cruise</div>
                                    <div class="text-sm text-gray-400">Health</div>
                                </div>
                            </div>
                            <span class="text-danger">-$1000</span>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-lg text-gray-700 font-semibold mb-3">Expenses History</h3>
                    <table class="w-full table-auto border-spacing-1 border-separate">
                        <thead>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-700">Title</th>
                            <th class="bg-red-100 p-2 rounded-sm text-gray-700">Amount</th>
                            <th class="bg-red-100 p-2 rounded-sm text-gray-700">Date</th>
                            <th class="bg-red-100 p-2 rounded-sm text-gray-700">Action</th>

                        </thead>
                        <tbody>
                            <tr>
                                <td class="bg-gray-100 p-2 rounded-sm text-blue-600">nnnnnnnnnnn nnnnn nn  nn  n</td>
                                <td class="bg-blue-100 p-2 rounded-sm text-blue-600"></td>
                                <td class="bg-blue-100 p-2 rounded-sm text-blue-600"></td>
                                <td class="bg-blue-100 p-2 rounded-sm  text-blue-600">
                                    <button class="btn btn-sm btn-primary rounded-sm border-none"><i
                                            class="mdi mdi-import"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger rounded-sm border-none bg-red-600"><i
                                            class="mdi mdi-delete"></i>
                                    </button>
                                    <button class="btn btn-sm btn-info rounded-sm border-none bg-blue-600"><i
                                            class="mdi mdi-pencil-box-outline"></i>
                                    </button>
                                </td>

                            </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
        @vite('resources/js/expenses.js')
    @endpush
</x-app-layout>
