<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    //If you edited this, then the data in the index that says soccer league will be edited, same with about
    public function index(){
      $data = [
        'title' => 'Fairmont Community Partenership Group Inc.',
        'description' => 'This is an application to manage Fairmont Community Scheduling.'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'The Fairmont Community Partnership Group Inc. is dedicated to enhancing and improving the lives of Fairmont residents.'
      ];

      $this->view('pages/about', $data);
    }
  }