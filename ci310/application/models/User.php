<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
	function __construct(){
		parent::__construct();
    }

    function login(){        
        $user_name=$_POST['user_name'];
        $password=md5($_POST['password']);
        $sql="select * from users where account='$user_name' and password='$password'";
        $kq=$this->db->query($sql);
        return $kq->result_array();	
    }

    function registration(){
        $account=$_POST['username'];
        $password=md5($_POST['password']);
        $confirm=md5($_POST['confirm_password']);
        $name=$_POST['name'];
        if($password != $confirm)
        {
            echo"<script>alert('Xác nhận mật khẩu không đúng!');</script>";
        }
        else
        {
            $sql1="select * from users where account='$account'";
            $result=$this->db->query($sql1);
            if($result->num_rows()>0)
            {
                echo"<script>alert('Tên đăng nhập đã tồn tại!');</script>";
            }
            else{
            
            $sql="insert users(account,password,confirm_password, name) values('$account','$password','$confirm',N'$name')";
            $this->db->query($sql);
            echo"<script>alert('Đăng ký thành công. Mời bạn đăng nhập!'); location='login'</script>";
            }
        }    
    }
}