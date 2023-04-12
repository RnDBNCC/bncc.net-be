<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Image</label>
            <input name="profile_photo" type="file">
        </div>

        <div>
            <label for="">Name</label>
            <input name="profile_name" type="text">
        </div>

        <div>
            <label for="">Division</label>
            <input name="profile_division" type="text">
            <select class="form-select" aria-label="Default select example" name="CategoryName">
                <option value="" selected>-</option>
                <option value="Marketing">Marketing</option>
                <option value="Product">Product</option>
                <option value="Internal">Internal</option>
            </select>
        </div>

        <div>
            <label for="">Sub Division</label>
            <input name="profile_sub_division" type="text">

            <select class="form-select" aria-label="Default select example" name="CategoryName">
                <option value="" selected>-</option>
                <option value="Marketing">Marketing</option>
                <option value="Product">Product</option>
                <option value="Internal">Internal</option>
            </select>

        </div>

        <div>
            <label for="">Position</label>
            <input name="profile_position" type="text">
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
