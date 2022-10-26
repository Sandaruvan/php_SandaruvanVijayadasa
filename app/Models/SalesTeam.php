<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesTeam extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sales_teams';

    protected $fillable = [
        'name',
        'email',
        'telephoneNo',
        'joinedDate',
        'currentRoute',
        'comment'
    ];
}
