<?php
$title = 'Edit Record';
require_once 'includes/header.php';
require_once 'db/conn.php';
$results = $crud->getSpecialities();

$results=$crud->getSpecialities();

if(!isset($_GET['id'])){
//echo 'error';
include 'includes/errormessage.php';
header("Location:viewrecords.php");
}
else{
$id=$_GET['id'];
$attendee=$crud->getAttendeeDetails($id);


?>



<h1 class="text-center">Edit Record</h1>

<form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $attendee['antendee_id'] ?>"/>
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['firstname'] ?>" id="firstname" name="firstname">
    </div>

    <div class="form-group">
        <label for="lastname">LAST Name</label>
        <input type="text" class="form-control" value="<?php echo $attendee['lastname'] ?>" id="lastname" name="lastname">
    </div>

    <div class="form-group">
        <label for="dob">DATE OF BIRTH</label>
        <input type="text" class="form-control" value="<?php echo $attendee['dob'] ?>"  id="dob" name="dob">
    </div>

    <div class="form-group">
        <label for="speciality">Area of Speciality</label>
        <select class="form-control" value="<?php echo $attendee['speciality'] ?>" id="speciality" name="speciality">
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
               
            <option value="<?php echo $r['speciality_id'] ?>" <?php if($r['speciality_id']==$attendee['speciality_id']) echo 'selected' ?>>
            
            <?php echo $r['name']; ?></option>


            <?php } ?>

        </select>
    </div>


    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="phone">CONTACT NUMBER</label>
        <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>



    <a href="viewrecords.php" class="btn btn-default" >Back To List</a>
    <button type="submit" name="submit" class="btn btn-success ">Save Changes</button>

</form>

<?php }?>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>