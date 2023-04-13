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
            <label for="profile_division">Division</label>
            <select name="profile_division" id="profile_division">
                <option value="" selected disabled>--Choose One--</option>
                <option value="DPI">DPI</option>
                <option value="Marketing">Marketing</option>
                <option value="Product">Product</option>
                <option value="Internal">Internal</option>
            </select>
        </div>

        <div>
            <label for="profile_sub_division">Sub Division</label>
            <select  name="profile_sub_division" id="profile_sub_division">
                <option value="" selected disabled>--Choose One--</option>
            </select>

        </div>

        <div>
            <label for="profile_position">Position</label>
            <select  name="profile_position" id="profile_position">
                <option value="" selected disabled>--Choose One--</option>
            </select>
        </div>

        <div>
            <label for="">Region</label>
            <select class="form-select" aria-label="Default select example" name="profile_region">
                <option value="KMG">KMG</option>
                <option value="AS">AS</option>
                <option value="BDG">BDG</option>
                <option value="MLG">MLG</option>
            </select>
        </div>

        <button type="submit">Submit</button>
    </form>


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
