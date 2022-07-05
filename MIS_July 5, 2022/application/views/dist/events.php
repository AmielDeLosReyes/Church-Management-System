<?php $this->load->view('dist/header'); ?>



<!-- Left panel -->

<div class="az-content az-content-app pd-b-0">
    <div class="container">
        <div class="az-content-left az-content-left-invoice">
            <div class="az-content-breadcrumb lh-1 mg-b-10">
                <span>Reporting</span>
                <span>Events</span>
            </div>
            <h2 class="az-content-title tx-24 mg-b-20">Events</h2>

            <div id="azInvoiceList" class="az-invoice-list">
                
                <!-- php code to print through events -->
                
                <?php
                    $rowNum = 0;
                    foreach($events as $event):
                        $description = $event->DESCRIPTION;
                        if (strlen($event->DESCRIPTION) > 27) {
                            $description = substr($description, 0, 24) . '...';
                        }
                        
                        echo '<div style="cursor:pointer" class="media" onclick="location.href = \'' . base_url() . 'Events/View/' . $event->EVENT_ID .'\'">';
                        
                        echo '<div class="media-body">
                                <h6>
                            <span>' . $description . '</span>
                        </h6>
                        <div>
                            <p><span>Date:</span>' . date('m/d/Y', strtotime($event->EVENT_DTTM)) . '</p>
                            <p><span>&nbsp;&nbsp;&nbsp;Attendees:</span> ' . ($event->member_attendee_count + $event->non_member_attendee_count) . '</p>
                        </div>
                    </div><!-- media-body -->
                </div><!-- media -->';
                        
                        
                    $rowNum++;
                    endforeach;
                    ?>        
            </div><!-- az-invoice-list -->
            
        </div><!-- az-content-left -->

        <!-- Body Contents -->
        <div class="az-content-body az-content-body-invoice">
          <div class="card card-invoice">
            <div class="card-body" style="margin-left: -7%">
                <div class="az-content-body pd-lg-l-40 d-flex flex-column">
                    <div class="az-content-label mg-b-10">Church Events and Activities</div>
                        <p class="mg-b-20">This Page is used to record the attendance of our members.</p>

                        <div id="wizard2">
                            <!-- First tab -->
                            <h3>General Information</h3>
                            <section>
                                <form method="POST" action="form-validation.html">
                                    <p class="mg-b-20">Please fill out the form completely.</p>
                                    <input id="event_id" class="form-control" name="event_id" type="hidden">

                                    <div class="row row-sm mg-b-10">
                                        <div class="col-md-12">
                                            <label class="form-control-label">Event Description: <span class="tx-danger">*</span></label>
                                            <input id="description" class="form-control" name="description" placeholder="Event Description" type="text"
                                                value="" required>
                                        </div>
                                    </div><!-- row -->
                                    <div class="row row-sm mg-b-10">
                                        <div class="col-md-12">
                                            <label class="form-control-label">Detailed Description: <span class="tx-danger">*</span></label>
                                            <textarea id="long_desc" name="long_desc" style="min-height: 5em" class="form-control" placeholder="Detailed Description" required></textarea>
                                        </div>
                                    </div><!-- row -->
                                    <div class="row row-sm mg-b-10">
                                        <div class="col-md-5">
                                            <label class="form-control-label">Date & Time: <span class="tx-danger">*</span></label>
                                            <input name="event_dttm" type="text" id="event_dttm" class="form-control fc-datepicker2" placeholder="YYYY-MM-DD HH:MI:SS" required>
                                        </div>
                                    </div><!-- row -->
                                    <div class="row row-sm mg-b-10">
                                        <div id="statusWrapper" class="parsley-select col-md-5">
                                            <label class="form-control-label">Status <span class="tx-danger">*</span></label>
                                            <select id="status" name="status" class="form-control select2-no-search" data-parsley-class-handler="#statusWrapper" data-parsley-errors-container="#statusErrorContainer" required>
                                                <option label="Choose one"></option>
                                                <option value="OPEN" selected>Open</option>
                                                <option value="CLOSED">Closed</option>
                                            </select>
                                            <div id="statusErrorContainer"></div>
                                        </div>
                                    </div><!-- row -->
                                </form>
                            </section>

                            <!-- Second tab -->
                            <h3>Membership Attendance</h3>
                            <section>
                                <!--<p>Scan the QR Code.</p>-->
                                <div class="form-group wd-xs-400">
                                    <label class="form-control-label">Attendee QR Code <span class="tx-danger">*</span></label>
                                    <input id="QRCode" class="form-control" name="QRCode" placeholder="Scan the QR Code" type="text">
                                    <br>
                                    
                                    <ul id="QRCodeName" class="mb-40px"></ul>

                                    <!-- Non-member button -->
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-az-secondary pd-x-25 active">Submit</button>
                                    </div>
                                    
                                </div><!-- form-group -->
                            </section>


                            <!-- Third tab -->
                            <!-- TO DO: Print the list of attendees in the event -->
                            <h3>Attendees</h3>
                            <section>
                            <!-- TABLE CONTENTS -->
                            
                            </section>
                        
                        </div> <!-- End of wizard2 -->
                    </div>
                </div>
            </div>
        </div><!-- az-content-body -->
    </div>
</div><!-- az-content -->


<!-- Non-Membel Button Modal -->
<div id="nonmembermodal" class="modal">
<div class="az-content-label mg-b-5">Large Modal</div>
          <p class="mg-b-20">Below is the static example of large modal.</p>

          <div class="pd-20 bg-gray-800">
            <!-- this modal is static modal for presentation purpose. -->
            <!-- class .d-block annd .pos-relative in .modal is for demo only -->
            <div class="modal d-block pos-static">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-content-demo">
                  <div class="modal-header">
                    <h6 class="modal-title">Message Preview</h6>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h6>Why We Use Electoral College, Not Popular Vote</h6>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
                  </div><!-- modal-body -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-indigo">Save changes</button>
                    <button type="button" class="btn btn-outline-light">Close</button>
                  </div>
                </div>
              </div><!-- modal-dialog -->
            </div><!-- modal -->
          </div><!-- modal-wrapper-demo -->
        


<?php $this->load->view('dist/footer'); ?>

<script>
      $(function(){
        'use strict'

        new PerfectScrollbar('#azInvoiceList', {
          suppressScrollX: true
        });

        new PerfectScrollbar('.az-content-body', {
          suppressScrollX: true
        });

        $('#azInvoiceList .media').on('click', function(e){
          $(this).addClass('selected');
          $(this).siblings().removeClass('selected');

          $('body').addClass('az-content-body-show');
        });

      });
</script>

<script>
  $(function(){
    'use strict';

    // $('#wizard1').steps({
    //       headerTag: 'h3',
    //       bodyTag: 'section',
    //       autoFocus: true,
    //       titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
    //     });

    $('#wizard2').steps({
      headerTag: 'h3',
      bodyTag: 'section',
      autoFocus: true,
      titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
      onStepChanging: function (event, currentIndex, newIndex) {
        if(currentIndex < newIndex) {
            // Step 1 form validation
            if(currentIndex === 0) {
                var description = $('#description').parsley();
                var long_desc = $('#long_desc').parsley();
                var event_dttm = $('#event_dttm').parsley();
                var status = $('#status').parsley();

                if(description.isValid() && long_desc.isValid() && event_dttm.isValid() && status.isValid()) {
                    var values = "event_id=" + $('#event_id').val()+ "&description=" + $('#description').val() + "&long_desc=" + $('#long_desc').val() 
                               + "&event_dttm=" + $('#event_dttm').val() + "&status=" + $('#status').val();
                       
                    // Save the Event Details without loading the page
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url();?>Events/saveEvent",
                        data: values,
                        cache: false,
                        error: function(ts){
                          alert(ts.responseText);  
                        },
                        success: function(eventId){
                            // Populate the Event ID input so that it can be updated without loading the page
                            $('#event_id').val(eventId);
                            
                            // Format Date
                            var date = new Date($('#event_dttm').val());
                            
                            // Add the Event on the Left Panel
                            $('#azInvoiceList').prepend('<div style="cursor:pointer" class="media selected" onclick="location.href = \'<?php echo base_url(); ?>Events/View/' + eventId + '\'"><div class="media-body"><h6><span>' + $('#description').val() +  '</span></h6><div><p><span>Date:</span>' + date.toLocaleDateString() + '</p><p><span>&nbsp;&nbsp;&nbsp;Attendees:</span> 0</p></div></div></div>');
                           
                            // Set the cursor focus to the QR Code Text Input
                            $('#QRCode').focus();
                        }
                    });
                    
                    return true;
                } 
                else {
                    description.validate();
                    long_desc.validate();
                    event_dttm.validate();
                    status.validate();
            }
        }

          // Step 2 form validation
          if(currentIndex === 1) {
            var QRCode = $('#QRCode').parsley();
            if(QRCode.isValid()) {
                return true;
            } else { QRCode.validate(); }
          }
        // Always allow step back to the previous step even if the current step is not valid.
        } 
        else { 
            return true; 
        }
      }
    });
    
     // Do not allow removal of focus to the QR Code field
    $("#QRCode").blur(function() {
        $('#QRCode').focus();
    });
    
    // When enter is pressed (Scanner is used)
    $('#QRCode').on('keypress', function (e) {
        // Enter Key is 13
        if(e.which === 13){
            var values = "event_id=" + $('#event_id').val()+ "&QRCode=" + $('#QRCode').val();
            
            // Save the Event Details without loading the page
            $.ajax({
                type: "POST",
                url: "<?= base_url();?>Events/addEventAttendee",
                data: values,
                cache: false,
                error: function(ts){
                  alert(ts.responseText);  
                },
                success: function(message){
                    // Message is success
                    if (message !== 'Invalid QR Code. No member found.') {
                        $('#QRCodeName').addClass("list-arrow");
                        $('#QRCodeName').removeClass("typcn icon typcn-delete-outline text-danger");
                        $('#QRCodeName').html("<li><strong>" + message + "</strong> successfully scanned.</li>");
                        $('#QRCode').val('');
                    }
                    else {
                        $('#QRCodeName').addClass("typcn icon typcn-delete-outline text-danger");
                        $('#QRCodeName').html("<strong>Invalid QR Code. No member found.</strong>");
                        $('#QRCode').val('');
                    }
                }
            });
        }
    });
    
    // jQuery Simple DateTimePicker
    $('#event_dttm').appendDtpicker({
        closeOnSelected: true,
        onInit: function(handler) {
            var picker = handler.getPicker();
            $(picker).addClass('az-datetimepicker');
        }
    });

    // Hide alert after 5 seconds
    $(".alert").delay(5000).slideUp(200, function() {
        $(this).alert('close');
        });
        
    $(document).ready(function () {
        $('.select2').select2({
            placeholder: 'Choose one',
            searchInputPlaceholder: 'Search'
        });

        $('.select2-no-search').select2({
            minimumResultsForSearch: Infinity,
            placeholder: 'Choose one'
        });
        });

    });
</script>

