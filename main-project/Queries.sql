--RECOMMENDED QUERIES

--Find all employee with highest to lowest salary

SELECT name, salary
FROM Employees
ORDER BY salary DESC;


--Find all employee working on more than 1 project or zero project

SELECT name
FROM Employees
WHERE SIN NOT IN(SELECT WorkerSIN FROM WorksOn) OR SIN = (SELECT WorkerSIN FROM WorksOn GROUP BY WorkerSIN HAVING COUNT(*) > 1);


--3) Find employee being supervised by supervisor

SELECT Employees.name
FROM Employees, Supervises
WHERE SubordinateSIN = Employees.SIN;

--Inserting/updating/tuples to relations/tables in your database. Examples of such tables include Projects, Employees, Departments, etc. The system should also allow operations of insert/update/delete of tuples and/or attributes. For example, we should be able to update attribute “Hours worked”, which is used to calculate the stipend of employees based on the hours she/he worked on different projects, considering the “hourly” charge for each employee (it is not necessary the same for all employees). 
--This is implemented in the PHP

--2. Who works under which employee,

SELECT name, managerSIN
FROM Employees, Supervises
WHERE SubordinateSIN = SIN;

--How much each employee gets, 

SELECT name, salary
FROM Employees;

--In what stage a project is (considering for instance 4 levels: preliminary, intermediate, advanced, and complete)

SELECT name, stage
FROM Projects
WHERE stage = 'preliminary'; 

--*stage is to be changed depending on level wanted*


SELECT name, stage
FROM Projects;

--Who works on which project; 

SELECT Employees.name as Employee, Projects.name as project
FROM Employees, Projects, WorksOn
WHERE WorksOn.WorkerSIN = Employees.SIN AND Projects.ID = WorksOn.projectID;

--List the project managed by each department? 

SELECT Projects.name as project, Departments.name as department
FROM Projects, Departments
WHERE Projects.DeptID = Departments.ID;

--3. Each employee is involved in most and least number projects? 

--least number of projects
SELECT name, 0 AS NoOfProjects
FROM Employees
WHERE SIN NOT IN(SELECT WorkerSIN FROM WorksOn);

--4. What is the total pay for each project?

SELECT Projects.name,SUM(salary)
FROM Employees, WorksOn, Projects
WHERE Projects.ID = WorksOn.ProjectID
GROUP BY ProjectID;

--For each department? 

SELECT Departments.name, SUM(salary)
FROM Employees, Departments
WHERE DeptNumber = Departments.ID
GROUP BY DeptNumber;

--For the company in a certain period? 

--5. Which department manager is also the manager of some projects?

SELECT DISTINCT Employees.name
FROM Employees, Projects, Manages
WHERE Projects.ManagerID = Manages.ManagerSIN AND ManagerSIN = Employees.SIN;

