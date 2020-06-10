@foreach($data as $val)
<tr>
    <td>{{ $val->name }}</td>
    <td>{{ $val->email }}</td>
    <td>{{ $val->address }}</td>
</tr>
@endforeach