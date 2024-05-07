
<?php
  session_start();
  include('config/dbcon.php');

  if(isset($_POST['addUser']))
  {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    if($password == $confirmpassword)
    {
      $check = "SELECT email from users where email='$email' ";
      $checkmail = mysqli_query($conn,$check);

      if(mysqli_num_rows($checkmail) > 0)
      { 
        // Taken Already Exists
        $_SESSION['status'] = "User Add Succcesfully";
        echo "<script>window.location='register.php';</script>";
        }
        
        
        else{

          $sql = "INSERT INTO users(id,name,email,phone)
          values('$id','$name','$email','$phone')";

          $result = mysqli_query($conn,$sql);

          if($result){
            $_SESSION['status'] = "User Added Successfully";
            header('Location: register.php');
          }else{
            $_SESSION['status'] = "User Not Added Successfully";
            header('Location" register.php');
          }

          $_SESSION['status'] = "User Not Add Succesfully";
          echo "<script>window.location='register.php';</script>";
        }
      }

    
  }
  else{
    $_SESSION['status'] = "Password and Confirm Password Does Not Match";
    echo "<script>window.location='register.php';</script>";
    // header('Location : registered.php');
  }


      if(isset($_POST['updateUser'])){

        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "UPDATE users SET name = '$name', phone = '$phone', email = '$email', password ='$password' Where id='$user_id' ";
        $query =  mysqli_query($conn, $sql);

        if($query){
          $_SESSION['status'] = "User Updated Successfully";
            // header('Location : register.php');
            echo "<script>window.location='register.php';</script>";
        }else{
          $_SESSION['status'] = "User Updated Failed";
          echo "<script>window.location='register.php';</script>";
        }
      }


      if(isset($_POST['DeleteUserbtn'])) {
        $user_id = $_POST['delete_id'];
    
        $sql = "DELETE FROM users WHERE id='$user_id'"; 
    
        $result = mysqli_query($conn, $sql);
    
        if($result) { 

            $_SESSION['status'] = "User Deleted Successfully";
            echo "<script>window.location='register.php';</script>";
        } else {
            $_SESSION['status'] = "User Deleting Failed";
            echo "<script>window.location='register.php';</script>";
        }
    }
    
?>