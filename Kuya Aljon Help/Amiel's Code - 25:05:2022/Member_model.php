<?php

class Member_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * 
     * @return type
     */
    public function GetMembers() {
        $sql = "SELECT * FROM ci_member ORDER BY LAST_NAME ASC";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * Grab Ministries data
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
    public function GetMember($memberId) {
        $sql = "SELECT * FROM ci_member WHERE MEMBER_ID = '$memberId'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    /**
     * Grab one Ministry data
     */
    public function GetMinistry($ministryId) {
        $sql = "SELECT * FROM ci_ministry WHERE MINISTRY_ID = '$ministryId'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    // function to save members that were edited 
    public function saveMember($memberId, $data) {
        // The correct syntax for update in the sql
        $this->db->where('MEMBER_ID', $memberId);
        $this->db->update('ci_member', $data);
    }

    // function to add members that were edited 
    public function addMember($data) {

        // The correct syntax for update in the sql
        $this->db->insert('ci_member', $data);
    }

    // function to delete member/s 
    public function deleteMember($memberId) {
        // The correct syntax for delete in the sql
        $this->db->where('MEMBER_ID', $memberId);
        $this->db->delete('ci_member');
    }

    // function to add members that were edited 
    public function addToMinistry($ministryId) {

        // The correct syntax for update in the sql
        // $this->db->where('MINISTRY_ID', $ministryId);
        $this->db->insert('ci_ministry_mem', $data);
    }

}

?>
