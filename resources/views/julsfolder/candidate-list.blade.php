<x-layout>
    <div class="overflow-y-auto">
        <div class="h-[50px] flex items-center text-lg bg-gradient-to-r from-amber-400 to-yellow-300 m-5 rounded-xl px-4">
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

         <div class="lg:w-[30%] md:w-[20%] m-5 justify-center">
            <x-input icon="magnifying-glass" placeholder="Candidate name" />
        </div>

        <div class="h-[70%] mt-5 w-full overflow-x-auto">
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
