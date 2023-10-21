<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRenewal extends Model
{
    use HasFactory;

    public function employee(){
        return $this->hasOne(Employee::class);
    }
}
