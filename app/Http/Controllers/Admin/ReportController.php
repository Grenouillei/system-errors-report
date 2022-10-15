<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Report;
use App\Services\ReportService;
use Illuminate\Http\Request;

class ReportController extends AdminController
{
    protected $service;
    protected $title = 'Reports';

    public function __construct(ReportService $service)
    {
        $this->service = $service;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,Report $report)
    {
        $reports = $this->service->getAll($request,$report);
        $this->content = view('admin.reports.index')->with([
            'models'=>$reports,
            'projects'=> Project::all(),
            'title' => $this->title
        ])->render();
        return $this->renderOutput();
    }

    public function getContent(Request $request,Report $report){
        $reports = $this->service->getAll($request,$report);
        $content = view('admin.reports.table')->with(['models'=>$reports])->render();
        return response()->json(['content'=>$content]);
    }

    public function getExactlyContent(Request $request){
        $project = Project::findOrFail($request->id);
        $reports = Report::where('project_id',$project->id)->get();
        $content = view('admin.reports.exactly_table')->with(['models'=>$reports])->render();
//        dd($content);
        return response()->json(['content'=>$content]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}