<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'number_order',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
