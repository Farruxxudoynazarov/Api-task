<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'leader_name',
        'address',
        'email',
        'website',
        'phone_number',
    ];


    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
