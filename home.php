<?php

//Declaring Variables that will hold error Messages
$nameErr = $emailErr = $webErr = $commentErr = $genderErr = "";

if(isset($_POST["submit"])) {

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
      }

    if (empty($_POST["mail"])) {
        $emailErr = "Email is required";
    }else {
        $email = test_input($_POST["mail"]);
    }

    if(empty($_POST["website"])) {
        $webErr = "";
    }else {
        $website = test_input($_POST["website"]);
    }

    if(empty($_POST["comment"])) {
        $commentErr = "";
    }else {
        $comment = test_input($_POST["comment"]);
    }

    if(empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    }else {
        $gender = test_input($_POST["gender"]);
    }
    
}

function test_input ($data){
    $data = trim($data);//Checks if the data Contains unnecessary characters
    $data = stripslashes($data);//Removes the backslashes
    $data = htmlspecialchars($data);//Prevents Exploits
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> FORM </title>

</head>

<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div>
        <label>Name</label>
        <input type="text" name="name" placeholder="John Doe" required>
        <span class="error"><?php echo $nameErr; ?></span>
        <br><br>
    </div>
    
    <div>
        <label>E-mail</label>
        <input type="email" name="mail" placeholder="youremail@account.com" required>
        <span class="error"><?php echo $emailErr; ?></span>
        <br><br>
    </div>

    <div>
        <label>Website</label>
        <input type="text" name="website">
        <span class="error"><?php echo $webErr; ?></span>
        <br><br>
    </div>

    <div>
        <label>Comment</label>
        <textarea name="comment" rows="5" columns="40"></textarea>
        <span class="error"><?php echo $commentErr; ?></span>
        <br><br>
    </div>

    <div>
        <span>
        <label>Gender</label>
        <input type="radio" name="Gender" value="Male" required>
        <label>Male</label>
        <input type="radio" name="Gender" value="Female" required>
        <label>Female</label>
        <input type="radio" name="Gender" value="Prefer Not To Say" required>
        <label>Prefer Not To Say</label>
        <span class="error"><?php echo $genderErr;?></span>
        <br><br>
</span>
    </div>

    <div>
        <input type="submit" name="submit" value="Submit">
    </div>

</form>
</body>

</html>