<div class="w-full h-full flex items-center justify-center"> <!-- Set explicit height -->
    <canvas id="myChart" class="w-full h-full shrink-0"></canvas>
</div>


<script defer>
    try {
        const ctx = document.getElementById('myChart').getContext('2d');

        // Sample data for the chart
        const data = [
            { month: 'January', count: 30 },
            { month: 'February', count: 45 },
            { month: 'March', count: 60 },
            { month: 'April', count: 40 },
            { month: 'May', count: 50 },
            { month: 'June', count: 70 },
            { month: 'July', count: 65 },
            { month: 'August', count: 55 },
            { month: 'September', count: 75 },
            { month: 'October', count: 85 },
            { month: 'November', count: 90 },
            { month: 'December', count: 95 }
        ];

        // Initialize the chart
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: data.map(row => row.month),
                datasets: [
                    {
                        label: 'Monthly Data',
                        data: data.map(row => row.count),
                        backgroundColor: 'rgba(0, 0, 0, 0.1)', // Light black background for the line
                        borderColor: 'rgba(0, 0, 0, 1)', // Black line
                        borderWidth: 2
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true, // Allows the chart to resize properly
                animation: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: 'black' // Make the legend text black
                        }
                    },
                    tooltip: {
                        enabled: true,
                        backgroundColor: 'white', // Black tooltip background
                        titleColor: 'white', // White text inside tooltips
                        bodyColor: 'white'
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            color: 'black' // Make x-axis labels black
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'black' // Make y-axis labels black
                        }
                    }
                }
            }
        });

        // Handle window resize to ensure the chart resizes properly
        window.addEventListener('resize', () => {
            myChart.resize();
        });
    } catch (error) {
        console.error('Error rendering chart:', error);
    }
</script>
