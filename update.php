<?php
require './db.php';
$idProduct = $_GET['id'];
$sql = $conn->prepare("SELECT * FROM tb_product WHERE id=:id;");
$sql->execute(array(":id" => $idProduct));

$pname = $_POST['name'];
$price = $_POST['price'];
$detail = $_POST['detail'];

$updateQuery = "UPDATE product SET product_name = :pname, product_price = :pprice, product_detail = :pdetail WHERE id=:id";
$updateResult = $conn->prepare($updateQuery);
$updateExec = $updateResult->execute(array(":pname" => $pname, ":pprice"=>$price, ":pdetail"=>$detail, ":id"=> $idProduct));

if($updateExec) {
  echo "Product id:".$idProduct." is Updated!";
} else {
}

?>

<!DOCTYPE html>
<html>

  <style>
    .card {
      background-color: #ffffff;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      transition: 0.3s;
      width: 40%;
      margin: auto
    }

    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }
table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 15px;
}

th, td {
    text-align: left;
    border-bottom: 1px solid #ddd;
}
td {
  padding-left : 8px;
  padding-right: 8px
}

tr:hover {background-color:#f5f5f5;}

    th,
    h2,
    p,
    form {
      padding: 15px;
    }
    input {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
    }
    input[type=button] {
    background-color: steelblue;
    color: white;
    border-radius: 6px;
    cursor: pointer;
    }
    input[type=submit] {
    background-color: darkseagreen;
    color: white;
    border-radius: 6px;
    cursor: pointer;
    }

  </style>

<body style="background-color: #c1c1c1">
  <div class="card">

    <h2 style="text-align:center">Update management</h2>
    <form action="./update.php?id=<?php echo $res['id']?>" method="POST">
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
      <input type="submit" value="Update Data" name="insert">

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
