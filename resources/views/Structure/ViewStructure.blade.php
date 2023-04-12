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
            <td>profile_photo</td>
            <td>profile_name</td>
            <td>profile_division</td>
            <td>profile_sub_division</td>
            <td>profile_position</td>
            <td>action</td>
        </th>
        @foreach ($structures as $structure)
            <tr>
                <td>
                    <img style="width:100px" src="{{ asset('storage/image/structure/'.$structure->profile_photo) }}"/>
                </td>
                <td>{{ $structure->profile_name }}</td>
                <td>{{ $structure->profile_division }}</td>
                <td>{{ $structure->profile_sub_division }}</td>
                <td>{{ $structure->profile_position }}</td>
                <td>
                    <a href="{{route('edit', ['id'=>$structure->id])}}"><button type="submit" class="btn btn-success">Edit</button></a>
                    <form action="{{route('delete', ['id'=>$structure->id])}}" method="post">
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
