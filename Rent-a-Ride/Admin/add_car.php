<?php
include('db_connect.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $carName = $_POST['car-name'];
    $availability = $_POST['availability'];
    $carDescription = $_POST['car-description'];
    $price=$_POST['price'];

    
    $sql = "INSERT INTO cars (car_name, availability, car_description, price) VALUES ('$carName', '$availability', '$carDescription','$price')";

    if (mysqli_query($conn, $sql)) {
        $successMessage = "Car added successfully!";
        $style = "color: green; background-color: lightgreen; padding: 10px; border-radius: 5px; text-align: center;";
    } else {
        $errorMessage = "Error: " . $sql . '<br>' . mysqli_error($conn);
        $style = "color: red; background-color: #ffcccc; padding: 10px; border-radius: 5px; text-align: center;";
    }
}
mysqli_close($conn); 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Car Rental Admin Panel</title>
</head>
<body style="background-color: black;">
    <div style="<?php echo $style; ?>">
        <?php if (isset($successMessage)) : ?>
            <p><?php echo $successMessage; ?></p>
        <?php else : ?>
            <p><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <button style="background-color: #000; color: #fff; border: none; padding: 10px; border-radius: 5px;">
            <a href="Admin.php" style="color: #fff; text-decoration: none;">Return to Admin Page</a>
        </button>
    </div>
</body>
</html>
