<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/companyicon.ico') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <wireui:scripts />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
</head>
<body class="h-full overflow-hidden bg-no-repeat bg-slate-200 text-black font-roboto scrollbar-thin">
    <!--NAVBAR-->
    <nav class=" top-0 z-10 w-full text-black">
        <div class="flex bg-amber-400/95 h-16 items-center p-5 justify-between flex-row drop-shadow-md cursor-pointer">
            <!--LEFTNAV-->
            <ul class="flex flex-row items-center Lightnav space-x-5 text-purple-800">
                <li><x-heroicon-s-bars-3 class=" size-6  hover:text-purple-800" onclick="toggleSidebar()"/></li>
                <li class="hidden lg:block md:block font-bold text-xl">HR Recruitment Applicant Management System</li>
            </ul>
                <!--RIGHT NAV-->
            <div class="flex flex-row items-center rightnav">
                <a wire:navigate.hover href="/setting"><x-heroicon-s-cog-6-tooth class="size-6 text-red-700"/></a>

                <div x-data="{ show: false }" class="relative">
                    <!-- Button to toggle the notification box -->
                    <button @click="show = !show" class=" text-white px-4 py-2 rounded-lg flex items-center">
                        <!-- Heroicon inbox stack -->
                        <x-heroicon-s-inbox-stack class="size-6 text-blue-800" />
                        <span class="ml-2"></span>
                    </button>

                    <!-- Notification box container -->
                    <div x-show="show" @click.away="show = false" x-cloak class="absolute top-12 right-0 mt-2 bg-white rounded-lg shadow-lg p-4 w-[300px] h-[400px]">
                        <h2 class="text-lg font-semibold text-blue-800 mb-2">Notifications</h2>
                        <ul>
                            <li class="text-gray-700 mb-1">📩 You have 5 new messages</li>
                            <li class="text-gray-700 mb-1">⚠️ System update required</li>
                            <li class="text-gray-700">✅ Task "Report Submission" completed</li>
                        </ul>
                    </div>
                </div>
                <img src="{{asset('images/sqaure.png')}}" alt="" class="rounded-full w-9">
            </div>
        </div>
    </nav>

    <div class="flex">
        <div class="transition-all duration-500 absolute lg:static w-[300px] hidden lg:block" id="phonesidebar">
            <aside class="h-screen">
                <div class="flex flex-col bg-gradient-to-b from-[#a68c00] to-[#896800]  h-screen p-2 shadow-right-light cursor-pointer text-white scrollbar-hidden">
                    <ul class="flex flex-col gap-2 p-2 bg-opacity-0 transition-all duration-500" id="phonesidebarcontent" >
                        <label for="menu" class="border-none titlesidebar">Menu</label>
                        <label for="EMPLOYEE ENGANEMENT" ></label>
                        <div x-data="{ open: true }">
                            <button x-on:click="open = ! open" class="titlesidebar">Recruitment
                                <span :class="open ? 'rotate-90' : 'rotate-0'" class="arrow transition-transform duration-300 inline-block">
                                    <x-heroicon-s-chevron-right/>
                                </span>
                            </button>
                            <div x-show="open"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-2">

                                <li class="side"><a wire:navigate.hover href="{{ url('/job-create') }}">Job Creation</a></li>
                                <li class="side"><a wire:navigate.hover href="{{ url('/jobpost') }}">Posting</a></li>
                                <li class="side"><a wire:navigate.hover href="{{ url('/application') }}">Application Form</a></li>
                                <li class="side"><a wire:navigate.hover href="{{ url('/exam') }}">Initial Questions</a></li>

                            </div>
                        </div>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">Applicant Tracking</label>
                        <li class="side"><a wire:navigate.hover href="{{ url('/applicant-list') }}">Applicants</a></li>
                        <li class="side"><a wire:navigate.hover href="{{ url('/candidates') }}">Candidates</a></li>

                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">Onboarding</label>
                        <li class="side"><a wire:navigate.hover href="{{ url('/employees') }}">Employee List</a></li>
                        <li class="side"><a wire:navigate.hover href="{{ url('/jobscript') }}">Task List</a></li>
                        <li class="side"><a wire:navigate.hover href="{{ url('/onboard') }}">Task Creation</a></li>
                        <li class="side"><a wire:navigate.hover href="{{ url('/initial') }}">Document Management</a></li>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">Learning Managment</label>
                    </ul>
                </div>
            </aside>
        </div>

        <div class="transition-all z-70 duration-500 absolute lg:hidden w-[300px]" id="phonebar">
            <aside class="h-screen">
                <div class="flex flex-col bg-gradient-to-b from-[#a68c00] to-[#896800]  h-screen p-2 shadow-right-light cursor-pointer text-white scrollbar-hidden">
                    <ul class="flex flex-col gap-2 p-2 bg-opacity-0 transition-all duration-500" id="phonebarcontent" >
                        <label for="menu" class="border-none titlesidebar">Menu</label>
                        <label for="EMPLOYEE ENGANEMENT" ></label>
                        <div x-data="{ open: true }">
                            <button x-on:click="open = ! open" class="titlesidebar">Recruitment
                                <span :class="open ? 'rotate-90' : 'rotate-0'" class="arrow transition-transform duration-300 inline-block">
                                    <x-heroicon-s-chevron-right/>
                                </span>
                            </button>
                            <div x-show="open"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-2">

                                <li class="side"><a wire:navigate.hover href="{{ url('/job-create') }}">Job Creation</a></li>
                                <li class="side"><a wire:navigate.hover href="{{ url('/jobpost') }}">Posting</a></li>
                                <li class="side"><a wire:navigate.hover href="{{ url('/application') }}">Application Form</a></li>
                                <li class="side"><a wire:navigate.hover href="{{ url('/exam') }}">Initial Questions</a></li>

                            </div>
                        </div>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">Applicant Tracking</label>
                        <li class="side"><a wire:navigate.hover href="{{ url('/applicant-list') }}">Applicants</a></li>
                        <li class="side"><a wire:navigate.hover href="{{ url('/candidates') }}">Candidates</a></li>

                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">Onboarding</label>
                        <li class="side"><a wire:navigate.hover href="{{ url('/employees') }}">Employee List</a></li>
                        <li class="side"><a wire:navigate.hover href="{{ url('/jobscript') }}">Task List</a></li>
                        <li class="side"><a wire:navigate.hover href="{{ url('/onboard') }}">Task Creation</a></li>
                        <li class="side"><a wire:navigate.hover href="{{ url('/initial') }}">Document Management</a></li>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">Learning Managment</label>
                    </ul>
                </div>
            </aside>
        </div>

        <div class="flex h-screen w-full scrollbar-thin"> <!--CONTENT CONTAINER-->
            <div id="content" class=" overflow-auto transition-all duration-500 h-full w-full scrollbar-thin">
                <main class="w-full h-full">
                    {{$slot}}  <!--CONTENT LOAD-->
                </main>
            </div>
        </div>
    </div>
    <!--SIDEBAR-->



    @livewireScripts
</body>
</html>
