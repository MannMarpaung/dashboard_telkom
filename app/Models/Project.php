<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_project',
        'nilai_kontrak',
        'nilai_connectivity',
        'tipe_project',
        'status_project',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project_orders()
    {
        return $this->hasMany(ProjectOrder::class);
    }
}
