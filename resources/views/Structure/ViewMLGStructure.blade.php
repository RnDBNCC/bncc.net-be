<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <nav>
        <a href="/admin/structure/create">ADD</a>
        <a href="/admin/structure">KMG</a>
        <a href="/admin/structure/as">AS</a>
        <a href="/admin/structure/bdg">BDG</a>
        <a href="/admin/structure/mlg">MLG</a>
    </nav>

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
            @if ($structure->profile_region === 'MLG')
            <tr>
                <td>
                    <img style="width:100px" src="{{ asset('storage/image/structure/'.$structure->profile_photo) }}"/>
                </td>
                <td>{{ $structure->profile_name }}</td>
                <td>{{ $structure->profile_division }}</td>
                <td>{{ $structure->profile_sub_division }}</td>
                <td>{{ $structure->profile_position }}</td>
                <td>{{ $structure->profile_region }}</td>
                <td>
                    <a href="{{route('edit', ['id'=>$structure->id])}}"><button type="submit" class="btn btn-success">Edit</button></a>
                    <form action="{{route('delete', ['id'=>$structure->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endif
        @endforeach
    </table>
</body>
</html>
