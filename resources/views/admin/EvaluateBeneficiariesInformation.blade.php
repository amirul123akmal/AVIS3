<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Enquiries</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold mb-6">Enquiries</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Enquiry Card -->
            <div class="card bg-white shadow-lg rounded-lg overflow-hidden cursor-pointer hover:shadow-xl transition-shadow duration-300"
                onclick="viewEnquiry('C6B8729A-D022-44D4-80C1-D1AB14AD4F1D')">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">Johnny</h2>
                    <p class="text-gray-600">Evaluated</p>
                </div>
            </div>
            <!-- Add more enquiry cards here -->
        </div>
    </div>

    <script>
        function viewEnquiry(enquiryId) {
            // Navigate to the detailed enquiry page
            window.location.href = `/enquiry-details/${enquiryId}`;
        }
    </script>

</body>

</html>
