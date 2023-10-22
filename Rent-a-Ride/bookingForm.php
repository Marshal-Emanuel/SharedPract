<?php
 
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
       $host = "localhost";
       $username = "root";
       $password = "";
       $database = "rent_a_ride";
   
       $conn = new mysqli($host, $username, $password, $database);
   
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
   
       $fullName = $_POST["fullName"];
       $mobileNumber = $_POST["mobileNumber"];
       $email = $_POST["email"];
       $pickupPoint = $_POST["pickupPoint"];
       $hireDate = $_POST["hireDate"];
       $returnDate = $_POST["returnDate"];
   
       $sql = "INSERT INTO booking (FullName, MobileNumber, Email, PickupPoint, HireDate, ReturnDate)
               VALUES (?, ?, ?, ?, ?, ?)";
       $stmt = $conn->prepare($sql);
       $stmt->bind_param("ssssss", $fullName, $mobileNumber, $email, $pickupPoint, $hireDate, $returnDate);
   
       if ($stmt->execute()) {
           $successMessage = "Booking successful!";
       } else {
           $errorMessage = "Error: " . $conn->error;
       }
   
       $stmt->close();
       $conn->close();
   }
   ?> 

<html>
<style>
    .booking-form {
       
        background-color: #f2f2f2;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 10px;
    }

    
    label {
        display: block;
        font-weight: bold;
        margin-top: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-top: 5px;
    }

    input[type="submit"] {
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
        margin-top: 10px;
    }

    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
    <h2>Booking Form</h2>
    <?php if (isset($successMessage)) : ?>
        <p style="color: green;"><?php echo $successMessage; ?></p>
       <?php header(Location:'index.php');?>
    <?php endif; ?>
    <?php if (isset($errorMessage)) : ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>

    <form action="bookingForm.php" method="post" id="bookingForm">
        <label for="fullName">Full Name:</label>
        <input type="text" id="fullName" name="fullName" required><br>

        <label for="mobileNumber">Mobile Number:</label>
        <input type="text" id="mobileNumber" name="mobileNumber" required><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="pickupPoint">Pickup Point:</label>
        <input type="text" id="pickupPoint" name="pickupPoint" required><br>

        <label for="hireDate">Hire Date:</label>
        <input type="date" id="hireDate" name="hireDate" required><br>

        <label for="returnDate">Return Date:</label>
        <input type="date" id="returnDate" name="returnDate" required><br>

        <input type="submit" value="Book">
        <input type="submit" value="Cancel">

    </form>
    </html>