<?php
  class Leader {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    //DONE Get everything from the leaders 
    public function getLeaders(){
      $this->db->query('SELECT *,
                        CONCAT_WS(" ", firstName, lastName) AS name
                        FROM Leader
                        ORDER BY lastName;
                        ');

      $results = $this->db->resultSet();

      return $results;
    }


    //For adding a leader
    public function addLeader($data){
      $this->db->query('INSERT INTO Leader (firstName, lastName, email, phoneNumber) VALUES(:firstName, :lastName, :email, :phoneNumber)');
      // Bind values
      $this->db->bind(':firstName', $data['firstName']);
      $this->db->bind(':lastName', $data['lastName']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':phoneNumber', $data['phoneNumber']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  

    //DONE For editing a leader
    public function updateLeader($data){
      $this->db->query('UPDATE Leader SET firstName = :firstName, lastName = :lastName, email = :email, phoneNumber=:phoneNumber WHERE leaderID = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':firstName', $data['firstName']);
      $this->db->bind(':lastName', $data['lastName']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':phoneNumber', $data['phoneNumber']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
      return true;
    }

    //DONE Get the leader by ID 
    public function getLeaderById($id){
      $this->db->query('SELECT firstName, lastName, 
                        Leader.leaderID as id, 
                        CONCAT_WS(" ", Leader.firstName, Leader.lastName) as name,
                        Leader.email as email,
                        Leader.PhoneNumber as phoneNumber FROM Leader
                        WHERE Leader.leaderID = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    //DONE For deleting a leader
    public function deleteLeader($id){
      $this->db->query('DELETE FROM Leader WHERE leaderID = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    
  }