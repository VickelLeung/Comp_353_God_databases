<html>
<head>
	<meta charset="utf-8">
	<title>Comp 353 - Main Projects</title>
	<!-- <link rel ="stylesheet" type ="text/css" href ="style.css"> -->
<style>

@import url(https://fonts.googleapis.com/css?family=Open+Sans:700);

body{
/*background-color:#93A3BC;*/
background-image: linear-gradient(to top, #0c3483 0%, #a2b6df 100%, #6b8cce 100%, #a2b6df 100%);
text-align:center;

}

.commands{
/* border: 2px solid blue; */
float:left;
width:50%;
}

.entity{
/* border: 2px solid green; */
float:left;
width: 50%;
}

.inputQuery, .userInput, .credits{

	text-align: center;
}

.queryContainer{
border: 2px solid #555555;
background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
margin:1.5%;
}

.queryResponse{
border: 2px solid white;
}

.members{
	font-size: 1.5em;
	border:3px inset black;
	margin:0.5%;
}

.insertEmployees, .insertDept, .insertProjects, .insertDependants{
	text-align: left;
	padding:1%;
}

.underline{
	/*text-decoration: underline;*/
	border-bottom: 4px solid #1F1959;
}

input{
	margin:0.5%;
}
input[type="text"]{
	color: #1F1959;
	font-size: 1.5em;
	font-weight: bolder;
}

textarea{
	resize:none;
}

#three{
	width: 80%;
	height: 60%
	color: #1F1959;
	font-size: 2em;
	font-weight: bolder;
}

#btnUp{

  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}

.btn{
  position:relative;
  margin-top:2%;
  background:#c3cfe2;
  border:1px solid white;
  padding:5px;
  font-size:0.9em;
  color:#1F1959;
  box-shadow:4px 4px 0px 0px white;
  font-family: 'Open Sans', sans-serif;
  font-weight:700;
  letter-spacing:5px;
  text-transform:uppercase;
  transition: all 300ms ease-in-out;
  left:0;
  top:0;

}

.btn:hover{
  left:4px;
  top:4px;
  box-shadow:0 0 0 0 white;
}

* {
  color: #1F1959;
}

h1 {
  font-family: 'Ubuntu Condensed', sans-serif; 
  font-size: 6em;
  text-align: center;
  /*margin-top: 0.5%;*/
  opacity: 0; 
  -webkit-animation: fade 2s ease-in, 
    						  up 1s ease-in; 
  -webkit-animation-fill-mode: forwards;  
 
}

.divider {
  width: 0px; height: 2px; 
  background: #1F1959;
  margin: -30px auto 0;
  opacity: 0;
  -webkit-animation: fade 1s 0.75s linear,
    						  stretch 1s 0.4s linear;
  -webkit-animation-fill-mode: forwards;  
  background: color: #1F1959;
}

h2 {
  font-size: 4em;
  font-family: 'Damion', serif;
  text-align: center;
  margin:0;
  padding:0.5%;
  /*margin-top: 0.5%;*/
  opacity: 0;
  -webkit-animation: fade 2s 1.5s linear; 
  -webkit-animation-fill-mode: forwards;

}

@-webkit-keyframes fade {
  from { opacity: 0; }
  to   { opacity: 1; }
}

@-webkit-keyframes up {
  0%    { margin-top: 90px; }
  60%   { margin-top: 30px; }
  70%   { margin-top: 25px;  }
  80%   { margin-top: 30px; }
  90%   { margin-top: 25px;  } 
  100%  { margin-top: 30px; }
}

@-webkit-keyframes stretch {
  from { width: 0px;   }
  to   { width: 530px; } 
}


</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script></script>
<link href='https://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="up">
		<a href="up"></a>
	</div>

<h2>COMP 353 - Main Project </h2>	
<h1>Datababe<img src="knuckles.png"></h1>
<div class="divider"></div>
<h2>[DATABASES] </h2>

	<div class="queryContainer">
		<div class="commonContainer">
			<h2>Most Common Queries</h2>
		<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<select onChange='document.getElementById("one").value = this.value'>
			  <option value="none"></option>
			  <option value="SELECT * FROM Employees;">Display all Employees</option>
			  <option value = "SELECT * FROM Departments;">Display all Deparments</option >
			  <option value = "SELECT * FROM Dependants;">Display all Dependants</option >
			  <option value="SELECT * FROM Projects;">Display all Projects</option>
			  <option value="SELECT * FROM Locations;">Display all Locations</option>
			</select>
			<input type="hidden" id='one' class='fld' name="query1" size="60" value = "<?php echo $_POST["query"
		 ];?>">
			<input type="submit" class ="btn" value="Submit">
		</form>

		 <?php
		 	//use you own account
		 	$servername = "qzc353.encs.concordia.ca";
		 	$username = "qzc353_4";
		 	$password = "Datababe";
		 	$dbname = "qzc353_4";
		 	// Create connection
		 	$conn = mysqli_connect($servername, $username, $password, $dbname);
		 	// Check connection
		 	if (!$conn) {
		 	 die("Connection failed: " . mysqli_connect_error());
		 	}
		 	$sql = $_POST["query1"];
		 	if(!empty($sql)){
		 	 $result = mysqli_query($conn, $sql);
		 	 if (mysqli_num_rows($result) > 0) {
		 		 // output data of each row
		 		 while($row = mysqli_fetch_assoc($result)) {

		 		 foreach($row as $k => $v){
		 		 echo $k.": ".$v." ";

		 		 echo "<br>";

		 		 }
		 		 echo "<br>";
		 		 }
		 	 }
		 	 else {
		 	 echo "0 results";
		 	 }
		 	}
		 	error_reporting(0);
		 ?>
		
		</div>

		<div class="addEntry">
			<h2>Inserting data</h2>
			
				<div class="insertEmployees">
					<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h3>Add employees <button class="btn" type="button" onclick="expand('expandEmployees');">+</button></h3>
					<div id="expandEmployees" style="display: none;">
						<span>Name:</span> <input type="text" id="Name" name="name" >
						<span>Gender:</span>  
						<input type="radio" name="gender" id="male" value="Male" checked>
							<span>Male</span>
						<input type="radio" name="gender" id="female" value="Female">
							<span>Female</span>
							<br>
						<span>Date of birth:</span> <input type="text" id="DOB" name ="DOB" required>
						<span>Address:</span> <input type="text" id="Address" name="address" required>
						<br>
						<span>Phone:</span> <input type="text" id="Phone" name="phone" required>
						<span>Salary:</span> <input type="number" id="Salary" name="salary" required>
						<span>Dept. Number:</span> <input type="number" id="dept" name="dept" required>
						<br >
						<button class="btn" type="button" onclick="insertingEmployees();">Finalize</button>
						<input class="btn" type="reset">
						<input class="btn" id="submit1" type="submit" value="Submit" disabled>
						<input type="hidden" id='two' class='fld' name="query3" size="60" value = "<?php echo $_POST["query"];?>">
					</div>
					</form>
				</div>


				<div class="insertDependants">
					<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h3>Add Dependants <button class="btn" type="button" onclick="expand('expandDependant');">+</button></h3>
					<div id="expandDependant" style="display: none;" >
				
						<span>Name:</span> <input type="text" id="Name2" name="name" required>
						<span>Gender:</span>  
						<input type="radio" name="gender" id="male2" value="Male" checked>
							<span>Male</span>
						<input type="radio" name="gender" id="female2" value="Female">
							<span>Female</span>
							<br>
						<span>Date of birth:</span> <input type="text" id="DOB2" name ="DOB" required>
						<br >
						<span>Employee SIN:</span> <input type="number" id="empSin" name="empSin" required>
						
						<br>
						<button class="btn" type="button" onclick="insertingDependant();">Finalize</button>
						
						<input class="btn" type="reset">
						<input class="btn" id="submit2" type="submit" value="Submit" disabled>
						<input type="hidden" id='four' class='fld' name="query3" size="60" value = "<?php echo $_POST["query"];?>">
						</div>
						</form>
					
				</div>

				<div class="insertDept">
					<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h3>Add Departments <button class="btn" type="button" onclick="expand('expandDept');">+</button></h3>
					<div id="expandDept" style="display: none;" >
						<span>Name:</span> <input type="text" id="Name3" name="name" required>
						<br>
						<button class="btn" type="button" onclick="insertingDept();">Finalize</button>
						
						<input class="btn" type="reset">
						<input class="btn" id="submit3" type="submit" value="Submit" disabled>
						<input type="hidden" id='five' class='fld' name="query3" size="60" value = "<?php echo $_POST["query"];?>">
						</div>
					</form>
				</div>

				<div class="insertProjects">
					<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h3>Add Projects <button class="btn" type="button" onclick="expand('expandProject');">+</button></h3>
					<div id="expandProject" style="display: none;" >
						<span>location ID:</span> <input type="text" id="LocationId" name="location" required>
						<span>Name:</span> <input type="text" id="Name4" name="name4" required>
						<br >
						<span>Stage of projects:</span>
						<input type="radio" name="stage" id="preliminary" value="Preliminary" checked>
							<span>Preliminary</span>
						<input type="radio" name="stage" id="intermediate" value="Intermediate">
							<span>Intermediate</span>
						<input type="radio" name="stage" id="advanced" value="Advanced">
							<span>advanced</span>
						<input type="radio" name="stage" id="complete" value="Complete">
							<span>complete</span>
						<br>
						<span>Dept ID:</span> <input type="number" id="deptId" name="deptId" required>
						<span>Manager ID:</span> <input type="number" id="managerId" name="managerId" required>
						<br >
						<button class="btn" type="button" onclick="insertingProject();">Finalize</button>
						<input class="btn" type="reset">
						<input class="btn" id="submit4" type="submit" value="Submit" disabled>
						<input type="hidden" id='six' class='fld' name="query3" size="60" value = "<?php echo $_POST["query"];?>">
						</div>
					</form>
				</div>
</div>

<?php
	//use you own account
	$servername = "qzc353.encs.concordia.ca";
	$username = "qzc353_4";
	$password = "Datababe";
	$dbname = "qzc353_4";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	 die("Connection failed: " . mysqli_connect_error());
	}
	$sql = $_POST["query3"];
	if(!empty($sql)){
	 $result = mysqli_query($conn, $sql);
	 if (mysqli_num_rows($result) > 0) {
		 // output data of each row
		 while($row = mysqli_fetch_assoc($result)) {

		 foreach($row as $k => $v){
		 echo $k.": ".$v." ";

		 echo "<br>";

		 }
		 echo "<br>";
		 }
	 }
	 else {
	 echo "0 results";
	 }
	}
	error_reporting(0);
?>

<!-- 
<div class="deleteEntry">
	<h2>Delete an entry</h2>
	<div>
		<span>Click to delete an entry </span><button type="button">X</button>
	</div>


</div> -->


	<h2>User Input Queries</h2>
	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="btnContainer">
		<h3>Click on the buttons to add/remove/update queries or write your own queries</h3>
		<div class ="commands">
			<h3><span class="underline">Commands Buttons</span></h3>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='SELECT '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='* '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='FROM '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='WHERE '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='INSERT INTO '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='DROP '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='DELETE '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='UPDATE '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='COLUMN '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='AND '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='OR '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='NOT '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='IN '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value=', '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='( '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value=') '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='> '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='< '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='>< '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='= '>
			
		</div>
		<div class ="entity">
			<h3 > <span class="underline">Entity Buttons</span></h3>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Employees '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Departments '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Projects '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Dependants '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Supervises '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Locations '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='WorksOn '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Manages '>
		</div>
		<div class ="attributes">
			<h3> <span class="underline">Attributes Buttons</span></h3>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Name '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='SIN '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Gender '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Salary '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Address '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Phone '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='Hours '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='SID '>
			<input id='add' class ="btn"type='button' onclick='ik(this.value);'  value='ID '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='DOB '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='EmployeeSIN '>
			<input id='add' class ="btn" type='button' onclick='ik(this.value);'  value='ManagerSIN '>
		</div>
	</div>


<div class="inputQuery">
</div>
<div class="userInput">
	<h2>Query:</h2>
	<h3>Please write/modify your query below</h3>
	<br >
<textarea id='three' class='fld' name="query2" size="500" value = "<?php echo $_POST["query"
 ];?>" ></textarea>
 <br >
 <input type="submit" class ="btn" value="Submit">
 <input type ="reset" class ="btn" value ="Clear">
</div>

</form>

<?php
	//use you own account
	$servername = "qzc353.encs.concordia.ca";
	$username = "qzc353_4";
	$password = "Datababe";
	$dbname = "qzc353_4";
	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	 die("Connection failed: " . mysqli_connect_error());
	}
	$sql = $_POST["query2"];
	if(!empty($sql)){
	 $result = mysqli_query($conn, $sql);
	 if (mysqli_num_rows($result) > 0) {
		 // output data of each row
		 while($row = mysqli_fetch_assoc($result)) {

		 foreach($row as $k => $v){
		 echo $k.": ".$v." ";

		 echo "<br>";

		 }
		 echo "<br>";
		 }

	 }
	 else {
	 echo "0 results";
	 }

	}
	 error_reporting(0);
?>

<a id ="btnUp" href ="#up"> <img src ="https://s18.postimg.org/cdk6nu9wp/imageedit_9_7148936279.png"></a>

<div class="credits">
	<h2>Credits</h2>
	<div class="members">
		<p>Project made by Vickel Leung, Monique Richard, Ayah Badran, and Patrick Bui</p>
	</div>
</div>

</div>

<script type="text/javascript">
	$(window).scroll(function() {
  sessionStorage.scrollTop = $(this).scrollTop();
});

$(document).ready(function() {
  if (sessionStorage.scrollTop != "undefined") {
    $(window).scrollTop(sessionStorage.scrollTop);
  }
});


function myFunction(){
	$("form").submit();
}
</script>>


</body>
</html>
