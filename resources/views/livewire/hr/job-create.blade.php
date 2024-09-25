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

<div class="bg-red-400 p-3">
    <form action="" wire:submit='submit'>
        <div class="w-52">
            <x-input wire:model='title' label="Title" icon="user" />
        </div>
        <div class="w-52">
            <x-input wire:model='requirements' label="Job Requirements" icon="user" />
        </div>
        <div class="w-52">
            <x-input wire:model='salary' label="Salary" icon="user" />
        </div>
        <div class="w-52">
            <x-input wire:model='location' label="Location" icon="user" />
        </div>
        <div class="w-52">
            <x-native-select wire:model='schedule' placeholder="Select Schedule" label="schedule" icon="user" :options="['Full Time', 'Part Time']" />
        </div>
        <div class="w-52">
            <x-textarea wire:model='description' label="Job Description" placeholder="Job Descrtiption" icon="user" />
        </div>
        <div class="w-52">
            <x-input wire:model='tags' label="Tags" icon="user" />
        </div>
        <div>
            <x-button type="submit" primary label="Submit" spinner="submit" />
        </div>
    </form>
</div>