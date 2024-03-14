<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DASHBOARD') }}
        </h2>
    </x-slot>

<!-- Updated button elements with the 'filter-btn' class -->
<div class="flex justify-between px-8 mt-5">
<div class="flex justify-start">

        <button id="refreshButton" class="filter-btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-1" data-filter="daily">
        Daily
        </button>
        <script>
            document.getElementById("refreshButton").addEventListener("click", function() {
              location.reload();
            });
            </script>
    <button id="refreshButton1" class="filter-btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-1" data-filter="weekly">
        Weekly
    </button>
    <script>
        document.getElementById("refreshButton1").addEventListener("click", function() {
          location.reload();
        });
        </script>
    <button id="refreshButton2" class="filter-btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-1" data-filter="monthly">
        Monthly
    </button>
    <script>
        document.getElementById("refreshButton2").addEventListener("click", function() {
          location.reload();
        });
        </script>
    <button id="refreshButton3" class="filter-btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mr-1" data-filter="yearly">
        Yearly
    </button>
    <script>
        document.getElementById("refreshButton3").addEventListener("click", function() {
          location.reload();
        });
        </script>
</div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div id="chart_div" class="p-10 b"></div>
<script>
    // Load the visualization library
    google.charts.load('current', {packages: ['corechart', 'bar']});

    // Set a callback to run when the Google Visualization API is loaded
    google.charts.setOnLoadCallback(drawMaterial);

    // Callback that creates and populates a data table,
    // instantiates the bar chart, passes in the data and
    // draws it
    function drawMaterial() {
        // Create the data table with base price and price
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Product Sales');
        data.addColumn('number', 'Base Price');
        data.addColumn('number', 'Price');

        // Modify data here to reflect base price and price
        data.addRows([
            ['1st', 2100, 2300],
            ['2nd', 3200, 3400],
            ['3rd', 3400, 3600],
            ['4rth', 2300, 2500],
            ['5th', 1950, 2100],
            ['6th', 3400, 3800],

        ]);

        // Calculate total earnings
        var totalEarnings = 0;
        for (var i = 0; i < data.getNumberOfRows(); i++) {
            totalEarnings += data.getValue(i, 1) + data.getValue(i, 2);
        }

        // Display total earnings
        var totalEarningsDiv = document.createElement('div');
        // totalEarningsDiv.innerHTML = 'TOTAL EARNINGS: ₱' + totalEarnings.toFixed(2);
        document.body.appendChild(totalEarningsDiv);

        // Set chart options
        var options = {
            title: 'Sales Graph',
            hAxis: {
                title: '',
            },
            vAxis: {
                title: 'Price'
            }
        };

        // Instantiate and draw the chart
        var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
        materialChart.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">

                    <livewire:edit-dashboard />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
