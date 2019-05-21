<?php

namespace App\Http\Traits;

use Carbon\Carbon;

/**
 * omadus objektil, mis annab muutmise ja loomise kuupäevad koos loomise kellaajaga
 */
trait TaskTrait{

    public $dueDateFormatting = true;

    public function getDueDateAttribute($value){
        if($this->dueDateFormatting){
            return Carbon::parse($value)->toFormattedDateString();
        }
        else{
            return $this->attributes['due_date'] = $value;
        }

    }
            
}
    