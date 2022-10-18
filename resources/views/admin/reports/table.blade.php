@if($models)
    @foreach($models as $project_id => $items)
        <tr class="js-main">
            <td>{{$items['title']}}</td>
            <td>{{$items['count']}}</td>
            <td>{{$items['date']}}</td>
            <td class="js-exactly-content text-center" data-id="{{$project_id}}" data-action="{{route('reports.exactly')}}" data-open="false" style="cursor: pointer"><b>+</b></td>
        </tr>
    @endforeach
@endif
