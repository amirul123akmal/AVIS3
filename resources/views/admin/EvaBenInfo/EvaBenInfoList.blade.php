<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluate Beneficiary</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #1f6d84;
            height: 100vh;
            padding: 20px;
        }
        .sidebar h2 {
            color:rgb(255, 255, 255);
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            padding: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            display: flex;
            align-items: center;
        }
        .sidebar ul li:hover {
            background-color: #8fa8b3;
        }
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .search-bar {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .beneficiary-list {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .beneficiary {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: #fff;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
        }
        .evaluate-btn {
            background-color: #d8b3d8;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <x-admin-sidebar>
        <x-admin-navbar />
        <div class="content">
            <div class="header">
                <h1>Evaluate Beneficiary</h1>
            </div>
            <input type="text" class="search-bar" placeholder="Search User Name" onkeyup="filterBeneficiaries()">
            <div class="beneficiary-list" id="beneficiaryList">
                @foreach($beneficiaries as $beneficiary)
                    <div class="beneficiary">
                        <span class="beneficiary-name">{{ $beneficiary->actor->fullname }}</span>
                        <a href="{{ route('admin.evaluateBeneficiaryInfo', ['benID' => $beneficiary->benID]) }}" class="evaluate-btn">Evaluate</a>
                    </div>
                @endforeach
            </div>
        </div>
    </x-admin-sidebar>  

    <script>
        function filterBeneficiaries() {
            const input = document.querySelector('.search-bar');
            const filter = input.value.toLowerCase();
            const beneficiaryList = document.getElementById('beneficiaryList');
            const beneficiaries = beneficiaryList.getElementsByClassName('beneficiary');

            for (let i = 0; i < beneficiaries.length; i++) {
                const name = beneficiaries[i].getElementsByClassName('beneficiary-name')[0];
                if (name) {
                    const txtValue = name.textContent || name.innerText;
                    beneficiaries[i].style.display = txtValue.toLowerCase().includes(filter) ? "" : "none";
                }
            }
        }
    </script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('success'))
            alertify.success("{{ session('success') }}");
        @endif
    });
</script>
</body>
</html>