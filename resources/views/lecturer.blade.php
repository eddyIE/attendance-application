<table border="1">
    <tr>
        <td>Name</td>
        <td>Role</td>
        <td>Phone</td>
        <td>Address</td>
        <td>Gender</td>
    </tr>
    @foreach($list as $each)
        <tr>
            <td>{{$each->name}}</td>
            <td>{{$each->title}}</td>
            <td>{{$each->phone}}</td>
            <td>{{$each->address}}</td>
            <td>{{$each->gender}}</td>
        </tr>
    @endforeach
</table>
