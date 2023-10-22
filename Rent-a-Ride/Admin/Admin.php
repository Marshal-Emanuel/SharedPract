<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Admin Panel</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="menu-bar">
        <ul>
            <li><a href="#car-management">Car Management</a></li>
            <li><a href="#booking-management">Booking Management</a></li>
            <li><a href="#contacts">Contacts</a></li>
            <li><a href="#profile">Profile</a></li>
        </ul>
    </nav>

    <section id="car-management">
    <h2>Car Management</h2>
    <h3 id="table_h2">Car Listings</h3>
    <table>
        <thead>
            <tr>
                <th>Car Name</th>
                <th>Availability</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Your PHP code to fetch car data from the database
            include('db_connect.php'); // Include the database connection file
            
            $sql = "SELECT car_name, availability FROM cars";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['car_name'] . '</td>';
                    echo '<td>' . $row['availability'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="2">No cars found in the database.</td></tr>';
            }
            
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</section>

    <br><br><br><br>
    

    <section id="booking-management">
        <h2>Booking Management</h2>
        <h3 id ="table_h2">Booking Requests</h3>
        <table>
          <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Pickup Point</th>
                    <th>Hire Date</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('db_connect.php'); // Include the database connection file

                $sql = "SELECT FullName, MobileNumber, Email, PickupPoint, HireDate, ReturnDate FROM booking";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['FullName'] . '</td>';
                        echo '<td>' . $row['MobileNumber'] . '</td>';
                        echo '<td>' . $row['Email'] . '</td>';
                        echo '<td>' . $row['PickupPoint'] . '</td>';
                        echo '<td>' . $row['HireDate'] . '</td>';
                        echo '<td>' . $row['ReturnDate'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="6">No booking requests found in the database.</td></tr>';
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <br><br><br><br>
        <h3>Booking Details</h3>
        <p>Client Name: John Doe</p>
        <p>Car Name: Car 1</p>
        <p>Status: Pending</p>
        <button id="confirm-booking">Confirm Booking</button>
    </section>

    
    <section id="contacts">
    <h2>Contacts Made</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Your PHP code to fetch contact data from the "contact" table in the database
            include('db_connect.php'); // Include the database connection file
            
            $sql = "SELECT name, email, subject, message FROM contact";
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['subject'] . '</td>';
                    echo '<td>' . $row['message'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="4">No contacts found in the database.</td></tr>';
            }
            
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</section>

        


    <h3>Add New Car</h3>
    <form enctype="multipart/form-data" action="add_car.php" method="POST">
        <label for="car-name">Car Name:</label>
        <input type="text" id="car-name" name="car-name" required>
        
        <label for="availability">Availability:</label>
        <select id="availability" name="availability">
            <option value="available">Available</option>
            <option value="unavailable">Unavailable</option>
        </select>
        
        <label for="car-image">Car Image:</label>
        <input type="file" id="car-image" name="car-image" accept="image/*" required>
        <br>
        <label for="car-description">Car Description:(Comma Separated)</label>
        <textarea id="car-description" name="car-description" rows="4" required></textarea>
        <br>
        <label for="price">Price</label>
        <input type="text" id="price" name="price" required>
        <button type="submit">Add Car</button>
    </form>

    <section id="profile">
        <h2>User Profile</h2>
        <h3>Your Profile</h3>
        <p>Name: Admin User</p>
        <p>Email: admin@example.com</p>
        <button id="update-profile">Update Profile</button>
    </section>

    <footer>
        &copy; 2023 Car Rental Admin Panel
    </footer>

    <script src="admin.js"></script>
</body>
</html>
