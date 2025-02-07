<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amal Valley Organization - Generate Report</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:hover {
        background-color: #f5f5f5;
    }

    .bg-gray-50 {
        background-color: #f9fafb;
    }

    .text-gray-600 {
        color: #4b5563;
    }

    .font-light {
        font-weight: 300;
    }

    .text-xs {
        font-size: 0.75rem;
    }

    .text-sm {
        font-size: 0.875rem;
    }

    .leading-normal {
        line-height: 1.5;
    }
</style>
</head>
<body class="bg-gray-50">
    <main class="flex-1 p-8">
        <div class="flex justify-between mb-4">
            <h1 class="text-xl font-semibold">Generated Report</h1>
            {{-- <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded">Save PDF</a> --}}
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        @foreach(config('attribute_models.'.$type) as $attribute)
                            <th class="py-3 px-2 text-center whitespace-nowrap">{{ ucfirst(str_replace('_', ' ', $attribute)) }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-xs font-light">
                    @foreach($data as $rows)
                    <tr class="border-b border-gray-200 hover:bg-gray-200 transition duration-300 ease-in-out">
                        @foreach(config('attribute_models.'.$type) as $attribute)
                            <td class="py-2 px-4 text-center">{{ $rows[$attribute] }}</td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>