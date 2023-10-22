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
            <li><a href="#earnings">Earnings</a></li>
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
        <h3 id="table_h2">Booking Requests</h3>
        <table>
            <thead>
                <tr>
                    <th>Client Name</th>
                    <th>Car Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>John Doe</td>
                    <td>Car 1</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>Jane Smith</td>
                    <td>Car 2</td>
                    <td>Confirmed</td>
                </tr>
            </tbody>
        </table>
        <br><br><br><br>
        <h3>Booking Details</h3>
        <p>Client Name: John Doe</p>
        <p>Car Name: Car 1</p>
        <p>Status: Pending</p>
        <button id="confirm-booking">Confirm Booking</button>
    </section>

    <section id="earnings">
        <h2>Earnings and Reports</h2>
        <h3>Earnings Summary</h3>
        <p>Total Earnings: $10,000</p>
        <p>Monthly Earnings: $2,000</p>
        <h3>Earnings Chart</h3>
        <canvas id="earnings-chart" width="400" height="200"></canvas>
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
