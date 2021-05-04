<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets_template/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets_template/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets_template/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets_template/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<!-- <script src="<?= base_url('assets_template/') ?>vendor/chart.js/Chart.min.js"></script> -->

<!-- Page level custom scripts -->
<!-- <script src="<?= base_url('assets_template/') ?>js/demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets_template/') ?>js/demo/chart-pie-demo.js"></script> -->

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>

<script type="text/javascript">
$(document).ready(function() {

    var html =
        '<tr><td><input class="form-control" type="text" name="judul_bahan[]" required=""></td><td><input class="form-control" type="text" name="keterangan_bahan[]" required=""></td><td><input class="form-control-file" type="file" name="foto_bahan[]" required=""></td><td><input type="button" name="remove" id="remove" value="Hapus" class="btn btn-danger"></td></tr>';

    var max = 19;
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

<script src="<?= base_url('assets_template/js/sweetalert/sweetalert2.all.min.js') ?>">
</script>
<script type="text/javascript" src="<?= base_url('assets_template/js/sweetalert/myscript.js') ?>">
</script>


</html>