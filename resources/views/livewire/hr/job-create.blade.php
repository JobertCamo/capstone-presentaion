<?php

use App\Models\Job;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

new #[layout('components.layout')]
 class extends Component {

    use WithPagination;

    public $title;
    public $requirements;
    public $salary;
    public $location;
    public $schedule;
    public $description;
    public $tags;

    public function submit()
    {
        $data = $this->validate([
            'title' => ['required', 'string'],
            'description' => ['required','string'],
            'requirements' => ['required', 'string'],
            'salary' => ['required', 'string'],
            'location' => ['required', 'string'],
            'schedule' => ['required'],
            'tags' => ['required'],
        ]);

        $this->authorize('create', Job::class);

        $job = Auth::user()->jobs()->create(Arr::except($data, 'tags'));

        // $job = Job::create(Arr::except($data, 'tags'));

        if(!empty($data['tags']))
        {
            foreach (explode(',', strtolower($data['tags'])) as $requirement) {
                $job->tag(trim($requirement));
            }
        }

        $this->reset();
        $this->dispatch('success-notif');

    }

    public function delete(Job $job)
    {
        $this->authorize('delete', $job);
        $job->delete();
        $this->dispatch('delete-notif');
    }

    public function with()
    {
        return [
            'jobs' => Job::latest()->paginate(6),
        ];
    }

}; ?>
<div class="space-y-5" x-data="{jobCreate: false}">

    <x-notification on="success-notif" >
        <x-alert title="Job Posted!" positive solid />
    </x-notification>
    <x-notification on="delete-notif" >
        <x-alert title="Job Deleted!" negative solid />
    </x-notification>
    
    <table class=" min-w-full h-full overflow-scroll">
        <div class="h-[50px] flex justify-between items-center text-lg bg-white drop-shadow-lg mx-1 mb-5 rounded-xl px-4">
            <div class="flex items-center">
                <a href="" class="font-bold">Job Creation</a>
                <x-heroicon-s-slash class="size-5"/>
                <a href="">Jobs Lists</a>
            </div>
            <div>
                <x-button @click="jobCreate = true" amber label="Post Job" />
            </div>
        </div>
        <thead class="sticky top-0">
            <tr class="bg-gradient-to-r from-yellow-300 to-amber-400">
                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Title
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Description
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Location
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Schedule
                </th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                    Salary
                </th>
                <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300 text-center">
                @foreach ($jobs as $job)
                    
            <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 text-start">{{ $job->title }}</td>
                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">{{ Str::limit($job->description, 30) }}</td>
                <td class="p-5 whitespace-nowrap text-center text-sm leading-6 font-medium text-gray-900">{{ $job->location }}</td>
                <td>{{ $job->schedule }}</td>
                <td>{{ $job->salary }}</td>
                <td class=" p-5" x-data="{delModal: false, editModal: false}">
                    <x-dropdown>
                        <x-dropdown.item @click="editModal = true" wire:navigate.hover  label="Edit Job" />
                        <x-dropdown.item @click="delModal = true" label="Delete" />
                        {{-- <x-dropdown.item label="See History" /> --}}
                    </x-dropdown>
                    {{-- DELETE MODAL --}}
                    <div x-show="delModal"  @click.away="delModal = false" x-cloak x-transition class="fixed inset-0 z-10 flex gap-5 items-center justify-center">
                        <div class="shadow-lg shadow-indigo-500/40 bg-white p-12 space-x-5 text-center font-bold text-xl space-y-7">
                            <div class="text-balance">Are you sure you want to delete <br> <span class="text-red-500">{{ $job->title }}</span>?</div>
                            <div class="space-x-5">
                                <x-button @click="delModal = false" rose wire:click="delete('{{ $job->id }}')">Delete</x-button>  
                                <x-button @click="delModal = false" positive>Cancel</x-button>
                            </div>
                        </div>
                    </div>
                    {{-- DELETE MODAL --}}
                    {{-- EDIT MODAL --}}
                    {{-- EDIT COMPONENT --}}
                    <livewire:hr.edit-job :jobid=" $job->id " :title=" $job->title " :salary=" $job->salary " :location=" $job->location " :schedule=" $job->schedule " :description=" $job->description " :requirements=" $job->requirements "/>
                    {{-- EDIT COMPONENT --}}
                    {{-- <div x-cloak x-transition x-show="editModal" class="sm:pb-5  lg:flex min-w-96 lg:w-[70%] mx-auto  mt-2 absolute inset-0 z-9 flex items-center justify-center" x-show="jobCreate" x-cloak>
                        <div class="py-3 bg-white rounded-xl shadow-2xl border-black/20 border-2  lg:w-[100%] mx-auto lg:px-20 px-8 relative">
                            <h1 class="text-2xl text-gray-700 py-2">Job Create Form</h1>
                            <div class="absolute -top-2 -right-2 bg-red-"><x-button @click="editModal = false" class="w-4 h-6" rounded="2xl" negative label="X"  /></div>
                            <form wire:submit='submit'>
                                <hr class="-mx-20">
                                <div class="py-1">
                                    
                                    <div class="lg:flex mt-3">
                                        
                                        <x-input
                                        wire:model='{{ $job->title }}'
                                        label="Job Title" 
                                        placeholder="ex. Fullstack Developer"
                                        class="mt-2 mb-3 px-4 py-1  "
                                        value="{{ $job->title }}" />
                                    
                                        
                                        <x-input 
                                        wire:model='{{ $job->salary }}'
                                        label="Salary" 
                                        placeholder="Separated by comman. ex. frontend, backend"
                                        class="mt-2 mb-3 px-4 py-1 "
                                        value="{{ $job->salary }}" />
                    
                                        
                                        
                                    </div>
                                    <div class="lg:flex">
                                        <x-input 
                                        wire:model='{{ $job->location }}'
                                        label="Location" 
                                        placeholder="ex. Quezon City"
                                        class="mt-2 mb-3 px-4 py-1 "
                                        value="{{ $job->location }}"
                                         />
                    
                                        <x-input 
                                        wire:model='{{ $job->schedule }}'
                                        label="Schedule" 
                                        placeholder="Select Schedule"
                                        class="mt-2 mb- px-4 py-1 "
                                        value="{{ $job->schedule }}"
                                        :options="['Full Time', 'Part Time']" />
                                    </div>
                    
                                    
                    
                                <div class="lg:flex">
                                    <x-textarea 
                                    wire:model='{{ $job->description }}'
                                    label=" Description" 
                                    placeholder="write your notes"
                                    class="mt-2 mb-4 px-4 py-1 "
                                    value="{{ $job->description }}"
                                     />
                    
                                    <x-textarea 
                                    wire:model='{{ $job->requirements }}'
                                    label="Requirements" 
                                    placeholder="separated by comma. ex. PHP, CSS, JavaScript,"
                                    class="mt-2 mb-1 px-4 py-1 "
                                    value="{{ $job->requirements }}"
                                    />
                    
                                    </div>
                    
                                </div>
                    
                               
                    
                    
                                <hr class="-mx-20">
                                <div class="lg:flex justify-end  py-3">
                                    <x-button
                                    type="submit"
                                    rounded="xl" 
                                    warning label="Submit" 
                                    icon="clipboard-document-check"
                                    spinner="submit"/>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                    {{-- EDIT MODAL --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pb-16">
        {{ $jobs->links() }}
    </div>
    <x-job-input />
</div>