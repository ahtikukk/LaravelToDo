<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\TimestampsTrait;
use App\Http\Traits\TaskTrait;

class Task extends Model
{
    use TimestampsTrait;
    use TaskTrait;

    // Ühendame mudeli andmebaasi tabeliga
    protected $table = "tasks";

}
