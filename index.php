
<?php
    // $fullname=null;
$name = null;
$natID=null;
$stdID=null;

$lvl=null;
$dept=null;

$phone = null;
$address=null;

$email = null;
$password = null;

$info=array();



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = addslashes(trim($_POST["name"]));
    $email = addslashes(trim($_POST["email"]));
    $password = addslashes(trim($_POST["password"]));
    $phone = addslashes(trim($_POST["phone"]));
    $natID = addslashes(trim($_POST["natID"]));
    $stdID = addslashes(trim($_POST["stdID"]));
    $address = addslashes(trim($_POST["addr"]));
    $dept = addslashes(trim($_POST["dept"]));
    $lvl = addslashes(trim($_POST["level"]));

    $name=preg_replace('/\\s+/'," ", $name);
    $name=str_replace(" ","-", $name);

    $address=str_replace(",","+", $address);

    
    
    

}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
   <link rel="stylesheet" href="style.css">
  
</head>

<body>
<!-- 
NAME +
NATIONAL ID +
STUDENT ID +
LEVEL +
DEPARTENT +
PHONE +
EMAIL +

ADDRESS
password
-->
<section>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

<fieldset>
<label>Name</label> <input type="text" name="name" placeholder="Enter Student Name" required>
<label>National ID</label> <input type="text" name="natID"placeholder="Enter Student National ID" required pattern="[\d]+">
<label>Student ID</label> <input type="text" name="stdID" placeholder="Enter Student ID" required pattern="[\d]+">
</fieldset>

<fieldset>
 <div>
     <label for="level">Level</label>
     <select name="level" id="level">
         <option value="select-level">Select a level</option>
         <option value="first">First</option>
         <option value="second">Second</option>
         <option value="third">Third</option>
         <option value="fourth">Fourth</option>
     </select>
 </div>
 <div>
 <label for="dept">Department</label>
     <select name="dept" id="dept" disabled>
         <option value="select-level-first">Select a level first</option>
     </select>
 </div>
</fieldset>

<fieldset>
<label>Phone</label> <input type="tel" name="phone" placeholder="Enter Available Phone Number" required pattern="[\d]+">
<label>Address</label> <input type="text" name="addr" placeholder="Enter Current Address" required pattern="[\w\,]+" title="separation with ',' not spaces or dashes">
</fieldset>

<fieldset>
<label>Email</label> <input type="email" name="email" placeholder="Enter Available Email Address"required>
<label>Password</label> <input type="password" name="password"placeholder="Enter Strong Password" required>
</fieldset>

 <input type="submit">



</form>




</section>

<div class="table">
<table>
    <thead>
    <!-- $name,$natID,$stdID,$lvl,$dept,$phone,$address,$email,$password -->
        <tr>
            <th>Name</th>
            <th>National ID</th>
            <th>Student ID</th>
            <th>Level</th>
            <th>Deptartment</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Email</th>
            <th>Password</th>
        </tr>
    </thead>
    <tbody>
        <?php
         if(count($_COOKIE)){
            $arr=$_COOKIE;
            foreach ($arr as $key => $val) {
                echo "<tr>";
                // echo "<td>$key</td>";
                $val=explode(" ",$val);
                foreach ($val as $v){
                    $v=str_replace("+",",",$v);
                    $v=str_replace("-"," ",$v);
                    echo "<td>$v</td>";
                }
                echo "</tr>";
            }
         }?>
    </tbody>
  
</table>
     <?php 
     
     if(isset($name) && isset($email) && isset($phone) && isset($password) 
      && isset($address)  && isset($natID)  && isset($stdID)  && isset($lvl) && isset($dept)) { 

        array_push($info,$name,$natID,$stdID,$lvl,$dept,$phone,$address,$email,$password);

        $info=implode(" ",$info);
    
        setcookie($name,$info,time()+840000);    
     }
     ?>
</div>


 <script src="script.js"></script>

</body>

</html>