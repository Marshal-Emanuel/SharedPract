<?php
include('db_connect.php'); // Include the database connection file

$style = ''; // Variable to set the style for the return message

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $carName = $_POST['car-name'];
    $availability = $_POST['availability'];
    $carDescription = $_POST['car-description'];
    $price = $_POST['price'];

    // Check if an image is uploaded
    if (isset($_FILES['car-image'])) {
        // Define the relative path to the "assets/img" directory
        $relativeImagePath = 'assets/img/';

        // Construct the full image path
        $imagePath = $relativeImagePath . $_FILES['car-image']['name'];

        // Move the uploaded image to the "assets/img" directory
        if (move_uploaded_file($_FILES['car-image']['tmp_name'], $imagePath)) {
            // Your database query to insert data, including the image path
            $sql = "INSERT INTO cars (car_name, availability, image_path, car_description, price) 
                    VALUES ('$carName', '$availability', '$imagePath', '$carDescription', '$price')";

            if (mysqli_query($conn, $sql)) {
                $successMessage = "Car added successfully!";
                $style = "color: green; background-color: lightgreen; padding: 10px; border-radius: 5px; text-align: center;";
            } else {
                $errorMessage = "Error: " . $sql . '<br>' . mysqli_error($conn);
                $style = "color: red; background-color: #ffcccc; padding: 10px; border-radius: 5px; text-align: center;";
            }
        } else {
            $errorMessage = "Error uploading the image.";
            $style = "color: red; background-color: #ffcccc; padding: 10px; border-radius: 5px; text-align: center;";
        }
    } else {
        $errorMessage = "No image uploaded.";
        $style = "color: red; background-color: #ffcccc; padding: 10px; border-radius: 5px; text-align: center;";
    }
}

mysqli_close($conn); // Close the database connection
?>
<!DOCTYPE html>
<html>
<head>
    <title>Car Rental Admin Panel</title>
</head>
<body style="background-color: black;">
    <div style="<?php echo $style; ?>">
        <?php if (isset($errorMessage)) : ?>
            <p><?php echo $errorMessage; ?></p>
        <?php elseif (isset($successMessage)) : ?>
            <p><?php echo $successMessage; ?></p>
        <?php endif; ?>
        <button style="background-color: #000; color: #fff; border: none; padding: 10px; border-radius: 5px;">
            <a href="Admin.php" style="color: #fff; text-decoration: none;">Return to Admin Page</a>
        </button>
    </div>
</body>
</html>
