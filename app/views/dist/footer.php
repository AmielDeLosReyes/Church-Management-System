<div class="az-footer ht-40">
  <div class="container ht-100p pd-t-0-f">
    <span>Jesus Is Lord Church Regina &copy; 2022</span>
  </div><!-- container -->
</div><!-- az-footer -->

<script src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery/datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ionicons/ionicons.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery/jquery.maskedinput.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery/spectrum.js"></script>
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ion.rangeSlider.js"></script>
<script src="<?php echo base_url(); ?>assets/js/amazeui.datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery/jquery.simple-dtpicker.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-steps/jquery.steps.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/picker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery/jquery-simple-datetimepicker/jquery.simple-dtpicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/pickerjs/picker.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/chart.js/Chart.bundle.min.js"></script>


<script src="<?php echo base_url(); ?>assets/js/azia.js"></script>
<script>
    $(function () {
        'use strict'

        new PerfectScrollbar('#azContactList', {
            suppressScrollX: true
        });

        new PerfectScrollbar('.az-contact-info-body', {
            suppressScrollX: true
        });
        
        new PerfectScrollbar('#azInvoiceList', {
          suppressScrollX: true
        });

        $('.az-contact-item').on('click touch', function () {
            $(this).addClass('selected');
            $(this).siblings().removeClass('selected');

            $('body').addClass('az-content-body-show');
        });
	
	$('#azInvoiceList .media').on('click', function(e){
          $(this).addClass('selected');
          $(this).siblings().removeClass('selected');

          $('body').addClass('az-content-body-show');
        });

        /** AREA CHART **/
        var ctx = document.getElementById('chartArea').getContext('2d');

      var gradient = ctx.createLinearGradient(0, 240, 0, 0);
      gradient.addColorStop(0, 'rgba(0,123,255,0)');
      gradient.addColorStop(1, 'rgba(0,123,255,.3)');

      new Chart(ctx, {
          type: 'line',
          data: {
          labels: ['Feb 1', 'Feb 2', 'Feb 3', 'Feb 4', 'Feb 5', 'Feb 6', 'Feb 7', 'Feb 8', 'Feb 9', 'Feb 10'],
          datasets: [{
              data: [12, 15, 18, 40, 35, 38, 32, 20, 25],
              borderColor: '#007bff',
              borderWidth: 1,
              backgroundColor: gradient
          }]
          },
          options: {
          maintainAspectRatio: false,
          legend: {
              display: false,
              labels: {
                  display: false
              }
          },
          scales: {
              yAxes: [{
              display: false,
              ticks: {
                  beginAtZero:true,
                  fontSize: 10,
                  max: 80
              }
              }],
              xAxes: [{
              ticks: {
                  beginAtZero:true,
                  fontSize: 11,
                  fontFamily: 'Arial'
              }
              }]
          }
          }
      });
    });
</script>
</body>
</html>
