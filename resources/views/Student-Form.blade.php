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
            <input type="number" class="form-control" id="phone" placeholder="Enter phone">
            <label for="phone">Phone</label>
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

        <div class="form-floating mt-3 mb-3">
            <select class="form-select" id="status">
                <option disabled selected>Select Option</option>
                <option value="active">Active</option>
                <option value="inactive">InActive</option>
            </select>
            <label for="gender">Status</label>
        </div>

        <div class="form-floating mt-3 mb-3">
            <select class="form-select" id="jobs">
                <option disabled selected>Select Jobs</option>
                <option value="Graphics Designer">Graphics Designer</option>
                <option value="Web Developer">Web Developer</option>
                <option value="Ios Developer">Ios Developer</option>
                <option value="Full Stack Developer">Full Stack Developer</option>
            </select>
            <label for="gender">Jobs</label>
        </div>

        <div class="form-floating mb-3 mt-3">
            <textarea class="form-control" rows="5" id="address" placeholder="Enter your address"></textarea>
            <label for="address">Address</label>
            <small id="address" class="form-text text-muted">Please enter your full address including street,
                city, and postal code.</small>
        </div>



        <button type="submit" onclick="insertstd()" class="btn btn-primary">Submit</button>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script>
            function insertstd() {
                var name = $('#name').val();
                var phone = $('#phone').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var gender = $('#gender').val();
                var status = $('#status').val();
                var jobs = $('#jobs').val();
                var address = $('#address').val();

                console.log(name + phone + email + password + gender + status + jobs + address);

                var formdata = {
                    name:name,
                    phone:phone,
                    email:email,
                    password:password,
                    gender:gender,
                    status:status,
                    jobs:jobs,
                    address:address
                }

                $.ajax({
                    method : "post",
                    url : '{{ route("website.storestudent") }}',
                    data : formdata,
                    dataType : "json",
                    encode : true,
                    headers : {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },

                    error : function(xhr, textStatus, errorThrown){
                        console.log(xhr.responseText);
                    },

                }).done(function(data){
                    console.log(data);
                })

            }
        </script>


</body>

</html>
