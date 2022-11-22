<?php
	session_start();
include('configuration/dbconfig.php');
  if(isset($_POST['submit'])) {
  $name             = $_POST['name'];
  $email            = $_POST['email'];
  $mobile           = $_POST['mobile'];
  $address          = $_POST['address'];
  $amount           = $_POST['amount'];
  $comment          = $_POST['comment'];

  $stmtinsert = $dbconnection->conn->beginTransaction();
  $sql = "INSERT INTO transaction (name , email , mobile , address , amount , comment) VALUES (?,?,?,?,?,?)";
  $stmtinsert = $dbconnection->conn->prepare($sql);
  $result = $stmtinsert->execute([$name , $email , $mobile , $address , $amount , $comment]);
  $stmtinsert = $dbconnection->conn->commit();
  print_r($stmtinsert);
  if($result){
      header("Location:index.php");

  } else{
      $stmtinsert->rollBack();
    echo "error while saving it in the db";
  }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Transaction data PHP </title>
</head>

<body>
    <div>
        <form action="transactionform.php" method="post">
            <div class="container">
                <h1>Гостевая книга</h1>
                <p>Пожалуйста, заполните эту форму</p>
                <hr>
                <label for="name"><b>Full Name</b></label>
                <input type="text" placeholder="Введите имя" name="name" id="name" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder=" Email" name="email" id="email" required>

                <label for="mobileph"><b>Mobile Number</b></label>
                <input type="text" placeholder="Номер телефона" name="mobile" id="mobile" required>

                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Адрес" name="address" id="address" required>

                <label for="amount"><b>Amount</b></label>
                <input type="number" placeholder="Кол-во" name="amount" id="amount" required>

                <label for="comment"><b>Comments</b></label>
                <textarea rows="4" cols="50" placeholder="Коментарий" name="comment" id="comment"></textarea>

                <button type="submit" name="submit" class="submitbtn">Отправить</button>
            </div>

        </form>
    </div>
</body>

</html>