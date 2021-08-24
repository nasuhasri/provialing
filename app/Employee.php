<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'comp_id'
    ];

    // Each employee belongs to one company
    public function getCompany() {
        return $this->belongsTo(Company::class);
    }
}
