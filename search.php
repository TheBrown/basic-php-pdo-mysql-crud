<?php
require './db.php';

if (isset($_POST['search'])) {
    $word = $_POST['search'];

    $searchQuery = "SELECT * FROM tb_product WHERE product_name LIKE :word";
    $search = '%' . $word . '%';
    $sql = $conn->prepare($searchQuery);
    $sql->bindValue(":word", $search);
    $sql->execute();

} else {
    $sql = $conn->query("SELECT * FROM tb_product;");
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
      margin: auto;
	padding: 15px;
	border-radius: 5px;
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
    <form action="search.php"method="POST">
      <label for="fname">Product Name or Product Description</label>
      <input type="test" name="search" id="search" placeholder="You can type anyword that you need to search" required>
      <input type="submit" value="Search Data" name="submit">
    </form>


  </div>
  <br>
  <div class="card">

    <table>
      <tr style="background-color: bisque">
        <th>id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Detail</th>
      </tr>

<?php
$index = 1;
while ($res = $sql->fetch(PDO::FETCH_ASSOC)) {
    ?>
      <tr>
        <td><?php echo $index++ ?></td>

        <td><?=$res['product_name'];?></td>
        <td><?=$res['product_price'];?></td>
        <td><?echo $res['product_detail']; ?></td>
      </tr>

      <?php
}
?>
    </table>

  </div>
  <br>
  <div style="text-align: center">
<a href="./index.php">Home?</a>
</div>

</body>

</html>
