<?php
$title = 'Success';
require_once 'includes/header.php';
require_once 'db/conn.php';

if(isset($_POST['submit'])){
  
    //extract values from the $_POST array
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $dob=$_POST['dob'];
    $email=$_POST['email'];
    $contact=$_POST['phone'];
    $speciality=$_POST['speciality'];
    //Call function to insert and track if successful or not
    $isSuccess=$crud->insertAttendees($fname,$lname,$dob,$email,$contact,$speciality);
    
    }
    
    if($isSuccess){
        include 'includes/successmessage.php';
    }
    else{
    //echo '<h1 class="text-center text-danger">There was an error in processing!</h1>';
    include 'includes/errormessage.php';
    
    }
    

?>


<h1 class="text-center text-success">You Have Been Registered!</h1>

<!-- This prints out values that were passed to the action page using method="get"-->
 
<!--
<div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 
        class="card-title"> <?php // echo $_GET['firstname'] . '' . $_GET['lastname']; ?>
        </h5>
        
        <h6 class="card-subtitle mb-2 text-muted">
            <?php // echo $_GET['speciality']; ?>
        </h6>
        
        <p class="card-text">
        DATE OF BIRTH <?php // echo $_GET['speciality']; ?>
        </p>

        <p class="card-text">
        EMAIL ADDRESS <?php // echo $_GET['email']; ?>
        </p>

        <p class="card-text">
        CONTACT NUMBER <?php // echo $_GET['phone']; ?>
        </p>

         
    </div>
</div>
 -->

 <div class="card" style="width: 18rem;">
    <div class="card-body">
        <h5 
        class="card-title"> <?php  echo $_POST['firstname'] . '' . $_POST['lastname']; ?>
        </h5>
        
        <h6 class="card-subtitle mb-2 text-muted">
            <?php  echo $_POST['speciality']; ?>
        </h6>
        
        <p class="card-text">
        DATE OF BIRTH <?php  echo $_POST['dob']; ?>
        </p>

        <p class="card-text">
        EMAIL ADDRESS <?php  echo $_POST['email']; ?>
        </p>

        <p class="card-text">
        CONTACT NUMBER <?php  echo $_POST['phone']; ?>
        </p>

         
    </div>
</div>




<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>