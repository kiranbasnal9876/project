<?php

session_start();


class User_master
{
    private $con;

    public function __construct()
    {
        include("../dbcon.php");
        $this->con = $con;
        

    }

    function logIn()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        // include("validation.php");
        $sql = "select * from user_master where email='$email' and password='$password'";

        $result = mysqli_query($this->con, $sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['username'] = $row['create_by'];

                echo 1;
            }
        } else {

            echo 0;
        }
    }


    function adduser(){
      
        $email = $_POST["email"];
        $password = $_POST["password"];
        $name=$_POST['Name'];
        $phone=$_POST['phone'];
       
        
        if (!preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,3}$/", $email)) {
            echo "entered email is invalid";
        } 
        
        else if(!preg_match("/^(?=.*[A-Z])(?=.*[^%!@#$&*])(?=.*[0-9])(?=.*[a-z]).{8,20}$/", $password)) {
        echo "entered password is invalid";
        } 
       
        else if(!preg_match("/^[0-9]{10,12}$/",$phone)){
          echo "entered phone number is invalid";
        }

         else if(!preg_match("/^[a-zA-Z\s.]+$/",$name)){
            echo "entered name is invalid";
        }

     if(isset($_POST['id'])){
          
       $id=$_POST['id'];
        $sql="update  user_master
        set create_by='$name',
        email='$email',
        phone='$phone',
        password='$password' where id='$id'";
        
        
        if(!empty($email && $password && $name && $phone)){
        if(mysqli_query($this->con,$sql)==true)
        {
         
            
            echo 1;
        }
          
        }
    }

        
      else  if(!empty($email && $password && $name && $phone)){
            $sql="insert into user_master(create_by,email,phone,password)values('$name','$email','$phone','$password')";
            if(mysqli_query($this->con,$sql)==true)
            {
                
                echo 1;
            }
            else{
                echo $this->con->error;
            }
            }
    
    }


    function getdata(){
        
               $id=$_POST['id'];
               
               
               $sql="select * from user_master where id='{$id}'";
               
               $result=$this->con->query($sql);
               $data= $result->fetch_assoc();
               print_r(json_encode($data));
            }

    

function deletedata(){
    $id=$_POST['id'];
    
     $sql="delete from user_master where id='$id'";
     
     if(mysqli_query($this->con,$sql)==false){
                  
            echo $this->con->error;
               }
               else{
                   echo "success";
               }

      }

}

$user = new User_master();


if($_POST['action'] == "add"){
    $user->adduser();
}

else if($_POST['action']=="getdata"){
    $user->getdata();
}
else if($_POST['action']== "delete"){

    $user->deletedata();

}





?>