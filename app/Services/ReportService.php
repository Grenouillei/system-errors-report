<?php

namespace App\Services;

use App\Exports\ReportExport;
use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;
use Excel;

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

    public function getContentForChart(Request $request,Report $report){
        $reports = $report->search($request)->with('project')->get()->groupBy('project.title');
            $reports->transform(function ($elements,$key){
                $project = Project::where('title',$key)->first();
                return [
                    'count' => count($elements),
                    'color' => $project ? $project->color : '#000'
                ];
            });
        return $reports;
    }

    public function getExactlyContent(Request $request){
        $project = Project::findOrFail($request->id);
        $reports = Report::where('project_id',$project->id)->get();
        return $reports;
    }

    public function store(Request $request){

        if ($request->project_key){
            $project = Project::where('key',$request->project_key)->first();
                if (!$project)
                    return response()->json(['success'=>false]);
        }
        else
            return response()->json(['success'=>false]);

        $report = new Report();
        $report->fill($request->only($report->getFillable()));
        $report->project_id = $project->id;
        $report->save();
        return response()->json(['success'=>true]);
    }

    public function export(Request $request,Report $report)
    {
        $reports = $this->getAll($request,$report);
        return Excel::download(new ReportExport($reports), 'Report-'.now()->format('d-m-Y').'.xlsx');
    }
}
