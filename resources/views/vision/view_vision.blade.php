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
            <td>Name</td>
            <td>Description</td>
            <td>Action</td>
        </th>
        @foreach ($visions as $vision)
            <tr>
                <td>
                    <img style="width:100px" src="{{ asset('/storage/image/'.$vision->image) }}" alt="No data yet" />
                </td>
                <td>{{ $vision->name }}</td>
                <td>{{ $vision->description }}</td>
                <td>
                    <a href="{{route('edit_vision', ['id'=>$vision->id])}}"><button type="submit" class="btn btn-success">Edit</button></a>
                    <form action="{{route('delete_vision', ['id'=>$vision->id])}}" method="post">
                        @csrf
                        @method('delete_vision')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
