<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Bulldog Search</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<header>
<h1>Bulldog Search</h1>
</header>             
              
<body>

<?php 
$servername = "avl.cs.unca.edu";
$username = "bodowd";
$password = "sql4you";
$dbname = "bodowdDB_BulldogSearch";	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
?>

<p1> Welcome to UNCA's Bulldog Search.  This web application will allow you to match with other student atheletes and alumni with similar career interests. </p1>

<br></br>

<form method="post" action="index.php" >
				*Your Major: <select name="clientMajor" type="select" required>
					<option value="CS">CS</option>
					<option value="Math">Math</option>
					<option value="English">English</option>
					<option value="Biology">Biology</option>
				</select>
				<br>
				*Sport you play: <select name="clientSport" type="select" required>
					<option value ="Mens Soccer">Mens Soccer</option>
					<option value="Womens Soccer">Womens Soccer</option>
					<option value ="Mens Basketball">Mens Basketball</option>
					<option value="Womens Basketball">Womens Basketball</option>
					</select>
				<br>
				*Your Year: <select name="clientYear" type="select" required>
					<option value="Freshmen">Freshmen</option>
					<option value="Sophmore">Sophmore</option>
					<option value="Junior">Junior</option>
					<option value="Senior">Senior</option>
				</select>
				<br>
				<br>
				Check the boxes you would like to match with (all that apply) <br>
				<input type="checkbox" name="major" value="Major"> Major <br>
				<input type="checkbox" name="sport" value="sport"> Sport <br>
				<input type="checkbox" name="year" value="year"> Year <br>
			<input type ="submit" value="Search">
</form>
<br></br>

<table class="table">
<tr>
    <th>First</th>
    <th>Last</th>
    <th>Major</th>
    <th>Year</th>
    <th>Sport</th>
</tr>

<?php 
$clientMajor = $_POST['clientMajor'];
$clientSport = $_POST['clientSport'];
$clientYear = $_POST['clientYear'];

if (isset($_POST['major']) and isset($_POST['sport']) and isset($_POST['year'])) { //All selected
    echo "The following students match your Major, Sport, and Year: ";
    $sql = "SELECT * FROM Athlete WHERE `Major` = '$clientMajor' AND `Sport` = '$clientSport' AND `Year` = '$clientYear'";   
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["First"]. "</td><td>" . $row["Last"]. "</td><td>" . $row["Major"]. "</td><td>" . $row["Year"].
            "</td><td>" . $row["Sport"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 Results";
    }
} else if(isset($_POST['major']) and isset($_POST['sport'])){ //Major and Sport Selected
    echo "The following students match your Major and Sport: ";
    $sql = "SELECT * FROM Athlete WHERE `Major` = '$clientMajor' AND `Sport` = '$clientSport'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["First"]. "</td><td>" . $row["Last"]. "</td><td>" . $row["Major"]. "</td><td>" . $row["Year"].
            "</td><td>" . $row["Sport"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 Results";
    }
} else if(isset($_POST['major']) and isset($_POST['year'])){ //Major and Year Selected
    echo "The following students match your Major and Year: ";
    $sql = "SELECT * FROM Athlete WHERE `Major` = '$clientMajor' AND `Year` = '$clientYear'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["First"]. "</td><td>" . $row["Last"]. "</td><td>" . $row["Major"]. "</td><td>" . $row["Year"].
            "</td><td>" . $row["Sport"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 Results";
    }
} else if(isset($_POST['year']) and isset($_POST['sport'])){ //Year and Sport Selected
    echo "The following students match your Sport and Year: ";
    $sql = "SELECT * FROM Athlete WHERE `Year` = '$clientYear' AND `Sport` = '$clientSport'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["First"]. "</td><td>" . $row["Last"]. "</td><td>" . $row["Major"]. "</td><td>" . $row["Year"].
            "</td><td>" . $row["Sport"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 Results";
    }
} else if(isset($_POST['major'])){ //Only Major Selected
    echo "The following students match your Major: ";
    $sql = "SELECT * FROM Athlete WHERE `Major` = '$clientMajor'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["First"]. "</td><td>" . $row["Last"]. "</td><td>" . $row["Major"]. "</td><td>" . $row["Year"].
            "</td><td>" . $row["Sport"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 Results";
    }
} else if(isset($_POST['sport'])){ //Only Sport Selected
    echo "The following students match your Sport: ";
    $sql = "SELECT * FROM Athlete WHERE `Sport` = '$clientSport'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["First"]. "</td><td>" . $row["Last"]. "</td><td>" . $row["Major"]. "</td><td>" . $row["Year"].
            "</td><td>" . $row["Sport"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 Results";
    }
} else if(isset($_POST['year'])){ //Only Year Selected
    echo "The following students match your Year: ";
    $sql = "SELECT * FROM Athlete WHERE `Year` = '$clientYear'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["First"]. "</td><td>" . $row["Last"]. "</td><td>" . $row["Major"]. "</td><td>" . $row["Year"].
            "</td><td>" . $row["Sport"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 Results";
    }
}
?>
</table>
</body>
</html>
