<html>
<head>
	<meta charset="utf-8">
	<title>Comp 353 - Main Projects</title>
	<!-- <link rel ="stylesheet" type ="text/css" href ="style.css"> -->
<style>
body{
background-color:#bed0e9;
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

.commonContainer{


}

.btnContainer{
}


.mainTitle>span{
font-size:55px;
color:#555555;
}

.queryContainer{
border: 2px solid #555555;
background-color: #eff6fd;
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

input{
	margin:0.5%;
}

/*.addEntry{
	text-align: left;
}*/

</style>

</head>
<body>
	<div class="mainTitle">
		<span>COMP 353 [DATABASES] - Main Project </span>
		<img src="knuckles.png">
	</div>

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
			<input type="submit" value="Submit">
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
					<h4>Add employees <button type="button" onclick="expand('expandEmployees');">+</button></h4>
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
						<button type="button" onclick="insertingEmployees();">Finalize</button>
						<input type="reset">
						<input id="submit1" type="submit" value="Submit" disabled>
						<input type="text" id='two' class='fld' name="query3" size="60" value = "<?php echo $_POST["query"];?>">
					</div>
					</form>
				</div>


				<div class="insertDependants">
					<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h4>Add Dependants <button type="button" onclick="expand('expandDependant');">+</button></h4>
					<div id="expandDependant" style="display: none;" >
						<!-- <span>SID:</span> <input type="number" id="SID" name ="sid" > -->
						<span>Name:</span> <input type="text" id="Name2" name="name" >
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
						<button type="button" onclick="insertingDependant();">Finalize</button>
						
						<input type="reset">
						<input id="submit2" type="submit" value="Submit" disabled>
						<input type="text" id='four' class='fld' name="query3" size="60" value = "<?php echo $_POST["query"];?>">
						</div>
						</form>
					
				</div>

				<div class="insertDept">
					<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<h4>Add Dependants <button type="button" onclick="expand('expandDept');">+</button></h4>
					<div id="expandDept" style="display: none;" >
						<span>Name:</span> <input type="text" id="Name3" name="name" >
						<br>
						<button type="button" onclick="insertingDept();">Finalize</button>
						
						<input type="reset">
						<input id="submit3" type="submit" value="Submit" disabled>
						<input type="text" id='five' class='fld' name="query3" size="60" value = "<?php echo $_POST["query"];?>">
						</div>
					</form>
				</div>

				<!-- <div class="insertDepartments">
					<h4>Add Departments</h4>
					<span>Name:</span> <input type="text">
					<span>Gender:</span> <input type="text">
					<span>SIN:</span> <input type="text">
					<span>Address:</span> <input type="text">
					<span>Phone:</span> <input type="text">
					<span>Salary:</span> <input type="text">
				</div>
				<div class="insertProjects">
					<h4>Add Projects</h4>
					<span>Name:</span> <input type="text">
					<span>Gender:</span> <input type="text">
					<span>SIN:</span> <input type="text">
					<span>Address:</span> <input type="text">
					<span>Phone:</span> <input type="text">
					<span>Salary:</span> <input type="text">
				<div>
				<div class="insertDependants">
					<h4>Add dependants</h4>
					<span>Name:</span> <input type="text">
					<span>Gender:</span> <input type="text">
					<span>SIN:</span> <input type="text">
					<span>Address:</span> <input type="text">
					<span>Phone:</span> <input type="text">
					<span>Salary:</span> <input type="text">
				</div> -->
				<!-- </form> -->
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


	<h2>User Input Queries</h2>
	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div class="btnContainer">
		<p>Click on the buttons to add/remove/update queries or write your own queries</p>
		<div class ="commands">
			<h4>Commands Buttons</h4>
			<input id='add' type='button' onclick='ik(this.value);'  value='SELECT '>
			<input id='add' type='button' onclick='ik(this.value);'  value='* '>
			<input id='add' type='button' onclick='ik(this.value);'  value='FROM '>
			<input id='add' type='button' onclick='ik(this.value);'  value='WHERE '>
			<input id='add' type='button' onclick='ik(this.value);'  value='INSERT INTO '>
			<input id='add' type='button' onclick='ik(this.value);'  value='DROP '>
			<input id='add' type='button' onclick='ik(this.value);'  value='DELETE '>
			<input id='add' type='button' onclick='ik(this.value);'  value='UPDATE '>
			<input id='add' type='button' onclick='ik(this.value);'  value='COLUMN '>
			<input id='add' type='button' onclick='ik(this.value);'  value='AND '>
			<input id='add' type='button' onclick='ik(this.value);'  value='OR '>
			<input id='add' type='button' onclick='ik(this.value);'  value='NOT '>
			<input id='add' type='button' onclick='ik(this.value);'  value='IN '>
			<input id='add' type='button' onclick='ik(this.value);'  value=', '>
			<input id='add' type='button' onclick='ik(this.value);'  value='( '>
			<input id='add' type='button' onclick='ik(this.value);'  value=') '>
			<input id='add' type='button' onclick='ik(this.value);'  value='> '>
			<input id='add' type='button' onclick='ik(this.value);'  value='< '>
			<input id='add' type='button' onclick='ik(this.value);'  value='>< '>
			<input id='add' type='button' onclick='ik(this.value);'  value='= '>
			
		</div>
		<div class ="entity">
			<h4>Entity Buttons</h4>
			<input id='add' type='button' onclick='ik(this.value);'  value='Employees '>
			<input id='add' type='button' onclick='ik(this.value);'  value='Departments '>
			<input id='add' type='button' onclick='ik(this.value);'  value='Projects '>
			<input id='add' type='button' onclick='ik(this.value);'  value='Dependants '>
			<input id='add' type='button' onclick='ik(this.value);'  value='Supervises '>
			<input id='add' type='button' onclick='ik(this.value);'  value='Locations '>
			<input id='add' type='button' onclick='ik(this.value);'  value='WorksOn '>
			<input id='add' type='button' onclick='ik(this.value);'  value='Manages '>
		</div>
		<div class ="attributes">
			<h4>Attributes Buttons</h4>
			<input id='add' type='button' onclick='ik(this.value);'  value='Name '>
			<input id='add' type='button' onclick='ik(this.value);'  value='SIN '>
			<input id='add' type='button' onclick='ik(this.value);'  value='Gender '>
			<input id='add' type='button' onclick='ik(this.value);'  value='Salary '>
			<input id='add' type='button' onclick='ik(this.value);'  value='Address '>
			<input id='add' type='button' onclick='ik(this.value);'  value='Phone '>
			<input id='add' type='button' onclick='ik(this.value);'  value='Hours '>
			<input id='add' type='button' onclick='ik(this.value);'  value='SID '>
		</div>
	</div>


<div class="inputQuery">
		<h4>Please write/modify your query below</h4>
</div>
<div class="userInput">
	Query:<input type="text" id='three' class='fld' name="query2" size="60" value = "<?php echo $_POST["query"
 ];?>">

 <input type="submit" value="Submit">
 <input type ="reset" value ="Clear">
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

<div class="credits">
	<h2>Credits</h2>
	<div class="members">
		<p>Project made by Vickel Leung, Monique Richard, Ayah Badran, and Patrick Bui</p>
	</div>
</div>


</div>

<script>
	function ik(val){
	   result = document.getElementById('three');
	   result.value = result.value + val;
	}

	function expand(id) {
    var x = document.getElementById(id);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

	function insertingEmployees(){
	
		// SIN = document.getElementById('SIN').value;
		name = document.getElementById('Name').value;
		gender = document.getElementById("male").value;
		DOB = document.getElementById("DOB").value;
		address = document.getElementById("Address").value;
		phone = document.getElementById("Phone").value;
		salary = document.getElementById("Salary").value;
		dept = document.getElementById("dept").value;

		//check if user entered anything in the field
	 if( name.length > 0 && DOB.length > 0 && address.length > 0 && phone.length > 0 && salary > 0 && dept > 0){

	 	//put into insert query
		answers ="INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber) VALUES("  + '\''+ name+"\'" + ", " + '\''+ gender +'\''+ ", " + '\'' + DOB +'\''  +", " + '\'' + address+'\''  +", " + '\'' +phone + '\'' +", " + salary + ", " + dept + ");";
		
		//alert user about the following informations
		alert("You are about to add the following: "+" \nname: "+name + " \nGender: " + gender + " \nDOB: " + DOB + " \naddress: " + address + " \nphone: " + phone +" \nSalary: "+ salary + " \nDept. Number: " + dept + "\nClick on reset to cancel adding else click on submit to add the entry." );
		 
		 //add answers to div 'two' to enter into DB
		 document.getElementById("two").value = answers;

		 document.getElementById("submit1").disabled = false;

		}
}
function insertingDependant(){
		// SID = document.getElementById('SID').value;
		name = document.getElementById('Name2').value;
		gender = document.getElementById("male2").value;
		DOB = document.getElementById("DOB2").value;
		empSin = document.getElementById("empSin").value;

		//check if user entered anything in the field
	 // if(SIN > 0 && name.length > 0 && DOB.length > 0 && address.length > 0 && phone.length > 0 && salary > 0 && dept > 0){

	 	//put into insert query
		answers ="INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN) VALUES("+ '\''+ name+"\'" + ", " + '\''+ gender +'\''+ ", " + '\'' + DOB +'\''  + ", " +  empSin + ");";
		
		//alert user about the following informations
		alert("You are about to add the following: "+" \nname: "+name + " \nGender: " + gender + " \nDOB: " + DOB + " \nEmployee SIN: " + empSin + "\nClick on reset to cancel adding else click on submit to add the entry." );
		 
		 //add answers to div 'two' to enter into DB
		 document.getElementById("four").value = answers;

		 document.getElementById("submit2").disabled = false;

		// }

}

function insertingDept(){
		// SID = document.getElementById('SID').value;
		name = document.getElementById('Name3').value;

		//check if user entered anything in the field
	 // if(SIN > 0 && name.length > 0 && DOB.length > 0 && address.length > 0 && phone.length > 0 && salary > 0 && dept > 0){

	 	//put into insert query
		answers ="INSERT INTO Departments(Name) VALUES("+ '\''+ name+"\'" + ");";
		
		//alert user about the following informations
		alert("You are about to add the following: "+" \nname: "+name + "\nClick on reset to cancel adding else click on submit to add the entry." );
		 
		 //add answers to div 'two' to enter into DB
		 document.getElementById("five").value = answers;

		 document.getElementById("submit3").disabled = false;

		// }

}




</script>

</body>
</html>

<script

