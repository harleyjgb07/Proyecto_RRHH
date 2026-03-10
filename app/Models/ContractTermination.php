<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractTermination extends Model
{
    protected $fillable = [
        'contract_id',
        'termination_reason',
        'termination_date'
    ];
}