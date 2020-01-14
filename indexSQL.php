<?php

     session_start();
     $name = $_SESSION['name'];

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ERP for SUST</title>
    <link rel="stylesheet" href="StyleSheets/indexSQL.css">
</head>
<body>
    <!-- <h2>Enterprise Resource Planning for Shahjalal University of Science and Technology</h2> -->

    <div class="topBorder">  

        <img src="Img/Logos/logo2.png" style="width:120px">

        <div class="infoBorder">
            <a href="https://www.sust.edu/">My Campus</a>
            <a href="about.html">About</a>
            <a href="contact.html">Contact Us</a>
        </div>
        
        <div id="myAccount">
            <span><a href="loginSQL.php">My Account</a></span>
           <span><h3>Hello <?php echo htmlspecialchars($name); ?></h3></span>
        </div>
    </div>  
    
    <div class="flip-card">

        <div class="teacher-flip-card">

                <div class="flip-card-inner"> 
        
                    <div class="flip-card-front">
                        <img src="Img/Avatars/avatar_teacher.png" alt="Teacher-Avatar" style="width: 300px; height: 300px;">
                        <h2>Teacher</h2>
                    </div>
        
                    <div class="flip-card-back">
                        <h1>John Doe</h1> 
                        <p>Teacher</p> 
                        <p>We love that guy</p>
                    </div>
                    
                </div>
        
            </div> 
        
            <div class="student-flip-card">
        
                <div class="flip-card-inner"> 
        
                    <div class="flip-card-front">
                        <img src="Img/Avatars/avatar_student.png" alt="Student-Avatar" style="width: 300px; height: 300px;">
                        <h2>Student</h2>
                    </div>
        
                    <div class="flip-card-back">
                        <h1>SED</h1> 
                        <p>Student</p> 
                        <p>I love myself</p>
                    </div>
                    
                </div>
        
            </div>
        
            <div class="librarian-flip-card">
        
                <div class="flip-card-inner"> 
        
                    <div class="flip-card-front">
                        <img src="Img/Avatars/avatar_librarian.png" alt="Librarian-Avatar" style="width: 300px; height: 300px;">
                        <h2>Librarian</h2>
                    </div>
        
                    <div class="flip-card-back">
                        <h1>Rahim</h1> 
                        <p>Librarian</p> 
                        <p>He love himself</p>
                    </div>
                    
                </div>
        
            </div>

    </div>

</body>
</html>