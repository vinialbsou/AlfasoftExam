<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagerContact extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'contact', 'email'];

        protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    protected $table = 'manager_contacts';
}
