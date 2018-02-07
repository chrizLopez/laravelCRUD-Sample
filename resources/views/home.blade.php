
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Laravel Sample</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    
</head>

  <body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Laravel Crud Sample</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="col-lg-12" style="margin-bottom:10px">
            <button class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus-sign"></i> Add new</button>
        </div>
        <div id="rload-table">
            <table class="table table-bordered" id="dta-tbl">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Name</td>
                        <td>Email Address</td>
                        <td>Gender</td>
                        <td>Description</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($persons as $person)
                    <tr id="rm{{ $person->id }}">
                        <td>{{ $person->id }}</td>
                        <td>{{ $person->name }}</td>
                        <td>{{ $person->email_address }}</td>
                        <td>{{ $person->gender }}</td>
                        <td>{{ $person->description }}</td>
                        <td class="text-center"><a href="#" onclick="editme({{ $person->id }})"><i class="glyphicon glyphicon-pencil"></i></a>&nbsp&nbsp&nbsp<a href="#" style="color:red" onclick="removeme({{ $person->id }})"><i class="glyphicon glyphicon-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Laravel CRUD</h4>
            </div>
            <!-- <form> -->
                <div class="modal-body">
                    <input type="hidden" id="data_id">
                    <div class="form-group" id="divname">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="password">Gender</label>
                        <select class="form-control" id="gender">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group" id="divdesc">
                        <label for="password">Description</label>
                        <textarea class="form-control" id="description" name="description" placeholder="description here...."></textarea>
                    </div>
                    <div class="form-group" id="divemail">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group" id="divpass">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="btn-save">Save</button>
                    <button style="display: none" class="btn btn-info" id="btn-edit">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            <!-- </form> -->
            </div>

        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#dta-tbl').DataTable();
        });

        $('#btn-edit').click(function() {
            var name = $('#name').val();
            var gender = $('#gender').val();
            var description = $('#description').val();
            var email_address = $('#email').val();
            var password = $('#password').val();
            var id = $('#data_id').val();

            if (name=='') {
                $('#divname').addClass("has-error");
            }else if(description=='') {
                $('#divdesc').addClass("has-error");
            }else if(email_address == '') {
                $('#divemail').addClass("has-error");
            }else if(password=='') {
                $('#divpass').addClass("has-error");
            }
            else{
                $.ajax({
                    url:'{{ url("/edit-data") }}',
                    type: 'post',
                    data: {
                        '_token':"{{ csrf_token() }}",
                        'name': name,
                        'gender' : gender,
                        'description' : description,
                        'email_address' : email_address,
                        'password' : password,
                        'id' : id
                    },
                    success:function(data){
                        location.reload(true);
                    }

                });

            }
        });
        $('#btn-save').click(function() {
            var name = $('#name').val();
            var gender = $('#gender').val();
            var description = $('#description').val();
            var email_address = $('#email').val();
            var password = $('#password').val();

            if (name=='') {
                $('#divname').addClass("has-error");
            }else if(description=='') {
                $('#divdesc').addClass("has-error");
            }else if(email_address == '') {
                $('#divemail').addClass("has-error");
            }else if(password=='') {
                $('#divpass').addClass("has-error");
            }
            else{
                $.ajax({
                    url:'{{ url("/save-data") }}',
                    type: 'post',
                    data: {
                        '_token':"{{ csrf_token() }}",
                        'name': name,
                        'gender' : gender,
                        'description' : description,
                        'email_address' : email_address,
                        'password' : password
                    },
                    success:function(data){
                        location.reload(true);
                    }

                });

            }
        });

        function removeme(id){
            var res= confirm("Do you really want to delete this?");
            if (res == true){
                $.ajax({
                    url:'{{ url("/remove-data") }}',
                    type: 'get',
                    data: {'id':id},
                    success:function(data){
                        var rid = '#rm'+id;
                        $(rid).hide();
                    }
                });
            }
        }

        function editme(id){
            $.ajax({
                url:'{{ url("/get-data") }}',
                type: 'get',
                data: {'id':id},
                success:function(data){
                    $('#name').val(data.name);
                    $('#gender').val(data.gender);
                    $('#description').val(data.description);
                    $('#email').val(data.email_address);
                    $('#data_id').val(data.id);
                    $('#btn-edit').show();
                    $('#btn-save').hide();
                    $('#myModal').modal('show');
                }
            });
        }
    </script>

    </body>
</html>
