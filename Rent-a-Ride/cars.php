<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Cars</title>
    <link rel="stylesheet" href="assets/styles.css">
    <style>
        .car-tile {
            margin-bottom: 20px;
        }
        .book-button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }
        .book-button:hover {
            background-color: #0056b3;
        }
        .booking-form {
            display: none;
        }
    </style>
</head>
<body>
    <section class="car-listings">
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "rent_a_ride";

        $mysqli = new mysqli($host, $username, $password, $database);

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $sql = "SELECT car_name, car_description, image_path, price FROM cars";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $carName = $row["car_name"];
                $carDescription = $row["car_description"];
                $imagePath = $row["image_path"];
                $descriptionArray = explode(",", $carDescription);
                $price=$row["price"];
                ?>
                <div class="car-tile">
                    <img src="<?php echo $imagePath; ?>" alt="<?php echo $carName; ?>" />
                    <h3><?php echo $carName; ?></h3>
                    <p><strong>Description:</strong></p>
                    <ul>
                        <?php foreach ($descriptionArray as $description) { ?>
                            <li><?php echo $description; ?></li>

                        <?php } ?>

                        <?php 
                        echo "<br>";
                        echo $price; ?>
                    </ul>
                  
                <a href="bookingForm.php"> <button class="book-button" onclick="openNewWindow()">Book Now</button></a>
                </div>
                <!-- <?php include('bookingForm.php'); ?> -->

                <?php
            }
        } else {
            echo "No cars found in the database.";
        }

        $mysqli->close();
        ?>
    </section>
    <!-- <script>
        function openNewWindow() {
            window.open("bookingForm.php", "_blank");
        }
    </script> -->
</body>
</html>
