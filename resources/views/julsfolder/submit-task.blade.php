<x-layout>
    <div class=" flex items-center justify-center h-[90%]">
        <div class="bg-white w-full max-w-md sm:max-w-lg md:max-w-2xl p-6 sm:p-8 rounded-lg shadow-lg">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-semibold">Submit</h2>
                <div class="h-10 w-10 flex items-center justify-center rounded-full overflow-hidden">
                    <img src="{{ asset('images/sqaure.png') }}" alt="">
                </div>
            </div>
    
            <form class="space-y-4">
                
    
                
    
                

                
    
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">SSS ID</label>
                    <x-input type="file" class="" />

                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">PAG IBIG</label>
                    <x-input type="file" class="" />

                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">NA</label>
                    <x-input type="file" class="" />

                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">WALANG</label>
                    <x-input type="file" class="" />

                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-medium mb-1">HANGGAN</label>
                    <x-input type="file" class="" />

                </div>
    
                <div class="flex justify-between mt-6">
                    <x-button red  label="CANCEL"/>
                    <x-button amber  label="SUBMIT"/>
                </div>
            </form>
        </div>
    </div>
</x-layout>