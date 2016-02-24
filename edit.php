<?php

mysql_connect("localhost","root","");

mysql_select_db("mydb");

$id=$_REQUEST['id'];

$sql=mysql_query("select * from info where id=$id");

$num_rows= mysql_num_rows($sql);

$row=mysql_fetch_array($sql);

 

@$email=$_REQUEST['email'];

@$name=$_REQUEST['fullname'];

$data= explode(",", $row['skills']);

if(!empty($_REQUEST['sub']))

{

if (!empty($name) && !empty($email))

{

if($num_rows > 0)

{

 

 

$skills=$_REQUEST['skills'];

$skill=implode(",", $skills);

 

$update=mysql_query("UPDATE info SET email='$email', fullname='$_REQUEST[fullname]', gender='$_REQUEST[gender]',skills='$skill', country='$_REQUEST[country]' WHERE id=$id");

 

if($update)

{

echo "updated";

}

else

{

echo "Not updated";

}

}

else

{

echo "please enter some information";

}

 

}

}

?>

<center>

<p> <a href="list.php" title="List page">List page</a></p>

<p> <a href="form.php" title="Add page" >Add page</a></p>

<form method="post" name="frm" action="" >

<table>

<tr><td><section>Edit Registration Form</section></td></tr>

<tr><td><section>Login Information</section></td></tr>

<tr><td><label>Email<span sytle="background:red;">*</span></label><input type="email" name="email" value="<?php echo $row['email'];?>"></td></tr>

<tr><td><label>password</label><input type="text" name="pass" value="<?php echo $row['password'];?>"></td></tr>

<tr><td><label>confirm password</label><input type="text" name="cpwd" value="<?php echo $row['cpassword'];?>"></td></tr>

<tr><td>

<section>Account Information</section></td></tr>

<tr><td><label>Full Name</label>

<input type="text" name="fullname" value="<?php echo $row['fullname'];?>"></td></tr>

<tr><td><label>Gender</label>

<input type="radio" name="gender" value="male" <?php if($row['gender']=="male"){ echo "checked";}?> >

Male

<input type="radio" name="gender" value="female" <?php if($row['gender']=="female"){ echo "checked";}?>>Female

</td></tr>

 

<tr><td><label>Skills</label>

JAVA<input name="skills[]" type="checkbox" value="java"<?php if(@$data[0]=="java"){ echo "checked";}?> >

PHP<input name="skills[]" type="checkbox" value="php" <?php if(@$data[1]=="php"){ echo "checked";}?>>

JS<input name="skills[]" type="checkbox" value="javascript" <?php if(@$data[2]=="javascript"){ echo "checked";}?>>

</td></tr>

<tr><td><label>country</label><select name="country"><option value="">Select Country</option>

<option value="USA"  <?php if($row['country']=="USA"){ echo "selected";}?>>USA</option>

<option value="india" <?php if($row['country']=="india"){ echo "selected";}?> >India</option>

</select></td></tr>

<tr><td><label>Date of Birth</label>

<input type="text" name="dob" value="<?php echo $row['dob'];?>"></td>

</tr>

<tr><td><input type="submit" name="sub" value="submit" /></td></tr>

 

</table>

 

</form>

</center>

Setp9): for delete the selected  record which has below code(delete.php)

 

<?php

mysql_connect("localhost","root","");

mysql_select_db("mydb");

$id=@$_REQUEST['id'];

$status=@$_REQUEST[status];

//$sql=mysql_query("delete from info where id=$id");

if($status==1){

$sql=mysql_query("update info set status='0′ where id=$id");

}else

{

$sql=mysql_query("update info set status='1′ where id=$id");

}

 

/*

echo "<script>  alert('Deleted Successfully');</script>";*/

 

echo "<script> window.location.href='list.php';</script>";

 

 

?>