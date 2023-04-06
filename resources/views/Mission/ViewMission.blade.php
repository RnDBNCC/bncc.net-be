<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="border:1px solid black">
        <th>
            <td>Image</td>
            <td>Name</td>
            <td>Description</td>
            <td>Action</td>
        </th>
        @foreach ($missions as $mission)
            <tr>
                <td>
                    <img style="width:100px" src="{{ asset('/storage/image/'.$mission->Image) }}" alt="No data yet" />
                </td>
                <td>{{ $mission->Name }}</td>
                <td>{{ $mission->Description }}</td>
                <td>
                    <a href="{{route('EditMission', ['id'=>$mission->id])}}"><button type="submit" class="btn btn-success">Edit</button></a>
                    <form action="{{route('DeleteMission', ['id'=>$mission->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
