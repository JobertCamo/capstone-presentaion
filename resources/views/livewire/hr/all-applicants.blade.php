<?php

use Carbon\Carbon;
use App\Models\Applicant;
use App\Models\Interview;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

new #[layout('components.layout')]
 class extends Component {
    use WithPagination;

    public $q = '';
    public $link = true;


    public function delete(Applicant $applicant)
    {
        $this->authorize('delete', $applicant);

        if(Storage::exists($applicant->resume))
        {
            Storage::delete($applicant->resume);
        }

        $applicant->delete();
        $this->dispatch('delete-notif');

    }
    
    public function search($q)
    {

        $nameSearch = explode(' ', $q);

        $query = Applicant::query();

        if(count($nameSearch) == 1){
            $query->where('first_name', 'LIKE', '%'.$this->q.'%')
                    ->orWhere('last_name', 'LIKE', '%'.$this->q.'%')
                    ->orWhere('middle_name', 'LIKE', '%'.$this->q.'%')
                    ->get();
        }else{
            $query->where(function($query) use ($nameSearch) {
            $query->where('first_name', 'LIKE', '%' . $nameSearch[0] . '%')
                  ->where('last_name', 'LIKE', '%' . $nameSearch[count($nameSearch) - 1] . '%');
            });
        }
        
        
        $this->link = false;
        return $query->get();
    }

    public function getApplicant()
    {
        $applicant = Applicant::latest()->simplePaginate(6);
        return $applicant;
    }
    
    public function with()
    {
        $now = Carbon::now();
        !empty($this->q) ? $applicant = $this->search($this->q) : $applicant = $this->getApplicant();

        return [
            'applicants' => $applicant,
            'upcomingInterviews' => Interview::where('interview_date', '>', $now)->orderBy('interview_date', 'ASC')->get(),
        ];
    }
    
}; ?>

<div class="overflow-y-auto  ">
    <x-notification on="delete-notif" >
        <x-alert title="Applicant Deleted!" negative solid />
    </x-notification>
    <div class="h-[50px] flex items-center text-lg bg-white drop-shadow-lg mx-2 mb-5 rounded-xl px-4">
        <a href="" class="font-bold">Applicant Tracking</a>
        <x-heroicon-s-slash class="size-5"/>
        <a href="">Candidate</a>
    </div>

    {{-- <div class="flex  lg:flex-row md:flex-row md:flex-wrap  justify-center items-center flex-col">
        <div class="candidate-card">
            <p>Candidates</p>
            <div>123</div>
        </div>
        <div class="candidate-card">
            <p>Interview Passed</p>
            <div>123</div>
        </div>
        <div class="candidate-card">
            <p>Interview Failed</p>
            <div>123</div>
        </div>
        <div class="candidate-card">
            <p>Not Attended</p>
            <div>123</div>
        </div>
    </div> --}}

    <div class=" justify-around flex flex-col lg:flex-row p-2 items-center space-x-3 space-y-10 md:flex-wrap ">
        <div x-data="{schedModal: false}" class=" flex gap-2 flex-col lg:flex-row">
            <div class="justify-center bg-white drop-shadow-lg rounded-xl flex flex-col lg:flex-row p-3 items-center lg:space-x-3 space-y-10 lg:space-y-0 md:flex-wrap w-full md:w-[700px] md:max-h-[328px]"> <!--binago ko height-->
                <!-- Left Content -->
                <div class="w-full h-full overflow-hidden ">
                    <div class="flex items-center justify-between">
                        <div>
                            <h1 class="flex text-xl font-bold items-center p-2 mx-2">
                            <x-heroicon-o-calendar-days class="size-6" /> Scheduled Interview
                        </div>
                    </div>
                    </h1>
                    <div class=" rounded-xl flex flex-col  p-2 overflow-auto max-h-[230px] soft-scrollbar gap-2" >
                        @foreach ($upcomingInterviews as $interviews)
                        <a @click="schedModal = true">
                            <div class="rounded-xl shadow-lg border-[2px] p-2 hover:bg-orange-100">
                                <div class="flex items-center justify-between flex-wrap">
                                    <div class="flex items-center space-x-2">
                                        <x-heroicon-o-building-office class="size-8" />
                                        <div>
                                            <p class="font-semibold text-base">{{ $interviews->applicant->first_name . $interviews->applicant->last_name }}</p>
                                            <div class="flex items-center space-x-3 text-gray-400 text-sm">
                                            <p>{{ $interviews->interview_date->format('F d, Y - h:i A') }}</p>
                                            </div>
                                            <div class="flex gap-1 text-sm text-gray-400">
                                            <p class="font-semibold">Location:</p>
                                            <p>{{ $interviews->location }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 lg:mt-0">
                                        <x-badge flat primary label="{{ $interviews->status }}" />
                                    </div>
                                    <div class="text-center">
                                        <p class="font-semibold text-base">{{ $interviews->interviewer }}</p>
                                        <p class="text-gray-400 text-xs">Interviewer</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                        @endforeach
                        
                    </div>
                </div>
            </div>
            {{-- Interview MODAL --}}
            <div x-show="schedModal" x-cloak x-transition class="absolute -left-4 inset-0 z-10 flex items-center justify-center bg-black/40">
                <x-modals.modal >
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <div class="text-xl font-bold">
                                Applicant Info
                            </div>
                            <div>
                                <x-button label="Resume" />
                            </div>
                        </div>
                        <ul class="space-y-2">
                            <li>Name:Ronald Tate</li>
                            <li>Job Position:Randy Burton</li>
                            <li>Email:mena@duca.zw</li>
                            <li>08/05/2024 02:45:40</li>
                        </ul>
                        <div class="space-x-3">
                            <x-button label="Passed" positive />
                            <x-button label="Failed" negative />
                            <x-button label="Canceled" secondary />
                        </div>
                    </div>
                </x-modals.modal>
            </div>
            {{-- Interview MODAL --}}
            <div class="w-full lg:w-1/3 flex-grow sm:flex-grow">
                <x-calendar-date />
            </div>
        </div>

        {{-- <div class=" flex-grow sm:flex-grow">
            <x-calendar-date />
        </div> --}}
    </div>

    <div class="mx-1 mt-5 justify-between flex bg-white py-2 px-2 rounded-xl">
        <div>
            <x-input wire:model='q' icon="magnifying-glass" placeholder="Candidate name" />
        </div>
        <div>
            <div x-data="{ open: false }" class="w-full hidden lg:flex items-center justify-center">
                <x-button x-on:click="open = ! open" amber label="Update Status"></x-button>
                <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex items-center justify-center bg-black/40">
                    <div @click.away="open = false" class="modal-add2 mt-20 flex justify-center items-center p-3 rounded-2xl">
                        <div>
                            <form action="">
                                <fieldset class=" p-4 border-2 border-amber-400 rounded-2xl">
                                    <legend class="font-bold text-2xl text-amber-600">Update Applicant Status</legend>
                                    <div class="flex space-x-3 text-black">
                                        <div>
                                            <x-input wire:model.live='q' icon="user" label="Name" placeholder="Candidate name" />
                                        </div>
                                        <div>
                                            <x-select label="Select Status" placeholder="Select one status">
                                                <x-select.option label="Passed" value="1" />
                                                <x-select.option label="Failed" value="2" />
                                                <x-select.option label="Not Attended" value="3" />
                                            </x-select>
                                        </div>
                                    </div>

                                </fieldset>
                                <div class="flex justify-end items-center m-2">
                                    <x-button emerald label="Submit" />
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="h-[70%] mt-5 w-full overflow-x-auto hide-scrollbar">
        <div class="flex flex-col ">
            <div class=" overflow-x-auto">
                <div class="min-w-full inline-block align-middle h-screen">
                    <div class="overflow rounded-xl ">
                        <table class=" min-w-full ">
                            <thead class="sticky top-0">
                                <tr class="bg-gradient-to-r from-yellow-300 to-amber-400">
                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Name
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Contact no.
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Email
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Status
                                    </th>
                                    <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">
                                        Score
                                    </th>
                                    <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300 text-center" wire:poll>
                                @if (!empty($applicants))
                                    @foreach ($applicants as $applicant)
                                    <x-tables.table-data :$applicant />
                                    @endforeach
                                @else
                                     NO DATA FOUND.
                                @endif
                            </tbody>
                        </table>
                        <div class=" bg-white">
                            @if ($link)
                                <div class="mx-3 pb-2">
                                    {{ $applicants->links() }}
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

