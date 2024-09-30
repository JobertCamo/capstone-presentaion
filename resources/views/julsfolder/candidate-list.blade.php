<x-layout>
    <div class="overflow-y-auto">
        <div class="h-[50px] flex items-center text-lg bg-white drop-shadow-lg mx-5 mb-5 rounded-xl px-4">
            <a href="" class="font-bold">Applicant Tracking</a>
            <x-heroicon-s-slash class="size-5"/>
            <a href="">Candidate</a>
        </div>

        <div class="flex  lg:flex-row md:flex-row md:flex-wrap  justify-center items-center flex-col">
            <div class="candidate-card">
                <p>Candidates</p>
                <div>123</div>
            </div>
            <div class="candidate-card">
                <p>Interview Passed</p>
                <div>123</div>
            </div>
            <div class="candidate-card">
                <p>Interview Failed</p>
                <div>123</div>
            </div>
            <div class="candidate-card">
                <p>Not Attended</p>
                <div>123</div>
            </div>
        </div>

        <div class=" justify-around flex flex-col lg:flex-row p-2 items-center space-x-3 space-y-10 md:flex-wrap ">
            <div class=" h-[300px]">
                <x-interview-sched/>
            </div>
            <div class=" flex-grow sm:flex-grow">
                <x-calendar-date />
            </div>
            </div>
        </div>

        <div class=" m-5 justify-between flex">
            <div>
                <x-input icon="magnifying-glass" placeholder="Candidate name" />
            </div>
            <div>
                <div x-data="{ open: false }" class="w-full hidden lg:flex items-center justify-center">
                    <x-button x-on:click="open = ! open" amber label="Update Status"></x-button>
                    <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                        <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
                            <div>
                                <form action="">
                                    <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                        <legend class="font-bold text-2xl text-amber-600">Update Applicant Status</legend>
                                        <div class="flex space-x-3 text-black">
                                            <div>
                                                <x-input icon="user" label="Name" placeholder="Candidate name" />
                                            </div>
                                            <div>
                                                <x-select label="Select Status" placeholder="Select one status">
                                                    <x-select.option label="Passed" value="1" />
                                                    <x-select.option label="Failed" value="2" />
                                                    <x-select.option label="Not Attended" value="3" />
                                                </x-select>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <div class="flex justify-end items-center m-2">
                                        <x-button emerald label="Submit" />
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="h-[70%] mt-5 w-full overflow-x-auto hide-scrollbar">
            <x-candidate-table>
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
                    Score
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Interview Status
                </th>
                <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">
                    Action
                </th>
            </x-candidate-table>
        </div>
    </div>
</x-layout>
