<?php
  class Volunteers extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

       $this->volunteerModel = $this->model('Volunteer');

    }

    //DONE Get the data for the volunteer index page 
    public function index(){
      // Get players
      $volunteers = $this->volunteerModel->getVolunteers();

      $data = [
        'volunteers' => $volunteers
      ];

      $this->view('volunteers/index', $data);
    }

    //DONE Will add a volunteer
    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize post array
        $_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'firstName' => trim($_post['firstName']),
          'lastName' => trim($_post['lastName']),
          'email' => trim($_post['email']),
          'phoneNumber' => trim($_post['phoneNumber']),
          'firstName_err' => '',
          'lastName_err' => '',
          'email_err' => '',
          'phoneNumber_err' => ''
        ];

        // Validate data
        if(empty($data['firstName'])){
          $data['firstName_err'] = 'Please enter a first name';
        }
        if(empty($data['lastName'])){
            $data['lastName_err'] = 'Please enter a last name';
          }
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter an email';
        }
        if(empty($data['phoneNumber'])){
            $data['phoneNumber_err'] = 'Please enter a phone number';
          }

        // Make sure no errors
        if(empty($data['firstName_err']) && empty($data['lastName_err']) && empty($data['email_err'])&& empty($data['phoneNumber_err'])){
          // Validated
    
          if($this->volunteerModel->addVolunteer($data)){
            redirect('volunteers');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('volunteers/add', $data);
        }

      } else {
        $data = [
          'firstName' => '',
          'lastName' => '',
          'email' => '',
          'phoneNumber' => ''
        ];
  
        $this->view('volunteers/add', $data);
      }
    }
    

    //DONE Will edit a volunteer
    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize post array
        $_post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'id' => $id,
            'firstName' => trim($_post['firstName']),
            'lastName' => trim($_post['lastName']),
            'email' => trim($_post['email']),
            'phoneNumber' => trim($_post['phoneNumber']),
            'firstName_err' => '',
            'lastName_err' => '',
            'email_err' => '',
            'phoneNumber_err' => ''
          ];
  

        // Validate data
        if(empty($data['firstName'])){
            $data['firstName_err'] = 'Please enter a first name';
        }
        if(empty($data['lastName'])){
            $data['lastName_err'] = 'Please enter a last name';
        }
        if(empty($data['email'])){
        $data['email_err'] = 'Please enter an email';
        }
        if(empty($data['phoneNumber'])){
            $data['phoneNumber_err'] = 'Please enter a phone number';
        }
        
  

        // Make sure no errors
        if(empty($data['firstName_err']) && empty($data['lastName_err']) && empty($data['email_err']) && empty($data['phoneNumber_err'])){
          // Validated
          if($this->volunteerModel->updateVolunteer($data)){
            redirect('volunteers');          
          } else {
            die('Something went wrong');
          }
          
          
        } else {
          // Load view with errors
          $this->view('volunteers/edit', $data);
        }

      } else {
        // Get existing player from model
        $leader = $this->volunteerModel->getVolunteerById($id);


        $data = [
          'id' => $id,
          'firstName' => $leader->firstName,
          'lastName' => $leader->lastName,
          'email' => $leader->email,
          'phoneNumber' => $leader->phoneNumber,
        ];
  
        $this->view('volunteers/edit', $data);
      }
    }
    

    //DONE Show a volunteer when clicked 
    public function show($id){
      $volunteer = $this->volunteerModel->getVolunteerById($id);

      $data = [
        'volunteer' => $volunteer,
      ];

      $this->view('volunteers/show', $data);
    }
    

    //Will delete a volunteer
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->volunteerModel->deleteVolunteer($id)){
          redirect('volunteers');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('volunteers');
      }
    }
    
  }