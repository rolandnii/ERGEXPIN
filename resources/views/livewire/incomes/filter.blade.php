<div>
    <section class="">
        <div class="text-lg text-gray-700 mb-2">Incomes overview</div>
        <div>
            <small class="text text-gray-500 ">total incomes record</small>
            <div class="text-primary text-2xl my-1 mb-2">₵{{ $amount }}</div>
            <div class="">
                <form class="bg-white p-1 px-2 text-sm rounded flex items-center justify-center h-fit gap-1">
                    <div><i class="mdi mdi-calendar text-primary text-base"></i></div>
                    <select type="text"
                    wire:model="date" 
                    name="date"
                        placeholder="{{ date('M d, Y') . ' - ' . date('M d, Y', strtotime('-30 days', strtotime(date('Y-m-d')))) }}"
                        class="text-sm w-full text-primary border-none outline-none cursor-pointer rounded  outline-offset-0 p-1 input"
                        >
                        <option value="" selected>Overall</option>
                        <option value="today">Today</option>
                        <option value="yesterday">Yesterday</option>
                        <option value="last 7">Last 7 days</option>
                        <option value="last 30">Last 30 days</option>
                        <option value="this month">This month</option>
                        <option value="last month">Last month</option>



                    </select>
                
                </form>
                
            </div>
        </div>
        
    </section>
</div>
