<div class="flex font-bold lg:text-xl md:text-sm justify-between mb-2 items-center ">
    <p>Up Comming Sched</p>
    <div x-data="{ open: false }">
        <x-button x-on:click="open = ! open"  amber label="Add New Applicant"></x-button>
        <div  x-cloak x-transition x-show="open" class=" absolute inset-0  z-10 flex items-center justify-center bg-black/40 ">
            <div @click.away="open = false" class="bg-amber-500 lg:w-fit w-fit h-fit flex justify-center items-center p-3 rounded-2xl">
                <x-modal-schedule>

                </x-modal-schedule>
            </div>
        </div>
    </div>
</div>
<div class="  h-[90%] overflow-y-auto overflow-hidden scrollbar-hidden overflow-x-auto scrollbar-thin">
    <div class="  h-full -m-1.5 overflow-x-auto">
        <div class="p-1.5 inline-block align-middle">
            <div class="overflow-hidden bg-white rounded-lg ">
                <table class=" divide-y divide-black ">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase">Name</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase">Department</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase">Date</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase">Time</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr class="hover:bg-gray-100 ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 ">John Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-800 ">IT DEPT</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">08/20/2024</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">12:00 PM</td>
                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                <div class="flex justify-end gap-1">
                                    <button class="p-2  rounded-full  group transition-all duration-500  flex item-center">
                                        <x-heroicon-s-pencil-square class=" size-5 text-blue-500"/>
                                    </button>
                                    <button class="p-2 rounded-full  group transition-all duration-500  flex item-center">
                                        <x-heroicon-s-trash class="size-5 text-red-600"/>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
