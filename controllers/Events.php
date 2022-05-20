<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('events_model');
    }

    public function index() {
        #Redirect to Admin dashboard after authentication
        if ($this->session->userdata('userLoginAccess') == 1) {
            if ($this->session->userdata('userLoginAccess') != False) {

                // Get Number of Members
                $data['title'] = "Events";
                //$data['members'] = $this->member_model->GetMembers();
                //$data['selectedId'] = $data['members'][0]->MEMBER_ID;
                
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
