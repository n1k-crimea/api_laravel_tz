<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use Filterable;
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'deadline',
    ];

    protected $filterFields = [
        'status' => ['$eq', '$lte', '$gte'],
        'deadline' => ['$eq', '$lte', '$gte'],
    ];
}
