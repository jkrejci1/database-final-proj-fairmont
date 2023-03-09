<?php
  class Volunteer {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    //DONE Get everything from the volunteers
    public function getVolunteers(){
      $this->db->query('SELECT *,
                        CONCAT_WS(" ", firstName, lastName) AS name
                        FROM Volunteer
                        ORDER BY lastName;
                        ');

      $results = $this->db->resultSet();

      return $results;
    }


    //For adding a volunteer
    public function addVolunteer($data){
      $this->db->query('INSERT INTO Volunteer (firstName, lastName, email, phoneNumber) VALUES(:firstName, :lastName, :email, :phoneNumber)');
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
  

    //DONE For editing a volunteer
    public function updateVolunteer($data){
      $this->db->query('UPDATE Volunteer SET firstName = :firstName, lastName = :lastName, email = :email, phoneNumber=:phoneNumber WHERE volunteerID = :id');
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
    public function getVolunteerById($id){
      $this->db->query('SELECT firstName, lastName, 
                        Volunteer.volunteerID as id, 
                        CONCAT_WS(" ", Volunteer.firstName, Volunteer.lastName) as name,
                        Volunteer.email as email,
                        Volunteer.PhoneNumber as phoneNumber FROM Volunteer
                        WHERE Volunteer.volunteerID = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    //DONE For deleting a volunteer
    public function deleteVolunteer($id){
      $this->db->query('DELETE FROM Volunteer WHERE volunteerID = :id');
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