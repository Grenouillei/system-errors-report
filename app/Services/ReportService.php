<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportService
{
    public function getAll(Request $request,Report $report){
        $reports = $report->search($request)->with('project')->get()->groupBy('project.id');
            $reports->transform(function ($elements,$key){
                $res = [];
                $project = Project::find($key);
                $res['title'] = $project->title;
                $res['count'] = count($elements);
                $res['date'] = Report::where('project_id',$project->id)->orderBy('created_at','DESC')->first()->created_at;
                return $res;
            });
        return $reports;
//        return $report->search($request)->with('project')->get()->groupBy('project.title');
    }

    public function store(Request $request){
        $report = new Report();
        $report->fill($request->only($report->getFillable()));
        $report->project_id = 6;
        $report->save();
    }
}
