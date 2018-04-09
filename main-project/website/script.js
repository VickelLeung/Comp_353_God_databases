//for scroll up botton
window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
	        document.getElementById("btnUp").style.display = "block";
	    } else {
	        document.getElementById("btnUp").style.display = "none";
	    }
	}

	$(document).ready(function(){
  // Add smooth scrolling to all links
  $("#btnUp").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

//end of scroll up


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

if (document.getElementById('male').checked){
		gender = document.getElementById("male").value;
	}
else{
		gender = document.getElementById("female").value;
	}
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
if (document.getElementById('male2').checked){
		gender = document.getElementById("male").value;
	}
else{
		gender = document.getElementById("female2").value;
	}

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


function insertingProject(){

		locationId = document.getElementById('LocationId').value;
		name = document.getElementById('Name4').value;
		
	if(document.getElementById('preliminary').checked){
		stage = document.getElementById('preliminary').value;
	}
	else if(document.getElementById('intermediate').checked){
		stage = document.getElementById('intermediate').value;
	}
	else if(document.getElementById('advanced').checked){
		stage = document.getElementById('advanced').value;
	}
	else{
		stage = document.getElementById('complete').value;
	}

		deptId = document.getElementById('deptId').value;
		managerId = document.getElementById('managerId').value;

		//check if user entered anything in the field
	 if(locationId > 0 && name.length > 0 && stage.length > 0 && deptId > 0 && managerId > 0){
	 
	 	//put into insert query
		answers ="INSERT INTO Projects(LocationID, Name, Stage, DeptID, ManagerID) VALUES("+ locationId +","+'\''+ name +"\'"+", " + '\''+ stage +"\'"+ ", " + deptId + ", " + managerId + ");";	
		
		// alert user about the following informations
		alert("You are about to add the following: "+ "\nLocation ID: " + locationId + "\nname: "+name + "\nstage: " + stage + "\ndeptId: " + deptId + "\nStage:" + stage +  "\nClick on reset to cancel adding else click on submit to add the entry." );
		 
		 //add answers to div 'two' to enter into DB
		 document.getElementById("six").value = answers;

		 document.getElementById("submit4").disabled = false;

		}

}


