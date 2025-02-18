<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    protected $table = 'project_files';
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}