
<div class="py-12">
    <div class="w-25 mx-auto sm:px-4 lg:px-8">
        <h1 class="text-center">{{$title}}</h1>
    </div>
</div>

<div class="py-2">
    <div class="w-75 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{route('reports.content')}}" method="get" class="js-reports-form">
                    <div class="form-group mb-3 row">
                        <div class="col-lg-2">
                            <select name="project" class="form-control" data-placeholder="Project">
                                <option value="">Projects</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <input type="date" name="dateFrom" class="form-control" placeholder="Date from" aria-label="Date from" aria-describedby="basic-addon1">
                        </div>
                        <div class="col-lg-2">
                            <input type="date" name="dateTo" class="form-control" placeholder="Date to" aria-label="Date to" aria-describedby="basic-addon1">
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="btn btn-danger js-reports-clear w-100">Clear</button>
                        </div>
                        <div class="col-lg-1">
                            <button type="button" class="btn btn-success js-reports-clear w-100">Export</button>
                        </div>
                    </div>
                </form>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="w-50">Project Title</th>
                        <th scope="col" style="width: 200px;">Count errors</th>
                        <th scope="col" style="width: 150px;">Last error</th>
                        <th scope="col" style="width: 100px;">More/Less</th>
                    </tr>
                    </thead>
                    <tbody class="reports-table">
                        @include('admin.reports.table')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="py-6">
    <div class="w-75 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                @include('admin.reports.diagrams')
            </div>
        </div>
    </div>
</div>


