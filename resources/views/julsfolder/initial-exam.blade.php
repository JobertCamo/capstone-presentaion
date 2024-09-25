<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <wireui:scripts />
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="h-full overflow-hidden bg-no-repeat bg-slate-200 text-black font-roboto">
    <div class="w-full h-[60px] bg-amber-400 items-center flex justify-between p-2 font-medium text-xl">
        <div class="flex items-center ">
            <x-heroicon-o-chevron-left class="size-6"/>
            <a wire:navigate href="{{ url('/application') }}">Return</a>
        </div>
        <div>
            <p>
                Initial Personality Question
            </p>
        </div>
    </div>
    <div class="w-full h-screen flex justify-center items-center">
        <div class=" w-[80%] h-[90%] flex bg-white/60 rounded-lg">
            <div class=" flex w-full flex-col space-y-2 p-2 overflow-auto">

                <!-- Question 1 -->
                <div class="bg-slate-100 shadow-md rounded-lg p-4 flex items-center justify-center flex-col h-52 space-y-5 ring-1 ring-black/20 hover:bg-slate-200 hover:duration-200">
                    <div class="flex space-x-4">
                        <div>
                            <h2 class="lg:text-3xl font-bold text-xl">Question 1: Lorem ipsum dolor sit?</h2>
                        </div>
                        <div>
                            <x-mini-button rounded primary icon="pencil"/>
                        </div>
                    </div>
                    <div class="flex lg:space-x-4 space-x-2 flex-wrap items-center justify-center">
                        <label for="agree" class=" font-bold text-xl">Agree</label>
                        <x-radio id="question1-agree" wire:model="model1" info value="agree" name="question1" xl/>
                        <label for="neutral" class=" font-bold text-xl">Neutral</label>
                        <x-radio id="question1-neutral" wire:model="model1" secondary value="neutral" name="question1" xl/>
                        <label for="disagree" class=" font-bold text-xl">Disagree</label>
                        <x-radio id="question1-disagree" wire:model="model1" negative value="disagree" name="question1" xl/>
                    </div>
                </div>

                <div class="bg-slate-100 shadow-md rounded-lg p-4 flex items-center justify-center flex-col h-52 space-y-5 ring-1 ring-black/20 hover:bg-slate-200 hover:duration-200">
                    <div class="flex space-x-4">
                        <div>
                            <h2 class="lg:text-3xl font-bold text-xl">Question 2: Lorem ipsum dolor sit?</h2>
                        </div>
                        <div>
                            <x-mini-button rounded primary icon="pencil"/>
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <label for="agree" class=" font-bold text-xl">Agree</label>
                        <x-radio id="question2-agree" wire:model="model2" info value="agree" name="question2" xl/>
                        <label for="neutral" class=" font-bold text-xl">Neutral</label>
                        <x-radio id="question2-neutral" wire:model="model2" secondary value="neutral" name="question2" xl/>
                        <label for="disagree" class=" font-bold text-xl">Disagree</label>
                        <x-radio id="question2-disagree" wire:model="model2" negative value="disagree" name="question2" xl/>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>
