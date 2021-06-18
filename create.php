<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
</head>
<body>
    <h2>NEW PRODUCT DATA RECORD</h2>
    <h3>Input Product Data data here</h3>
    <form method="POST" action="createaction.php">
        <table>
            <tr>
                <td>Product Name</td>
                <td><input type="text" name="NameForm"></td>
            </tr>
            <tr>
                <td>Quantity Ordered</td>
                <td><input type="number" name="quantityOrderedForm"></td>
            </tr>
            <tr>
                <td>Quantity Supplied</td>
                <td><input type="number" name="quantitySuppliedForm"></td>
            </tr>
            <tr>
                <td>Quality Issues</td>
                <td><input type="number" name="qualityIssuesForm"></td>
            </tr>
            <tr>
                <td>Quantity Delivered On Time</td>
                <td><input type="number" name="qualityDeliveredOnTimeForm"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save"></td>
            </tr>
        </table>
    </form>
    <a href="index.php" class="btn btn-light" style="border-color: black;">Back</a>
    
</body>
</html>