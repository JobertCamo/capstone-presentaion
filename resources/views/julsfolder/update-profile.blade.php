<x-layout>
    <div class=" flex items-center justify-center h-[85%]">
        <div class="bg-white w-full max-w-md sm:max-w-lg md:max-w-2xl p-6 sm:p-8 rounded-lg shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold">Update Profile</h2>
                <div class="h-10 w-10 flex items-center justify-center rounded-full overflow-hidden">
                    <img src="{{ asset('images/sqaure.png') }}" alt="">
                </div>
            </div>
    
            <form class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-1">Firstname</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-1">Lastname</label>
                        <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                </div>
    
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">Email</label>
                    <input type="email" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
    
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">Address</label>
                    <input type="text" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
    
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">New Password</label>
                    <input type="password" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
    
                <div class="flex justify-between mt-6">
                    <x-button red  label="CANCEL"/>
                    <x-button amber  label="SAVE"/>
                </div>
            </form>
        </div>
    </div>
</x-layout>