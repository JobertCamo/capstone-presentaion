<x-layout>
    <div class="container mx-auto h-screen">
        <!-- Profile Section -->
        <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
            <div class="flex items-center space-x-4">
                <div class="font-bold">Employee Dashboard / <span class="font-normal">Home</span></div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4">
            <div class="flex items-center space-x-4">
                <div class="w-24 h-24  rounded-full flex items-center justify-center overflow-hidden">
                    <!-- Placeholder for profile image -->
                    <img src="{{ asset('images/sqaure.png') }}" alt="" class="">
                </div>
                <div>
                    <h2 class="text-xl ">Name: <span class="text-black font-bold">Rodney Benson</span></h2>
                    <p class="">Job Title: <span class="font-semibold">Astronaut</span></p>
                    <p>Age: <span class="font-semibold">32</span></p>
                    <p>Hired Date: <span class="font-semibold">02/02/2024</span></p>
                </div>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="flex flex-col md:flex-row gap-4">
            <!-- Employee Activity -->
            <div class="flex-1 bg-white shadow-md rounded-lg p-4 ">
                <h3 class="text-lg font-semibold mb-4">Employee Activity</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <a href="/schedules" wire:navigate.hover>
                        <div class="transition duration-200 hover:scale-105 flex flex-col justify-between items-center bg-gray-200 p-4 rounded-lg shadow bg-gradient-to-r from-amber-400 to-yellow-300">
                            <div class="flex items-center gap-4 mb-2 mt-2">
                                <img src="{{ asset('images/calendar.png') }}" alt="" class="w-12 h-12  rounded mb-2">
                                <span class="font-bold text-xl ">69</span>
                            </div>
                            <p class="text-sm font-bold">Resignation</p>
                        </div>
                    </a>
                    <a href="/tasks" wire:navigate.hover>
                        <div class="transition duration-200 hover:scale-105 flex flex-col justify-between items-center bg-gray-200 p-4 rounded-lg shadow bg-gradient-to-r from-amber-400 to-yellow-300">
                            <div class="flex items-center gap-4 mb-2 mt-2">
                                <img src="{{ asset('images/task.png') }}" alt="" class="w-12 h-12  rounded mb-2">
                                <span class="font-bold text-xl ">69</span>
                            </div>
                            <p class="text-sm font-bold">Task Submission</p>
                        </div>
                    </a>
                    <a href="/update-profile" wire:navigate.hover>
                        <div class="transition duration-200 hover:scale-105 flex flex-col justify-between items-center bg-gray-200 p-4 rounded-lg shadow bg-gradient-to-r from-amber-400 to-yellow-300">
                            <div class="flex items-center gap-4 mb-2 mt-2">
                                <img src="{{ asset('images/setting.png') }}" alt="" class="w-12 h-12  rounded mb-2">
                                <span class="font-bold text-xl ">69</span>
                            </div>
                            <p class="text-sm font-bold">Update Profile</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Task List -->
            <div class="flex-1 bg-white shadow-md rounded-lg p-4">
                <h3 class="text-lg font-semibold mb-4">Task List</h3>
                <div class="space-y-4">
                    <!-- Task Card -->
                    <div class="flex items-center bg-gray-200 p-4 rounded-lg shadow">
                        <div class="flex-1">
                            <h4 class="font-bold">Task Title</h4>
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                        <input type="checkbox" class="w-5 h-5 ml-4" disabled >
                    </div>
                    <div class="flex items-center bg-gray-200 p-4 rounded-lg shadow">
                        <div class="flex-1">
                            <h4 class="font-bold">Task Title</h4>
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                        <input type="checkbox" class="w-5 h-5 ml-4" disabled >
                    </div>
                    <div class="flex items-center bg-gray-200 p-4 rounded-lg shadow">
                        <div class="flex-1">
                            <h4 class="font-bold">Task Title</h4>
                            <p class="text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        </div>
                        <input type="checkbox" class="w-5 h-5 ml-4" disabled >
                    </div>
                </div>
            </div>
        </div>
        {{-- FOOTTTTTTTER --}}
        <div class=" flex flex-col md:flex-row items-center justify-between bg-white shadow-md rounded-lg p-4 mb-4 mt-4">
            <div class="flex justify-center items-center w-full">
                <div class="text-center">HR RECRUITMENT SYSTEM</div>
            </div>
        </div>
    </div>
</x-layout>