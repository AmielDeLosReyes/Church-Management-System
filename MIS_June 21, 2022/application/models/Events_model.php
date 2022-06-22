<?php

class Events_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * This function is used to add the event information in the database.
     * @param type $data
     */
    public function addEvent($data) {
        // The correct syntax for update in the sql
        $this->db->insert('ci_event', $data);
        return $this->db->insert_id();
    }
    
    public function addEventAttendee($data) {
        // The correct syntax for update in the sql
        $this->db->insert('ci_event_attendee', $data);
        return $this->db->insert_id();
    }
    
    /**
     * Function to Delete Attendee of an Event
     */
    public function deleteEventAttendee($eventId, $memberId) {
        // Delete Statement Where Member ID = $data->MEMBER_ID
        // The correct syntax for delete in the sql
        $this->db->where('MEMBER_ID', $memberId);
        $this->db->where('EVENT_ID', $eventId);
        $this->db->delete('ci_event_attendee');
    }
    
    public function updateEvent($eventId, $data) {
        // The correct syntax for update in the sql
        $this->db->where('EVENT_ID', $eventId);
        $this->db->update('ci_event', $data);
    }
    
    public function getEvents() {
            $sql = " SELECT evt.*, "
                 . " (SELECT COUNT(*) FROM ci_event_attendee ea "
                 . "  WHERE ea.EVENT_ID = evt.EVENT_ID) attendees_count "
                 . " FROM ci_event evt "
                 . " ORDER BY evt.EVENT_DTTM DESC ";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    
    /**
     * 
     * @param type $eventId
     * @return type
     */
    public function getEvent($eventId) {
        $sql = "SELECT * FROM ci_event WHERE EVENT_ID = '$eventId'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    // function to delete event
    public function deleteEvent($eventId) {
        // The correct syntax for delete in the sql
        $this->db->where('EVENT_ID', $eventId);
        $this->db->delete('ci_event');
    }
    
    /**
     * Function to Delete Attendee of an Event
     */
    public function deleteEventAttendees($eventId) {
        // Delete Statement Where Member ID = $data->MEMBER_ID
        // The correct syntax for delete in the sql
        $this->db->where('EVENT_ID', $eventId);
        $this->db->delete('ci_event_attendee');
    }
}

?>
