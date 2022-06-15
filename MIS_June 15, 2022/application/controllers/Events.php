<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('events_model');
        $this->load->model('member_model');
    }

    public function index() {
        #Redirect to Admin dashboard after authentication
        if ($this->session->userdata('userLoginAccess') == 1) {
            if ($this->session->userdata('userLoginAccess') != False) {

                // Get Number of Members
                $data['title'] = "Events";
                $data['events'] = $this->events_model->getEvents();
                
                
                $this->load->view('dist/events', $data);
            } else {
                 redirect(base_url() . 'Login');
             }
         }
         else {
             $data = array();
             redirect(base_url() . 'Login');
         }
    }
    
     /**
     * This function is used to redirect the page to the View Events Page
     * @param type $eventId
     */
    public function View($eventId) {
        #Redirect to Admin dashboard after authentication
        if ($this->session->userdata('userLoginAccess') == 1) {
            if ($this->session->userdata('userLoginAccess') != False) {

                

                // Get Number of Members
                $data['title'] = "Events";
                $data['events'] = $this->events_model->getEvents();
                $data['selectedId'] = $eventId;
                $data['selectedEvent'] = $this->events_model->getEvent($eventId)[0];
            
               
                

                $this->load->view('dist/viewEvent', $data);
            }
            else {
                redirect(base_url() . 'Login');
            }
        }
        else {
            redirect(base_url() . 'Login');
        }
    }
    
    public function addEventAttendee() {
        #Redirect to Admin dashboard after authentication
        if ($this->session->userdata('userLoginAccess') == 1) {
            if ($this->session->userdata('userLoginAccess') != False) {
                // Retrieve the Form values
                $eventId = $this->input->post('event_id');
                $memberId = $this->input->post('QRCode');
                
                // Retrieve name of the Member that has been added
                $member = $this->member_model->GetMember($memberId);
                
                // Validate if a member has been retrieved
                if (sizeof($member) > 0) {
                    // Insert to database
                    $data = array(
                        'EVENT_ID' => $eventId,
                        'MEMBER_ID' => $memberId
                    );

                    // Delete Attendee first before adding to avoid duplication
                    $this->events_model->deleteEventAttendee($eventId, $memberId);

                    // Function call addEventAttendee
                    $this->events_model->addEventAttendee($data);

                    echo $member[0]->LAST_NAME . ', ' . $member[0]->FIRST_NAME;
                }
                else {
                    echo "Invalid QR Code. No member found.";
                }
            }
            else {
                redirect(base_url() . 'Login');
            }
        }
        else {
            $data = array();
            redirect(base_url() . 'Login');
        }
    }
    
    public function saveEvent() {
        #Redirect to Admin dashboard after authentication
        if ($this->session->userdata('userLoginAccess') == 1) {
            if ($this->session->userdata('userLoginAccess') != False) {
                // Retrieve the Form values
                $eventId = $this->input->post('event_id');
                $description = $this->input->post('description');
                $eventDttm = $this->input->post('event_dttm');
                $evtStatusFlg = $this->input->post('status');
                $longDesc = $this->input->post('long_desc');
                
                // Validate if the Event ID is either blank or null
                if ($eventId == '' || $eventId == ' ') {
                    // Insert to database if the Event ID is blank
                    $data = array(
                        'DESCRIPTION' => $description,
                        'EVENT_DTTM' => $eventDttm . ':00.00000',
                        'EVT_STATUS_FLG' => $evtStatusFlg,
                        'LONG_DESC' => $longDesc
                    );

                    // function call saveMember
                    $insertedId = $this->events_model->addEvent($data);
                    
                    echo $insertedId;
                }
                else {
                    // Update the existing record in the database
                    $data = array(
                        'DESCRIPTION' => $description,
                        'EVENT_DTTM' => $eventDttm . ':00.00000',
                        'EVT_STATUS_FLG' => $evtStatusFlg,
                        'LONG_DESC' => $longDesc
                    );

                    // function call saveMember
                    $this->events_model->updateEvent($eventId, $data);
                    
                    echo $eventId;
                }
            }
            else {
                redirect(base_url() . 'Login');
            }
        }
        else {
            $data = array();
            redirect(base_url() . 'Login');
        }
    }

}
