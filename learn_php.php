<!DOCTYPE html>  
<html>  
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<style>  
body{  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: pink;  
}  
.container {  
    padding: 50px;  
  background-color: lightblue;  
}  
  
input[type=text], input[type=password], textarea {  
  width: 100%;  
  padding: 15px;  
  margin: 5px 0 22px 0;  
  display: inline-block;  
  border: none;  
  background: #f1f1f1;  
}  
input[type=text]:focus, input[type=password]:focus {  
  background-color: orange;  
  outline: none;  
}  
 div {  
            padding: 10px 0;  
         }  
hr {  
  border: 1px solid #f1f1f1;  
  margin-bottom: 25px;  
}  
.registerbtn {  
  background-color: #4CAF50;  
  color: white;  
  padding: 20px 20px;  
  margin: 8px 0;  
  border: none;  
  cursor: pointer;  
  width: 100%;  
  opacity: 4.5;  
}  
.registerbtn:hover {  
  opacity: 1;  
}  
</style>  
</head>  
<body>
   
<?php
    $connection = mysqli_connect('localhost','root','root','sunil_registration');

    /// createing or inserting data in database
   if (isset($_POST['submitForm'])) {

      $user_firstname =  $_POST['user_firstname'];
      $user_middlename=$_POST['user_middlename'];
      $user_lastname=$_POST['user_lastname'];
      $user_gender=$_POST['user_gender'];
      $user_course=$_POST['user_course'];
      $user_phone=$_POST['user_phone'];
      $user_address=$_POST['user_address'];
      $user_email=$_POST['user_email'];
      $user_password=$_POST['user_password'];
      $user_repassword=$_POST['user_repassword'];

      $sql = "INSERT INTO `sunil_reg` (`user_firstname`, `user_middlename`, `user_lastname`, `user_gender`,`user_course`,`user_phone`, `user_address`, `user_email`, `user_password`, `user_repassword`) VALUES ('$user_firstname', '$user_middlename', '$user_lastname', ' $user_gender','$user_course','$user_phone', '$user_address', '$user_email', '$user_password', '$user_repassword')";
    
     $query = mysqli_query($connection,$sql);
        if ($query) {
            echo "Created Successfull";
          }
        else{
            echo "Error!! Something Went Wrong";
            echo mysqli_error($connection);
}
}

// for editing or update
if (isset($_POST['updateForm']) and isset($_GET['edit'])) {

    $edit_id =    $_GET['edit'];
      $user_firstname =  $_POST['user_firstname'];
      $user_middlename=$_POST['user_middlename'];
      $user_lastname=$_POST['user_lastname'];
      $user_gender=$_POST['user_gender'];
      $user_course=$_POST['user_course'];
      $user_phone=$_POST['user_phone'];
      $user_address=$_POST['user_address'];
      $user_email=$_POST['user_email'];
      $user_password=$_POST['user_password'];
      $user_repassword=$_POST['user_repassword'];

    $sql = "UPDATE `sunil_reg` SET `user_firstname` = '$user_firstname', `user_middlename` = '$user_middlename', `user_lastname` = '$user_lastname', `user_gender` = '$user_gender', `user_course` = '$user_course',`user_phone` = '$user_phone',`user_address` = '$user_address', `user_email` = '$user_email', `user_password` = '$user_password',`user_repassword` = '$user_repassword' WHERE (`id` = '$edit_id')";
    $query = mysqli_query($connection,$sql);
    if ($query) {
    echo "Update Successfull";
    }else{
    echo "Error!! Something Went Wrong";
    }
}

if (isset($_GET['edit'])) {

        $showId = $_GET['edit'];

        $sql1 = "SELECT * FROM sunil_reg where id = '$showId'";
            $query1 = mysqli_query($connection,$sql1);
            $rows1 = mysqli_num_rows($query1);
            if ($rows1>0) {
            while ($res1 = mysqli_fetch_array($query1)) {

                    $user_firstname =  $res1['user_firstname'];
                    $user_middlename =  $res1['user_middlename'];
                    $user_lastname =  $res1['user_lastname'];
                    $user_gender =  $res1['user_gender'];
                    $user_course =  $res1['user_course'];
                    $user_phone =  $res1['user_phone'];
                    $user_address =  $res1['user_address'];
                    $user_email =  $res1['user_email'];
                    $user_password =  $res1['user_password'];
                    $user_repassword =  $res1['user_repassword'];
                }
            }    
}

?>  
<form method="post" action="">  
  <div class="container">  
  <center>  <h1> User Registration Form</h1> </center>  
  <hr> 
  <label> First Name </label>   
<input type="text" value="<?php if(isset($user_firstname)){echo $user_firstname;}?>" name="user_firstname" placeholder= "Firstname" size="15" required />   
<label> Middle Name: </label>   
<input type="text" value="<?php if(isset($user_middlename)){echo $user_middlename;} ?>" name="user_middlename" placeholder="Middlename" size="15" required />   
<label> Last Name: </label>    
<input type="text" value="<?php if(isset($user_lastname)){echo $user_lastname;}?>" name="user_lastname" placeholder="Lastname" size="15"required /> 

<div> 
<label>   
Gender :  
</label><br>  
<input type="radio" value="Male" name="user_gender" checked > Male   
<input type="radio" value="Female" name="user_gender"> Female   
<input type="radio" value="Other" name="user_gender"> Other  
  </div>

<div>  
<label>   
Course :  
</label>   
  <select name="user_course">  
<option value="Course">Course</option>  
<option value="BCA">BCA</option>  
<option value="BBA">BBA</option>  
<option value="B.Tech">B.Tech</option>  
<option value="MBA">MBA</option>  
<option value="MCA">MCA</option>  
<option value="M.Tech">M.Tech</option>  
</select>
</div> 


<label> Phone : </label>   
<input type="text" value="<?php if(isset($user_phone)){echo $user_phone;} ?>" name="user_phone" placeholder="phone no." size="10"/ required>   
Current Address :  
<textarea cols="80" rows="5" value="<?php if(isset($user_address)){echo $user_address;}?>" name="user_address" placeholder="Current Address" required>  
</textarea>  
 <label for="email"><b>Email</b></label>  
 <input type="text" value="<?php if(isset($user_email)){echo $user_email;} ?>"  placeholder="Enter Email" name="user_email" required>  
  
    <label for="psw"><b>Password</b></label>  
    <input type="password" value="<?php if(isset($user_password)){echo $user_password;} ?>"  placeholder="Enter Password" name="user_password" required>  
  
    <label for="psw-repeat"><b>Re-type Password</b></label>  
    <input type="password" value="<?php if(isset($user_repassword)){echo $user_repassword;} ?>"  placeholder="Retype Password" name="user_repassword" required>  

           <?php if (isset($_GET['edit'])): ?>
        
    <button type="submit" name="updateForm"> Edit</button>
            <?php else: ?>

                <button type="submit" class="registerbtn" name="submitForm">Register</button>
        <?php endif ?> 
</form> 

<?php
    for ($i=0; $i < 155; $i++) { 
        echo '_';
    }
?> 

<?php 

/**
 * code for deleting the database row
 */

if (isset($_GET['delete'])) {

    $deleteId = $_GET['delete'];

        $sql = "DELETE FROM `sunil_reg` WHERE (`id` = '$deleteId')";
        $query = mysqli_query($connection,$sql);
        if ($query) {
        echo "Delete Successfull";
        }else{
        echo "Error!! Something Went Wrong";
        }
}
?>

<h3> Fetching the data </h3>
<table border="1">
    <tr> <td> User Firstname </td>
         <td> User Middlename </td>
         <td> User Lastname </td>
         <td>User Gender</td>
         <td>User Course</td>
        <td> User Phone </td>
        <td> User Address </td>
        <td> User Email </td>
        <td> User Password</td>
        <td> User Repassword</td>
        <td> Action </td>
    </tr>

        <?php
            $sql = "SELECT * FROM sunil_reg;";
            $query = mysqli_query($connection,$sql);
            $rows = mysqli_num_rows($query);
            if ($rows>0) {
            while ($res = mysqli_fetch_array($query)) {
?>
                

                <tr>
                    <td><?= $res['user_firstname'] ?></td>
                    <td><?= $res['user_middlename'] ?></td>
                    <td><?= $res['user_lastname'] ?></td>
                    <td><?= $res['user_gender'] ?></td>
                    <td><?= $res['user_course'] ?></td>
                    <td><?= $res['user_phone'] ?></td>
                    <td><?= $res['user_address'] ?></td>
                    <td><?= $res['user_email'] ?></td>
                    <td><?= $res['user_password'] ?></td>
                    <td><?= $res['user_repassword'] ?></td>
                    <td> <a href="learn_php.php?delete=<?= $res['id'] ?>"> Delete </a>  | <a href="learn_php.php?edit=<?= $res['id'] ?>">Edit</a>  </td>
                </tr>
<?php
            }
            }else{
            echo " No Data Found";}
        ?>
</body>  
</html>  