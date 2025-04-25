<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Services</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file if needed -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
</head>
<body>
    <header>
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Transparent Cleaning</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacts">Contacts</a></li>
                </ul>
            </div>
        </nav>
        <h1>Transparent Cleaning Company</h1>
    </header>
    
    <main>
        <style>
            
            body
            table {
            width: 80%; /* Width of the table */
            margin: 20px 0; /* Margin above and below the table */
            border-collapse: collapse; /* Remove spacing between table cells */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Optional shadow for depth */
            margin-left:70px;
            margin-top:50px;
        }
        h1{
            margin-left:400px;
        }

        th, td {
            padding: 15px; /* Padding inside cells */
            text-align: left; /* Align text to the left */
            border: none; /* No borders */
        }

        th {
            background-color:blue; /* Header background color */
            color: white; /* Header text color */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Zebra striping for rows */
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #f8f9fa; /* Light gray background */
            text-align: center;
            padding: 10px 0;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1); /* Optional shadow for better visibility */
            z-index: 1000; /* Ensure it stays above other elements */
        }
        

        .social-links a {
            margin-right: 10px;
            text-decoration: none;
        }

        .social-links a i {
            margin-right: 5px;
        }
        body{
            background-color:lightblue;
        } 
        </style>
        
        <?php 
        include 'conee.php'; // Include your database connection

        // Fetch data from the database
        $query = "SELECT name, telephone, location, message FROM company";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            // Start the HTML table
            echo "<table border='1'>
                    <tr>
                        <th>Name</th>
                        <th>Phone no</th>
                        <th>Location</th>
                        <th>Message</th>
                    </tr>";
            
            // Output data for each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['telephone']) . "</td>
                        <td>" . htmlspecialchars($row['location']) . "</td>
                        <td>" . htmlspecialchars($row['message']) . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No information found.</p>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </main>

   <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <footer class="footer">
        <div class="social-links mt-3">
            <a href="https://www.facebook.com" class="btn btn-primary" target="_blank" role="button">
                <i class="fab fa-facebook-f"></i> Facebook
            </a>
            <a href="https://www.twitter.com" class="btn btn-info" target="_blank" role="button">
                <i class="fab fa-twitter"></i> Twitter
            </a>
            <a href="https://www.instagram.com" class="btn btn-danger" target="_blank" role="button">
                <i class="fab fa-instagram"></i> Instagram
            </a>
            <a href="https://www.linkedin.com" class="btn btn-dark" target="_blank" role="button">
                <i class="fab fa-linkedin-in"></i> LinkedIn
            </a>
        </div>
        <p>&copy; Transparent Cleaning Company.CO.KE 2025</p>
    </footer>
</body>
</html>