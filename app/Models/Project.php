<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'client_id',

    ];

    public function user(){
        return $this->belongsTo(User::class, 'client_id');
    }
    public function tasks(){
        return $this->hasMany(Task::class, 'project_id');
    }
}
