<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ManagerContactModel extends Model
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
