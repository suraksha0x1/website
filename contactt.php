<?php
// Ensure the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include 'connect.php';

    // Initialize variables to store user input
    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $email = mysqli_real_escape_string($conn, $_POST['Email']);
    $message = mysqli_real_escape_string($conn, $_POST['Message']);

    // Validate if any field is empty
    if (empty($username) || empty($email) || empty($message)) {
        echo "Error: All fields are required.";
    } else {
        // Prepare SQL query to insert data into 'contact' table
        $query = "INSERT INTO contact (Username, Email, Message) VALUES ('$username', '$email', '$message')";

        // Execute query and handle success or failure
        if (mysqli_query($conn, $query)) {
            echo "Thank you for contacting us.";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation Form</title>
    <link rel="stylesheet" href="validd.css">
</head>
<body>
    <header>
        <a href="#" class="logo">Pixels Photography</a>
        <nav class="navbar">
            <a href="index.php">Home</a>
            <a href="aboutus.php">About Us</a>
            <a href="gallery.php">Gallery</a>
            <a href="exp.php">Experience and Skill</a>      
            <a href="contact.php">Contact Us</a> 
        </nav>
    </header>
    
    <div class="container">
        <div class="contact-text">
            <h1>Contact <span>Us</span></h1>
            <h4>Let's work together</h4>
            <p>Working together in a peaceful and satisfying way as a team for the overall welfare.</p>
            <div class="contact-list">
                <li><i class='bx bx-send'></i>Email: pixel@gmail.com</li>
                <li><i class='bx bx-phone'></i>Number: 075690435</li>
            </div>
        </div>
        <div class="form-box">

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="FormFill" onsubmit="return validation()">
                <h2>Contact</h2>
                <div class="input-box">
                    <input type="text" id="username" name="Username" placeholder="Username" value="<?php echo isset($_POST['Username']) ? htmlspecialchars($_POST['Username']) : ''; ?>">
                    <span class="error"><?php echo $user_name_err; ?></span>
                </div>
                <div class="input-box">
                    <input type="email" id="email" name="Email" placeholder="Email" value="<?php echo isset($_POST['Email']) ? htmlspecialchars($_POST['Email']) : ''; ?>">
                    <span class="error"><?php echo $email_err; ?></span>
                </div>
                <div class="input-box">
                    <textarea id="message" name="Message" placeholder="Your Message" class="large-textarea" rows="10" cols="50"><?php echo isset($_POST['Message']) ? htmlspecialchars($_POST['Message']) : ''; ?></textarea>
                    <span class="error"><?php echo $message_err; ?></span>
                </div>
                <div class="button">
                    <input type="submit" class="btn" value="Send">
                </div>

            </form>
           
    </div>
    <?php include 'footer.html'; ?>

    <script src="valids.js"></script>
</body>
</html>