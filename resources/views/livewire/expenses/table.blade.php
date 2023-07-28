<div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-lg text-gray-700 font-semibold mb-3">Expenses History</h3>
                    <div class="w-full flex items-center justify-between mb-3" >
                        <div>
                            <select name="" 
                            class="bg-gray-100 border border-gray-300  text-gray-600 w-52 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                            id="">
                            <option value="">Filter by Category</option>
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->label }}"> {{ $category->label }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div>
                            <input type="text"
                            placeholder="Search"
                                class="bg-gray-100 border border-gray-300 text-gray-600 w-52 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"
                                id="title">
                        </div>
                    </div>
                    <table class="w-full table-auto border-spacing-1 border-separate">
                        <thead>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Title</th>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Amount</th>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Category</th>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Date</th>
                            <th class="bg-red-50 p-2 rounded-sm text-gray-600">Action</th>

                        </thead>
                        <tbody>
                            @forelse ($expenses as $expense)
                                <tr>
                                    <td class="bg-gray-100 p-2 rounded-sm text-gray-600">{{ $expense->exp_title }}</td>
                                    <td class="bg-gray-100 p-2 rounded-sm text-gray-600">₵{{ $expense->exp_amount }}
                                    </td>
                                    <td class="bg-gray-100 p-2 rounded-sm text-gray-600">{{ $expense->label }}</td>
                                    <td class="bg-gray-100 p-2 rounded-sm text-gray-600">
                                        {{ date('F jS, Y', strtotime($expense->created_at)) }}</td>
                                    <td class="bg-gray-100 p-2 rounded-sm text-center">
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
                            @empty
                                <td class="bg-gray-100 p-2 rounded-sm text-gray-600" colspan="4">No expenses
                                    available</td>
                            @endforelse

                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $expenses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
