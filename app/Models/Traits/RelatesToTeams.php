<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Auth;

trait RelatesToTeams{

    public function scopeForCurrentTeam($query){
        $query->where('team_id', Auth::user()->currentTeam->id);
    }

}
