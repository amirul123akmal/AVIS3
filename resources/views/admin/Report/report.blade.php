<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amal Valley Organization - Generate Report</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Add FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Add Chart.js for visualizations -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Custom color for #1f6d84 */
        .bg-custom { background-color: #1f6d84; }
        .text-custom { color: #1f6d84; }
        .hover\:bg-custom:hover { background-color: #1a5a6d; }
        .focus\:ring-custom:focus { ring-color: #1f6d84; }
    </style>
</head>
<body class="bg-gray-50">
    <x-admin-sidebar>
        <x-admin-navbar/>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <!-- Page Header -->
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-semibold text-custom">Generate Report</h2>
            </div>

            <!-- Report Generation Form -->
            <div class="bg-white rounded-lg shadow-md p-8 max-w-4xl mx-auto">
                <!-- Step 1: Select Report Type and Filters -->
                <form method="POST" action="{{ route('admin.report.generate') }}">
                    @csrf
                    <div id="step1" class="step">
                        <h3 class="text-2xl font-semibold text-custom mb-6">Select Report Type and Filters</h3>

                        <!-- Dropdown for Report Type -->
                        <div class="mb-6">
                            <label for="reportType" class="block text-gray-700 mb-2">Type of Report</label>
                            <div class="relative">
                                <select name="reportType" id="reportType" class="w-full p-3 bg-gray-100 rounded-md appearance-none focus:ring-2 focus:ring-custom focus:outline-none">
                                    <option>Select report type</option>
                                    <option value="activity">Activity Report</option>
                                    <option value="transport">Transport Report</option>
                                    <option value="volunteer">Volunteer Report</option>
                                    <option value="beneficiary">Beneficiary Report</option>
                                    <option value="all">Combined Report</option>
                                </select>
                                <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                            </div>
                        </div>

                        <!-- Toggle for Date Range -->
                        <div class="flex items-center justify-between mb-6">
                            <span class="text-gray-700">Report by date range</span>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" id="dateRangeToggle" name="dateRangeToggle">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-green-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                            </label>
                        </div>

                        <!-- Date Range Fields -->
                        <div id="dateRangeFields" class="hidden mb-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="startDate" class="block text-gray-700 mb-2">Start Date</label>
                                    <input type="date" name="startDate" id="startDate" class="w-full p-3 bg-gray-100 rounded-md focus:ring-2 focus:ring-custom focus:outline-none">
                                </div>
                                <div>
                                    <label for="endDate" class="block text-gray-700 mb-2">End Date</label>
                                    <input type="date" name="endDate" id="endDate" class="w-full p-3 bg-gray-100 rounded-md focus:ring-2 focus:ring-custom focus:outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-between mt-6">
                        <button id="prevStep" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 hidden">Previous</button>
                        <button id="nextStep" type="submit" class="px-6 py-2 bg-custom text-white rounded-md hover:bg-custom-dark">Next</button>
                    </div>
                </form>

                <!-- Step 2: Preview & Export -->
                <div id="step2" class="step hidden">
                    <h3 class="text-2xl font-semibold text-custom mb-6">Preview & Export</h3>

                    <!-- Report Preview -->
                    <div id="reportPreview" class="bg-gray-50 p-4 rounded-lg mb-6">
                        <h4 class="text-lg font-semibold text-gray-800 mb-4">Report Preview</h4>
                        <p class="text-gray-600">No data selected. Adjust filters to see a preview.</p>
                    </div>

                    <!-- Export Options -->
                    <div class="flex justify-end space-x-4">
                        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Export as PDF</button>
                        <button type="button" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Export as Excel</button>
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <div class="flex justify-between mt-6">
                    <button id="prevStep" class="px-6 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 hidden">Previous</button>
                    {{-- <button id="nextStep" type="submit" class="px-6 py-2 bg-custom text-white rounded-md hover:bg-custom-dark">Next</button> --}}
                </div>
            </div>
        </main>
    </x-admin-sidebar>

    <script>
        // // Multi-Step Form Logic
        // let currentStep = 1;
        // document.getElementById('nextStep').addEventListener('click', () => {
        //     document.getElementById(`step${currentStep}`).classList.add('hidden');
        //     currentStep++;
        //     document.getElementById(`step${currentStep}`).classList.remove('hidden');
        //     document.getElementById('prevStep').classList.remove('hidden');
        //     if (currentStep === 2) document.getElementById('nextStep').textContent = 'Generate';
        // });
        // document.getElementById('prevStep').addEventListener('click', () => {
        //     document.getElementById(`step${currentStep}`).classList.add('hidden');
        //     currentStep--;
        //     document.getElementById(`step${currentStep}`).classList.remove('hidden');
        //     if (currentStep === 1) document.getElementById('prevStep').classList.add('hidden');
        //     document.getElementById('nextStep').textContent = 'Next';
        // });

        // Toggle for Date Range Fields
        const dateRangeToggle = document.getElementById('dateRangeToggle');
        const dateRangeFields = document.getElementById('dateRangeFields');
        dateRangeToggle.addEventListener('change', function () {
            dateRangeFields.classList.toggle('hidden', !this.checked);
            if (!this.checked) {
                // Clear date fields if toggle is off
                document.getElementById('startDate').value = '';
                document.getElementById('endDate').value = '';
            }
        });

        // Form Submission
        document.getElementById('reportForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Report generated successfully!');
        });
    </script>
</body>
</html>