<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="webs.css">
</head>
<body>
    <header>
        <a href="#" class="logo"> Pixels Photography </a>
        <nav class="navbar">
          <a href="index.php"> Home </a>
          <a href="aboutus.php">About Us </a>
          
          <a href="gallery.php"> Gallery </a>
          <a href="#exp.html"> Experience and Skill </a>
          <a href="contact.html"> Contact Us </a>
        </nav>
      </header>
      <section class="about" id="about">
        <div class="about-imag">
          <img src="image1.png">
        </div>
        <div class="about-text">
          <h2> About <span> Us </span></h2>
          <h4> <?php
          include 'connect.php';
          $query = "SELECT title, description FROM about_us";
          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                
              echo $row['title'];
            }
          } 
        ?></h4>
          <p> <?php
          include 'connect.php';
          $query = "SELECT title, description FROM about_us";
          
          $result = mysqli_query($conn, $query);
          if (mysqli_num_rows($result) > 0) {
            
            while ($row = mysqli_fetch_assoc($result)) {
                
              echo $row['description'];
            }
          } 
        ?>

          </p>
          <p> We respect the demand of our cusomers and visitors and try to fullfill it. 
            We have been providing the services in the field of photography since
             years. We have qualified and skilled hotographers for the service. 
          </p>

          <a href="#" class="btn-box">View more about us  </a>
        </div>
      </section>
    

    
</body>
</html>