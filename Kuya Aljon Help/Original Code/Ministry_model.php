<?php

class Ministry_model extends CI_Model {

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
    /**
     * 
     * @return type
     */
    public function GetMinistries() {
        $sql = "SELECT * FROM ci_ministry ORDER BY ABBREVIATION ASC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * 
     * @param type $memberId
     * @return type
     */
    public function GetMinistry($ministryId) {
        $sql = "SELECT * FROM ci_ministry WHERE MINISTRY_ID = '$ministryId'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    // function to save members that were edited 
    public function saveMinistry($ministryId, $data) {
        // The correct syntax for update in the sql
        $this->db->where('MINISTRY_ID', $ministryId);
        $this->db->update('ci_ministry', $data);
    }

}


?>
