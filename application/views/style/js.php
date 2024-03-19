<script src="<?php echo base_url('package/assets/libs/jquery/dist/jquery.min.js')?>"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="<?php echo base_url('package/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
<!-- Theme Required Js -->
<script src="<?php echo base_url('package/dist/js/app.min.js')?>"></script>
<script src="<?php echo base_url('package/dist/js/app.init.js')?>"></script>
<script src="<?php echo base_url('package/dist/js/app-style-switcher.js')?>"></script>
<!-- perfect scrollbar JavaScript -->
<script src="<?php echo base_url('package/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')?>">
</script>
<script src="<?php echo base_url('package/assets/extra-libs/sparkline/sparkline.js')?>"></script>
<!--Wave Effects -->
<script src="<?php echo base_url('package/dist/js/waves.js')?>"></script>
<!--Menu sidebar -->
<script src="<?php echo base_url('package/dist/js/sidebarmenu.js')?>"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url('package/dist/js/feather.min.js')?>"></script>
<script src="<?php echo base_url('package/dist/js/custom.min.js')?>"></script>
<!-- Datatables JS -->
<script src="<?php echo base_url('package/assets/Datatables/datatables.min.js')?>"></script>
<script src="<?php echo base_url('package/assets/Datatables/Responsive-2.3.1/css/responsive.bootstrap5.min.js')?>">
</script>
<!-- Datatables CSS -->
<link href="<?php echo base_url('package/assets/Datatables/datatables.min.css')?>" rel="stylesheet">
</link>
<link href="<?php echo base_url('package/assets/Datatables/Responsive-2.3.1/css/responsive.bootstrap5.min.css')?>"
    rel="stylesheet">
</link>
<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.select2').select2({
        // theme: "bootstrap-5"
    });
  });
</script>
<script>
    const formatRupiah = (money) => {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(money);
    }
</script>