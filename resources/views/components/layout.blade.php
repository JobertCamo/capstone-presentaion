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
        <nav class="flex justify-between bg-white drop-shadow-lg p-3 items-center">
            <div>
                <ul class="flex flex-row items-center Lightnav space-x-2 ">
                    <li> <x-css-menu class=" size-6 hidden lg:block  " onclick="toggleSidebar()" /></li>
                    <li> <x-css-menu  class=" size-6 lg:hidden  " onclick="togglePhoneSidebar()" /></li>
                    <li class="hidden lg:block md:block font-light text-xl select-none">HR Recruitment Applicant Management System</li>
                </ul>
            </div>
            <div class="flex items-center space-x-3">
                <div>
                    <x-heroicon-o-inbox-arrow-down class="size-6 shrink-0"/>
                </div>
                <div>
                    <x-heroicon-o-bell-alert class="size-6 shrink-0"/>
                </div>
                <div x-data="{profileDropdown: false}" class="">
                    <img @click="profileDropdown = true" src="{{asset('images/sqaure.png')}}" alt="" class="rounded-full w-9">
                    <div x-show="profileDropdown" x-transition x-cloak class=" absolute -bottom-[5em] right-2 px-5 py-3 bg-white rounded-md">
                        <div @click.away="profileDropdown = false" class="">
                            <ul class="space-y-2">
                                <li><a wire:navigate.hover class="flex gap-1" href="">Profile<x-icon name="user" class="w-4"/></a></li>
                                <li><a wire:navigate.hover class="flex gap-1" href="/logout">Log Out<x-icon name="arrow-up-tray" class="w-4"/></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="flex">
            {{-- PC ASIDE --}}
            <aside class="transition-all duration-500 absolute lg:static w-[300px] hidden lg:block" id="sidebar">
                <div class=" bg-[#FFFFFF] h-screen overflow-y-auto scrollbar-hidden">
                    <ul class="flex flex-col gap-2 bg-opacity-0 transition-all duration-500" id="sidebarcontent" >
                        <div x-data="{ open: true }">
                            <button x-on:click="open = ! open" class="titlesidebar ">
                                <p>Recruitment</p>
                                <span :class="open ? 'rotate-90' : 'rotate-0'" class="arrow transition-transform duration-300 inline-block">
                                    <x-heroicon-s-chevron-right/>
                                </span>
                            </button>
                            <div x-show="open"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-2">
                                {{-- ============================ --}}
                                {{-- 1st create-job --}}
                                {{-- ============================ --}}
                                {{-- <li 
                                    class="side">
                                    <a 
                                        wire:navigate.hover href="/job-create" class="{{ request()->is('job-create') ? 'bg-amber-200 font-bold' : '' }}">
                                        Job Creation
                                    </a>
                                </li> --}}
                                {{-- ============================ --}}
                                    {{-- 1st create-job --}}
                                {{-- ============================ --}}
                                {{--  --}}
                                <li 
                                    class="side">
                                    <a 
                                        wire:navigate.hover href="/create-job" class="{{ request()->is('create-job') ? 'bg-amber-200 font-bold' : '' }}">
                                        Post a Job
                                    </a>
                                </li>
                                {{--  --}}
                                <li class="side">
                                    <a wire:navigate.hover href="/jobpost">
                                        Posting
                                    </a>
                                </li>
                                <li class="side">
                                    <a wire:navigate.hover href="/exam">
                                        Initial Questions
                                    </a>
                                </li>
                            </div>
                        </div>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">
                            Applicant Tracking
                        </label>
                        <li class="side">
                            <a wire:navigate.hover href="{{ url('/candidate-list') }}" 
                                class="{{ request()->is('candidate-list') ? 'bg-amber-200 font-bold' : '' }}">
                                Candidates
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate.hover href="{{ url('/applicants') }}" class="{{ request()->is('applicants') ? 'bg-amber-200 font-bold' : '' }}">
                                All Applicants
                            </a>
                        </li>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">
                            Onboarding
                        </label>
                        <li class="side">
                            <a wire:navigate.hover href="{{ url('/employees') }}" class="{{ request()->is('employees') ? 'bg-amber-200 font-bold' : '' }}">
                                New Hire List
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate.hover href="/hr-task">
                                Employee Tasks
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate.hover href="/employee-dashboard">
                                Employee Portal
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate.hover href="/employee-task">
                                Offboarding
                            </a>
                        </li>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">
                            Learning Managment
                        </label>
                        
                    </ul>

                    {{-- ICON SIDEBAR --}}
                    <ul class="flex items-center flex-col gap-2 p-2 bg-opacity-0 transition-all duration-500 hidden" id="iconside" >
                        <div x-data="{ open: true }" class=" group">
                            <button x-on:click="open = ! open" class="titlesidebar">
                                    <!-- The element that will trigger the tooltip -->
                                    <img src="{{asset('images/search-people.png')}}" alt="" class="rounded-full w-9">
                            </button>
                            <div x-show="open"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 translate-y-2"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 translate-y-2">
                                <li class="side">
                                    <a wire:navigate.hover href="{{ url('/job-create') }}">
                                        <x-heroicon-o-pencil-square class="size-6 shrink-0"/>
                                    </a>
                                </li>
                                <li class="side">
                                    <a wire:navigate.hover href="{{ url('/jobpost') }}">
                                        <x-css-trello class=" shrink-0 size-6" />
                                    </a>
                                </li>
                                <li class="side">
                                    <a wire:navigate.hover href="{{ url('/application') }}">
                                        <x-css-file-document class=" shrink-0 size-6" />
                                    </a>
                                </li>
                                <li class="side">
                                    <a wire:navigate.hover href="{{ url('/exam') }}">
                                        <x-css-radio-checked  class=" shrink-0 size-6 mt-0" />
                                    </a>
                                </li>
                            </div>
                        </div>
                        <label for="Applicant Tracking" class="titlesidebar">
                            <img src="{{asset('images/website.png')}}" alt="" class=" w-8">
                        </label>
                        <li class="side">
                            <a wire:navigate.hover href="{{ url('/applicant-list') }}">
                                <x-heroicon-s-user class="shrink-0 size-6"/>
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate.hover href="{{ url('/candidates') }}">
                                <x-heroicon-s-calendar-days class="shrink-0 size-6"/>
                            </a>
                        </li>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">
                            <img src="{{asset('images/applicant-tracking.png')}}" alt="" class=" w-8">
                        </label>
                        <li class="side">
                            <a wire:navigate.hover href="{{ url('/employees') }}">
                                <x-css-database class="shrink-0 size-6"/>
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate.hover href="{{ url('/jobscript') }}">
                                <x-css-play-list-check  class="shrink-0 size-6" />
                            </a>
                        </li>
                        <li class="side">
                            <a wire:navigate.hover href="{{ url('/onboard') }}">
                                <x-css-move-task class="shrink-0 size-6"/>
                            </a>
                        </li>
                        <label for="Applicant Tracking" class="titlesidebar">
                            <img src="{{asset('images/stakeholder.png')}}" alt="" class=" w-8">
                        </label>

                        <label for="Applicant Tracking" class="titlesidebar">
                            <img src="{{asset('images/lms.png')}}" alt="" class=" w-8">
                        </label>
                    </ul>
                </div>

                {{-- PHONE ASIDE --}}
            </aside>
            <aside class="transition-all duration-500 absolute lg:static w-[300px] z-10 lg:hidden block" id="phonebar">
                <div class=" bg-amber-400 h-screen overflow-y-auto scrollbar-hidden">
                    <ul class="flex flex-col gap-2 p-2 bg-opacity-0 transition-all duration-500" id="sidebarcontent" >
                        <label for="menu" class="border-none titlesidebar">
                            Menu
                        </label>
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
                        <li class="side"><a wire:navigate.hover href="{{ url('/employee-dashboard') }}">Task List</a></li>
                        <li class="side"><a wire:navigate.hover href="{{ url('/onboard') }}">Task Creation</a></li>
                        <li class="side"><a wire:navigate.hover href="{{ url('/initial') }}">Document Management</a></li>
                        <label for="EMPLOYEE ENGANEMENT" class="titlesidebar">Learning Managment</label>
                    </ul>
                </div>
            </aside>
            <main class="overflow-auto h-screen m-2 scrollbar-thin w-full soft-scrollbar">
                {{$slot}}
            </main>
        </div>
        @livewireScripts
    </body>
</html>
