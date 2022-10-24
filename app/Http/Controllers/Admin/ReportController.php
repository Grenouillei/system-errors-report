<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReportExport;
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
        if ($request->export)
            return $this->service->export($request,$report);

        $this->content = view('admin.reports.index')->with([
            'projects'=> Project::all(),
            'charts'=> $this->service->getContentForChart($request,$report),
            'title' => $this->title
        ])->render();
        return $this->renderOutput();
    }

    public function getContent(Request $request,Report $report){
        $reports = $this->service->getAll($request,$report);
        $charts = $this->service->getContentForChart($request,$report);
        $content = view('admin.reports.table')->with(['models'=>$reports])->render();
        return response()->json(['content'=>$content,'charts'=>$charts]);
    }

    public function getExactlyContent(Request $request){
        $reports = $this->service->getExactlyContent($request);
        $content = view('admin.reports.exactly_table')->with(['models'=>$reports])->render();
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
