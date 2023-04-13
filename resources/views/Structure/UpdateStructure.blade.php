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
            <div class="card">
                <img src="{{ asset('storage/image/structure/'.$structure->profile_photo) }}" width="225"  class="card-img-top"
                    alt="...">
            </div>

            <div>
                <label for="">Image</label>
                <input name="profile_photo" type="file" >
            </div>

            <div>
                <label for="">Name</label>
                <input name="profile_name" type="text" value="{{$structure->profile_name}}">
            </div>

            <div>
                <label for="profile_division">Division</label>
                <select name="profile_division" id="profile_division">
                    <option value=""  disabled>--Choose One--</option>
                    <option value="DPI" @if($structure->profile_division == 'DPI') selected  @endif>DPI</option>
                    <option value="Marketing" @if($structure->profile_division == 'Marketing') selected  @endif>Marketing</option>
                    <option value="Product" @if($structure->profile_division == 'Product') selected  @endif>Product</option>
                    <option value="Internal" @if($structure->profile_division == 'Internal') selected  @endif>Internal</option>
                </select>
            </div>

            <div>
                <label for="profile_sub_division">Sub Division</label>
                <select  name="profile_sub_division" id="profile_sub_division">
                    <option value="" selected disabled>--Choose One--</option>
                    @if($structure->profile_division == 'DPI')
                        <option value="-" @if($structure->profile_division == 'DPI') selected  @endif>-</option>
                    @elseif($structure->profile_division == 'Marketing')
                        <option value="Public Relations" @if($structure->profile_sub_division == 'Public Relations') selected  @endif>Public Relations</option>
                        <option value="External Event Organizer" @if($structure->profile_sub_division == 'External Event Organizer') selected  @endif>External Event Organizer</option>
                    @elseif($structure->profile_division == 'Product')
                        <option value="FILE" @if($structure->profile_sub_division == 'FILE') selected  @endif>FILE</option>
                        <option value="FAVE" @if($structure->profile_sub_division == 'FAVE') selected  @endif>FAVE</option>
                        <option value="Learning and Training" @if($structure->profile_sub_division == 'Learning and Training') selected  @endif>Learning and Training</option>
                    @elseif($structure->profile_division == 'Internal')
                        <option value="Human Resource Development" @if($structure->profile_sub_division == 'Human Resource Development') selected  @endif>Human Resource Development</option>
                        <option value="Research And Development" @if($structure->profile_sub_division == 'Research And Development') selected  @endif>Research And Development</option>
                    @endif
                </select>

            </div>

            <div>
                <label for="profile_position">Position</label>
                <select  name="profile_position" id="profile_position">
                    <option value="" selected disabled>--Choose One--</option>
                    @if($structure->profile_division == 'DPI')
                        <option value="Chief Executive Officer" @if($structure->profile_position == 'Chief Executive Officer') selected  @endif>Chief Executive Officer</option>
                        <option value="Chief Finance Officer" @if($structure->profile_position == 'Chief Finance Officer') selected  @endif>Chief Finance Officer</option>
                        <option value="Chief Marketing Officer" @if($structure->profile_position == 'Chief Marketing Officer') selected  @endif>Chief Marketing Officer</option>
                        <option value="Chief Product Officer" @if($structure->profile_position == 'Chief Product Officer') selected  @endif>Chief Product Officer</option>
                        <option value="Chief Internal Officer" @if($structure->profile_position == 'Chief Internal Officer') selected  @endif>Chief Internal Officer</option>
                    @else
                        <option value="Manager" @if($structure->profile_position == 'Manager') selected  @endif>Manager</option>
                        <option value="Staff" @if($structure->profile_position == 'Staff') selected  @endif>Staff</option>
                    @endif
                </select>
            </div>

            <div>
                <label for="">Region</label>
                <select class="form-select" aria-label="Default select example" name="profile_region">
                    <option value="KMG" @if($structure->profile_region == 'KMG') selected  @endif>KMG</option>
                    <option value="AS" @if($structure->profile_region == 'AS') selected  @endif>AS</option>
                    <option value="BDG" @if($structure->profile_region == 'BDG') selected  @endif>BDG</option>
                    <option value="MLG" @if($structure->profile_region == 'MLG') selected  @endif>MLG</option>
                </select>
            </div>

            <button type="submit">Submit</button>
        </form>
    </body>
    </html>

</body>
<script>
    const firstInput = document.getElementById('profile_division');
    const secondInput = document.getElementById('profile_sub_division');
    const thirdInput = document.getElementById('profile_position');

    const options = {
        DPI: ['-'],
        Marketing: ['Public Relations', 'External Event Organizer'],
        Product: ['FILE', 'FAVE', 'Learning and Training'],
        Internal: ['Human Resource Development', 'Research And Development'],
    };

    const options1 = {
        DPI: ['Chief Executive Officer','Chief Finance Officer', 'Chief Marketing Officer','Chief Product Officer','Chief Internal Officer'],
        Marketing: ['Manager', 'Staff'],
        Product: ['Manager', 'Staff'],
        Internal: ['Manager', 'Staff'],
    };

    firstInput.addEventListener('change', function () {
        const selectedValue = firstInput.value;
        secondInput.innerHTML = '';
        options[selectedValue].forEach(function (optionValue) {
            const optionElement = document.createElement('option');
            optionElement.value = optionValue;
            optionElement.textContent = optionValue;
            secondInput.appendChild(optionElement);
        });
    });

    firstInput.addEventListener('change', function () {
        const selectedValue = firstInput.value;
        thirdInput.innerHTML = '';
        options1[selectedValue].forEach(function (optionValue) {
            const optionElement = document.createElement('option');
            optionElement.value = optionValue;
            optionElement.textContent = optionValue;
            thirdInput.appendChild(optionElement);
        });
    });
</script>
</html>
