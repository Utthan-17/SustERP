<?php 
    require 'config/db.php';
    include 'header.php'
?>

<!DOCTYPE html>
<html>
	<head>
		<title>View Attendance</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="StyleSheets/main.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<?php
				$your_assignment = true;
				$this_file_name = "viewAttendance.php";
				
				$ssql = "SELECT * FROM attendance";

				$search_term = null;
				$filter = null;

				if(isset($_POST['search'])){
					$search_term = htmlspecialchars($_POST['search_box']);
					$filter = $_POST['filter'];

					if($filter == "1")
						$ssql .= " WHERE CONCAT(date, uploaders_name, department_name, batch_year, semester, course_name, files, comments) LIKE '%".$search_term."%'";
					else if($filter == "2")
						$ssql .= " WHERE department_name LIKE '%".$search_term."%'";
					else if($filter == "3")
						$ssql .= " WHERE batch_year LIKE '%".$search_term."%'";
					else if($filter == "4")
						$ssql .= " WHERE semester LIKE '%".$search_term."%'";
					else if($filter == "5")
						$ssql .= " WHERE course_name LIKE '%".$search_term."%'";
				}

				if(!$result = mysqli_query($conn, $ssql)) echo mysqli_error($conn);
				
				$authorization = true;
			
				if(!($occupation_s == "teacher" || $occupation_s == "student" || $occupation_s == "admin")) $authorization = false;
				
				echo "<div style='margin-top: 10%;'>"; 
					include 'search.php';
				echo "</div>";
			?>

			<div style="margin-top: 10%;">
				<h3>Attendance</h3>
			</div>
            
            <?php
                if(!$login_s && $conn) echo "<h2>Log in into your account first.</h2>";
                else if(!$authorization && $conn) echo "<h2>You are not authorize to see the contents of this page.</h2>";
                else if(!(mysqli_num_rows($result)) && $login_s && $authorization  && $conn)
                    echo "<h2>Sorry buddy, your attendance hasn't been uploaded yet.....</h2>";
                else if($conn){
                    while ($row = mysqli_fetch_array($result)){
						if(($occupation_s == "teacher" && $department_s == $row['department_name']) || ($occupation_s == "admin") || ($occupation_s == "student" && $department_s == $row['department_name'] && $batch == $row['batch_year'])){
							$your_assignment = false;
							$path = "Data/attendance/".$row['files'];
							echo "<div class='card card-body bg-light'>";
								echo "<br>";
								echo "<div class='row'>";
									echo "<div class='col-sm-12 col-md-12 col-lg-4' style='margin-left: 15px;'>";
										echo "<embed width='430px' height='250px' src='$path'></embed>";
									echo "</div>";
									echo "<div class='col-sm-12 col-md-12 col-lg-5 pull-center' style='margin-left: 90px'>";
										echo "<br><p><b>Time: </b>".$row['date']."<br><b>Uploaded By: </b>".ucfirst($row['uploaders_name'])."<br><b>Department: </b>".$row['department_name'].
										"<br><b>Course name: </b>".ucfirst($row['course_name'])."<br><b>Batch: </b>".$row['batch_year']."<br><b>Semester: </b>".$row['semester']."<br><b>File name: </b>
                                        ".$row['files']."</p>";
                                    echo "</div>";
                                    echo "<div class='text-right'>";
                                        echo "<a class='btn btn-info' target='_blank' href='Data/attendance/".$row['files']."' style='padding-right: 17px; padding-left: 17px; margin-left: 75px;'>View</a>";
									echo "</div>";
								echo "</div>";
								echo "<div class='col-lg-12'>";
									echo "<br><b>Comment: </b>".ucfirst($row['comments'])."</p>";
								echo "</div>";
							echo "</div>";
							echo "<br>";
						}
					}
                    if($your_assignment) echo "<h2>Sorry buddy, your attendance hasn't been uploaded yet.....</h2>";
                }
			?>
		</div>

		<?php include 'footer.php'; ?>
	</body>
</html>