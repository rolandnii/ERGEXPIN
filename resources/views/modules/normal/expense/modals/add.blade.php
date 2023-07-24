<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-gray-50 p-4 mt-0 border-none text-gray-800 shadow">
            {{-- <button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal"></button> --}}
            <div class="flex justify-between items-center mb-3">
                <h3 class="text-xl">Add new expenses</h3>
                {{-- <button class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal"><i
                        class="mdi mdi-close"></i></button> --}}
            </div>
            {{-- <hr class="border-[1px] border-gray-700 mb-3"> --}}



            <form>
                <div class="row gap-0 mb-3">
                    <div class="col-12 col-md-8 pr-0">
                        <label class="block mb-1 text-base font-medium text-gray-700" for="title">Title</label>
                        <input type="text"
                            class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            id="title" required>
                    </div>
                    <div class="col-12 col-md-4">
                        <label for="amount" class="block mb-1 text-base font-medium text-gray-700"> Amount(¢)</label>
                        <input type="text" id="amount"
                            class="bg-gray-100 border border-gray-300 text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                            required>
                    </div>
                </div>



                <label class="block mb-1 text-base font-medium text-gray-700">Please select one
                    category</label>

                <div class="flex gap-3 mb-3">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" type="radio" value="" name="category"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                                required>
                        </div>
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-700">Remember
                            me</label>
                    </div>
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember1" type="radio" value="" name="category"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                                required>
                        </div>
                        <label for="remember1" class="ml-2 text-sm font-medium text-gray-700">Remember
                            me</label>
                    </div>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-base font-medium text-gray-700" for="description">Description</label>
                    <textarea name="description" id="description"
                        class="bg-gray-100 border border-gray-300 text-gray-700 resize-none text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                        rows="6"></textarea>
                </div>
                <div class="text-end">
                    <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary bg-primary" form="" type="submit">Save</button>

                </div>
            </form>


        </div>
    </div>
</div>
