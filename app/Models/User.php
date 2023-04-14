<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $guarded = [
        'password'
    ];

    public function actingAs(...$roles)
    {
        $this->role = 'Admin';

        return in_array($this->role, $roles);
    }
}