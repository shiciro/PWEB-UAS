<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>
    <h2>Update Product Service Rate Data</h2>
    <h3>please fill updated data here </h3>
    <?php
    include 'config.php';
    $id = $_GET['ID'];
    $data = mysqli_query($link,"select * from productData where ID='$id'");
    while($d = mysqli_fetch_array($data)){
    ?>
      <form method="POST" action="updateaction.php">
          <table>
              <input type="hidden" name="idForm" value="<?php echo $d['ID']; ?>">
              <tr>
                  <td>Product Name</td>
                  <td><input type="text" name="NameForm" value="<?=$d['Name'];?>"></td>
              </tr>
              <tr>
                  <td>Quantity Ordered</td>
                  <td><input type="number" name="quantityOrderedForm" value="<?=$d['quantityOrdered'];?>"></td>
              </tr>
              <tr>
                  <td>Quantity Supplied</td>
                  <td><input type="number" name="quantitySuppliedForm" value="<?=$d['quantitySupplied'];?>"></td>
              </tr>
              <tr>
                  <td>Quality Issues</td>
                  <td><input type="number" name="qualityIssuesForm" value="<?=$d['qualityIssues']?>"></td>
              </tr>
              <tr>
                  <td>Quantity Delivered On Time</td>
                  <td><input type="number" name="qualityDeliveredOnTimeForm" value="<?=$d['qualityDeliveredOnTime']?>"></td>
              </tr>
              <tr>
                  <td></td>
                  <td><input type="submit" value="Save"></td>
              </tr>
          </table>
      </form>
      <a href="index.php" class="btn btn-light" style="border-color: black;">Back</a>
      <?php 
	}
	?>
    
</body>
</html>