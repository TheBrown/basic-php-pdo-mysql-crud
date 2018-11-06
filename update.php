<?php
require './db.php';
$idProduct = $_GET['id'];
$sql = $conn->prepare("SELECT * FROM tb_product WHERE id=:id;");
$sql->execute(array(":id" => $idProduct));


if(isset($_POST['update'])) {

$idP = $_POST['id'];
  $pname = $_POST['name'];
  $price = $_POST['price'];
  $detail = $_POST['detail'];

  $updateQuery = "UPDATE tb_product SET product_name=:pname, product_price=:pprice, product_detail=:pdetail WHERE id=:id";
  $updateResult = $conn->prepare($updateQuery);
  $updateExec = $updateResult->execute(array(":pname" => $pname, ":pprice"=>$price, ":pdetail"=>$detail, ":id"=> $idP));


  if ($updateExec) {
    // echo "Product id:".$idProduct." is Updated!";
    header("Location: index.php");
    echo "Product Updated!";

  } else {
    echo "Failed to update!";
  }
} 

?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>

<body style="background-color: #c1c1c1">
  <div class="card">

    <h2 style="text-align:center">Update management</h2>
    <form action="./update.php" method="POST">
    <?php
        foreach ( $sql as $re1 => $res) {
      ?>
      <label for="id">ID</label>
      <input type="text" name="id" id="id" value="<?php echo $res['id'];?>" readonly>
      <label for="fname">Name</label>
      <input type="text" name="name" id="name" placeholder="The Name of Product"  value="<?php echo $res['product_name'];?>" required>
      <label for="sdf">Price</label>
      <input type="number" name="price" id="price" placeholder="Number only" value="<?php echo $res['product_price'];?>" required>
      <label for="asdf">Detail</label>
      <input type="text" name="detail" id="detail" required placeholder="Detail of the product" value="<?php echo $res['product_detail'];?>">
      <input type="submit" value="Update Data" name="update" onclick="return confirm('Are you sure to update productID: ' + <?php echo $res['id'];?>)">

      <?php
        }
      ?>
    </form>


  </div>
  <br>
  <div style="text-align: center">
<a href="./search.php">Search?</a>
<a href="./index.php">Home?</a>

</div>
</body>

</html>
