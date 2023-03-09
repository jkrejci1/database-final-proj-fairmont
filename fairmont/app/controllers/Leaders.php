<?php
  class Leaders extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

       $this->leaderModel = $this->model('Leader');

    }

    //DONE Get the data for the leader index page 
    public function index(){
      // Get players
      $leaders = $this->leaderModel->getLeaders();

      $data = [
        'leaders' => $leaders
      ];

      $this->view('leaders/index', $data);
    }

    //Will add a leader
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
    
          if($this->leaderModel->addLeader($data)){
            redirect('leaders');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('leaders/add', $data);
        }

      } else {
        $data = [
          'firstName' => '',
          'lastName' => '',
          'email' => '',
          'phoneNumber' => ''
        ];
  
        $this->view('leaders/add', $data);
      }
    }
    

    //DONE Will edit a leader
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
          if($this->leaderModel->updateLeader($data)){
            redirect('leaders');          
          } else {
            die('Something went wrong');
          }
          
          
        } else {
          // Load view with errors
          $this->view('leaders/edit', $data);
        }

      } else {
        // Get existing player from model
        $leader = $this->leaderModel->getLeaderById($id);


        $data = [
          'id' => $id,
          'firstName' => $leader->firstName,
          'lastName' => $leader->lastName,
          'email' => $leader->email,
          'phoneNumber' => $leader->phoneNumber,
        ];
  
        $this->view('leaders/edit', $data);
      }
    }
    

    //DONE Show a leader when clicked 
    public function show($id){
      $leader = $this->leaderModel->getLeaderById($id);

      $data = [
        'leader' => $leader,
      ];

      $this->view('leaders/show', $data);
    }

    //DONE Will delete a leader
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->leaderModel->deleteLeader($id)){
          redirect('leaders');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('leaders');
      }
    }
    
  }