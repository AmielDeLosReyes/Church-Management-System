<?php $this->load->view('dist/header'); ?>


<!-- Left panel -->

<div id="viewEvent" class="az-content az-content-app pd-b-0">
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
                            <p><span>&nbsp;&nbsp;&nbsp;Attendees:</span><?php echo ($event->member_attendee_count + $event->non_member_attendee_count); ?></p>
                        </div>
                    </div><!-- media-body -->
                </div><!-- media -->
                        
                <?php        
                    $rowNum++;
                    endforeach;
                ?>        
            </div><!-- az-invoice-list -->
        </div><!-- az-content-left -->

        

        <!-- Header for Delete Event -->
        <div class="az-content-body az-content-body-contacts">
        <div class="az-contact-info-header">
            
                <div class="media">
                    
        <div class="az-contact-action">
                    <a id="deleteSucess" href="<?php echo base_url(); ?>Events/Delete/<?php echo $selectedId; ?>" data-bs-toggle="modal" data-bs-target="#yesornomodal"><i class="typcn typcn-trash"></i> Delete Event</a>

                    <a title="Print" id="export_print" href="#" data-toggle="tooltip" onclick="Print()"><i class="typcn typcn-printer"></i>Print</a>
                    <a href="" data-bs-toggle="modal" data-bs-target=""><i class="fas fa-solid fa-file-pdf"></i>PDF</a>
                    <a href="" data-bs-toggle="modal" data-bs-target=""><i class="fas fa-solid fa-file-excel"></i></i>Excel</a>
        
       
        </div>
        </div>
        </div> 
        <!-- End of header -->
        
        <br>
  
        <!-- Body Contents -->
        <div class="az-content-body pd-lg-l-40 d-flex flex-column">
            <div class="az-content-label mg-b-10">Church Events and Activities</div>
            <p class="mg-b-20">This Page is used to record the attendance of our members.</p>

            <div id="wizard2">
                <!-- First tab -->
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
                            <!-- <a href="" class="btn btn-az-secondary pd-x-25 active" data-bs-toggle="modal" data-bs-target="#nonmembermodal"><span style="font-size: large;">+</span> Non-Member</a> -->
                            <button class="btn btn-primary btn-with-icon btn-block collapsed" data-bs-toggle="collapse" data-bs-target="#nonmembercollapse" id="non-member-button"><i class="typcn typcn-user-add"></i> Non-Member</button>
                            
                        </div>
                    </div><!-- form-group -->
                <br>
                    <!-- Non-Member Collapse Button -->
                <div class="collapse mg-t-5" id="nonmembercollapse" aria-expanded>
                
                    <div>
            
                        <!-- Body of the Collapse Button of Non-mem button -->
                        <div class="card card-body">
                   
                    <!-- Start of inputs -->
                    <label class="form-label">Name: <span class="tx-danger">*</span></label>

                    <!-- First name and Last name -->
                    <div class="row row-sm">
                        <div class="col-lg">
                            <input id="last_name" class="form-control" placeholder="Last Name" type="text" name="last_name" required>
                        </div><!-- col -->
                        <div class="col-lg mg-t-10 mg-lg-t-0">
                            <input id="first_name" class="form-control" placeholder="First Name" type="text" name="first_name" required>
                        </div><!-- col -->
                    </div><!-- row -->

                    <br>

                    <!-- Contact Number and Address -->
                    <div class="row row-sm">
                        <!-- Contact Number -->
                        <label class="form-label">Contact Number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Current Address:</label>
                        <div class="col-lg">
                            <input id="contactNum" class="form-control" placeholder="(000) 000-0000" type="text" name="contactNum">
                        </div><!-- col -->

                    <br>
                        <!-- Address -->
                        <div class="col-lg mg-t-10 mg-lg-t-0">
                            <textarea id="address" name ="address" rows="3" class="form-control" placeholder="Current Address"></textarea>
                        </div><!-- col -->
                    </div><!-- row -->

                    <br>
                    <!-- Gender, Network, and First Timer Flag -->
                    <div class="row row-sm">
                        
                    <label class="form-label">Gender: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Network:</label>

                        <div class="col-lg">
                            
                            <select id="gender" name="gender" class="form-control select2-no-search" data-parsley-class-handler="#genderWrapper" data-parsley-errors-container="#genderErrorContainer" style="width: 350px;">
                                    <option label="Choose one"></option>
                                    <option value="MALE">Male</option>
                                    <option value="FEMALE">Female</option>
                                </select>
                        </div><!-- col -->
                        <div class="col-lg">
                            <select id="network" name="network" class="form-control select2-no-search" data-parsley-class-handler="#networkWrapper" data-parsley-errors-container="#networkErrorContainer" style="width: 350px;">
                                    <option label="Choose one"></option>
                                    <option value="KIDDOS">Children (below 13 yrs. old)</option>
                                    <option value="CYN">CYN (13 to 22 yrs. old)</option>
                                    <option value="YAN">YAN (23 to 29 yrs. old)</option>
                                    <option value="MEN">Men (Adult Men, 30 yrs. old and above)</option>
                                    <option value="WOMEN">Women (Adult Women, 30 yrs. old and above)</option>
                                </select>
                        </div><!-- col -->
                       
                    </div><!-- row -->

                    <br>

                    <!-- First Timer -->
                    <div class="row row-sm">
                    <label class="form-label">First Timer:
                    
                        <div class="col-lg">
                            <select id="first_timer_flg" name="first_timer_flg" class="form-control select2-no-search" data-parsley-class-handler="#first_timer_flgkWrapper" data-parsley-errors-container="#first_timer_flgErrorContainer" style="width: 80px;">
                                        <option label="Choose one"></option>
                                        <option value="YES">YES</option>
                                        <option value="NO" selected>NO</option>
                                        
                            </select>
                        </div><!-- col -->
                    
                        <br>
                    
                    <!-- </form> -->
                    <br>
                    <div>
                        <button id="non-member-save" type="button" class="btn btn-indigo">Save</button>
                        <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                    
                    </div>
                </div>
                
                </section> <!-- End of 2nd tab -->

                 <!-- Third tab -->
                <!-- TO DO: Print the list of attendees in a table -->
                
                <h3>Event Attendees</h3>
                <section>
                <div id="eventAttendeesSection">
                    <h5><strong>Member Attendees</strong></h5>
                    <!-- TABLE CONTENTS -->
                    <?php 

                            echo '<div class="table-responsive">
                            <table class="table table-striped mg-b-0" id="memberAttendeesTbl">
                            <thead>
                                <tr>
                                <th>Row</th>
                                
                                <th>Name</th>
                                
                                <th>Network</th>
                                </tr>
                            </thead>
                            <tbody>';
                                    $rowCount = 1;

                                    foreach($eventAttendees as $eventAttendee):
                                    echo '
                                    <tr>
                                    <th scope="row">'. $rowCount . '</th>
                                    
                                    <td>'. $eventAttendee->LAST_NAME . ', ' . $eventAttendee->FIRST_NAME . '</td>
                                    
                                    <td>'. $eventAttendee->NETWORK . '</td>
                                    </tr>';
                                    
                                    $rowCount++;
                                    endforeach;

                                echo '</tbody>
                                </table>
                                </div><!-- bd -->';

                    ?>

                    <br>
                    <br>

                    <h5><strong>Non-Member Attendees</strong></h5>
                    <!-- TABLE CONTENTS -->
                    <?php 

                            echo '<div class="table-responsive">
                            <table class="table table-striped mg-b-0" id="nonMemberAttendeesTbl">
                            <thead>
                                <tr>
                                <th>Row</th>
                                
                                <th>Name</th>
                                
                                <th>Network</th>
                                </tr>
                            </thead>
                            <tbody>';
                                    $rowCount = 1;

                                    foreach($nonMemberAttendees as $nonMemberAttendee):
                                    echo '
                                    <tr>
                                    <th scope="row">'. $rowCount . '</th>
                                    
                                    <td>'. $nonMemberAttendee->LAST_NAME . ', ' . $nonMemberAttendee->FIRST_NAME . '</td>
                                    
                                    <td>'. $nonMemberAttendee->NETWORK . '</td>
                                    </tr>';
                                    
                                    $rowCount++;
                                    endforeach;

                                echo '</tbody>
                                </table>
                                </div><!-- bd -->';

                    ?>
                    </div>
                </section>
            </div>
        </div><!-- az-content-body -->
    </div>
</div><!-- az-content -->

<!-- DELETE MODAL -->
<div id="yesornomodal" class="modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Alert</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the Event Information permanently? </p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-indigo" onclick="location.href = '<?php echo base_url(); ?>Events/Delete/<?php echo $selectedId; ?>'">Save changes</button>
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->




<?php $this->load->view('dist/footer'); ?>

<script>

function Print() {
    Popup();
}

function Popup(){
    // alert($('#eventAttendeesSection').html());
    var mywindow = window.open('', '_blank');
    mywindow.document.write('<html><head><title>Event Attendees</title>');
    mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/azia.css">');
    mywindow.document.write('</head><body class="skin-blue">');
    // mywindow.document.write('<section class="content invoice">');
    // mywindow.document.write('<div class="row"><div class="col-xs-12"><h2 class="page-header"><i class="fa fa-globe"></i><small class="pull-right">Date:</small></h2></div></div>');
    mywindow.document.write($('#eventAttendeesSection').html());
    // mywindow.document.write('</section>');
    mywindow.document.write('</body></html>');
    mywindow.document.close();
    mywindow.focus();
    mywindow.print();
    // mywindow.close();
}

</script>

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
        var isCollapsed = $('#non-member-button').hasClass('collapsed');
        
        // Do not allow focus out if non-member is expanded
        if (isCollapsed) {
            $('#QRCode').focus();
        }
    });

    // Non-member-button click event listener
    $("#non-member-button").click(function() {
        var isCollapsed = $('#non-member-button').hasClass('collapsed');

        // If non-member form is expanded, default focus to Last Name
        if (!isCollapsed) {
            $('#last_name').focus();
        }
        // If non-member form is collapsed, return focus to the QR Code
        else {
            $('#QRCode').focus();
        }
    });
    
    // Non-member-save Button click event listener
    $('#non-member-save').click(function(){
        // Retrieve values of the non-member input
        // Getters
        var eventId = $('#event_id').parsley();
        var lastName = $('#last_name').parsley();
        var firstName = $('#first_name').parsley();
        var contactNum = $('#contactNum').parsley();
        var address = $('#address').parsley();
        var gender = $('#gender').parsley();
        var network = $('#network').parsley();
        var firstTimerFlag = $('#first_timer_flg').parsley();
        
        if( eventId.isValid() && lastName.isValid() && firstName.isValid() && contactNum.isValid() && address.isValid() && gender.isValid() && network.isValid() && firstTimerFlag.isValid() ) {

            var values = "event_id=" + $('#event_id').val()+ "&lastName=" + $('#last_name').val() + "&firstName=" + $('#first_name').val() 
                        + "&contactNum=" + $('#contactNum').val() + "&address=" + $('#address').val() + "&gender=" + $('#gender').val() + "&network=" + $('#network').val() + "&firstTimerFlag=" + $('#first_timer_flg').val();
            
            // AJAX Call to automatically save Non-Member
            $.ajax({
                type: "POST",
                url: "<?= base_url();?>Events/addEventNonMember",
                data: values,
                cache: false,
                error: function(ts){
                alert(ts.responseText);  
                },
                success: function(message){
                    // Add the member to the table Non-Member Table in the 3rd Section
                    // Add Member to the Member Attendees Table in Section 3
                    var rowCount = $('#nonMemberAttendeesTbl tr').length;
                    $('#nonMemberAttendeesTbl tr:last').after('<tr><th scope="row">' + rowCount + '</th><td>' + $('#last_name').val() + ', ' + $('#last_name').val() + '</td><td>' + $('#network').val() + '</td></tr>');

                    // Clear Non-member Form    
                    $('#last_name').val('');
                    $('#first_name').val('');
                    $('#contactNum').val('');
                    $('#address').val('');
                    $('#gender').empty();
                    $('#network').empty();
                    $('#first_timer_flg').val('NO').change();
                    $('#non-member-button').click();

                    // TODO: Add success message

                }
            });

            return true;
        } else {
                    lastName.validate();
                    firstName.validate();
                    contactNum.validate();
                    address.validate();
                    gender.validate();
                    network.validate();
                    firstTimerFlag.validate();
            }
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
                        var parsedJSON = jQuery.parseJSON(message);
                        $('#QRCodeName').addClass("list-arrow");
                        $('#QRCodeName').removeClass("typcn icon typcn-delete-outline text-danger");
                        $('#QRCodeName').html("<li><strong>" + parsedJSON.LAST_NAME + ", " + parsedJSON.FIRST_NAME + "</strong> successfully scanned.</li>");
                        $('#QRCode').val('');


                        // Add Member to the Member Attendees Table in Section 3
                        var rowCount = $('#memberAttendeesTbl tr').length;
                        $('#memberAttendeesTbl tr:last').after('<tr><th scope="row">' + rowCount + '</th><td>' + parsedJSON.LAST_NAME + ', ' + parsedJSON.FIRST_NAME + '</td><td>' + parsedJSON.NETWORK + '</td></tr>');
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

<script>
    $(function () {
        'use strict'

        // Toggle Switches
        $('.az-toggle').on('click', function () {
            $(this).toggleClass('on');
        })

        // Input Masks
        $('#dateMask').mask('99/99/9999');
        $('#contactNum').mask('(999) 999-9999');
        $('#phoneExtMask').mask('(999) 999-9999? ext 99999');
        $('#ssnMask').mask('999-99-9999');

        // Color picker
        $('#colorpicker').spectrum({
            color: '#17A2B8'
        });

        $('#showAlpha').spectrum({
            color: 'rgba(23,162,184,0.5)',
            showAlpha: true
        });

        $('#showPaletteOnly').spectrum({
            showPaletteOnly: true,
            showPalette: true,
            color: '#DC3545',
            palette: [
                ['#1D2939', '#fff', '#0866C6', '#23BF08', '#F49917'],
                ['#DC3545', '#17A2B8', '#6610F2', '#fa1e81', '#72e7a6']
            ]
        });

        // Datepicker
        $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });

        $('#datepickerNoOfMonths').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true,
            numberOfMonths: 2
        });
    });
</script>