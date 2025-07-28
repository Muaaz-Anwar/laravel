@extends('layout')
@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="exampleid">
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="" name="id" id="id">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Full Name</label>
                            <input class="form-control" id="name" name="name" required aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required
                                id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required
                                id="exampleInputPassword1">
                        </div>
                        <button type="button" class="btn btn-primary" id="submit">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#submit").click(function() {
                var id = $("#id").val();
                if (id) {
                    let formData = {
                        name: $("#id").val(),
                        name: $("#name").val(),
                        email: $("#email").val(),
                        password: $("#password").val()
                    }
                    $.ajax({
                        type: "PUT",
                        url: "/update_employee/" + id,
                        data: formData,
                        success: function(res) {
                            $('#exampleModal').modal('hide');
                            loaddata();
                        },
                        error: function(err) {
                           alert("error")
                        }
                    })

                } else {
                    let formData = {
                        name: $("#name").val(),
                        email: $("#email").val(),
                        password: $("#password").val()
                    }

                    $.ajax({
                        type: "POST",
                        url: "{{ route('add_employee') }}",
                        data: formData,
                        success: function(res) {
                            $('#exampleModal').modal('hide');
                            loaddata();
                        },
                        error: function(err) {
                            alert(err)
                        }
                    })
                }

            });
        });
        loaddata();

        function loaddata() {
            $('#exampleid').empty();
            $.ajax({
                type: "GET",
                url: "{{ route('view_employee') }}",
                success: function(data) {
                    let employees = null;
                    employees = data.message;
                    $.each(employees, function(key, value) {
                        $('#exampleid').append("<tr>\
                                        <td>" + value.name + "</td>\
                                        <td>" + value.email + "</td>\
                                        <td>" + value.password + "</td>\
                                        <td><button class='btn btn-warning updateBtn' data-id='" + value.id + "'>Edit Employee </button></td>\
                                        <td><button class='btn btn-danger deleteBtn' data-id='" + value.id + "'>Delete</button></td>\
                                    </tr>");
                    });
                },
                error: function(err) {
                    alert(err)
                }
            })
        }

        $(document).on('click', '.deleteBtn', function() {
            var id = $(this).data('id');
            if (confirm("Are you sure you want to delete this employee?")) {
                $.ajax({
                    url: "/delete_employee/" + id,
                    type: "DELETE",
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response.message);
                        // Remove the row from the table
                        $("button[data-id='" + id + "']").closest('tr').remove();
                    },
                    error: function(xhr) {
                        alert("Error deleting employee.");
                    }
                });
            }
        });


        $(document).on('click', '.updateBtn', function() {
            var id = $(this).data('id');
            if (confirm("Are you sure you want to update this employee?")) {
                $.ajax({
                    url: "/edit_employee/" + id,
                    type: "GET",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                    },
                    success: function(response) {
                        console.log(response.message.name)
                        $('#exampleModal').modal('show');
                        $("#id").val(response.message.id)
                        $("#name").val(response.message.name)
                        $("#email").val(response.message.email)
                        // Remove the row from the table
                    },
                    error: function(xhr) {
                        alert("Error deleting employee.");
                    }
                });
            }
        });
    </script>

    </body>
@endsection
