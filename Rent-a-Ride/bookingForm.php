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

                    <!-- Button to trigger the popup -->
                    <button class="book-button" data-car="<?php echo $carName; ?>">Book Now</button>

                </div>
                <?php
            }
        } else {
            echo "No cars found in the database.";
        }

        $mysqli->close();
        ?>
    </section>

    <script src="script.js"></script>
</body>
</html>
