<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('UpdateMission', $missions->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <label for="">Image</label>
            <input name="Image" type="file">
        </div>

        <div>
            <label for="">Name</label>
            <input name="Name" type="text" value="{{ $missions->Name }}">
        </div>

        <div>
            <label for="">Description</label>
            <textarea name="Description" id="" cols="30" rows="10" value="{{ $missions->Description }}"></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
