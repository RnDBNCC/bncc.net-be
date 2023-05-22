<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('update_history', $histories->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <label for="">Name</label>
            <input name="name" type="text" value="{{ $histories->name }}">
        </div>

        <div>
            <label for="">Description</label>
            <textarea name="description" id="" cols="30" rows="10">{{ $histories->description }}</textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
