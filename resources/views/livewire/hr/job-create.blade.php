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

    public function delete($job)
    {
        $job = Job::where('id', $job)->first();
        $this->authorize('delete', $job);
        $job->delete();
        $this->dispatch('delete-notif');
        
        $this->redirect('/job-create');
    }

    public function with(): Array
    {
        $jobs = Job::latest()->paginate(6);
        return [
            'jobs' => $jobs,
        ];
    }

}; ?>
<div class="space-y-5" x-data="{jobCreate: false}">
    <x-notification on="update-notif" >
        <x-alert title="Job updated!" positive solid />
    </x-notification>
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
        <tbody class="divide-y divide-gray-300 text-center" >

            @foreach ($jobs as $job)
            <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 text-start">{{ $job->title }}</td>
                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">{{ Str::limit($job->description, 30) }}</td>
                <td class="p-5 whitespace-nowrap text-center text-sm leading-6 font-medium text-gray-900">{{ $job->location }}</td>
                <td>{{ $job->schedule }}</td>
                <td>{{ $job->salary }}</td>
                <td class=" p-5" x-data="{delModal: false,  editModal: false, dpdown2: false}">

                    <div x-data="{dpdown2: false}" class="relative">
                        <x-icon name="ellipsis-vertical" class="cursor-pointer mx-auto" @click="dpdown2 = true"/>
                        <div x-show="dpdown2" x-transition x-cloak class="text-black/70 roboto-slab w-40 select-none z-10 absolute -left-20 bg-white shadow-2xl border-solid border-[1px] border-black/15 px-1 py-1 rounded-md">
                            <div @click.away="dpdown2 = false" class="flex flex-col text-start space-y-2">
                                <a @click="editModal = true" class="cursor-pointer hover:bg-black/5 rounded-sm px-2">Edit</a>
                                <a wire:navigate.hover @click="delModal = true" class="cursor-pointer hover:bg-black/5 rounded-sm px-2" >Delete</a>
                            </div>
                        </div>
                    </div>
                    
                    {{-- <x-dropdown>
                        <x-dropdown.item @click="editModal = true" wire:navigate.hover  label="Edit Job" />
                        <x-dropdown.item @click="delModal = true" label="Delete" />
                    </x-dropdown> --}}


                    {{-- DELETE MODAL --}}
                    <div x-show="delModal" x-cloak x-transition class="fixed inset-0 z-10 flex gap-5 items-center justify-center">
                        <div class="shadow-lg shadow-indigo-500/40 bg-white p-12 space-x-5 text-center font-bold text-xl space-y-7">
                            <div class="text-balance">Are you sure you want to delete <br> <span class="text-red-500">{{ $job->title }}</span>?</div>
                            <div class="space-x-5">
                                <x-button @click="delModal = false" rose wire:click="delete('{{ $job->id }}')">Delete</x-button>  
                                <x-button @click="delModal = false" positive>Cancel</x-button>
                            </div>
                        </div>
                    </div>
                    {{-- EDIT COMPONENT --}}
                    <livewire:hr.edit-job :jobid=" $job->id " :title=" $job->title " :salary=" $job->salary " :location=" $job->location " :schedule=" $job->schedule " :description=" $job->description " :requirements=" $job->requirements "/>
                    {{-- EDIT COMPONENT --}}
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="pb-16">
        {{ $jobs->links() }}
    </div>
    {{-- <x-job-input /> --}}
    <livewire:hr.post-job>
</div>