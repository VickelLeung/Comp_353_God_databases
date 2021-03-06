--Creating Departments table first since Employee needs a department
DROP TABLE IF EXISTS `Departments`;
CREATE TABLE Departments(
    ID int NOT NULL AUTO_INCREMENT,
    Name CHAR(40),
    UNIQUE(Name),
    PRIMARY KEY(ID)
);

--Inserting into departments
INSERT INTO Departments(Name)
	VALUES(
	'Marketing'
);

INSERT INTO Departments(Name)
	VALUES(
	'Info and tech'
);

INSERT INTO Departments(Name)
	VALUES(
	'Employee Management'
);

INSERT INTO Departments(Name)
	VALUES(
	'Sales'
);

INSERT INTO Departments(Name)
	VALUES(
	'Human Resources'
);

INSERT INTO Departments(Name)
	VALUES(
	'Research and Development'
);

INSERT INTO Departments(Name)
	VALUES(
	'Production and quality assurance'
);

INSERT INTO Departments(Name)
	VALUES(
	'Customer Service'
);

INSERT INTO Departments(Name)
	VALUES(
	'Supply Chain'
);

INSERT INTO Departments(Name)
	VALUES(
	'Purchasing'
);

--Creating Employees table
DROP TABLE IF EXISTS `Employees`;
CREATE TABLE Employees(
    SIN INT AUTO_INCREMENT PRIMARY KEY,
    UNIQUE (SIN),
    Name CHAR(30) NOT NULL,
    UNIQUE(Name),
    Gender CHAR(6) NOT NULL,
    DOB CHAR(20) NOT NULL,
    Address CHAR(50) NOT NULL,
    PhoneNumber CHAR(15)NOT NULL,
    Salary int NOT NULL,
    DeptNumber int NOT NULL,
    FOREIGN KEY (DeptNumber) REFERENCES Departments(ID) ON DELETE CASCADE    
);

--Inserting into Employees table
INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 'Micheal Jackson', 'Male', '1958-08-29', 'heavenville', '514-666-8648', 70, 1 
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
'Jessica Alba', 'Female', '1981-04-28', 'goddessville', '514-819-9282', 20, 2
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES(  'Charlie Chaplin', 'Male', '1889-04-16', 'hilariousVille', '514-125-9583', 21, 3 
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES(  'Beyonce Knowles', 'Female', '1981-09-04', 'AllTheSingleLadiesVille', '514-832-8745', 18, 4
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES(  'Charlie Sheen', 'Male', '1965-09-03', 'biWinning', '514-232-5839', 65, 5
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES(  'Jennifer Love Hewitt', 'Female', '1979-03-21', 'loveVille', '514-573-9283', 28, 6
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES(  'Ron Jeremy', 'Male', '1953-03-12', 'spreadDaLove', '514-534-8282', 25, 7 
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
'Selena Gomez', 'Female', '1992-07-22', 'HeartBreakVille', '514-594-8273', 50, 8
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
'Lil Wayne', 'Male', '1982-09-22', 'rapVille', '514-894-2573', 12, 9 
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
 'Jennifer Lawrence', 'Female', '1990-08-15', 'lawVille', '514-244-5783', 60, 10
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
 'Tom Cruise', 'Male', '1962-08-03', 'cruisingU', '514-564-9233', 35, 1 
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
 'Miley Cyrus', 'Female', '1992-11-23', 'wrekyoballz', '514-295-7283', 27, 2
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
 'Stephen Hawking', 'Male', '1942-01-8', 'verySmartVille', '514-653-2234', 70, 3
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
'Nina Dobrev', 'Female', '1989-01-09', 'PrettiestQueen', '450-292-7283', 50, 4
);


INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
'Robin Williams', 'Male', '1951-08-21', 'funnyVille', '514-292-7272', 30, 5
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
 'Marilyn Monroe', 'Female', '1992-07-22', 'HeartBreakVille', '450-594-8273', 40, 6
);


INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
 'Kate Upton', 'Female', '1992-09-10', 'daModelVille', '450-295-8479', 30, 7
);


INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
 'Sean Penn', 'Male', '1960-08-17', 'professionalVille', '438-293-8231', 29, 8
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
 'Emma Watson', 'Female', '1990-04-15', 'careDaEarthVille', '438-532-9293', 41, 9
);

INSERT INTO Employees (Name, Gender, DOB, Address, PhoneNumber, Salary, DeptNumber)
	VALUES( 
 'Clint Eastwood', 'Male', '1930-05-31', 'farEastVille', '514-283-2543', 29, 10
);


--Creating Dependants table
DROP TABLE IF EXISTS `Dependants`;
CREATE TABLE Dependants(
    SID INT AUTO_INCREMENT PRIMARY KEY,
    Name CHAR(20) NOT NULL,
    Gender CHAR(6) NOT NULL,
    DOB DATE NOT NULL,
    EmployeeSIN INT NOT NULL,
    FOREIGN KEY (EmployeeSIN) REFERENCES Employees(SIN) ON DELETE CASCADE
 );

--Inserting into Dependants table
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values('Janet Jacson', 'Female', '1958-08-29', 1
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values('La Toya Jackson', 'Female', '1958-08-29', 1
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values('Jermaine Jackson', 'Male', '1958-08-29', 1
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values('Randy Jackson', 'Male', '1958-08-29', 1
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values('Tito Jackson', 'Male', '1958-08-29', 1
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values('Nicole Kidman', 'Female', '1978-10-25', 11
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values('Katie Holmes', 'Female', '1948-03-19', 11
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values('Mimi Rogers', 'Female', '1968-06-12', 11
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values('William Mapother', 'Male', '1953-09-24', 11
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values( 'Tony Jacn', 'Female', '1958-08-29', 2
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values( 'Aladdin', 'Male', '1968-12-04', 15
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values( 'Katie Downtown', 'Female', '1945-07-22', 17
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values( 'Penn Seanson', 'Male', '1988-04-03', 18
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values( 'Beast', 'Male', '1958-04-03', 19
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values( 'Ron Weasley', 'Male', '1991-03-23', 19
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values( 'Tim Westworld', 'Male', '1968-01-01', 20
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values( 'Someone Related', 'Female', '1923-12-21', 9
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values( 'Another One', 'Male', '1976-07-13', 6
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values( 'Monique Richard', 'Female', '1996-06-16', 12
);
INSERT INTO Dependants(Name, Gender, DOB, EmployeeSIN)
	Values( 'Georgia George', 'Female', '1998-11-15', 14
);


--Creating Locations table
DROP TABLE IF EXISTS `Locations`;
CREATE TABLE Locations(
    ID INT NOT NULL AUTO_INCREMENT,
    Name CHAR(20) NOT NULL,
    DeptNum INT NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (DeptNum) REFERENCES Departments(ID) ON DELETE CASCADE
);

--Inserting into Locations table
INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'Disney Land', 1
);

INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'WonderLand', 2
);

INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'LaRonde', 3
);

INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'Walt Disney', 4
);

INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'Disney Land', 5
);

INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'Universal Studio', 6
);

INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'Sea world', 7
);

INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'Magic Kingdom', 8
);

INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'Universal Orlando', 9
);

INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'Hershey Park', 10
);
INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'Magin Kingdom', 10
);
INSERT INTO Locations(Name, DeptNum)
	VALUES(
	'Madagascar', 8
);

--Creating Supervises table
DROP TABLE IF EXISTS `Supervises`;
CREATE TABLE Supervises(
    SubordinateSIN int NOT NULL,
    ManagerSIN int NOT NULL,
    PRIMARY KEY (SubordinateSIN),
    FOREIGN KEY (SubordinateSIN) REFERENCES Employees(SIN) ON DELETE CASCADE,
    FOREIGN KEY (ManagerSIN) REFERENCES Employees(SIN) ON DELETE CASCADE
);

--Inserting into Supervises table
INSERT INTO Supervises
	VALUES(
	2, 1
);
INSERT INTO Supervises
	VALUES(
	3, 1
);
INSERT INTO Supervises
	VALUES(
	4, 1
);
INSERT INTO Supervises
	VALUES(
	6, 5
);
INSERT INTO Supervises
	VALUES(
	7, 5
);
INSERT INTO Supervises
	VALUES(
	9, 8
);
INSERT INTO Supervises
	VALUES(
	11, 10
);
INSERT INTO Supervises
	VALUES(
	12, 10
);
INSERT INTO Supervises
	VALUES(
	13, 10
);
INSERT INTO Supervises
	VALUES(
	15, 14
);
INSERT INTO Supervises
	VALUES(
	17, 16
);
INSERT INTO Supervises
	VALUES(
	18, 16
);

INSERT INTO Supervises
	VALUES(
	19, 16
);
INSERT INTO Supervises
	VALUES(
	20, 16
);


--Creating Projects table
DROP TABLE IF EXISTS `Projects`;
CREATE TABLE Projects(
    ID int PRIMARY KEY AUTO_INCREMENT,
    LocationID INT NOT NULL,
    Name CHAR(20) NOT NULL,
    Stage CHAR(20) NOT NULL,
    DeptID int NOT NULL,
    ManagerID int NOT NULL,
    FOREIGN KEY (DeptID) REFERENCES Departments(ID) ON DELETE CASCADE,
    FOREIGN KEY (ManagerID) REFERENCES Employees(SIN) ON DELETE CASCADE,
    FOREIGN KEY (LocationID) REFERENCES Locations(ID) ON DELETE CASCADE
);

--Inserting into Projects table
INSERT INTO Projects(LocationID, Name, Stage, DeptID, ManagerID)
	VALUES(1, 'Cascade', 'preliminary' , 1, 1

);

INSERT INTO Projects(LocationID, Name, Stage, DeptID, ManagerID)
	VALUES(2, 'Colossus', 'intermediate' , 2, 2

);

INSERT INTO Projects(LocationID, Name, Stage, DeptID, ManagerID)
	VALUES(3, 'Nitro', 'advanced', 3, 3

);


INSERT INTO Projects(LocationID, Name, Stage, DeptID, ManagerID)
	VALUES(4, 'Project X', 'complete', 4, 4

);

INSERT INTO Projects(LocationID, Name, Stage, DeptID, ManagerID)
	VALUES(5, 'Yoda Y', 'complete', 5, 5

);

INSERT INTO Projects(LocationID, Name, Stage, DeptID, ManagerID)
	VALUES(6, 'Nitro', 'advanced', 6, 6

);

INSERT INTO Projects(LocationID, Name, Stage, DeptID, ManagerID)
	VALUES(7, 'romeo', 'intermediate' , 7, 7

);

INSERT INTO Projects(LocationID, Name, Stage, DeptID, ManagerID)
	VALUES(8, 'Mr.Coffee', 'preliminary' , 8, 8

);

INSERT INTO Projects(LocationID, Name, Stage, DeptID, ManagerID)
	VALUES(9, 'MangoOnDiet', 'advanced', 9, 9

);

INSERT INTO Projects(LocationID, Name, Stage, DeptID, ManagerID)
	VALUES(10, 'redLights', 'intermediate' , 10, 10

);

--Create table for what each employee works on
DROP TABLE IF EXISTS 'WorksOn';

CREATE TABLE WorksOn(
    WorkerSIN int NOT NULL,
    ProjectID int NOT NULL,
    HoursWorked int NOT NULL,
    PRIMARY KEY CLUSTERED (WorkerSIN, ProjectID),
    FOREIGN KEY (WorkerSIN) REFERENCES Employees(SIN) ON DELETE CASCADE,
    FOREIGN KEY (ProjectID) REFERENCES Projects(ID) ON DELETE CASCADE
 );


--Inserting into WorksON table
INSERT INTO WorksOn
	VALUES(1, 1, 56
	
);

INSERT INTO WorksOn
	VALUES(2, 1, 24
	
);

INSERT INTO WorksOn
	VALUES(3, 1, 16
	
);


INSERT INTO WorksOn
	VALUES(4, 2, 10
	
);

INSERT INTO WorksOn
	VALUES(5, 2, 29
	
);

INSERT INTO WorksOn
	VALUES(6, 3, 22
	
);

INSERT INTO WorksOn
	VALUES(7, 3, 43
	
);

INSERT INTO WorksOn
	VALUES(8, 4, 26
	
);

INSERT INTO WorksOn
	VALUES(9, 4, 32
	
);


--Creating Manages table
DROP TABLE IF EXISTS `Manages`;
 CREATE TABLE Manages(
    DeptNum int NOT NULL,
    ManagerSIN int NOT NULL,
    UNIQUE(ManagerSIN),
    StartDate date NOT NULL,
    PRIMARY KEY(DeptNum),
    FOREIGN KEY (ManagerSIN) REFERENCES Employees(SIN) ON DELETE CASCADE,
    FOREIGN KEY (DeptNum) REFERENCES Departments(ID) ON DELETE CASCADE
  );


--Inserting into Manages table
INSERT INTO Manages
	VALUES( 1, 1 , '2016-03-12'

);
INSERT INTO Manages
	VALUES( 2, 2 , '2018-01-10'

);
INSERT INTO Manages
	VALUES( 3, 3 , '2012-05-21'

);
INSERT INTO Manages
	VALUES( 4, 4 , '2017-02-26'

);
INSERT INTO Manages
	VALUES( 5, 5 , '2014-12-24'

);
INSERT INTO Manages
	VALUES( 6, 6 , '2018-03-10'

);
INSERT INTO Manages
	VALUES( 7, 7 , '2018-04-11'

);
INSERT INTO Manages
	VALUES( 8, 8 , '2013-03-10'

);
INSERT INTO Manages
	VALUES( 9, 9 , '2015-08-07'

);
INSERT INTO Manages
	VALUES( 10, 10 , '2015-09-29'

);
