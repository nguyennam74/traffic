<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct(){
        parent::__construct();
    }

    function index(){
        if(!isset($_SESSION['user']))
        {
            header("Location:./login");
        }
        $this->load->view('admin/index');
    }

    function ring(){
        if(!isset($_SESSION['user']))
        {
            header("Location:./login");
        }
        $this->load->view('admin/ring');
    }

    function login(){
        if(isset($_SESSION['user']))
        {
            header("Location:.");
        }
        if(isset($_POST['login']))
		{
			$check=$this->user->login();			
			if(count($check)==0)
			{
				echo"<script>alert('Sai email hoặc mật khẩu')</script>";
			}
			else
			{
				$_SESSION['user']=$_POST['user_name'];
				// echo"<script>alert('Đăng nhập thành công!')</script>";				
                foreach ($check as $user) {
                    $_SESSION['name']= $user['name'];
                }		
                echo"<script>location='.';</script>";
			}
        }
        $this->load->view('admin/login');
    }

    function registration(){        
        if(isset($_POST['registration'])){
			$this->user->registration();
		}
		$this->load->view('admin/registration');
    }

    function logout()
	{		
        unset($_SESSION['user']);
        header("Location:.");
    }
    
    function offramp(){
        if(!isset($_SESSION['user']))
        {
            header("Location:./login");
        }
        $this->load->view('admin/offramp');
    }

    function roadworks(){
        if(!isset($_SESSION['user']))
        {
            header("Location:./login");
        }
        $this->load->view('admin/roadworks');
    }

    function uphill(){
        if(!isset($_SESSION['user']))
        {
            header("Location:./login");
        }
        $this->load->view('admin/uphill');
    }

    function routing(){
        if(!isset($_SESSION['user']))
        {
            header("Location:./login");
        }
        $this->load->view('admin/routing');
    }

    function roundabout(){
        if(!isset($_SESSION['user']))
        {
            header("Location:./login");
        }
        $this->load->view('admin/roundabout');
    }
}