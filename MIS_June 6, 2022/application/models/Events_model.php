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
    
    public function updateEvent($eventId, $data) {
        // The correct syntax for update in the sql
        $this->db->where('EVENT_ID', $eventId);
        $this->db->update('ci_event', $data);
    }
}

?>
