<?php
    include 'config.php';
    $id = $_POST['idForm'];
    $Name = $_POST['NameForm'];
    $quantityOrdered = $_POST['quantityOrderedForm'];
    $quantitySupplied = $_POST['quantitySuppliedForm'];
    $qualityIssues = $_POST['qualityIssuesForm'];
    $qualityDeliveredOnTime = $_POST['qualityDeliveredOnTimeForm'];
    mysqli_query($link, "UPDATE `productData` SET `Name`='$Name',`quantityOrdered`='$quantityOrdered',`quantitySupplied`='$quantitySupplied',`qualityIssues`='$qualityIssues',`qualityDeliveredOnTime`='$qualityDeliveredOnTime' WHERE ID='$id'");
    header("location:index.php");
?>