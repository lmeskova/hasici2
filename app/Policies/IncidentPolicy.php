<?php

namespace App\Policies;

use App\Incident;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IncidentPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAll($user)
    {
        return $user->group_id;
    }

    public function update($user, Incident $incident)
    {
        return $user->group_id == User::GROUP_REGION_MANAGER || $this->incidentBelongsToDistrictManager($user, $incident);
    }


    public function show($user, Incident $incident)
    {
        return $user->group_id == User::GROUP_REGION_MANAGER || $user->group_id == User::GROUP_MINISTER || $this->incidentBelongsToDistrictManager($user, $incident);
    }


    public function destroy($user, Incident $incident)
    {
        return $user->group_id == User::GROUP_REGION_MANAGER || $this->incidentBelongsToDistrictManager($user, $incident);
    }



    private function incidentBelongsToDistrictManager($user, Incident $incident)
    {
        return $user->group_id == User::GROUP_DISTRICT_MANAGER && $user->district_id == $incident->town->district->id;
    }


}
