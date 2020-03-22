<?php
require 'db.php';
$EMPNO = $_GET['EMPNO'];
$sql = 'SELECT * FROM emp WHERE EMPNO=:EMPNO';
$statement = $connection->prepare($sql);
$statement->execute([':EMPNO' => $EMPNO, ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['EMPNO'])  && isset($_POST['ENAME'])) {
  $EMPNO = $_POST['EMPNO'];
  $ENAME = $_POST['ENAME'];
  $JOB = $_POST['JOB'];
  $MGR = isset($_POST['MGR'])?$_POST['MGR']:NULL;
  $HIREDATE = $_POST['HIREDATE'];
  $SAL = $_POST['SAL'];
  $COMM = isset($_POST['COMM'])?$_POST['COMM']:NULL;
  $DEPTNO = $_POST['DEPTNO'];

  $sql = 'UPDATE emp SET EMPNO=:EMPNO, ENAME=:ENAME,JOB=:JOB, MGR=:MGR,
                        HIREDATE=:HIREDATE, SAL=:SAL,COMM=:COMM, DEPTNO=:DEPTNO   WHERE EMPNO=:EMPNO';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':EMPNO' => $EMPNO, ':ENAME' => $ENAME,
                            ':JOB' => $JOB, ':MGR' => $MGR,
                            ':HIREDATE' => $HIREDATE, ':SAL' => $SAL,
                            ':COMM' => $COMM, ':DEPTNO' => $DEPTNO])) {
    header("Location: /");
  }
}
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update person</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="EMPNO">รหัสพนักงาน</label>
          <input value="<?= $person->EMPNO?>" type="text" name="EMPNO" id="EMPNO" class="form-control">
        </div>
        <div class="form-group">
          <label for="ENAME">ชื่อ</label>
          <input  value="<?= $person->ENAME?>"type="text" name="ENAME" id="ENAME" class="form-control">
        </div>
        <div class="form-group">
          <label for="JOB">อาชีพ</label>
          <input value="<?= $person->JOB?>" type="text" name="JOB" id="JOB" class="form-control">
        </div>
        
        <div class="form-group">
          <label for="MGR">หัวหน้า</label><br>
          <?php
            $sql = "select EMPNO,ENAME from emp where JOB = 'MANAGER' OR JOB ='PRESSIDENT' ";
            $statement = $connection->prepare($sql);
            $statement->execute();
            $emp = $statement->fetchAll(PDO::FETCH_OBJ);
          ?>
          <select name ="MGR" class = "form-control">
          <option value="Null"><--Null--></option>
            <?php
            foreach($emp as $emp){
            ?>
              <option value="<?=$emp->EMPNO?>"<?php if($emp->EMPNO == $person->MGR) echo "selected"?> ><?=$emp->ENAME?></option>
            <?php                 
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="HIREDATE">วันที่เข้าทำงาน</label>
          <input value="<?= $person->HIREDATE?>" type="date" name="HIREDATE" id="HIREDATE" class="form-control">
        </div>
        <div class="form-group">
          <label for="SAL">เงินเดือน</label>
          <input  value="<?= $person->SAL?>"type="number" step="any" name="SAL" id="SAL" class="form-control">
        </div>
        <div class="form-group">
          <label for="COMM">คอมมิชชั่น</label>
          <input value="<?= $person->COMM?>" type="number" step="any" name="COMM" id="COMM" class="form-control">
        </div>
              
        <div class="form-group">
          <label for="DEPTNO">แผนก</label><br>
        <select name="DEPTNO" id="DEPTNO" class = "form-control" >
           <?php
           $sql = "SELECT DEPTNO ,DNAME FROM dept";
           $statement = $connection->prepare($sql);
           $statement->execute();
           $dept = $statement->fetchAll(PDO::FETCH_OBJ);
           foreach($dept as $dept):
           ?>
                <option value="<?=$dept->DEPTNO?>" <?php if($dept->DEPTNO == $person->DEPTNO) echo "selected"?> ><?=$dept->DNAME?></option>
           <?php endforeach; ?>
        </select>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-info">Update person</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>
