<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $table = "tb_m_project";
    public $timestamps = false;
    protected $primaryKey = 'project_id';
    protected $fillable = [
        'project_name','client_id','project_start','project_end','project_status'
    ];
}
