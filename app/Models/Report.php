<?php

namespace App\Models;

use App\Models\Filters\Report\ReportSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable  = [
        'file',
        'line',
        'code',
        'message',
    ];

    public function project(){
        return $this->belongsTo(Project::class,'project_id','id');
    }

    public function search($request){
        return (new ReportSearch())->apply($request)->orderBy('created_at', 'DESC');
    }
}
