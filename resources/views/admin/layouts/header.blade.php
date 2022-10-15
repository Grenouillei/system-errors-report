<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div style="margin-right: auto;margin-left: auto;width: 20em">
           @if(isset($menu))
               @foreach($menu as $key => $item)
                   <a href="{{route($item['link'])}}" class="text-decoration-none text-secondary w-50">{{$item['title']}}</a>
                @endforeach
           @endif
        </div>
    </div>
</header>
