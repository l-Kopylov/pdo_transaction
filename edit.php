<?php
session_start();  
include('configuration/dbconfig.php');
$id = $_GET['edit'];
$sql = 'SELECT * FROM transaction WHERE id=:id';
$statement = $dbconnection->conn->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['name'])  && isset($_POST['email']) ){
  $name       = $_POST['name'];
  $email     = $_POST['email'];
  $mobile    = $_POST['mobile'];
  $address  = $_POST['address'];
  $amount   = $_POST['amount'];
  $comment = $_POST['comment'];
  $id      = $_POST['id'];
  
  $sql = 'UPDATE transaction SET name=:name, email=:email , mobile=:mobile, address=:address , amount=:amount
  , comment=:comment  WHERE id=:id';
  $data = [
          ':name' => $name, 
          ':email' => $email, 
          ':mobile' => $mobile,
          ':address' => $address, 
          ':amount' => $amount,   
          ':comment' => $comment, 
          ':id' => $id  ];
          $statement = $dbconnection->conn->prepare($sql);
          if ($statement->execute($data)) {
            header("Location: index.php");
          }
        }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update</h2>
            </div>
            <form method="post" action="edit.php?edit=<?=$id?>">
                <input type="hidden" name="id" value="<?= $person->id; ?>">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="mobile" value="<?= $person->mobile; ?>" name="mobile" id="mobile" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="address" value="<?= $person->address; ?>" name="address" id="address"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="amount" value="<?= $person->amount; ?>" name="amount" id="amount" class="form-control">
                </div>
                <div class="form-group">
                    <label for="comment"><b>Comments</b></label>
                    <textarea rows="4" cols="50" name="comment" id="comment"
                        class="form-control"><?= $person->comment; ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Update</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>