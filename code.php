<?php 
session_start();
$connection=mysqli_connect("localhost","root","","glowglam");


if(isset($_POST['addwarning']))
{
    $hr_id = $_POST['hrid'];
    $admin_id=$_POST['adminid'];
    $hr_email = $_POST['hremail'];
    $admin_email = $_POST['adminemail'];
    $warning=$_POST['warning'];

      
                $query = "INSERT INTO penalty (hr_id,admin_id,hr_email,admin_email,warning) VALUES ('$hr_id','$admin_id','$hr_email','$admin_id','$warning')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
               
                $_SESSION['success'] = "Warning Added";
                header('Location: hr.php');
            }
            else 
            {
                $_SESSION['status'] = "Warning Not Added";
                header('Location: hr.php');  
            }


            }
            
        
       
    

if(isset($_POST['updatehrbtn']))
{
    $hredit_id=$_POST['hredit_id'];
    $adminedit_id=$_POST['adminedit_id'];
    $hredit_email=$_POST['hredit_email'];
    $adminedit_email=$_POST['adminedit_email'];
    $edit_warning=$_POST['edit_warning'];

    $query="UPDATE penalty SET hr_id='$hredit_id', admin_id='$adminedit_id',hr_email='$hredit_email',admin_email='$adminedit_email', warning='$edit_warning'  WHERE hr_id='$hredit_id'";
    $query_run= mysqli_query($connection,$query);


    if($query_run){
    
      $_SESSION['success']= "Your data is updated!";
      header('Location: hr.php');
    }
    else {
         $_SESSION['status']= "Your data is NOT updated!";
      header('Location: hr.php');

    }
}

if(isset($_POST['delete_btn']))
{
    $id=$_POST['hrdelete_id'];

    $query="DELETE FROM penalty WHERE hr_id='$id'";
    $query_run=mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['success']="Your data is deleted!";
        header('Location: hr.php');
    }
    else
    { 
      $_SESSION['status']= "Your data is NOT deleted!";
      header('Location: hr.php');
    }
}



?>

