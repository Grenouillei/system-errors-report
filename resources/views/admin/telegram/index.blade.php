
<div class="py-12">
    <div class="w-25 mx-auto sm:px-4 lg:px-8">
        <h1 class="text-center">{{$title}}</h1>
    </div>
</div>


<div class="py-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="post" action="{{(isset($model)) ? route('telegrams.update',$model->id) : route('telegrams.store') }}">
                    @csrf
                    @if(isset($model->id))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="token">Token</label>
                        <input type="text" name="token" required class="form-control" id="token" placeholder="Token" value="{{$model->token ?? old('token')}}" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="chat_id">Chat id</label>
                        <input type="text" name="chat_id" required class="form-control" id="chat_id" placeholder="Chat id" value="{{$model->chat_id ?? old('chat_id')}}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

