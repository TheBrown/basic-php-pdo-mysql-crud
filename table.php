<?php
  $server = "localhost";
  $user = "root";
  $pass = "root";

  try {
    $conn = new PDO("mysql:host=$server; dbname=db_crud", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected";

    $sql = $conn->prepare("SELECT * FROM tb_product;");
    $sql->execute();

  } catch (PDOException $e) {
    echo "Failed: ".$e->getMessage();
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
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tr:hover {background-color:#f5f5f5;}

    th,
    td,
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
    background-color: goldenrod;
    color: white;
    border-radius: 6px;
    cursor: pointer;
}

  </style>

<body style="background-color: #c1c1c1">
  <div class="card">

    <h2 style="text-align:center">Shop management</h2>
    <form action="">
      <label for="fname">Name</label>
      <input type="text" name="kuy" id="kuy">
      <label for="sdf">Price</label>
      <input type="text" name="kuy" id="kuy">
      <label for="asdf">Detail</label>
      <input type="text" name="kuy" id="kuy">
      <input type="button" value="Submit">
    </form>


  </div>
  <div class="card">
    <table>
      <tr style="background-color: bisque">
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Savings</th>
        <th>Action</th>
      </tr>
      <?php
      while($res = $sql->fetch(PDO::FETCH_ASSOC))
      {
      ?>
      <tr>
        <td><?echo $res['id'];?></td>
        <td><?echo $res['product_name'];?></td>
        <td><?echo $res['product_price'];?></td>
        <td><?echo $res['product_detail'];?></td>
      </tr>
      <?php
      }
      ?>
    </table>
  </div>

</body>

</html>
