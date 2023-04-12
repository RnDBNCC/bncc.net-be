<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <form action="{{route('update', $structure->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div>
                <label for="">Image</label>
                <input name="profile_photo" type="file" value="">
            </div>

            <div>
                <label for="">Name</label>
                <input name="profile_name" type="text" value="{{$structure->profile_name}}">
            </div>

            <div>
                <label for="">Division</label>
                <input name="profile_division" type="text" value="{{$structure->profile_division}}">
                <select class="form-select" aria-label="Default select example" name="CategoryName">
                    <option value="1">Marketing</option>
                    <option value="1">Product</option>
                    <option value="1">Internal</option>
                </select>
            </div>

            <div>
                <label for="">Sub Division</label>
                <input name="profile_sub_division" type="text" value="{{$structure->profile_sub_division}}">
            </div>

            <div>
                <label for="">Position</label>
                <input name="profile_position" type="text" value="{{$structure->profile_position}}">
            </div>

            <button type="submit">Submit</button>
        </form>
    </body>
    </html>

</body>
</html>
