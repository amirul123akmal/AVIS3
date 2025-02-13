<?php

return [
    'activity' => [
        'activityID',
        'activityName',
        'activityPlace',
        'dateStart',
        'dateEnd',
        'timeStart',
        'timeEnd',
        'volunteerCount',
        'beneficiaryCount',
        'activityDescription',
        'created_at',
        'updated_at',
    ],
    'transport' => [
        'transID',
        'vehicleID',
        'driverID',
        'vehiclePlateNumber',
        'vehicleCapacity',
        'vehicleDesc',
        'vehicleStatus',
        'created_at',
        'updated_at',
    ],
    'volunteer' => [
        'actorID',
        'fullname',
        'ic',
        'phoneNumber',
        'statusType',
        'created_at',
        'updated_at',
    ],
    'beneficiary' => [
        'actorID',
        'fullname',
        'ic',
        'phoneNumber',
        'statusType',
        'created_at',
        'updated_at',
    ],
];