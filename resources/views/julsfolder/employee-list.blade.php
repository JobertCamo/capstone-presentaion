<x-layout>
    <div class=" mx-auto p-2">
        <div class="h-[50px] flex items-center text-lg bg-white drop-shadow-lg mx-5 mb-5 rounded-xl px-4">
            <a href="" class="font-bold">Employee List Tracking</a>
            <x-heroicon-s-slash class="size-5"/>
            <a href="">Employee List</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4 mx-4">
            <div class="bg-white p-6 rounded-lg shadow flex items-center">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h2 class="text-lg font-bold">1012</h2>
                        <p class="text-gray-500">New Employees</p>
                    </div>
                    <div class="text-right text-green-500">+30%</div>
                    <div>
                        <h2 class="text-lg font-bold">102</h2>
                        <p class="text-gray-500">Resigned Employees</p>
                    </div>
                    <div class="text-right text-green-500">+22%</div>
                    <div>
                        <h2 class="text-lg font-bold">23</h2>
                        <p class="text-gray-500">Employees on Leave</p>
                    </div>
                    <div class="text-right text-green-500">+18%</div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow flex flex-grow items-center justify-center">
                <canvas id="employeeTrackerChart"></canvas>
            </div>
            <div class="bg-white p-6 rounded-lg shadow space-y-3 md:col-span-4 lg:col-span-1">
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-gray-100 rounded-full">
                        <img src="{{asset('images/young-man.png')}}" alt="" class="rounded-full w-9">
                    </div>
                    <div>
                        <p class="text-gray-500">18-25 Young Adults </p>
                        <h2 class="text-2xl font-bold">22</h2>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-gray-100 rounded-full">
                        <img src="{{asset('images/adult.png')}}" alt="" class="rounded-full w-9">
                    </div>
                    <div>
                        <p class="text-gray-500">26-35 Emerging Adults</p>
                        <h2 class="text-2xl font-bold">25</h2>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="p-3 bg-gray-100 rounded-full">
                        <img src="{{asset('images/avatar.png')}}" alt="" class="rounded-full w-9">
                    </div>
                    <div>
                        <p class="text-gray-500">36-45 Established Adults</p>
                        <h2 class="text-2xl font-bold">22</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-6 bg-white p-6 rounded-lg shadow mx-4 h-screen">
            <div class="flex justify-between">
                <div>
                    <h3 class="text-lg font-bold mb-4">Employees List</h3>
                </div>
                <div>
                    <div x-data="{ open: false }" class="w-full hidden lg:flex">
                        <x-button x-on:click="open = ! open" amber label="Add Employee"></x-button>
                        <div x-cloak x-transition x-show="open" class="absolute inset-0 z-10 flex justify-center bg-black/40">
                            <div @click.away="open = false" class="modal-add mt-20 lg:w-fit w-fit h-fit flex justify-center items-center p-3 rounded-2xl">
                                <x-modal-form>
                                </x-modal-form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-candidate-table>
                <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">Name</th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">Contact no.</th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">Email</th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">Department</th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">Score</th>
                <th scope="col" class="p-5 text-center text-sm leading-6 font-semibold text-gray-900 capitalize">Interview Status</th>
                <th scope="col" class="p-5 text-sm leading-6 font-semibold text-gray-900 capitalize text-center">Action</th>
            </x-candidate-table>
        </div>

    </div>
</x-layout>
<script defer>
try {
    // Employee Tracker Chart
    const employeeTrackerCtx = document.getElementById('employeeTrackerChart').getContext('2d');
    const employeeTrackerChart = new Chart(employeeTrackerCtx, {
        type: 'bar',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'Employee Tracker',
                data: [12, 19, 3, 5, 2, 3, 7],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

// HAHAAHAHHHAHHAHAHAH EWAN KO BASTA DAPAT DUNAT CHART TO SA AGE KASO NEXTIME NALANG
    // const ageDistributionCtx = document.getElementById('ageDistributionChart').getContext('2d');
    // const ageDistributionChart = new Chart(ageDistributionCtx, {
    //     type: 'doughnut',
    //     data: {
    //         datasets: [{
    //             label: 'Age Distribution',
    //             data: [50, 70, 40, 30, 10],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //                 'rgba(153, 102, 255, 0.2)'
    //             ],
    //             borderColor: [
    //                 'rgba(255, 99, 132, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //                 'rgba(153, 102, 255, 1)'
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         maintainAspectRatio: true,
    //         cutout: '60%', // Change this value to adjust the inner radius size
    //         plugins: {
    //             legend: {
    //                 position: 'top',
    //             },
    //             title: {
    //                 display: true,
    //                 text: 'Employee Age Group Distribution'
    //             }
    //         }
    //     }
    // });
} catch (error) {
    console.error('Error rendering chart:', error);
}
</script>
