<div class=" flex justify-start items-center space-x-10">
    <button onclick="toggleSide()" class=" m-2 bg-red-500 rounded-xl p-2 hover:bg-red-700 transition-all duration-200"><x-heroicon-o-x-mark class="text-white size-5"/></button>
    <p class=" text-3xl font-bold text-center text-amber-500 p-2 m-3">
        New Employee List
    </p>
</div>

<div class="flex flex-col m-5 bg-gray-200  rounded-t-lg">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
            <div class="overflow-hidden rounded-t-lg">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
            <thead>
            <tr class="bg-gradient-to-r from-yellow-300 to-amber-400 text-xl text-black font-semibold ">
                <th scope="col" class="px-6 py-3  text-sm">ID</th>
                <th scope="col" class="px-6 py-3  text-sm">Name</th>
                <th scope="col" class="px-6 py-3  text-sm ">Contact</th>
                <th scope="col" class="px-6 py-3  text-sm ">Email</th>
                <th scope="col" class="px-6 py-3  text-sm ">Date Applied</th>
                <th scope="col" class="px-6 py-3  text-sm ">Action</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
              <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium  ">1</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium  ">John Brown</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm  ">09123456789</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm  ">jondoe@gmail.com</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm  ">10/01/2024</td>
                <td class=" p-5 text-center">
                    <x-dropdown>
                        <x-dropdown.item label="Edit" />
                        <x-dropdown.item label="Delete" />
                        <x-dropdown.item label="See History" />
                    </x-dropdown>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
