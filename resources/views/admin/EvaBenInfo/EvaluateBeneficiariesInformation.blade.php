<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluate Beneficiary</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .hidden {
            display: none;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin: 5px;
            background-color: #1f6d84;
            color: white;
        }
        .personal-info {
            display: flex;
            align-items: center;
            background-color: #e6d4e7;
            padding: 15px;
            border-radius: 10px;
        }
        .profile-icon {
            width: 50px;
            height: 50px;
            background-color: black;
            border-radius: 50%;
            margin-right: 15px;
        }
        .personal-details {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        .document-section {
            background-color: rgba(31, 109, 132, 0.66);
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .document-item {
            display: flex;
            justify-content: space-between;
            background-color: #1e3a50;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            color: white;
        }
        .download {
            background-color: #1f6d84;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<x-admin-sidebar>
    <x-admin-navbar />
    <div class="container">
        <h2>Evaluate Beneficiary</h2>
        <div class="personal-info">
            <div class="personal-details">
                <p><strong>Full Name:</strong> <span>{{ $beneficiary->actor->fullname ?? 'N/A' }}</span></p>
                <p><strong>IC Number:</strong> <span>{{ $beneficiary->actor->ic ?? 'N/A' }}</span></p>
                <p><strong>Phone Number:</strong> <span>{{ $beneficiary->actor->phoneNumber ?? 'N/A' }}</span></p>
                <p><strong>Email:</strong> <span>{{ $beneficiary->actor->login->email ?? 'N/A' }}</span></p>
                <p><strong>Address:</strong> <span>{{ $beneficiary->actor->address->road ?? 'N/A' }}</span></p>
            </div>
        </div>
        <div class="document-section">
            <h3>Document</h3>
            <div class="document-item">
                <span>Income Document</span>
                @if(isset($beneficiary->requestBeneficiary->incomeDocument))
                    <a href="{{ route('admin.downloadBenInfo', ['benID' => $beneficiary->benID, 'filename' => $beneficiary->requestBeneficiary->incomeDocument]) }}" class="download">Download</a>
                @else
                    <span style="color: #ff6b6b;">Beneficiary still hasn't insert Income Document</span>
                @endif
            </div>
            <div class="document-item">
                <span>Asnaf Document</span>
                @if(isset($beneficiary->requestBeneficiary->asnafCardDocument))
                <a href="{{ route('admin.downloadBenInfo', ['benID' => $beneficiary->benID, 'filename' => $beneficiary->requestBeneficiary->asnafCardDocument]) }}" class="download">Download</a>
                @else
                    <span style="color: #ff6b6b;">Beneficiary still hasn't insert Income Document</span>
                @endif
            </div>
            <div class="document-item">
                <span>Support Document</span>
                @if(isset($beneficiary->requestBeneficiary->supportDocument))
                <a href="{{ route('admin.downloadBenInfo', ['benID' => $beneficiary->benID, 'filename' => $beneficiary->requestBeneficiary->supportDocument]) }}" class="download">Download</a>
                @else
                    <span style="color: #ff6b6b;">Beneficiary still hasn't insert Income Document</span>
                @endif
            </div>
        </div>
        <form action="{{ route('admin.evaluateBeneficiaryAction', ['benID' => $beneficiary->benID]) }}" method="POST">
            @csrf
            <div class="actions">
                <button class="btn" type="button" onclick="showIncomeGroup()">Approve</button>
                <button class="btn" type="submit" name="action" value="reject">Reject</button>
            </div>
            <div id="income-group" class="hidden">
                <h3>Income Group</h3>
                <select name="incomeGroup">
                    <option value="">-Select income group-</option>
                    @foreach($incomegrp as $group)
                        <option value="{{ $group->incomeGroupID }}">{{ $group->groupType }}</option>
                    @endforeach
                </select>
                <button class="btn" type="submit" name="action" value="approve">Submit</button>
            </div>
        </form>
    </div>
</x-admin-sidebar>

<script>
    function showIncomeGroup() {
        document.getElementById('income-group').classList.remove('hidden');
    }
</script>

@if ($errors->any())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        swal.fire({
            icon: 'warning',
            title: 'Validation Errors',
            text: '{{ $errors->first() ?? 'An unknown error occurred.' }}',
            confirmButtonText: 'OK'
        });
    });
</script>
@endif