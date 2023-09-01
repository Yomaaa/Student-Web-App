@foreach ($user->courses as $item)
    <tr>
        <td>{{$item->courseTitle}}</td>
        <td>{{$item->courseDesc}}</td>
        <td>{{$item->courseCode}}</td>
        <td>{{$item->courseSchedule}}</td>
        <td>{{$item->courseProg}}%</td>
        
    </tr>
@endforeach