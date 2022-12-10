<?php

namespace App\Services;

use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectService
{
    public function getAllProjects(){
        return Project::orderBy('created_at','DESC')->get();
    }

    public function store(ProjectRequest $request,Project $project){
        $project->fill($request->only($project->getFillable()));
            if (!$request->active)
                $project->active = 0;
            if (!$project->id)
                $project->key = Str::random();
        $project->save();
    }

    public function delete(Project $project){
        $project->delete();
    }
}
