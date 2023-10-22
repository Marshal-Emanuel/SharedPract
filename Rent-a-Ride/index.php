<!DOCTYPE html>
<html lang="en">
<style>
.hero {
    background-image: url('assets/img/wl4.jpg');
    background-size: cover;
    background-position: center;
    color: #fff;
    text-align: center;
    padding: 100px 0;
}
.hero-content {
    max-width: 800px;
    margin: 0 auto;
}

.hero h1 {
    font-size: 36px;
    margin-bottom: 20px;
}

.hero p {
    font-size: 20px;
    margin-bottom: 30px;
}
.cta-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007BFF;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    border-radius: 5px;
}

.cta-button:hover {
    background-color: #0056b3;
}
.about {
    background-color: #f5f5f5; 
    padding: 40px 0;
    text-align: center;
}

.about h2 {
    font-size: 36px;
    color: #333; 
    margin-bottom: 20px;
}

.about p {
    font-size: 18px;
    color: #666; 
    max-width: 600px;
    margin: 0 auto;
    line-height: 1.5;
}

.cars, .contact {
    background-color: #f5f5f5; 
    max-width: 800px;
    margin: 0 auto;
    padding: 50px 0;
    text-align: center;
    
}

.cars h2, .contact h2 {
    font-size: 36px;
    margin-bottom: 20px;
}
</style>
<?php include ('assets/header.php'); ?>
<section class="hero">
        <div class="hero-content">
            <h1>Welcome to Rent A Car</h1>
            <p>Your next adventure begins here</p>
            <a href="#cars" class="cta-button">View Cars</a>
        </div>
    </section>

    <section id="about" class="about">
        <h2>About Us</h2>
        <p>Rent a Ride is your premier destination for exceptional car rental experiences. We are dedicated to providing you with top-notch vehicles and outstanding service, making your journeys more enjoyable and memorable.

At Rent a Ride, we are not just in the business of renting cars; we are in the business of creating moments. We understand that every trip is an opportunity for discovery, adventure, and making lifelong memories.

Our team is passionate about ensuring your travel is stress-free and comfortable. With a diverse fleet of well-maintained vehicles, we cater to your unique needs and preferences. Whether you need a reliable sedan for a business trip, a spacious SUV for a family getaway, or a luxury car for a special occasion, we've got you covered.

We believe in the power of the journey, the thrill of the open road, and the excitement of new destinations. That's why we are committed to providing you with a seamless and enjoyable car rental experience.

Join us in turning your travels into extraordinary adventures. Explore our range of vehicles, plan your next trip, and start a new chapter in your travel story with Rent a Ride. Your next journey begins here.</p>
    </section>

    <section id="cars" class="cars">
        <h2>Our Cars</h2>
        <?php include('cars.php'); ?>
       
    </section>


    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <?php include('contact.php'); ?>
        
        <p>If you have any questions, feel free to contact us at <a href="mailto:info@rentacar.com">info@rentacar.com</a>.</p>
    </section>
 <?php include ('assets/footer.php'); ?> 
    
</body>
</html>