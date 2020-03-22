<?php
session_start();
$empno = $_SESSION['empno'];


require_once 'db.php';

$sql = "SELECT * FROM emp WHERE EMPNO = ? ";
$statement = $connection->prepare($sql);
$statement->execute([$empno]);
$emp = $statement->fetch(PDO::FETCH_OBJ);

?>


<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <table class="table">
    <div class="card-header">
    <center><font color = "Violet" ><h1> ประวัติส่วนตัว</font> </h1></center>
    </div><br>
    <div class="container">
        <label for="ENAME">Employee ID : </label>
        <input type="text" value="<?= $emp->EMPNO; ?>"<button class="metro-light">
        </div>
        
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Empolyee Name : </label> 
        <input type="text" value="<?= $emp->ENAME; ?>"<button class="metro-light">
        
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Job : </label> 
        <input type="text" value="<?= $emp->JOB; ?>"<button class="metro-light">
       
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Menager : </label> 
        <input type="text" value="<?= $emp->MGR ?>"<button class="metro-light">
       
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Hiredate : </label> 
          <input type="text" value="<?= $emp->HIREDATE ?>"<button class="metro-light">
         
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Salary : </label> 
        <input type="text" value="<?= $emp->SAL ?>"<button class="metro-light">
     
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Commission : </label>
        <input type="text" value="<?= $emp->COMM ?>"<button class="metro-light">
       
    </div>
    <br>
    <div class="container">
        <label for="ENAME">Department : </label> 
        <input type="text" value="<?= $emp->DEPTNO ?>"<button class="metro-light">
 
    </div>
    <br>
    <div class="container">
        <label for="ENAME">อีเมล : </label>
        <input type="text" value="<?= $emp->USERNAME ?>"<button class="metro-light">
     
    </div>
    <br>
    <div class="container">
        <label for="ENAME">รหัสผ่าน : </label> 
        <input type="text" value="<?= $emp->PASSWORD ?>"<button class="metro-light">
   
    </div>
    <br>
    <div class="container">
        <label for="ENAME">สถานะ : </label> 
        <input type="text" type="<?= $emp->ROLE ?>"<button class="metro-light">
       
    </div>
    </table>

    <div class="form-group"><br>
        <center><input type="button" class="btn btn-primary" onclick="window.location='index.php'" value="ออกจากระบบ"></center> 
    </div>