<!doctype html>
<head></head>
<body style="background-image:url(https://www.coreldraw.com/static/cdgs/images/pages/seo/tips/photo/basics/blur-background/blur-background-og.jpg); background-repeat:no-repeat; background-size:cover;">
<?php
 $conn=mysqli_connect('localhost','root','','5thapril2021_hw');
if(isset($_POST['submit'])){
 $sql_query = "INSERT INTO tables(first_name,last_name,phone_number,salary) VALUES('$_POST[fname]' , '$_POST[lname]' , '$_POST[num]' , '$_POST[sal]')";
 $query = mysqli_query($conn, $sql_query);

//  $sql_quary = "SELECT * FROM tables";
//  $quary = mysqli_query($conn, $sql_quary);
//  echo "<pre>";
//  var_dump(mysqli_fetch_all($quary));

}
?><?php
if(isset($_POST['submit'])){?>
    <table style="border:3px solid purple; margin-left:30%;">
<tr>
    <td style="border:2px solid purple">first name </br> <?php
$sql_quary = "SELECT first_name FROM tables";
$quaryf = mysqli_query($conn, $sql_quary);
while($first = mysqli_fetch_assoc($quaryf)){
echo $first['first_name'] . "</br>";
} 
}
?></td>

<?php
if(isset($_POST['submit'])){?>
    <td style="border:2px solid purple">last name</br>
<?php $sql_quary = "SELECT last_name FROM tables";
$quaryl = mysqli_query($conn, $sql_quary);
while($last = mysqli_fetch_assoc($quaryl)){
    echo $last['last_name'] . "</br>";}
}?>
</td>
<?php
if(isset($_POST['submit'])){?>
<td style="border:2px solid purple">phone number</br><?php
$sql_quary = "SELECT phone_number FROM tables";
$quaryp = mysqli_query($conn, $sql_quary);
while($phone = mysqli_fetch_assoc($quaryp)){
    echo $phone['phone_number'] . "</br>";}
}?>
</td>

<?php
if(isset($_POST['submit'])){?>
<td style="border:2px solid purple">salary</br>
<?php
$sql_quary = "SELECT salary FROM tables";
$quarys = mysqli_query($conn, $sql_quary);
while($sal = mysqli_fetch_assoc($quarys)){
    echo $sal['salary'] . "</br>";}
}?>
</td>
</tr>
</table>

<form method="post" style="margin-left:30%; margin-top:2%; display:flex; flex-direction:column;">
<label>first name</label>
<input type="text" name="fname" style="width:40%; height:25px;">
<label style=" margin-top:2%;">last name</label>
<input type="text" name="lname" style="width:40%; height:25px;">
<label style=" margin-top:2%;">phone number</label>
<input type="number"f name="num" style="width:40%; height:25px;">
<label style=" margin-top:2%;">salary</label>
<input type="number" name="sal" style="width:40%; height:25px;">
<input type="submit" name="submit" style="width:10%; margin-top:2%; height:25px;">
</form>

<?php
if(isset($_POST['search_btn'])){
$ser = $_POST['field'];
$sql_search = "SELECT * FROM tables WHERE first_name LIKE '%$ser%' OR last_name LIKE '%$ser%' OR phone_number LIKE'%$ser%' OR salary LIKE '%$ser%'";
$connn = mysqli_query($conn, $sql_search);
if(mysqli_num_rows($connn)<=0){?>
    <div style="color:#1548C7;"><?php echo "your result doesn't exist";?></div>
    <?php
}
else{
while($searc = mysqli_fetch_assoc($connn)){?>
         <div style="border:2px solid purple; display:flex; width:20%;">
              <div><?php echo $searc['first_name']; ?></div>
              <div style="margin-left:2%"><?php echo $searc['last_name'];?></div>
              <div style="margin-left:2%"><?php echo $searc['phone_number'];?></div>
              <div style="margin-left:5%"><?php echo $searc['salary'] . "</br>";?></div>
          </div>
          <?php
}
}
}


?>
<form method="POST" style="margin-top:-20%; margin-left:70%;">
<input type="text" name="field">
<input type="submit" value="search" name="search_btn">
</form>
</body>
</html> 
