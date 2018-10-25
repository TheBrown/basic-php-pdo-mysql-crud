<!DOCTYPE html>
<html>

<head>
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
</head>

<body style="background-color: #c1c1c1">
  <div class="card">

    <h2 style="text-align:center">Shop management</h2>
    <form action="">
      <label for="fname">Book Name</label>
      <input type="text" name="kuy" id="kuy">
      <label for="sdf">Book Price</label>
      <input type="text" name="kuy" id="kuy">
      <label for="asdf">Book Page</label>
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
      <tr>
        <td>Peter</td>
        <td>Griffin</td>
        <td>$100</td>
        <td>$100</td>
      </tr>
      <tr>
        <td>Lois</td>
        <td>Griffin</td>
        <td>$150</td>
        <td>$100</td>
      </tr>
      <tr>
        <td>Joe</td>
        <td>Swanson</td>
        <td>$300</td>
        <td>$100</td>
      </tr>
      <tr>
        <td>Cleveland</td>
        <td>Brown</td>
        <td>$250</td>
        <td>$100</td>
      </tr>
      <tr>
        <td>Cleveland</td>
        <td>Brown</td>
        <td>$250</td>
        <td>$100</td>
      </tr>
      <tr>
        <td>Cleveland</td>
        <td>Brown</td>
        <td>$250</td>
        <td>$100</td>
      </tr>
    </table>
  </div>

</body>

</html>
