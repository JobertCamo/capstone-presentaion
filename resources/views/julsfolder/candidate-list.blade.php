<x-layout> <!-- Main container that acts as the layout for the entire page -->
    <div class="h-full w-full scrollbar-thin"> <!-- Wrapper for the entire content with full height and width, and a thin scrollbar -->

        <!-- Top navigation section, displaying the page title and breadcrumbs -->
        <div class="h-[8%] flex items-center text-lg bg-gradient-to-r from-yellow-300 to-amber-400 m-5 rounded-xl px-4">
            <a href="" class="font-bold">Applicant Tracking</a> <!-- Breadcrumb: "Applicant Tracking" as a clickable link -->
            <x-heroicon-s-slash class="size-5"/> <!-- Slash icon used as a separator between breadcrumbs -->
            <a href="">Candidates</a> <!-- Breadcrumb: "Candidates" as a clickable link -->
        </div>

        <!-- Candidate Statistics Section: Cards showing different candidate statistics -->
        <div class="m-3 lg:h-[20%] h-full md:h-[40%] flex flex-col items-center justify-center lg:flex-nowrap lg:flex-row md:flex-wrap sm:flex-wrap sm:h-[70%]">
            <!-- Individual candidate statistic card: Candidates -->
            <div class="candidate-card">
                <p>Candidates</p> <!-- Label for the card -->
                <div>123</div> <!-- Number of candidates -->
            </div>
            <!-- Individual candidate statistic card: Interview Passed -->
            <div class="candidate-card">
                <p>Interview Passed</p> <!-- Label for the card -->
                <div>123</div> <!-- Number of candidates who passed the interview -->
            </div>
            <!-- Individual candidate statistic card: Interview Failed -->
            <div class="candidate-card">
                <p>Interview Failed</p> <!-- Label for the card -->
                <div>123</div> <!-- Number of candidates who failed the interview -->
            </div>
            <!-- Individual candidate statistic card: Not Attended -->
            <div class="candidate-card">
                <p>Not Attended</p> <!-- Label for the card -->
                <div>123</div> <!-- Number of candidates who did not attend the interview -->
            </div>
        </div>

        <!-- Interview and Calendar Section: Flex container displaying interview schedule and calendar side by side -->
        <div class="lg:h-[50%] h-full w-full flex flex-col lg:flex-row">
            <!-- Left Section: Interview Schedule -->
            <div class="lg:w-[50%] lg:h-full h-[50%] p-4">
                <x-interview-sched/> <!-- Component to display interview schedule -->
            </div>

            <!-- Right Section: Calendar Display -->
            <div class="h-full w-full">
                <div class="w-full h-full">
                    <div class="h-full w-full lg:flex-col flex">
                        <x-calendar-date /> <!-- Component to display the calendar -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Input Field: Positioned at the bottom after the main content -->
        <div class="lg:w-[30%] md:w-[20%] m-5 justify-center">
            <x-input icon="magnifying-glass" placeholder="Candidate name" /> <!-- Input field to search candidates by name -->
        </div>

        <!-- Data Tables Section: Displaying detailed information about candidates -->
        <div class="h-[70%] mt-5 w-full overflow-x-auto"> <!-- Table container with horizontal scrolling for overflow -->
            <x-data-tables> <!-- Data table component to show the list of candidates -->
                <!-- Table header for Name column -->
                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Name
                </th>
                <!-- Table header for Contact No. column -->
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Contact no.
                </th>
                <!-- Table header for Email column -->
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Email
                </th>
                <!-- Table header for Department column -->
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Department
                </th>
                <!-- Table header for Status column -->
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Status
                </th>
                <!-- Table header for Score column -->
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Score
                </th>
                <!-- Table header for Action column (e.g., buttons for actions like Edit, Delete) -->
                <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">
                    Action
                </th>
            </x-data-tTables>
        </div>
    </div>
</x-layout> <!-- End of the main layout container -->
