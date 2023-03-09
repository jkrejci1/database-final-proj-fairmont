<?php
  class Schedules extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

       $this->scheduleModel = $this->model('Schedule');

    }

    public function index(){
      // Get teams
      $schedules = $this->scheduleModel->getSchedules();

      $data = [
        'schedules' => $schedules
      ];

      $this->view('schedules/index', $data);
    }

    //Function for adding a schedule
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize post array
        $_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'volunteerID' => $_post['volunteerID'],
          'leaderID' => $_post['leaderID'],
          'jobDate' => trim($_post['jobDate']),
          'startTime' => trim($_post['startTime']),
          'endTime' => trim($_post['endTime']),
          'jobDate_err' => '',
          'startTime_err' => '',
          'endTime_err' => ''        
        ];

        // Validate data
        if(empty($data['jobDate'])){
          $data['jobDate_err'] = 'Please enter a date';
        }
        if(empty($data['startTime'])){
            $data['startTime_err'] = 'Please enter a start time';
        }
        if(empty($data['endTime'])){
            $data['endTime_err'] = 'Please enter an end time';
        }

        // Make sure no errors
        if(empty($data['jobDate_err']) && empty($data['startTime_err']) && empty($data['endTime_err'])){
          // Validated
          if($this->scheduleModel->addSchedule($data)){
            redirect('schedules');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('schedules/add', $data);
        }

      } else {

        //Get the volunteer and leader data needed from our database
        $volunteers = $this->scheduleModel->getVolunteers();
        $leaders = $this->scheduleModel->getLeaders();

        $data = [

          'jobDate' => '',
          'startTime' => '',
          'endTime' => '',
          'volunteers' => $volunteers,
          'leaders' => $leaders
        ];
  
        $this->view('schedules/add', $data);
      }
    }
    
    public function edit($id){

      //Edit the schedule
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize post array
        $_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
         'id' => $id,
         'normJobDate' => trim($_post['normJobDate']),
         'normStartTime' => trim($_post['normStartTime']),
         'normEndTime' => trim($_post['normEndTime']),
         'normJobDate_err' => '',
         'normStartTime_err' => '',
         'normEndTime_err' => ''
       ];

        // Validate data
        if(empty($data['normJobDate'])){
        $data['date_err'] = 'Please enter a date';
        }
        if(empty($data['normStartTime'])){
            $data['startTime_err'] = 'Please enter a start time';
        }
        if(empty($data['normEndTime'])){
          $data['endTime_err'] = 'Please enter an end time';
        }

        // Make sure no errors RESUME
        if(empty($data['normJobDate_err']) && empty($data['normStartTime_err']) && empty($data['normEndTime_err'])){
          // Validated
          if($this->scheduleModel->updateSchedule($data)){
            redirect('schedules');          
          } else {
            die('Something went wrong');
          }
          
        } else {
          // Load view with errors
          $this->view('schedules/edit', $data);
        }

      } else {
        // Get existing team from model
        $schedule = $this->scheduleModel->getScheduleById($id);


        $data = [
          'id' => $id,
          'normJobDate' => $schedule->normJobDate,
          'normStartTime' => $schedule->normStartTime,
          'normEndTime' => $schedule->normEndTime
        ];
  
        $this->view('schedules/edit', $data);
      }
    }

    public function show($id){
      
      $schedule = $this->scheduleModel->getScheduleById($id);

      $data = [
        'schedule' => $schedule
      ];

      $this->view('schedules/show', $data);
    }

    //DONE: Controller function for deleting a schedule
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->scheduleModel->deleteSchedule($id)){
          //flash('post_message', 'Team Removed');
          redirect('schedules');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('schedules');
      }
    }
  }