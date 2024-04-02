<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-3">

        <table border="1" class="table table-striped">
            <thead>
                <tr>
                    <th>#Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Created At</th>
                </tr>
            </thead>

            <tbody id="data">

            </tbody>
        </table>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                method: "GET",
                url: '{{ route('showuserajax') }}',
                dataType: "json",
                encode: true,
                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr.responseText);
                }
            }).done(function(data) {
                console.log(data); 
                if (data.status === "Get User-Data Successfully") {
                    if (data[1].length > 0) {
                        $.each(data[1], function(index, user) {
                            $('#data').append('<tr><td>' + user.id + '</td><td>' + user.name +
                                '</td><td>' + user.email + '</td><td>' + user.gender +
                                '</td><td>' + user.created_at + '</td></tr>');
                        });
                    } else {
                        console.log('No users found');
                    }
                } else {
                    console.log('Error: ' + data.status);
                }
            });
        });
    </script>

</body>

</html>
