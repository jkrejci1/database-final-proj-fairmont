<?php
  class Schedule {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    //DONE: Function to get all the information for the schedules
    public function getSchedules(){
      $this->db->query('SELECT L.firstName as LeaderFirstName, 
                        L.lastName as LeaderLastName, 
                        L.leaderID as leaderID,
                        V.firstName as VolunteerFirstName, 
                        V.lastName as VolunteerLastName, 
                        V.volunteerID as volunteerID,
                        ScheduleID as id,
                        startTime as normStartTime,
                        endTime as normEndTime,
                        jobDate as normJobDate,
                        TIME_FORMAT(startTime, "%h:%i %p")startTime, 
                        TIME_FORMAT(endTime, "%h:%i %p")endTime, 
                        DATE_FORMAT(jobDate, "%m/%d/%y")jobDate FROM Schedule
                        JOIN Leader L ON L.leaderID = Schedule.leaderID
                        JOIN Volunteer V ON V.volunteerID = Schedule.volunteerID
                        ORDER BY VolunteerLastName');

      $results = $this->db->resultSet();

      return $results;
    }

    //Function to get all current volunteers
    public function getVolunteers(){
      $this->db->query('SELECT firstName, lastName, volunteerID FROM Volunteer');

      $results = $this->db->resultSet();

      return $results;
    }

    //Function to get all current leaders
    public function getLeaders(){
      $this->db->query('SELECT firstName, lastName, leaderID FROM Leader');

      $results = $this->db->resultSet();

      return $results;
    }

    //This will be eventually for adding a schedule
    public function addSchedule($data){

      //Insert id's of the volunteer and leader and all other information
      $this->db->query('INSERT INTO Schedule (leaderID, volunteerID, startTime, endTime, jobDate) VALUES(:leaderID, :volunteerID, :startTime, :endTime, :jobDate)');
      // Bind values
      $this->db->bind(':leaderID', $data['leaderID']);
      $this->db->bind(':volunteerID', $data['volunteerID']);
      $this->db->bind(':startTime', $data['startTime']);
      $this->db->bind(':endTime', $data['endTime']);
      $this->db->bind(':jobDate', $data['jobDate']);
      

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
    

    //Function for editing a schedule
    public function updateSchedule($data){
      $this->db->query('UPDATE Schedule SET jobDate = :normJobDate, startTime = :normStartTime, endTime = :normEndTime WHERE ScheduleID = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':normJobDate', $data['normJobDate']);
      $this->db->bind(':normStartTime', $data['normStartTime']);
      $this->db->bind(':normEndTime', $data['normEndTime']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
      return true;
    }
    
    
    //DONE: Going to get schedule by id along with other important information
    public function getScheduleById($id){
      $this->db->query('SELECT L.firstName as LeaderFirstName, 
                               L.lastName as LeaderLastName, 
                               V.firstName as VolunteerFirstName, 
                               V.lastName as VolunteerLastName, 
                               ScheduleID as id,
                               startTime as normStartTime,
                               endTime as normEndTime,
                               jobDate as normJobDate,
                               TIME_FORMAT(startTime, "%h:%i %p")startTime, 
                               TIME_FORMAT(endTime, "%h:%i %p")endTime, 
                               DATE_FORMAT(jobDate, "%m/%d/%y")jobDate FROM Schedule
                               JOIN Leader L ON L.leaderID = Schedule.leaderID
                               JOIN Volunteer V ON V.volunteerID = Schedule.volunteerID
                               WHERE Schedule.ScheduleID = :id');
      $this->db->bind(':id', $id);

      //REMEMBER PROBLEM THAT I WAS HAVING IS THAT I DIDNT PUT THE WHERE... PART IN THE QUERY

      $row = $this->db->single();

      return $row;
    }

    //DONE: Function used to delete a schedule
    public function deleteSchedule($id){
      $this->db->query('DELETE FROM Schedule WHERE ScheduleID = :id');
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