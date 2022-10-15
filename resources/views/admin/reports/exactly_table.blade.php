
<tr class="bg-secondary">
    <td style="color: #e5e7eb"><b class="ml-4" >File</b></td>
    <td style="color: #e5e7eb"><b class="ml-4">Line</b></td>
    <td style="color: #e5e7eb"><b class="ml-4">Created at</b></td>
    <td></td>
</tr>
@if($models)
    @foreach($models as $item)
        <tr class="table-primary">
            <td><p class="ml-4">{{$item->file}}</p></td>
            <td><p class="ml-4">{{$item->line}}</p></td>
            <td><p class="ml-4">{{$item->created_at}}</p></td>
            <td></td>
        </tr>
    @endforeach
@endif
