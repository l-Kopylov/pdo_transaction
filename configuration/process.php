<!-- update transaction based on the given id 
    $row = [
    'id' => 83,
    'name' => 'bob',
    'email' => 'bob2@example.com' ,
    'mobile' => '964752058788',
    'address' => 'apartment 12bc' ,
    'amount' => '78$',
    'comment' => 'hello I am Updated'
];

$sql = "UPDATE transaction SET name=:name, email=:email , mobile=:mobile, address=:address, amount=:amount,
 comment=:comment WHERE id=:id;";
$dbconnection->conn->prepare($sql)->execute($row); -->

<!-- 
//TEST insert a single row using the defined variables above
$id = 89;
$name = 'faeza';
$email ="f.salman@gmail.com";
$mobile = 7858641;
$address = "bakhtyary";
$amount = 145;
$comment = "Hello I am inserted through a line in your code";


$sql = 'INSERT INTO transaction (name , email , mobile , address , amount , comment) VALUES (?,?,?,?,?,?)';
$stmt = $dbconnection->conn->prepare($sql);
$stmt->execute([$name , $email , $mobile, $address,  $amount , $comment]);
echo 'post inserted'; -->

<!-- inserting a multple line through two defined array and using foreach
$rows[] = [
    'name' => 'fsalman',
    'email' => "f.salman@gmail.com" ,
    'mobile' => 9789588,
    'address' => "hawleri",
    'amount' => 1220,
    'comment' => " I am inserted"
];
$rows[] = [
    'name' => 'lina',
    'email' => "lina@gmail.com" ,
    'mobile' => 34242343,
    'address' => "iraq",
    'amount' => 245,
    'comment' => "Hello"
];

$sql = "INSERT INTO transaction SET name=:name, email=:email , mobile=:mobile, address=:address , amount=:amount
, comment=:comment";
$stmt = $dbconnection->conn->prepare($sql);
foreach ($rows as $row) {
    $stmt->execute($row);
} -->
