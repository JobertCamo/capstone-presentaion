<x-layout>
    <div>
        <div class="h-[50px] flex items-center text-lg bg-gradient-to-r from-amber-400 to-yellow-300 m-5 rounded-xl px-4">
            <a href="" class="font-bold">Applicant Tracking</a>
            <x-heroicon-s-slash class="size-5"/>
            <a href="">Applicants</a>
        </div>

        <div class="lg:h-[50%] rounded-lg">
            <div class="flex w-full lg:flex-row h-full flex-col">
                <div class="lg:w-[50%] h-[50%] lg:h-[100%] flex flex-wrap items-center justify-center md:h-[40%]">
                    <div class="count-card">
                        <div>
                            <p class="label-count">New Applicants</p>
                            <p class="text-3xl font-extrabold text-white">125</p>
                        </div>
                        <x-heroicon-o-user-group class="size-24"/>
                    </div>

                    <div class="count-card">
                        <div>
                            <p class="label-count">Total Applicants</p>
                            <p class="text-3xl font-extrabold text-white">125</p>
                        </div>
                        <x-heroicon-o-user-group class="size-24 text-cb"/>
                    </div>

                    <div class="count-card">
                        <div>
                            <p class="label-count">Passed</p>
                            <p class="text-3xl font-extrabold text-white">125</p>
                        </div>
                        <x-heroicon-o-user-group class="size-24"/>
                    </div>

                    <div class="count-card">
                        <div>
                            <p class="label-count">Failed</p>
                            <p class="text-3xl font-extrabold text-white">125</p>
                        </div>
                        <x-heroicon-o-user-group class="size-24"/>
                    </div>
                </div>

                <div class="lg:w-[50%] flex flex-col items-center justify-center">
                    <div shadow="xl" class="w-[95%] lg:w-[95%] md:h-[100%] md:w-fit sm:w-[90%] m-2 bg-white/90 rounded-xl drop-shadow-lg text-black p-2">
                        <x-line-chart />
                    </div>
                </div>
            </div>
        </div>

        <div class="h-[70%] mt-5 w-full">
            <div class="flex w-full lg:justify-between md:justify-between justify-evenly items-center px-2 h-[20%]">
                <div class="lg:w-[20%] md:w-[20%] m-5">
                    <x-input icon="magnifying-glass" placeholder="Applicant name" />
                </div>

                <div>
                    <div x-data="{ open: false }" class="w-full hidden lg:flex">
                        <x-button x-on:click="open = ! open" amber label="Add New Applicant"></x-button>
                        <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                            <div @click.away="open = false" class="bg-amber-500 lg:w-fit w-full h-fit flex justify-center items-center p-3 rounded-2xl">
                                <x-modal-form>
                                </x-modal-form>
                            </div>
                        </div>
                    </div>

                    <div x-data="{ open: false }" class="w-full lg:hidden flex">
                        <x-mini-button x-on:click="open = ! open" rounded warning icon="plus" />
                        <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                            <div @click.away="open = false" class="bg-amber-500 lg:w-fit w-full h-fit flex justify-center items-center p-3 rounded-2xl">
                                <x-modal-form>
                                </x-modal-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-data-tables>
                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Name
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Contact no.
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Email
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Department
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Status
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Score
                </th>
                <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">
                    Action
                </th>
            </x-data-tables>
        </div>
    </div>
</x-layout>
