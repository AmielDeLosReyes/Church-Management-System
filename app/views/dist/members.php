<?php $this->load->view('dist/header'); ?>

<div class="az-content az-content-app az-content-contacts pd-b-0">
    <div class="container">
        <div class="az-content-left az-content-left-contacts">

            <div class="az-content-breadcrumb lh-1 mg-b-10">
                <span>Main Menu</span>
                <span>Members</span>
            </div>
            <h2 class="az-content-title tx-24 mg-b-30">Members</h2>

            <nav class="nav az-nav-line az-nav-line-chat">
                <a href="<?php echo base_url(); ?>Members" class="nav-link active">All Members</a>
                <a href="<?php echo base_url(); ?>Ministries" class="nav-link">Ministries</a>
            </nav>

            <div id="azContactList" class="az-contacts-list">


                <!-- php code to print the information of the church members -->
                <?php
                $newLetter = ($members[0]->LAST_NAME)[0];
                $previousLetter = "";
                $rowNum = 0;

                foreach ($members as $member):

                    $rowNum++;

                    if ($previousLetter != ($member->LAST_NAME)[0]) {
                        $newLetter = ($member->LAST_NAME)[0];
                        $previousLetter = $newLetter;
                        echo '<div class="az-contact-label">' . $newLetter . '</div>';
                    }
                    ?>
                    <div class="az-contact-item <?php if ($rowNum == 1) echo 'selected'; ?>" onclick="location.href = '<?php echo base_url(); ?>Members/View/<?php echo $member->MEMBER_ID ?>'">
                        <div class="az-avatar bg-gray-700 online">
                            <!--<img src="../img/faces/face20.jpg" alt="">-->
                            <?php echo $newLetter . ($member->FIRST_NAME)[0]; ?>
                        </div>
                        <div class="az-contact-body">
                            <h6><?php echo $member->LAST_NAME . ', ' . $member->FIRST_NAME ?></h6>
                            <span class="phone"><?php echo $member->CONTACT_NUMBER; ?></span>
                        </div><!-- az-contact-body -->
                        <a href="" class="az-contact-star active"><i class="typcn typcn-star"></i></a>
                    </div><!-- az-contact-item -->

                <?php endforeach; ?>

                <!-- end of printing --> 


            </div><!-- az-contacts-list -->

        </div><!-- az-content-left -->
        <div class="az-content-body az-content-body-contacts">

            <!-- Alert message for succesfully deleting a member -->
            <?php
            if ($message != '') {
                echo '<div class="alert alert-success" role="alert">

	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	            <strong>Done! </strong>' . $message . '
	        </div>';
            }
            ?> 
            <div class="az-contact-info-header">
                <div class="media">
                    <div class="az-avatar avatar-xxl d-none d-sm-flex online">
                        <img src="../img/faces/face20.jpg" alt="">
                        <?php echo ($members[0]->LAST_NAME)[0] . ($members[0]->FIRST_NAME)[0]; ?>
                        <!--<a href=""><i class="typcn typcn-camera-outline"></i></a>-->
                    </div>
                    <div class="media-body">
                        <h4>
                            <!-- dito ung big header name -->
                            <?php echo $members[0]->LAST_NAME . ', ' . $members[0]->FIRST_NAME ?></h4>
                        <p><?php echo $members[0]->NETWORK . ' ' . "Network" ?></p>
                        <nav class="nav">
                          <!--<a href="" class="nav-link"><i class="typcn typcn-device-phone"></i> Call</a>
                          <a href="" class="nav-link"><i class="typcn typcn-messages"></i> Message</a> -->
                            <a href="" class="nav-link"><i class="typcn typcn-user-add-outline"></i> Add to Ministry</a>
                            <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#resendqrmodal"><i class="typcn typcn-location-arrow"></i> Resend QR Code</a> 
                        </nav>
                    </div><!-- media-body -->
                </div><!-- media -->
                <div class="az-contact-action">
                    <a href="<?php echo base_url(); ?>Members/Edit/<?php echo $selectedId; ?>"><i class="typcn typcn-edit"></i> Edit Member</a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#yesornomodal"><i class="typcn typcn-trash"></i> Delete Member</a>
                    <a href="<?php echo base_url(); ?>Members/Add"><i class="typcn typcn-document-add"></i> Add Member</a>
                </div><!-- az-contact-action -->

            </div><!-- az-contact-info-header -->
            <div class="az-contact-info-body">
                <div class="media-list">
                    <div class="media">
                        <div class="media-icon"><i class="fas fa-mobile-alt"></i></div>
                        <div class="media-body">
                            <!-- <div>
                              <label>Work</label>
                              <span class="tx-medium">+1 (234) 567 8901</span>
                            </div> -->
                            <div class>
                                <label>Contact Number</label>
                                <span class="tx-medium"><?php echo $members[0]->CONTACT_NUMBER ?></span>
                            </div>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="media-icon align-self-start"><i class="far fa-envelope"></i></div>
                        <div class="media-body">
                            <div>
                                <label>Email Address</label>
                                <span class="tx-medium"><?php echo $members[0]->EMAIL ?></span>
                            </div>
                            <!-- <div class="ms-3">
                              <label>Other Account</label>
                              <span class="tx-medium">me@bootstrapdash.me</span>
                            </div> -->
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="media-icon"><i class="far fa-map"></i></div>
                        <div class="media-body">
                            <div>
                                <label>Current Address</label>
                                <span class="tx-medium"><?php echo $members[0]->ADDRESS ?></span>
                            </div>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="media-icon"><i class="fas <?php echo ($members[0]->GENDER == 'MALE') ? 'fa-male' : 'fa-female'; ?>"></i></div>
                        <div class="media-body">
                            <div>
                                <label>Gender</label>
                                <span class="tx-medium"><?php echo $members[0]->GENDER ?></span>
                            </div>
                        </div><!-- media-body -->
                    </div><!-- media -->
                    <div class="media">
                        <div class="media-icon"><i class="fas fa-birthday-cake"></i></div>
                        <div class="media-body">
                            <div>
                                <label>Birth Date</label>
                                <span class="tx-medium"><?php echo date("F j, Y", strtotime($members[0]->BIRTHDATE)); ?></span>
                            </div>
                        </div><!-- media-body -->
                    </div><!-- media -->


                </div><!-- media-list -->
            </div><!-- az-contact-info-body -->
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
                <p>Are you sure you want to delete the Member Information permanently? </p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-indigo" onclick="location.href = '<?php echo base_url(); ?>Members/Delete/<?php echo $selectedId; ?>'">Save changes</button>
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<!-- RESEND QR MODAL -->
<div id="resendqrmodal" class="modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Alert</h6>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to resend the QR Code to <?php echo $members[0]->EMAIL ?>? </p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-indigo" onclick="location.href = '<?php echo base_url(); ?>Members/Resend/<?php echo $selectedId; ?>'">Proceed</button>
                <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div><!-- modal-dialog -->
</div><!-- modal -->

<?php $this->load->view('dist/footer'); ?>

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

    });
</script>


