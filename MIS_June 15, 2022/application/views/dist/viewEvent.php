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
                        } ?>
                       
                        <div style="cursor:pointer" class="media <?php if ($selectedId == $event->EVENT_ID) echo 'selected'; ?>" onclick="location.href = ' <?php echo base_url(); ?>Events/View/<?php echo $event->EVENT_ID; ?>'">
                        
                        <div class="media-body">
                            <h6><span><?php echo $description; ?></span></h6>
                        <div>
                            <p><span>Date:</span><?php echo date('m/d/Y', strtotime($event->EVENT_DTTM)); ?></p>
                            <p><span>&nbsp;&nbsp;&nbsp;Attendees:</span><?php echo $event->attendees_count; ?></p>
                        </div>
                    </div><!-- media-body -->
                </div><!-- media -->
                        
                <?php        
                    $rowNum++;
                    endforeach;
                ?>        
            </div><!-- az-invoice-list -->
        </div><!-- az-content-left -->
        
        

        <!-- Body Contents -->
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
            <div class="az-content-label mg-b-10">Church Events and Activities</div>
            <p class="mg-b-20">This Page is used to record the attendance of our members.</p>

            <div id="wizard2">
                <h3>General Information</h3>
                <section>
                    <form method="POST" action="form-validation.html">
                        <p class="mg-b-20">Please fill out the form completely.</p>
                        <input id="event_id" class="form-control" name="event_id" type="hidden" value="<?php echo $selectedEvent->EVENT_ID; ?>">

                        <div class="row row-sm mg-b-10">
                            <div class="col-md-12">
                                <label class="form-control-label">Event Description: <span class="tx-danger">*</span></label>
                                <input id="description" class="form-control" name="description" placeholder="Event Description" type="text"
                                    value="<?php echo $selectedEvent->DESCRIPTION; ?>" <?php if ($selectedEvent->EVT_STATUS_FLG == 'CLOSED') echo 'disabled'; ?>>
                            </div>
                        </div><!-- row -->
                        <div class="row row-sm mg-b-10">
                            <div class="col-md-12">
                                <label class="form-control-label">Detailed Description: <span class="tx-danger">*</span></label>
                                <textarea <?php if ($selectedEvent->EVT_STATUS_FLG == 'CLOSED') echo 'disabled'; ?> id="long_desc" name="long_desc" style="min-height: 5em" class="form-control" placeholder="Detailed Description" required><?php echo $selectedEvent->LONG_DESC; ?></textarea>
                            </div>
                        </div><!-- row -->
                        <div class="row row-sm mg-b-10">
                            <div class="col-md-5">
                                <label class="form-control-label">Date & Time: <span class="tx-danger">*</span></label>
                                <input <?php if ($selectedEvent->EVT_STATUS_FLG == 'CLOSED') echo 'disabled'; ?> name="event_dttm" type="text" id="event_dttm" class="form-control fc-datepicker2" placeholder="MM-DD-YYYY HH:MI:SS" 
                                       value="<?php echo $selectedEvent->EVENT_DTTM; ?>" required>
                            </div>
                        </div><!-- row -->
                        <div class="row row-sm mg-b-10">
                            <div id="statusWrapper" class="parsley-select col-md-5">
                                <label class="form-control-label">Status <span class="tx-danger">*</span></label>
                                <select id="status" name="status" class="form-control select2-no-search" data-parsley-class-handler="#statusWrapper" data-parsley-errors-container="#statusErrorContainer" required>
                                    <option label="Choose one"></option>
                                    <option <?php if ($selectedEvent->EVT_STATUS_FLG == 'OPEN') echo 'selected'; ?> value="OPEN">Open</option>
                                    <option <?php if ($selectedEvent->EVT_STATUS_FLG == 'CLOSED') echo 'selected'; ?> value="CLOSED">Closed</option>
                                </select>
                                <div id="statusErrorContainer"></div>
                            </div>
                        </div><!-- row -->
                    </form>
                </section>
                <h3>Membership Attendance</h3>
                <section>
                    <!--<p>Scan the QR Code.</p>-->
                    <div class="form-group wd-xs-400">
                        <label class="form-control-label">Attendee QR Code <span class="tx-danger">*</span></label>
                        <input id="QRCode" class="form-control" name="QRCode" placeholder="Scan the QR Code" type="text">
                        <br/>
                        <ul id="QRCodeName" class="mb-40px"></ul>
                    </div><!-- form-group -->
                </section>
            </div>
        </div><!-- az-content-body -->
    </div>
</div><!-- az-content -->

<?php $this->load->view('dist/footer'); ?>

<script>
      $(function(){
        'use strict'

        new PerfectScrollbar('#azInvoiceList', {
          suppressScrollX: true
        });

        new PerfectScrollbar('.az-content-body-invoice', {
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
            var email = $('#email').parsley();
            if(email.isValid()) {
                return true;
            } else { email.validate(); }
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