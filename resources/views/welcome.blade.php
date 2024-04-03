<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content={{ csrf_token() }}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

    <div class="container mt-3">

        <div id="successMessage" style="display: none;" class="mt-3 alert alert-success" role="alert">
            Data inserted successfully!
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="name" placeholder="Enter name">
            <label for="name">Name</label>
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="email" placeholder="Enter email">
            <label for="email">Email</label>
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="password" class="form-control" id="password" placeholder="Enter password">
            <label for="password">Password</label>
        </div>

        <div class="form-floating mt-3 mb-3">
            <select class="form-select" id="gender">
                <option disabled selected>Select Option</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <label for="gender">Gender</label>
        </div>

        <button type="submit" onclick="insertbtn()" class="btn btn-primary">Submit</button>
        <a href="{{ route('showusers') }}" class="btn btn-primary">View Users</a>
        <a href="{{ route('website.showstudent') }}" class="btn btn-primary">View Students</a>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
            function insertbtn() {
                var name = $('#name').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var gender = $('#gender').val();
                console.log(name + email + password + gender);

                var formdata = {
                    name: name,
                    email: email,
                    password: password,
                    gender: gender
                }

                $.ajax({
                    method: "post",
                    url: '{{ route('studentstore') }}',
                    data: formdata,
                    dataType: "json",
                    encode: true,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },

                    error: function(xhr, textStatus, errorThrown) {
                        console.log(xhr.responseText);
                    }

                }).done(function(data) {
                    console.log(data);
                    $('#name').val('');
                    $('#email').val('');
                    $('#password').val('');
                    $('#gender').val('');
                    $('#successMessage').show();
                });
            }
        </script>

</body>

</html>
