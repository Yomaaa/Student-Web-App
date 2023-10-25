@foreach ($user->courses as $item)
    <tr>
        <td>{{$item->courseTitle}}</td>
        <td>{{$item->courseDesc}}</td>
        <td>{{$item->courseCode}}</td>
        <td>{{$item->courseSchedule}}</td>
        <td>{{$item->courseProg}}%</td>
        <td>
            <button class="btn btn-danger btn-sm remove-course" data-course-id="{{$item->courseId}}">Remove</button>
                                    </td>
        
    </tr>
@endforeach