<?php

namespace App\Services;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;

class ProjectService
{
    public function getAllProjects(){
        return Project::orderBy('created_at','DESC')->get();
    }

    public function store(ProjectRequest $request,Project $project){
        $project->fill($request->only($project->getFillable()));
            if (!$request->active)
                $project->active = 0;
        $project->save();
    }

    public function delete(Project $project){
        $project->delete();
    }
}
