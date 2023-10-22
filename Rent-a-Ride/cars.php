<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Cars</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <section class="car-listings">
        <?php
        // Database connection settings
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "rent_a_ride";

        // Establish a database connection
        $mysqli = new mysqli($host, $username, $password, $database);

        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        // SQL query to fetch car listings
        $sql = "SELECT car_name, car_description, image_path, price FROM cars";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $carName = $row["car_name"];
                $carDescription = $row["car_description"];
                $imagePath = $row["image_path"];
                $descriptionArray = explode(",", $carDescription);
                $price = $row["price"];
                ?>
                <div class="car-tile">
                    <img src="<?php echo $imagePath; ?>" alt="<?php echo $carName; ?>" />
                    <h3><?php echo $carName; ?></h3>
                    <p><strong>Description:</strong></p>
                    <ul>
                        <?php foreach ($descriptionArray as $description) { ?>
                            <li><?php echo $description; ?></li>
                        <?php } ?>
                        <br>
                        <?php echo $price; ?>
                    </ul>

                    <!-- "Book Now" button to open the booking form popup -->
                    <!-- "Book Now" button to open the booking form popup -->
<button class="book-button" data-car="<?php echo $carName; ?>">Book Now</button>

                </div>
                <?php
            }
        } else {
            echo "No cars found in the database.";
        }

        // Close the database connection
        $mysqli->close();
        ?>
    </section>

    <!-- Popup container for the booking form iframe (initially hidden) -->
    <div id="popup-container" class="popup-container" style="display: none;">
        <iframe src="bookingForm.php" id="bookingFormFrame" frameborder="0"></iframe>
    </div>

    <script src="assets/script.js"></script>
    <script>
        function openBookingForm(carName) {
            // Show the popup container and load the booking form
            document.getElementById("popup-container").style.display = "block";
            const bookingFormFrame = document.getElementById("bookingFormFrame");
            bookingFormFrame.src = "bookingForm.php?car=" + carName;
        }
    </script>
</body>
</html>
