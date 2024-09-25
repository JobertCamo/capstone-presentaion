<nav>
    <div class="flex bg-[#161925] h-16 items-center p-5 justify-between flex-row drop-shadow-md cursor-pointer">
        <!--LEFTNAV-->
        <ul class="flex flex-row items-center space-x-1 Lightnav">
            <li><x-heroicon-s-bars-3 class="hidden size-6 lg:block md:block sm:block" onclick="toggleSidebar()"/></li>
            <img src="{{asset('images/logo.png')}}" alt="LOGO IMG" class="w-14">
            <li class="hidden lg:block md:block">HRMS</li> 
        </ul>
        <!--RIGHT NAV-->
        <div class="flex flex-row items-center space-x-3 rightnav">
            <x-heroicon-s-cog-6-tooth class="size-6"/>
            <x-heroicon-s-inbox-stack class="size-6"/>
            <img src="{{asset('images/sqaure.png')}}" alt="" class="rounded-full w-9">
        </div>
    </div>
</nav>