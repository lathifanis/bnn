<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; CI ADMIN <?= date('Y') ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/') ?>js/script.js"></script>
<script src="<?= base_url('assets/summernote/') ?>summernote.js"></script>
<script src="<?= base_url('assets/') ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url('assets/') ?>js/fstdropdown.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/js/bs-custom-file-input.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.surat').summernote();
    });

    $(document).ready(function() {
        bsCustomFileInput.init()
    })

    function setDrop() {
        if (!document.getElementById('third').classList.contains("fstdropdown-select"))
            document.getElementById('third').className = 'fstdropdown-select';
        setFstDropdown();
    }
    setFstDropdown();

    function removeDrop() {
        if (document.getElementById('third').classList.contains("fstdropdown-select")) {
            document.getElementById('third').classList.remove('fstdropdown-select');
            document.getElementById("third").fstdropdown.dd.remove();
        }
    }

    function addOptions(add) {
        var select = document.getElementById("fourth");
        for (var i = 0; i < add; i++) {
            var opt = document.createElement("option");
            var o = Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0];
            var last = o == undefined ? 1 : Number(o.value) + 1;
            opt.text = opt.value = last;
            select.add(opt);
        }
    }

    function removeOptions(remove) {
        for (var i = 0; i < remove; i++) {
            var last = Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0];
            if (last == undefined)
                break;
            Array.from(document.getElementById("fourth").querySelectorAll("option")).slice(-1)[0].remove();
        }
    }

    function updateDrop() {
        document.getElementById("fourth").fstdropdown.rebind();
    }

    function startCalc() {
        interval = setInterval("calc()");
    }

    function calc() {

        one = document.getElementById('tgl_lahir').value; //1995-09-04
        two = document.getElementById('tgl').value;
        three = one.substr(0, 4);
        four = two.substr(0, 4);
        five = (four - three);
        six = one.substr(5, 2);
        seven = two.substr(5, 2);
        eight = (seven - six);
        ten = 12;
        if (eight < 0) {
            eight = (12 - (six - seven));
            five = (five - 1);
        } else {
            eight = (seven - six);
        }
        document.getElementById('usia').value = ("" + five + " Tahun ");
    }

    function stopCalc() {
        clearInterval(interval);
    }

    $(document).ready(function() {
        $('#example').DataTable({
            "scrollX": true
        });
        $('.dataTables_length').addClass('bs-select');
    });

    $("#alert").fadeTo(2000, 500).slideUp(500, function() {
        $("#alert").slideUp(500);
    });
</script>
</body>

</html>