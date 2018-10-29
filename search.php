<?php
require './db.php';

$idProduct = $_POST['idproduct'];

$deleteQuery = "DELETE FROM tb_product WHERE id=:id";
$deleteResult = $conn->prepare($deleteQuery);
$deleteExec = $deleteResult->execute(array(":id" => $idProduct));

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

    <h2 style="text-align:center">Search management</h2>
    <form action="./delete.php" method="POST">
      <label for="fname">ID Product</label>
      <input type="test" name="idproduct" id="idproduct" placeholder="You can type anyword that you need to search" required>
      <input type="submit" value="Search Data" name="delete">
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
        while ($res = $sql->fetch(PDO::FETCH_ASSOC)) {
      ?>
      <tr>
        <td><?echo $res['id']; ?></td>
       
        <td><?= $res['product_name']; ?></td>
        <td><?= $res['product_price']; ?></td>
        <td><?echo $res['product_detail']; ?></td>
        <!-- <td><input type="submit" value="Delete" name="delete" onclick="return confirm('Are you sure? to delete id: '+ <? echo $res['id']?>)"></td> -->
        <td><a href="./table.php?id=<?php echo $res['id']?>" onclick="return confirm('Are you sure? to delete id:' + <?php echo $res['id']?> )">delete</a></td>
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
<a href="./index.php">Home?</a>
</div>
</body>

</html>
