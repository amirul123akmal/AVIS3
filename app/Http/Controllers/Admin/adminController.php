<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\TransportAssign;
use App\Models\RequestBeneficiary;
use App\Models\Activity;


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
        $awaitingResponse = RequestBeneficiary::join('beneficiary', 'requestbeneficiary.benID', '=', 'beneficiary.benID')
            ->where('beneficiary.statusID', '!=', 3)
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
