<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // protected $table = 'company';

    protected $fillable = [
        'name', 'email', 'logo', 'website'
    ];

    // Company has many employees
    public function getEmployees() {
        return $this->hasMany(Employee::class);
    }
}
