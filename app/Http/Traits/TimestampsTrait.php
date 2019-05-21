<?php

namespace App\Http\Traits;

use Carbon\Carbon;

/**
 * omadus objektil, mis annab muutmise ja loomise kuupäevad koos loomise kellaajaga
 */
trait TimestampsTrait{

    public $timestamps = true;

    public function getDates(){
        return ['created_at','updated_at'];
    }

    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->diffForHumans(); //annab kujul mingi minutes ago

    }
    public function getUpdatedAtAttribute(){
        return Carbon::parse($this->attributes['updated_at'])->diffForHumans();
        
    }
        
}
    

