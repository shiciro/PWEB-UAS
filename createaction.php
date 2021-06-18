<?php
    include 'config.php';
    $Name = $_POST['NameForm'];
    $quantityOrdered = $_POST['quantityOrderedForm'];
    $quantitySupplied = $_POST['quantitySuppliedForm'];
    $qualityIssues = $_POST['qualityIssuesForm'];
    $qualityDeliveredOnTime = $_POST['qualityDeliveredOnTimeForm'];
    mysqli_query($link, "INSERT INTO productData (`Name`,`quantityOrdered`, `quantitySupplied`, `qualityIssues`, `qualityDeliveredOnTime`) VALUES ('$Name','$quantityOrdered','$quantitySupplied','$qualityIssues','$qualityDeliveredOnTime')");
    header("location:index.php");
?>