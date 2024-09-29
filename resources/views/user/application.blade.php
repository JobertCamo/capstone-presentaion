<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <title>Application Form</title>
</head>
<body class="h-screen overflow-hidden bg-no-repeat bg-no-repea bg-gradient-to-t from-db to-lb text-cb font-roboto ">
    <nav>
        <x-usercomponent.usernav/>
    </nav>
    <main class="h-screen overflow-auto lg:flex md:flex "><!--Application-->
        <div class="w-full h-screen grow"><!--Container for 2 DIV-->
            <div class="flex-1 h-[50%] md:h-[60%]">
                @php
                    $tae = "taes";
                @endphp
                <div class="flex justify-center h-full">
                    <div class="w-full h-full ">
                        <x-usercomponent.jobscript />
                    </div>
                </div>
            </div>
            <div class="flex justify-center flex-1 w-full mb-0 mt-[10%] h-fit xl:my-10">
                <livewire:guest.app-form :test="$job"/>
            </div>
            <div class="w-full h-[20%] bg-black mt-[5%] bg-opacity-50 flex justify-between px-10">
                <div>
                    FIRST ROW FOOTER
                </div>
                <div>
                    SECOND ROW FOOTER
                </div>
                <div>
                    THIRD ROW FOOTER
                </div>
            </div>
        </div>
    </main>
</body>
</html>
