<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('store_mission')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Image</label>
            <input name="image" type="file">
        </div>

        <div>
            <label for="">Name</label>
            <input name="name" type="text">
        </div>

        <div>
            <label for="">Description</label>
            <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>