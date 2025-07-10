<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\TransportAssign;
use App\Models\RequestBeneficiary;
use App\Models\Activity;
use App\Models\Beneficiary;


class adminController extends Controller
{
    public function homepage()
    {
        $volunteersCount = Actor::join('accounttype', 'actor.accountID', '=', 'accounttype.accountID')
            ->where('accounttype.accountType', 'volunteers')
            ->count();
        $beneficiariesCount = Actor::join('accounttype', 'actor.accountID', '=', 'accounttype.accountID')
            ->where('accounttype.accountType', 'beneficiaries')
            ->count();
        $awaitingResponse = Beneficiary::where('statusID', 5)->orWhereNull("incomeGroupID")
            ->count();
        $topVolunteers = Activity::orderBy('volunteerCount', 'desc')
            ->take(5)
            ->get();
        $topBeneficiaries = Activity::orderBy('beneficiaryCount', 'desc')
            ->take(5)
            ->get();
// dd($topVolunteers[1]->volunteerCount);

        return view('admin.dashboard', compact('volunteersCount', 'beneficiariesCount', 'awaitingResponse', 'topVolunteers', 'topBeneficiaries'));
    }
}
