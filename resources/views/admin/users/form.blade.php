
<div class="py-12">
    <div class="w-25 mx-auto sm:px-4 lg:px-8">
        <h1 class="text-center">{{$title}}</h1>
    </div>
</div>

<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="post" action="{{(isset($model)) ? route('users.update',$model->id) : route('users.store') }}">
                    @csrf
                    @if(isset($model->id))
                        @method('PUT')
                    @endif
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" required class="form-control" id="name" placeholder="Name" value="{{$model->name ?? old('name')}}" >
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" required class="form-control" id="email" placeholder="Email" value="{{$model->email ?? old('email')}}">
                        </div>
                        <div class="form-group">
                            <select name="roles[]" class="form-control select_select2" data-fouc multiple data-placeholder="Roles" >
                                <option value="">Roles</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @foreach($model->roles as $userRole) @if($userRole->id == $role->id) selected @endif @endforeach>{{$role->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    @if(isset($model->id))
                        <button class="ml-4 js-model-delete btn btn-danger" @if(\Illuminate\Support\Facades\Auth::user()->id == $model->id) disabled @endif type="submit" data-route="{{route('users.destroy',$model->id)}}">Delete</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
