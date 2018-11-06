<?php
require './db.php';

$idProduct = $_GET['id'];

$deleteQuery = "DELETE FROM tb_product WHERE id=:id";
$deleteResult = $conn->prepare($deleteQuery);
$deleteExec = $deleteResult->execute(array(":id" => $idProduct));

$pname = $_POST['name'];
$price = $_POST['price'];
$detail = $_POST['detail'];

$insertQuery = "INSERT INTO tb_product(product_name, product_price, product_detail) VALUES (:pname, :price, :detail);";
$insertResult = $conn->prepare($insertQuery);
$insertExec = $insertResult->execute(array(":pname" => $pname, ":price" => $price, ":detail" => $detail));

if ($insertExec) {
    echo "Data Inserted!";
} else {
}

$sql = $conn->prepare("SELECT * FROM tb_product;");
$sql->execute();

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/main.css"; >
</head>
<body style="background-color: #c1c1c1">
  <div class="card">

    <h2 style="text-align:center">Shop management</h2>
    <form action="./index.php" method="POST">
      <label for="fname">Name</label>
      <input type="text" name="name" id="name" placeholder="The Name of Product" required>
      <label for="sdf">Price</label>
      <input type="number" name="price" id="price" placeholder="Number only" required>
      <label for="asdf">Detail</label>
      <input type="text" name="detail" id="detail" required placeholder="Detail of the product">
      <input type="submit" value="Insert Data" name="insert">
    </form>

  </div>
  <br>
  <div class="card">
  <form action="./index.php" method="post">
    <table>
      <tr style="background-color: bisque">
        <th>id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Detail</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
      <?php
$index = 1;
while ($res = $sql->fetch()) {
    ?>
      <tr>
        <td><?echo $index++ ?></td>

        <td><?php echo $res['product_name']; ?></td>
        <td><?php echo $res['product_price']; ?></td>
        <td><?echo $res['product_detail']; ?></td>
        <td><a href="./index.php?id=<?php echo $res['id'] ?>" onclick="return confirm('Are you sure? ')">delete</a></td>
        <td><a href="./update.php?id=<?php echo $res['id'] ?>" >edit</a></td>
      </tr>
      <?php
}
?>
    </table>
    </form>
  </div>
  <br>
  <div style="text-align: center">
  <a href="./search.php">Search?</a>

</div>
</body>

</html>
