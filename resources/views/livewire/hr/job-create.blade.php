<?php

use App\Models\Job;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[layout('components.layout')]
 class extends Component {

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

        $job = Job::create(Arr::except($data, 'tags'));

        if(!empty($data['tags']))
        {
            foreach (explode(',', strtolower($data['tags'])) as $requirement) {
                $job->tag(trim($requirement));
            }
        }

    }

}; ?>
<div class="h-full w-full ">
    <div class="h-[8%] flex items-center text-lg bg-gradient-to-r from-yellow-300 to-amber-400 m-5 rounded-xl px-4">
        <a href="" class="font-bold">Recruitment</a> <!-- Breadcrumb: "Applicant Tracking" as a clickable link -->
        <x-heroicon-s-slash class="size-5"/> <!-- Slash icon used as a separator between breadcrumbs -->
        <a href="">Job Create</a> <!-- Breadcrumb: "Candidates" as a clickable link -->
    </div>
    <div class="h-screen flex flex-col overflow-auto  m-2">
        <div class="w-full lg:h-full md:h-full md:items-center md:justify-center sm:h-full h-fit flex justify-center lg:items-center bg-black">
            <form action="" wire:submit='submit'>
                <div class="flex p-3 lg:space-x-4 flex-col lg:flex-row md:flex-row md:space-x-4">
                    <div class="">
                        <div>
                            <div class="w-52">
                                <x-input wire:model='title' label="Title" icon="user" />
                            </div>
                            <div class="w-52">
                                <x-input wire:model='requirements' label="Job Requirements" icon="user" />
                            </div>
                        </div>
                        <div>
                            <div class="w-52">
                                <x-input wire:model='salary' label="Salary" icon="user" />
                            </div>
                            <div class="w-52">
                                <x-input wire:model='location' label="Location" icon="user" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="w-52">
                                <x-native-select wire:model='schedule' placeholder="Select Schedule" label="schedule" icon="user" :options="['Full Time', 'Part Time']" />
                            </div>
                            <div class="w-52">
                                <x-textarea wire:model='description' label="Job Description" placeholder="Job Descrtiption" icon="user" />
                            </div>
                            <div class="w-52">
                                <x-input wire:model='tags' label="Tags" icon="user" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <x-button type="submit" primary label="Submit" spinner="submit" />
                </div>
            </form>
        </div>
    </div>

</div>
