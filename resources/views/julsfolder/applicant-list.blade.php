<!--I USED CHATGPT FOR NOTES-->
<x-layout> <!-- Main container that acts as the layout for the entire page -->
    <div class="h-full w-full scrollbar-thin"> <!-- Wrapper for the entire content with full height and width, and a thin scrollbar -->

        <!-- Top navigation section, displaying the page title and breadcrumbs -->
        <div class="h-[8%] flex items-center text-lg bg-gradient-to-r from-amber-400 to-yellow-300 m-5 rounded-xl px-4">
            <a href="" class="font-bold">Applicant Tracking</a> <!-- Breadcrumb: "Applicant Tracking" as a clickable link -->
            <x-heroicon-s-slash class="size-5"/> <!-- Slash icon used as a separator between breadcrumbs -->
            <a href="">Applicants</a> <!-- Breadcrumb: "Applicants" as a clickable link -->
        </div>

        <!-- Main content section, divided into two parts: statistics and chart -->
        <div class="lg:h-[50%] rounded-lg"> <!-- Main content wrapper, handles the height for large screens and smaller screens -->
            <div class="flex w-full lg:flex-row h-full flex-col"> <!-- Flex container for statistics cards and chart, switches layout based on screen size -->

                <!-- Left section: Statistics cards -->
                <div class="lg:w-[50%] h-[50%] lg:h-[100%] flex flex-wrap items-center justify-center md:h-[40%]">

                    <!-- Individual statistics card: New Applicants -->
                    <div class="count-card">
                        <div>
                            <p class="label-count">New Applicants</p> <!-- Label for the card -->
                            <p class="text-3xl font-extrabold text-white">125</p> <!-- Number for the count -->
                        </div>
                        <x-heroicon-o-user-group class="size-24"/> <!-- Icon next to the card data -->
                    </div>

                    <!-- Individual statistics card: Total Applicants -->
                    <div class="count-card">
                        <div>
                            <p class="label-count">Total Applicants</p> <!-- Label for the card -->
                            <p class="text-3xl font-extrabold text-white">125</p> <!-- Number for the count -->
                        </div>
                        <x-heroicon-o-user-group class="size-24 text-cb"/> <!-- Icon, possibly needs changing based on the label -->
                    </div>

                    <!-- Individual statistics card: Passed -->
                    <div class="count-card">
                        <div>
                            <p class="label-count">Passed</p> <!-- Label for the card -->
                            <p class="text-3xl font-extrabold text-white">125</p> <!-- Number for the count -->
                        </div>
                        <x-heroicon-o-user-group class="size-24"/> <!-- Icon, possibly needs changing based on the label -->
                    </div>

                    <!-- Individual statistics card: Failed -->
                    <div class="count-card">
                        <div>
                            <p class="label-count">Failed</p> <!-- Label for the card -->
                            <p class="text-3xl font-extrabold text-white">125</p> <!-- Number for the count -->
                        </div>
                        <x-heroicon-o-user-group class="size-24"/> <!-- Icon, possibly needs changing based on the label -->
                    </div>
                </div>

                <!-- Right section: Chart display -->
                <div class="lg:w-[50%]  flex flex-col items-center justify-center">
                    <div shadow="xl" class="w-[95%] lg:w-[95%] md:h-[90%] sm:w-[90%]  m-2 line text-black"> <!-- Card container for the chart -->
                        <x-line-chart /> <!-- Line chart displayed within the card -->
                    </div>
                </div>

            </div>
        </div>

        <!-- Bottom section: Applicant table and controls -->
        <div class="h-[70%] mt-5 w-full"> <!-- Bottom section wrapper, containing filters, buttons, and table -->

            <!-- Filter and Add New Applicant button area -->
            <div class="flex w-full lg:justify-between md:justify-between justify-evenly items-center px-2 h-[20%]">

                <!-- Search input for applicant names -->
                <div class="lg:w-[20%] md:w-[20%] m-5">
                    <x-input icon="magnifying-glass" placeholder="Applicant name" /> <!-- Search input field with a magnifying glass icon -->
                </div>

                <!-- Add New Applicant button (different for desktop and mobile) -->
                <div>
                    <!-- Desktop button -->
                    <div x-data="{ open: false }" class="w-full hidden lg:flex">
                        <x-button x-on:click="open = ! open" amber label="Add New Applicant"></x-button> <!-- Button to toggle modal form -->
                        <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40"> <!-- Modal background -->
                            <div @click.away="open = false" class="bg-amber-500 lg:w-fit w-full h-fit flex justify-center items-center p-3 rounded-2xl">
                                <x-modal-form> <!-- Modal form component for adding new applicants -->
                                </x-modal-form>
                            </div>
                        </div>
                    </div>

                    <!-- Mobile button -->
                    <div x-data="{ open: false }" class="w-full lg:hidden flex">
                        <x-mini-button x-on:click="open = ! open" rounded warning icon="plus" /> <!-- Small button for mobile with a "+" icon -->
                        <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40"> <!-- Modal background -->
                            <div @click.away="open = false" class="bg-amber-500 lg:w-fit w-full h-fit flex justify-center items-center p-3 rounded-2xl">
                                <x-modal-form> <!-- Modal form component for adding new applicants -->
                                </x-modal-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data table displaying applicant details -->
            <x-data-tables>
                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize"> <!-- Table header for Name column -->
                    Name
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize"> <!-- Table header for Contact number column -->
                    Contact no.
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize"> <!-- Table header for Email column -->
                    Email
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize"> <!-- Table header for Department column -->
                    Department
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize"> <!-- Table header for Status column -->
                    Status
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize"> <!-- Table header for Score column -->
                    Score
                </th>
                <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center"> <!-- Table header for Action column -->
                    Action
                </th>
            </x-data-tables> <!-- Applicant table component -->
        </div>
    </div>
</x-layout> <!-- End of the main layout container -->
