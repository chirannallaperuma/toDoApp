<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskModel extends Model
{
    protected $table = 'tbdb_tasks';

    protected $fillable = [
        'title','description','completed'
    ];
}
