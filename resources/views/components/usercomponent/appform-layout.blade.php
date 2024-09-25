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
            <div class="flex justify-center flex-1 w-full mb-0 mt-[10%] h-fit xl:my-10">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>
</html>