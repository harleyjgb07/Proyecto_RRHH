<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Contract;

class Collaborator extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'document_type',
        'document_number',
        'birth_date',
        'email',
        'phone_number',
        'address',
    ];

    /**
     * Un Collaborator puede tener muchos Contracts
     */
    public function contracts(): HasMany
    {
        return $this->hasMany(Contract::class);
    }
}