<x-app-layout>
    <x-slot name="title">
        Income
    </x-slot>

    <div class=" flex justify-between">
        @livewire('incomes.filter')

        <section>

            <div>
                <a href="{{ url('add/income') }}" class="h hover:no-underline">
                <button class="btn btn-primary rounded flex items-center gap-1" ><i class="mdi mdi-plus-circle-outline"></i> Add new income</button>

                </a>
            </div>
        </section>
    </div>

    <div class="row row-cols-1 row-cols-md-2 my-10">
        <section class="col">

            <div class="card">
                <div class="card-body">
                    <h3 class="text-lg text-gray-700 font-semibold mb-2"> Incomes Statistics</h3>

                    @foreach ($stats as $stat)
                    @php
                    $percent = ($stat->amount/ $totalamount) * 100;

                    // ddd(round($percent));
                    @endphp
                    <div class="w-full mb-4 ">
                        <div class="flex items-center gap-2 w-full mb-2">
                            <div
                                class="bg-blue-100 text-primary font-bold w-10 h-10 text-lg flex items-center justify-center rounded-full">
                                {{ substr($stat->label,0,1) }}</div>
                            <div class="text-base">{{ $stat->label }}</div>
                        </div>

                        <div class="progress mb-2">
                            <div class="progress-bar bg-primary" role="progressbar"  style="width: {{ $percent }}%"
                                aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>₵{{ $stat->amount }}</span>
                            <span>{{ round($percent) }}%</span>
                        </div>
                    </div>
                    @endforeach

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
                    <h3 class="text-lg text-gray-700 font-semibold mb-3">Latest Incomes</h3>
                    @foreach ($latestIncomes as $income)
                    <div class="bg-light p-4 rounded mb-3">
                        <div class="flex items-center justify-between">
                            <div class="flex gap-3">
                                <div class="bg-warning pt-1 flex items-center justify-center h-10 rounded-full w-10"><i
                                        class="mdi mdi-{{ $income->icon }} text-gray-50"></i></div>
                                <div>
                                    <div>{{ $income->exp_title }}</div>
                                    <div class="text-sm text-gray-400">{{ $income->label }}</div>
                                </div>
                            </div>
                            <span class="text-danger">₵{{ $income->exp_amount }}</span>
                        </div>
                    </div>
                
                    @endforeach
                    

                </div>
            </div>
        </section>


    </div>

    @livewire('incomes.table',)

    
    
    @push('scripts')
        @vite('resources/js/expenses.js')
    @endpush
</x-app-layout>
