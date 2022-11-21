<?php
session_start();
include('configuration/dbconfig.php');

//login code
$sql = 'SELECT *  FROM transaction';
$q = $dbconnection->conn->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);

if (isset($_SESSION["username"])) {   //<script>alert("Successfully logined")</script>
    echo '<div class="container">
    <h3>  Привет - ' . $_SESSION["username"] . '</h3>
    <a href="logout.php"><button type="button" class="btn btn-warning" style="float: right;">LOGOUT</button></a>
    </div>';
} else {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Админ панель</title>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
<div class="container">
    <h2>Admin Panel</h2>
    <table class="table table-bordered table-condensed">
        <thead>
        <tr>
            <th>Имя</th>
            <th>E-mail</th>
            <th>Номер телефона</th>
            <th>Адрес</th>
            <th>Количество</th>
            <th>Комментарий</th>
            <th colspan="2">Действие</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $q->fetch()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['name']) ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo htmlspecialchars($row['mobile']); ?></td>
                <td><?php echo htmlspecialchars($row['address']); ?></td>
                <td><?php echo htmlspecialchars($row['amount']); ?></td>
                <td><?php echo htmlspecialchars($row['comment']); ?></td>
                <td>
                    <a href="edit.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Редактировать </a>
                    <a href="delete.php?delete=<?php echo $row['id']; ?>"
                       onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger">Удалить</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <form action="transactionform.php" method="post">

        <h1>Гостевая книга</h1>
        <p>Пожалуйста, заполните эту форму</p>
        <hr>
        <label for="name"><b>Имя</b></label>
        <input type="text" placeholder="Введите имя" name="name" id="name" required>

        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Введите Email" name="email" id="email" required>

        <label for="mobileph"><b>Номер телефона</b></label>
        <input type="text" placeholder="Введите номер телефона" name="mobile" id="mobile" required>

        <label for="address"><b>Адрес</b></label>
        <input type="text" placeholder="Введите адрес" name="address" id="address" required>

        <label for="amount"><b>Количество</b></label>
        <input type="number" placeholder="Введите кол-во" name="amount" id="amount" required>

        <label for="comment"><b>Комментарий</b></label>
        <textarea rows="4" cols="50" placeholder="Введите коментарий" name="comment" id="comment"></textarea>

        <button type="submit" name="submit" class="submitbtn">Отправить</button>

    </form>


</div>
</body>



</html>