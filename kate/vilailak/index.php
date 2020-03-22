<?php
if(isset($_POST['submit'])){
    require_once 'db.php';
    $empno = $_POST['empno'];
    $ename = $_POST['ename'];
    $username = $_POST['username'];
    $password = MD5($_POST['password']);
    $sql = "INSERT INTO emp (EMPNO, ENAME, USERNAME, PASSWORD) 
    VALUES (?,?,?,?) ";
    $statement = $connection->prepare($sql);
    if($statement->execute([$empno,$ename,$username,$password ])){
      echo 'ลงทะเบียนเสร็จเรียบร้อย';
    }
}
?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
  <div class="card-header">

<CENTER> 
<h1><font color = "Blue"> สร้างบัญชีใหม่ </font></h1>
<form name="register" action="" method="post">
<div>
  <input type="text" class="form-control" name="empno" placeholder="รหัสพนักงาน" required>
</div>
<br>
<div>
  <input type="text" class="form-control" name="ename" placeholder="ชื่อ"required>
</div>
<br>
<div>
  <input type="text" class="form-control" name="username" placeholder="อีเมล"required>
</div>
<br>
<div>
  <input type="password" class="form-control" name="password" placeholder="รหัสผ่าน"required>
</div>
<br>
<div>
  <input type="submit" class= "btn btn-warning" name="submit" value="สมัคร">
</div>
</form>
</CENTER> 
<?php require 'footer.php'; ?>
