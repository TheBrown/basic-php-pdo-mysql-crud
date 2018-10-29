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

    <h2 style="text-align:center">Shop management</h2>
    <form action="./table.php" method="POST">
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
  <form action="./table.php" method="post">
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
        while ($res = $sql->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <tr>
        <td><?echo $index++ ?></td>
       
        <td><?= $res['product_name']; ?></td>
        <td><?= $res['product_price']; ?></td>
        <td><?echo $res['product_detail']; ?></td>
        <td><a href="./table.php?id=<?php echo $res['id']?>" onclick="return confirm('Are you sure? ')">delete</a></td>
        <td><input type="button" value="Edit"></td>
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
<a href="./update.php">Update?</a>

</div>
</body>

</html>
