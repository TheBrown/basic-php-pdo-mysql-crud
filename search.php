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
<head>
<link rel="stylesheet" type="text/css" href="./css/main.css">
</head>

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
