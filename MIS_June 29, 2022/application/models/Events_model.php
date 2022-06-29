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
                 . "  WHERE ea.EVENT_ID = evt.EVENT_ID) member_attendee_count, "
                 . " (SELECT COUNT(*) FROM ci_evt_non_member enm "
                 . " WHERE enm.EVENT_ID = evt.EVENT_ID) non_member_attendee_count"
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

    /**
     * Function to get event attendees of a specific Event
     */
    public function getEventAttendees($eventId) {
        $sql = "SELECT mem.FIRST_NAME, mem.LAST_NAME, mem.NETWORK 
        FROM ci_event evt, ci_event_attendee ea, ci_member mem
        WHERE evt.EVENT_ID = ea.EVENT_ID
        AND ea.MEMBER_ID = mem.MEMBER_ID
        AND evt.EVENT_ID = '$eventId'
        ORDER BY mem.LAST_NAME ASC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * Function to get event non-member attendees of a specific Event
     */
    public function getEventNonMemberAttendees($eventId) {
        $sql = "SELECT nonMem.FIRST_NAME, nonMem.LAST_NAME, nonMem.NETWORK 
        FROM ci_event evt, ci_evt_non_member nonMem
        WHERE evt.EVENT_ID = nonMem.EVENT_ID
        AND evt.EVENT_ID = '$eventId'
        ORDER BY nonMem.LAST_NAME ASC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

     // function to add non members to db 
     public function addNonMember($data) {
        // The correct syntax for update in the sql
        $this->db->insert('ci_evt_non_member', $data);
        return $this->db->insert_id();
    }
}

?>
