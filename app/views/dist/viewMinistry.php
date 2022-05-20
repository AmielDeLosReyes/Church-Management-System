<?php $this->load->view('dist/header'); ?>

<div class="az-content az-content-app az-content-contacts pd-b-0">
    <div class="container">
        <div class="az-content-left az-content-left-contacts">

            <div class="az-content-breadcrumb lh-1 mg-b-10">
                <span>Main Menu</span>
                <span>Ministries</span>
            </div>
            <h2 class="az-content-title tx-24 mg-b-30">Ministries</h2>

            <nav class="nav az-nav-line az-nav-line-chat">
                <a href="<?php echo base_url(); ?>Ministries" class="nav-link active">All Ministries</a>
                
            </nav>

            <div id="azContactList" class="az-contacts-list">


                <!-- php code to print the information of the church ministries -->
                <?php
                $newLetter = ($ministries[0]->ABBREVIATION)[0];
                $previousLetter = "";
              

                foreach ($ministries as $ministry):

                    if ($previousLetter != ($ministry->ABBREVIATION)[0]) {
                        $newLetter = ($ministry->ABBREVIATION)[0];
                        $previousLetter = $newLetter;
                        echo '<div class="az-contact-label">' . $newLetter . '</div>';
                    }
                    ?>
                    <div class="az-contact-item <?php if ($selectedId == $ministry->MINISTRY_ID) echo 'selected'; ?>" onclick="location.href = '<?php echo base_url(); ?>Ministries/ViewMinistry/<?php echo $ministry->MINISTRY_ID ?>'">
                        <div class="az-avatar bg-gray-700 online">
                            <!--<img src="../img/faces/face20.jpg" alt="">-->
                            <?php echo $newLetter ?>
                        </div>
                        <div class="az-contact-body">
                            <h6><?php echo $ministry->ABBREVIATION ?></h6>
                            <span class="phone"><?php echo $ministry->DESCRIPTION ?></span>
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
                        <!-- <img src="../img/faces/face20.jpg" alt=""> -->
                    

                        <?php echo ($selectedMinistry->ABBREVIATION)[0] ?>
                        <!--<a href=""><i class="typcn typcn-camera-outline"></i></a>-->
                    </div>
                    <div class="media-body">
                        <h4>
                            <!-- dito ung big header name -->
                            <?php echo $selectedMinistry->DESCRIPTION?></h4>

                            <!-- The bio for the main header -->
                        <!-- <p><?php echo $selectedMinistry->ABBREVIATION?></p> -->
                        
                <!-- TO DO -->

                        <nav class="nav">
                          <!--<a href="" class="nav-link"><i class="typcn typcn-device-phone"></i> Call</a>
                          <a href="" class="nav-link"><i class="typcn typcn-messages"></i> Message</a> -->
                            <a href="" class="nav-link"><i class="typcn typcn-user-add-outline"></i> Add to Ministry</a>
                           
                        </nav>
                    </div><!-- media-body -->
                </div><!-- media -->
                <!-- <div class="az-contact-action">
                    <a href="<?php echo base_url(); ?>Members/Edit/<?php echo $selectedId; ?>"><i class="typcn typcn-edit"></i> Edit Ministry</a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#yesornomodal"><i class="typcn typcn-trash"></i> Delete Ministry</a>
                    <a href="<?php echo base_url(); ?>Members/Add"><i class="typcn typcn-document-add"></i> Add Member</a>
                </div>az-contact-action -->

                 <!-- ACTIONS -->
            <div class="az-contact-action">
                    <a href="<?php echo base_url(); ?>Ministries/Edit/<?php echo $selectedId; ?>"><i class="typcn typcn-edit"></i> Edit Ministry</a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#yesornomodal"><i class="typcn typcn-trash"></i> Delete Ministry</a>
                    <a href="<?php echo base_url(); ?>Ministris/Add"><i class="typcn typcn-document-add"></i> Add Ministry</a>
                </div><!-- az-contact-action -->

            </div><!-- az-contact-info-header -->
            <div class="az-profile-body">

            <div class="row mg-b-20">
              <div class="col-md-7 col-xl-8">
                <div class="az-profile-view-chart">
                  <canvas id="chartArea"></canvas>
                  <div class="az-profile-view-info">
                    <div class="d-flex align-items-baseline">
                      <h6>508</h6>
                      <span>+1.2% since last week</span>
                    </div>
                    <p>Members added past 10 days</p>
                  </div>
                </div>
              </div><!-- col -->
              <div class="col-md-5 col-xl-4 mg-t-40 mg-md-t-0">
                <div class="az-content-label tx-13 mg-b-20">Ministry Details</div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>People with title Founder &amp; CEO</span>
                    <span>24 <span>(20%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar wd-20p" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>People with title UX Designer</span>
                    <span>16 <span>(15%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-success wd-15p" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>People with title Recruitment</span>
                    <span>87 <span>(45%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-pink wd-45p" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
                <div class="az-traffic-detail-item">
                  <div>
                    <span>People with title Software Engineer</span>
                    <span>32 <span>(25%)</span></span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-teal wd-25p" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div><!-- progress -->
                </div>
              </div><!-- col -->
            </div><!-- row -->

            <hr class="mg-y-40">

            <div class="row">
              <div class="col-md-7 col-xl-8">
                <div class="az-content-label tx-13 mg-b-25">Ministry Information</div>
                

          <!-- TABLE CONTENTS -->
          <div class="table-responsive">
            <table class="table table-striped mg-b-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Network</th>
                  <th>Gender</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>$320,800</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Garrett Winters</td>
                  <td>Accountant</td>
                  <td>$170,750</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Ashton Cox</td>
                  <td>Junior Technical Author</td>
                  <td>$86,000</td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Cedric Kelly</td>
                  <td>Senior Javascript Developer</td>
                  <td>$433,060</td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Airi Satou</td>
                  <td>Accountant</td>
                  <td>$162,700</td>
                </tr>
              </tbody>
            </table>
          </div><!-- bd -->

             
            <div class="mg-b-20"></div>

          </div><!-- az-profile-body -->
        </div><!-- az-content-body -->
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

    new PerfectScrollbar('.az-contact-info-body', {
            suppressScrollX: true
        });

    });
</script>
</body>
</html>


