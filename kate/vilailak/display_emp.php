<?php
require 'db.php';
//$sql = 'SELECT * FROM emp';
$sql = "SELECT  e.EMPNO,e.ENAME,e.JOB,m.ENAME as MGRNAME,e.HIREDATE,e.SAL,e.COMM,d.DNAME
FROM emp e
INNER JOIN dept d
ON d.DEPTNO = e.DEPTNO
LEFT OUTER JOIN emp m
ON e.MGR = m.EMPNO";
$statement = $connection->prepare($sql);
$statement->execute();
$emp = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
    <center>
      <h1><font color = "orange" >รายการข้อมูลพนักงาน</font></h1>
      </center>
    </div>

    <?php require 'header.php';?>
    <div class="card-body">
    <table class="table">
    <thead class="btn-warning">
        <tr>
          <th>รหัสพนักงาน</th>
          <th>ชื่อ</th>
          <th>อาชีพ</th>
          <th>หัวหน้า</th>
          <th>วันที่เข้าทำงาน</th>
          <th>เงินเดือน</th>
          <th>คอมมิชชั่น</th>
          <th>แผนก</th>
        </tr>
        </thead>
        <?php foreach($emp as $person):?>
          <tr>
            <td><?= $person->EMPNO; ?></td>
            <td><?= $person->ENAME; ?></td>
            <td><?= $person->JOB; ?></td>
            <td><?= $person->MGRNAME; ?></td>
            <td><?= $person->HIREDATE; ?></td>
            <td><?= $person->SAL; ?></td>
            <td><?= $person->COMM; ?></td>
            <td><?= $person->DNAME;?></td>
            <td>
            <a href="edit.php?EMPNO=<?= $person->EMPNO ?>"  class="btn btn-warning" >Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')"
               href="delete.php?EMPNO=<?= $person->EMPNO ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
<div class="form-group"><br>
      <center><input type="button" class="btn btn-primary" onclick="window.location='index.php'" value="ออกจากระบบ"></center> 
  </div>
