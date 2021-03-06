<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

        <script type="text/javascript">
        $(document).ready(function() {

            var html =
                '<tr><td><input class="form-control" type="text" name="txtFullname[]" required=""></td><td><input class="form-control" type="text" name="txtEmail[]" required=""></td><td><input class="form-control" type="text" name="txtPhone[]" required=""></td><td><input class="form-control" type="text" name="txtAddress[]" required=""></td><td><input type="button" name="remove" id="remove" value="Remove" class="btn btn-danger"></td></tr>';

            var max = 5;
            var x = 1;

            $("#add").click(function() {
                if (x <= max) {
                    $("#table_field").append(html);
                    x++;
                }
            });

            $("#table_field").on('click', '#remove', function() {
                $(this).closest('tr').remove();
                x--;
            });

        })
        </script>


        <title>Hello, world!</title>
    </head>

    <body>
        <div class="container">

            <form action="<?=base_url('Welcome/add_data')?>" method="POST" class="insert-from" id="insert_form">
                <hr>
                <h1 class="text-center">Dynamicaly Add Input Field & Insert Data</h1>
                <hr>
                <div class="input-field">

                    <table class="table table-bordered" id="table_field">

                        <tr>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Phone No</th>
                            <th>Address</th>
                            <th>Add or Remove</th>
                        </tr>
                        <tr>
                            <td><input class="form-control" type="text" name="txtFullname[]" required=""></td>
                            <td><input class="form-control" type="text" name="txtEmail[]" required=""></td>
                            <td><input class="form-control" type="text" name="txtPhone[]" required=""></td>
                            <td><input class="form-control" type="text" name="txtAddress[]" required=""></td>
                            <td><input type="button" name="addd" id="add" value="Add" class="btn btn-warning"></td>
                        </tr>

                    </table>
                    <center>
                        <input class="btn btn-success" type="submit" name="save" id="save" value="Save Data">
                    </center>
                </div>
            </form>
        </div>












        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
    </body>

</html>