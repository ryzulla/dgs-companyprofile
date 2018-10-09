<!-- /.modal --><!-- /#helpModal -->

    <!--jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.18.4/js/jquery.tablesorter.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

    <!--Bootstrap -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- MetisMenu -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script>

    <!-- Screenfull -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/screenfull.js/2.0.0/screenfull.min.js"></script>

    <!-- Metis core scripts -->
    <script src="<?php echo base_url('assets/admin/template/Bootstrap-Admin-Template-master/dist/assets/js/core.min.js') ?>"></script>

    <!-- Metis demo scripts -->
    <script src="<?php echo base_url('assets/admin/template/Bootstrap-Admin-Template-master/dist/assets/js/app.js') ?>"></script>

    <script src="<?php echo base_url('assets/admin/template/Bootstrap-Admin-Template-master/dist/assets/js/style-switcher.min.js') ?>"></script>

    <script type="text/javascript">
    var detik = <?php echo date('s'); ?>;
    var menit = <?php echo date('i'); ?>;
    var jam   = <?php echo date('H'); ?>;

    function clock()
    {
        if (detik!=0 && detik%60==0) {
            menit++;
            detik=0;
        }
        second = detik;

        if (menit!=0 && menit%60==0) {
            jam++;
            menit=0;
        }
        minute = menit;

        if (jam!=0 && jam%24==0) {
            jam=0;
        }
        hour = jam;

        if (detik<10){
            second='0'+detik;
        }
        if (menit<10){
            minute='0'+menit;
        }

        if (jam<10){
            hour='0'+jam;
        }
        waktu = hour+':'+minute+':'+second;

        document.getElementById("clock").innerHTML = waktu;
        detik++;
    }

    setInterval(clock,1000);
</script>
<script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
