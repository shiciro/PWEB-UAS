<?php
// Check existence of id parameter before processing further
if(isset($_GET["ID"]) && !empty(trim($_GET["ID"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM productData WHERE ID = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["ID"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["Name"];
                $quantityOrdered = $row["quantityOrdered"];
                $quantitySupplied = $row["qualityDeliveredOnTime"];
                $qualityIssues = $row["qualityIssues"];
                $qualityDeliveredOnTime = $row["qualityDeliveredOnTime"];
                $quantitySuppliedPercentage = ($row["quantitySupplied"]/$row["quantityOrdered"])*100;
                $qualityNoIssuePercentage = (1-$row["qualityIssues"]/$row["quantitySupplied"])*100;
                $deliveryOnTimePercentage = ($row["qualityDeliveredOnTime"]/$row["qualityDeliveredOnTime"])*100;
                $serviceQualityPercentage = ($quantitySuppliedPercentage+$qualityNoIssuePercentage+$deliveryOnTimePercentage)/3;
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                echo "invalid id";
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    echo "Ooop id error";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Product Name</label>
                        <p><b><?php echo $row["Name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Quantity Supplied Success Percentage</label>
                        <p><b><?php echo $quantitySuppliedPercentage; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Perfect Quality Products Percentage</label>
                        <p><b><?php echo $qualityNoIssuePercentage; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Delivery On Time Percentage</label>
                        <p><b><?php echo $deliveryOnTimePercentage; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Total Service Quality Overall</label>
                        <p><b><?php echo $serviceQualityPercentage; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Quantity Ordered</label>
                        <p><b><?php echo $row["quantityOrdered"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>QuantitySupplied</label>
                        <p><b><?php echo $row["quantitySupplied"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Quality Issues</label>
                        <p><b><?php echo $row["qualityIssues"]; ?></b></p>
                    </div>     
                    <div class="form-group">
                        <label>Quantity Delivered On Time</label>
                        <p><b><?php echo $row["qualityDeliveredOnTime"]; ?></b></p>
                    </div>                  
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>