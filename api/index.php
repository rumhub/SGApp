GNU nano 4.8                             /var/www/html/SGApp/index.php                                        
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conexion = mysqli_connect('34.163.186.204', 'root', 'xxx', 'SG');
if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query
$cadenaSQL = "SELECT * FROM s_customer";
$resultado = mysqli_query($conexion, $cadenaSQL);
if (!$resultado) {
    die("Query failed: " . mysqli_error($conexion));
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Customer Catalog</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Customer Catalog</h1>
      <p class="lead">Customer Catalog Sample Application</p>
      <hr class="my-4">
      <p>PHP sample application connected to a MySQL database to list a customer catalog</p>
    </div>
    <table class="table table-striped table-responsive">
      <thead>
        <tr>
            <th>Name</th>
            <th>Credit Rating</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Country</th>
            <th>Zip</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (mysqli_num_rows($resultado) > 0) {
              while ($fila = mysqli_fetch_object($resultado)) {
                  echo "<tr>
                          <td>{$fila->name}</td>
                          <td>{$fila->credit_rating}</td>
                          <td>{$fila->address}</td>
                          <td>{$fila->city}</td>
                          <td>{$fila->state}</td>
                          <td>{$fila->country}</td>
                          <td>{$fila->zip_code}</td>
                        </tr>";
              }
          } else {
              echo "<tr><td colspan='7'>No data found</td></tr>";
          }
          ?>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
