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

    <div class="container">

        <table class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>#Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Jobs</th>
                    <th>Address</th>
                </tr>
            </thead>

            <tbody id="show">

            </tbody>
        </table>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                method: "GET",
                url: '{{ route('website.showstudentajax') }}',
                dataType: "json",
                encode: true,

                error: function(xhr, textStatus, errorThrown) {
                    console.log(xhr.response);
                },

            }).done(function(data) {
                let student = data.student;
                console.log(student);

                var tableRows = '';

                for (let i = 0; i < student.length; i++) {
                    tableRows += `<tr>
                                    <td>${student[i].id}</td>
                                    <td>${student[i].name}</td>
                                    <td>${student[i].phone}</td>
                                    <td>${student[i].email}</td>
                                    <td>${student[i].password}</td>
                                    <td>${student[i].gender}</td>
                                    <td>${student[i].status}</td>
                                    <td>${student[i].jobs}</td>
                                    <td>${student[i].address}</td>
                                  </tr>`;
                }

                document.getElementById('show').innerHTML = tableRows;
            })

        });
    </script>

</body>

</html>
