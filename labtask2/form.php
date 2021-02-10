
<?php

$nameErr = $emailErr =  $dateofbirthErr = $genderErr = $degreeErr= $bloodgroupErr= "";

$name = $email = $dateofbirth= $gender = $degree = $bloodgroup = "";
$flag = false;

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  if (empty($_POST["name"])) 
  {
    $nameErr = "Name is required";
    $flag = true;
  } 

  else
  {
    $name = test_input($_POST["name"]);
  
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $flag = true;
    }
  }
  
  if (empty($_POST["email"]))
  {
    $emailErr = "Email is required";
    $flag= true;
  } 


  else 
  {
    $email = test_input($_POST["email"]);
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
     {
      $emailErr = "Invalid email format";
      $flag= true;
     }
  }
    
  if (empty($_POST["date of birth"])) 
  {
    $dateofbirth = "Date of birth is required";
    $flag= true;
  } 

  else 
  {
    $dateofbirth = test_input($_POST["date of birth"]);
  }
  


  if (empty($_POST["gender"]))
  {
    $genderErr = "Gender is required";
    $flag= true;
  } 

  else 
  {
    $gender = test_input($_POST["gender"]);
  }


  if (empty($_POST["degree"])) 
  {
    $degreeErr = "Degree is required";
    $flag= true;
  } 

  else 
  {
    $degree = test_input($_POST["deree"]);
  }


  if (empty($_POST["blood group"])) 
  {
    $bloodgroupErr = "Blood Group is required";
    $flag= true;
  } 

  else 
  {
    $bloodgroup = test_input($_POST["blood group"]);
  }
}



function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

<!DOCTYPE html> 

<html>

<head>

<style>
    .error {color: #FF0000;}
</style>

</head>

<body style="text-align: center; background-color: #eee;border: 4px solid black;width:600px;margin: 0 auto;padding: 5px;">  


<h2>PHP Form (Validation Test)</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

  NAME: 

      <input type="text" name="name" value="<?php echo $name;?>">
      <span class="error">* <?php echo $nameErr;?></span>
      <br><br>

  E-MAIL: 

      <input type="text" name="email" value="<?php echo $email;?>">
      <span class="error">* <?php echo $emailErr;?></span>
      <br><br>
 

  DATE OF BIRTH:

       <input type="date" name="date of birth">
       <span class="error">*<?php echo $dateofbirthErr;?></span> 
       <br><br>

  GENDER:

      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
      <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
      <span class="error">* <?php echo $genderErr;?></span>
      <br><br>

  DEGREE:

      <input type="checkbox" name="degree" value="ssc">SSC
      <input type="checkbox" name="degree" value="hsc">HSC
      <input type="checkbox" name="degree" value="bsc">BSc
      <input type="checkbox" name="degree" value="msc">MSc
      <span class="error">* <?php echo $degreeErr;?></span>
      <br><br>
 
 BLOOD GROUP:

    <select name="bloodgroup" id="bloodgroup">
      <option value="State">Select Blood Group</option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
    </select> 

    <span class="error">* <?php echo $bloodgroupErr;?></span>
    <br><br>
            
<input type="submit" name="submit" value="Submit">  

</form>

<?php

  if(!$flag)
  {
    echo "<h2>Your Input:</h2>";
    echo $name;
    echo "<br>";
    echo $email;
    echo "<br>";
    echo $dateofbirth;
    echo "<br>";
    echo $gender;
    echo "<br>";
    echo $degree;
    echo "<br>";
    echo $bloodgroup;
    echo "<br>";
  }

?>

  </body>

</html>