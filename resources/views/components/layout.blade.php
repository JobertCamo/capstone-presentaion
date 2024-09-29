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
    <body class="overflow-hidden bg-no-repeat bg-slate-200 text-black font-roboto scrollbar-thin">
        <nav class="flex justify-between bg-cb drop-shadow-lg p-3 items-center">
            <div>
                <ul class="flex flex-row items-center Lightnav space-x-5 text-purple-800">
                    <li><x-heroicon-s-bars-3 class=" size-6 hidden lg:block  hover:text-purple-800" onclick="toggleSidebar()"/></li>
                    <li><x-heroicon-s-bars-3 class=" size-6 lg:hidden  hover:text-purple-800" onclick="togglePhoneSidebar()"/></li>
                    <li class="hidden lg:block md:block font-bold text-xl">HR Recruitment Applicant Management System</li>
                </ul>
            </div>
            <div class="flex items-center space-x-3">
                <div>
                    <x-heroicon-o-inbox-arrow-down class="size-6 shrink-0"/>
                </div>
                <div>
                    <x-heroicon-o-bell-alert class="size-6 shrink-0"/>
                </div>
                <div>
                    <img src="{{asset('images/sqaure.png')}}" alt="" class="rounded-full w-9">
                </div>
            </div>
        </nav>
        <div class="flex">
            <aside class="transition-all duration-500 absolute lg:static w-[300px] hidden lg:block" id="sidebar">
                <div class=" bg-amber-400 h-screen overflow-y-auto scrollbar-hidden">
                    <ul class="flex flex-col gap-2 p-2 bg-opacity-0 transition-all duration-500" id="sidebarcontent" >
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
            <aside class="transition-all duration-500 absolute lg:static w-[300px] z-10 lg:hidden block" id="phonebar">
                <div class=" bg-amber-400 h-screen overflow-y-auto scrollbar-hidden">
                    <ul class="flex flex-col gap-2 p-2 bg-opacity-0 transition-all duration-500" id="sidebarcontent" >
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




            <main class="overflow-auto h-screen m-2 scrollbar-thin w-full">
                {{$slot}}
            </main>
        </div>
        @livewireScripts
    </body>
</html>
