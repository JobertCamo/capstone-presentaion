@props(['applicant'])
<tr class="bg-white transition-all duration-500 hover:bg-gray-50">
    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 text-start">{{ $applicant->first_name . ' ' . $applicant->last_name }}</td>
    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ $applicant->contact }} </td>
    <td class="p-5 whitespace-nowrap  text-sm leading-6 font-medium text-gray-900">{{$applicant->email}}</td>
    <td>
        <x-badge flat emerald label="Passed"/>
    </td>
    <td>
        <div class="w-full max-w-xl flex items-center space-x-2 ">
            <p class=" text-sm text-gray-700" id="score-display">{{ $applicant->score . '%' }}</p>
            <!-- Progress Bar -->
            <div class="w-full bg-gray-200 rounded-full h-2.5">
            <div id="progress" class="bg-indigo-600 h-2.5 rounded-full w-[{{ $applicant->score . '%' }}]">
                
            </div>
        </div>
            <!-- Score Display -->
    </td>
    <td class=" p-5" x-data="{delModal: false}">
        <x-dropdown>
            <x-dropdown.item wire:navigate.hover href="/profile/{{ $applicant->first_name }}" label="View Profile" />
            <x-dropdown.item label="Delete" @click="delModal = true" />
            <x-dropdown.item label="See History" />
        </x-dropdown>
        <div x-show="delModal"  @click.away="delModal = false" x-cloak x-transition class="fixed inset-0 z-10 flex gap-5 items-center justify-center">
            <div class="shadow-lg shadow-indigo-500/40 bg-white p-12 space-x-5 text-center font-bold text-xl space-y-7">
                <div class="text-balance">Are you sure you want to delete <br> <span class="text-red-500">{{ $applicant->first_name .' '.$applicant->last_name }}</span>?</div>
                <div class="space-x-5">
                    <x-button @click="delModal = false" rose wire:click='delete({{ $applicant->id }})'>Delete</x-button>  
                    <x-button @click="delModal = false" positive>Cancel</x-button>
                </div>
            </div>
        </div>
    </td>
</tr>