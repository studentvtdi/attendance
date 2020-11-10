<?php
$title = 'Index';
require_once 'includes/header.php';
require_once 'db/conn.php';
$results = $crud->getSpecialities();
?>
<!-- 
    -First Name
    -Last Name
    -Date of Birth (Use DatePicker)
    -Speciality (Datebase Admin,Software Developer,Web Administrator,Other)
    -Email Address
    -Contact Number
 -->
<h1 class="text-center">Registration For IT Conference</h1>

<form method="post" action="success.php">
    <div class="form-group">
        <label for="firstname">First Name</label>
        <input required type="text" class="form-control" id="firstname" name="firstname">
    </div>

    <div class="form-group">
        <label for="lastname">LAST Name</label>
        <input required type="text" class="form-control" id="lastname" name="lastname">
    </div>

    <div class="form-group">
        <label for="dob">DATE OF BIRTH</label>
        <input type="text" class="form-control" id="dob" name="dob">
    </div>

    <div class="form-group">
        <label for="speciality">Area of Speciality</label>
        <select class="form-control" id="speciality" name="speciality">
            <?php while ($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
               
            <option value="<?php echo $r['speciality_id'] ?>"><?php echo $r['name']; ?></option>


            <?php } ?>

        </select>
    </div>


    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="phone">CONTACT NUMBER</label>
        <input type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
        <small id="phoneHelp" class="form-text text-muted">We'll never share your number with anyone else.</small>
    </div>

    <div class="custom-file">
        <input type="file" accept="image/*" class="custom-file-input" id="avatar"  name="avatar">
        <label class="custom-file-label" for="avatar">Choose File</label>
        <small id="avatar" class="form-text text-danger">File Upload is Optional</small>

    </div>        

    <br/>
    <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
    <!-- 'btn-block' stretches the button across -->
</form>
<br>
<br>
<br>
<?php require_once 'includes/footer.php'; ?>