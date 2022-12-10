<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
//        $project_id = $request->project_id;
        return [
            'project_key' => 'required',
//            'project_id' =>
//                [
//                    'required',
//                    'numeric',
//                    'exists:projects',
//                    Project::exists('id', $project_id)->where('id', $project_id),
//                    Project::findOrFail($project_id),
//                ]
        ];
    }

    public function messages()
    {
        return [
            'project_key.required' => 'The project id is required!',
//            'project_key.exists' => 'The project id is required!',
        ];
    }
}
