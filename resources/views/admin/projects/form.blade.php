
<div class="py-12">
    <div class="w-25 mx-auto sm:px-4 lg:px-8">
        <h1 class="text-center">{{$title}}</h1>
    </div>
</div>

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="post" action="{{(isset($model)) ? route('projects.update',$model->id) : route('projects.store') }}">
                    @csrf
                    @if(isset($model->id))
                        @method('PUT')
                    @endif
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$model->title ?? old('title')}}" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" name="link" class="form-control" id="link" placeholder="Link" value="{{$model->link ?? old('link')}}">
                        </div>
                        <br>
                        <div class="form-check">
                            <label class="form-check-label" for="active">Active</label>
                            <input type="checkbox" name="active" class="form-check-input" id="active" @if(isset($model) && $model->active) checked @endif value="1">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    @if(isset($model->id))
                        <button class="ml-4 js-model-delete btn btn-danger" type="submit" data-route="{{route('projects.destroy',$model->id)}}">Delete</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
