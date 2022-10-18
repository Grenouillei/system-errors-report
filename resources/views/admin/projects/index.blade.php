
<div class="py-12">
    <div class="w-25 mx-auto sm:px-4 lg:px-8">
        <h1 class="text-center">{{$title}}</h1>
    </div>
</div>

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <a href="{{route('projects.create')}}"><button type="button" class="btn btn-success" style="float: right">Create</button></a>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Link</th>
                        <th scope="col">Active</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if($models)
                            @foreach($models as $model)
                                <tr>
                                    <th scope="row">{{$model->id}}</th>
                                    <td>{{$model->title}}</td>
                                    <td><a href="{{$model->link}}" target="_blank">{{$model->link}}</a></td>
                                    <td>{{$model->active ? 'Yes' : 'No'}}</td>
                                    <td>
                                        <a href="{{route('projects.edit',$model->id)}}"><button type="button" class="btn btn-primary">Edit</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

