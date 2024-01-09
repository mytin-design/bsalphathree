
# Obj 1
# Create Btn  - 
Onclick - opens the create account page in a new tab

# Obj 2
create an exam database

--- To include
- Select options  - used to search

- Main question is - What happens when a certain search criteria is passed

# What happens
- Example (exIndex) - If 
----Criteria 
1. Grade 1
2. X
3. 2023
4. II
5. Midterm

--- Then, we must have this data, in order to display it

-- Option one
- Have a table with titles of each of the criteria
-so that if a search parameter meets the title in a table, the title is highlighted, and if clicked, gives the user more options

--Option two - Best Version
Display the results of the class requested 

--The How 
-Create the display container - virtual
-- Have all the files in the root directory or a folder in the root directory

--Use ids to target files
-That is, if (exIndex), Show fileX, else if (another grade, year, etc), Show fileY, else, and so on



and how do I search


# Modify site for Consolata Primary School 

# Bein data  - 10th July 2023

# Stage 1
Rename current index file to directories.php  

# Create an index file


# bug xx

The carousel was being affected by a .fade class connected to an animation.
Problem was - The fade was too fast and only connected to one of the carousel divs
Therefore, the first 2 carousel divs functioned as set, however, the last moved faster     


# Hide previous and next buttons until pcard is hovered onto

- Let prev and next buttons remain hidden in the main header carousel

# make the pcard a flex container - image, left, text, right 

- In flexpcard
    Have a heading, some text and call to action button or sth

 # modify the create account log in and sign in section   


# after logging in

A system 
Each user with their own account
I suggest using wordpress for now - try
If user creates an account, create a similar but personalized account
Admins should have priviledges 




# Sign up and Login
To login
-Use the username and passowrd set during sign in - 
This means it should be stored somewhere we can access it

-If no username or passowrd set, use default, admin and password to login

//Now how do we store username and password so as to retrieve it later for use in login?



 
 # 7-10-2023
 # Two tabs for the login/sign up page 

 -One tab, student, other staff

 -completed for login

 # Redesign sign in page to reflect that of the login page.


# 11/10/2023
reg-form bug 001
Tabs script does not hide one of the tabcontents 

Solved - add "display: none;" to tabcontents,
 and open a tab by default;

 
12/10
<!--Disable right click context menu for images security-->

How can we uplodad results for parents?


12/10/2023
Profiles updated 

13/10/2023
upload Joining the staff form



# create this
//JobApplication PHP 


# registration box media query for 400px and below corrected

25/10/2023 - Updates
# When a profile is clicked,  it should appear as a dialog box showing extra information.

# Before moving, have a goal
# Without a goal you wander aimlesslessly

# GOAL - Repair the carousel in the mentorship page
Bug: 
It a script in the main js file "script.js" interferes with the running of this script;

Solution
-Move the script to another separate file - "mentorship.js"
-Adjust the script in accordance to W3Schools recommendations


:Status - Completed
- Works locally
-Not functional on the server.



# reduce font-size for input elements in the job application form for smaller devices <400

# Afternoon Updates
The Job Application form

- Padding-left of .5pc added for inputs and option values and placeholders
- Font-size change - media query for varying devices
- 
# Updates 26 oct 2023
- Border radius for most elements in landing and about us page

- changes in design for login page esp the create acc button and also border radius effects

- Google sign in API installation
--- Credentials created at console.cloud.google.com/api/credentials

- Client ID set up for portal-login.php
----googleSignIn.js created and attached to portal-login.php


--  Portal login for staff is not Javascript enabled
Idea
--Use the same script used for learners, but change the classes and id's


// Completed

Now the students and the staff can log in using separate channels

# 4TH NOVEMBER 2023
# SEARCH ALGORITHM FOR CPS WEBSITE

//The function of the search engine is to provide relevant search results
based on the user's search criteria;

For this to function as intended, the engine must have access to multiple resource materials, 
and multiple probable search keywords
//The general format of the algorith is:

if(probable keyword matches available predefined relevant results) {
    return relevant result;
}

//Notice ; we need relevant keyword matches
for example: Say fee structure

A user may search for 'Fee Structure' using the following keywords:
fee, f, fii, school fees, school money, structure, pesa, money, amount, school amount, total, pay

The above are all possible search keywords

The next step is to define what should be returned;

Obviously, the first result is the fee structure;

However, we could also provide relevant results such as:
how to pay, where to pay, school account numbers, who to pay, boarding services, precautions, etc

Basically that is how it will work

Indexing means that we need to list all possible search items AVAILABLE in the website;keyword - available
However we may provide an option to search on the web;
using this :
window.open('https://www/google.com/search?client=firefox-b-d&q=searchVal', '_blank');


# 12 NOVEMBER 2023

Create a registration module for online application 


# NEW FEATURE - 12 NOV 2023 - DIALOG OR MODAL BOX FOR BROKEN LINKS AND BUTTONS
When a user clicks a broken link or button, aquick dialog box will appear
Not working for now


# OBJECTIVE 13 NOV 2023
I think its best we handle all issues - add functionality to the landing page before we proceed to other pages

1. Search Functionality
Objective

when a word is searched, it should list all the available important links on a new search page

Task No.1: Design a search page - Use AccountsPlaceKenya for mockup


13/nov/2023
//Christmass / Holiday changes - a few images added


- Working on feedback.php for sending messages to email


### START IF
## START OPTIMIZATION FOR VERSION 1.1.A
# DATE 7/12/2023

# Changes on the CPS WEBSITE, as from today, 7th DEC 2023, will be done from this endpoint.

# Initial change - Search functionality
- The search functionality is inherited from C:\Users\denis\desktop\code\buildingprojects\cpssearch dir
NB: Functionality functions as intended in the original dir

NB: Search function integrated successfuly and working as intended!



# Second change - When a staff clicks their 'space', a dialog box appears with additional information.



# Indicate the contents of each js file attached on every file, esp the landing page


# Enter marks page
Page added - 

# 18-DEC -2023 // CHANGES
-Profile images in cpsmarksystem page html changed

## ################################## MAJOR UPDATE  ################

# UPLOAD SECTION
- When upload button is clicked, the main app is hidden, and a section with mutliple upload options is displayed;

----Functions as expected;

## REGISTRATION CONNECTED TO DATABASE
username is the unique determiner - primary key

- Can be modified to email

## LOGIN FUNCTIONALITY WORKING
---User data is retrieved from db to recognize user!
Great Achievement!!!!! - 18-12-2023!!!

--User can reset password, but must remember email used during registration 

The email may be used to receive the reset token link, but since I faced a problem with the mail servers, I am displaying the it on the page - not secure.

# DASHBOARD  - 

Dashboard template - may be tuned to meet specific user needs

--Logout capability intalled 

## Note
Find a way to dynamically change the profile of user too.

## #####  ============END OF TODAY'S SESSION --------

## 19 - 12 -2023
 
Files added:
reset_password.php
savestudentsettings.php
settings.php
studentrecords.php
studentsresgister.php
reset.php
loggerout.php
update_password.php
delet_row.php



Files changed
cpsmarkssystem.php
cpsdashboard.html

AS AT 14:23 - 19-12-2023, 

A user can:
Register - data is stored in a database

Login: Data is retrieved from a database

Reset password
Change password.

Change preferences in dashboard.

In CPSMARKSSYSTEM

Register student - STORES DATA IN A DB

Show records stored in the db

## ---AS AT THIS MOMENT - EVERY FILE WORKS AS INTENDED - AND THERE ARE NO ERRORS WHATSOEVER

## CHNAGES ON PRACTICEFIVECPS DIR

After deleting a record, the page redirects to studentsrecords.php page 

Rectified;

LOGOUT BTN on cpsmarksystem.php functionality added 
-It links to the logger.php to log out session - however, there is no login directed to this page- 

Again: It should be set that students, when the login, they will not access some information, accessed by teachers;

Basicaly, teachers and students should have different dashboards.

A learner's dashboard may consist of simple functions such as 
checking and uploading assignments;
checking and downloading exams/notes.past papers, etc

Teacher, 
Register student - esp the senior teacher
Or Basicaly each teacher should have specify the class they are the class teacher, and they will have functionality for that class;
Such as Uploding marks, exams, marking students in, and much more;

Check finances
Check uploaded assignments, and homeworks
check student details-information - including phone numbers
and much more

## Uploading image is not working


Rectified

uploads directory added/ -NOTE

Error was in form definition;
##  ############ VERY IMPORTANT @2222222222222222222222

## HANDLING UPLOADS

Apparently the attribute :
enctype="mutlipart/form-data" must be embedded in the form opening tags for any upload to take place!

# Update the records table to reflect changes in profile uploads

#### ############################## IMPORTANT  CHANGE @@@@@@@@@@@

One id must be used for the entire database, as the primary key if I want an easy time;

This means, the teachers and students will have different tables

However, for now, the username is set as the primary key;
It can remain the same, however, the user as they enter data, they should be requested for regno or staffid, whatever is suitable for each;

## STUDENT'S REGNO column name CHANGED to username;

This means we will receive the regno, but the database will store it in the username column, and will be referenced as such;

-- Plcaholders in forms changed;


## studentsrecords.php 
was heavily relying on the registration number
All the regno names have been changed to username


## NOTE BETTER ========================================
NB: regno or staffid are being inputted, but it is being used as the user's username

## ISSUE 

Currently, there is a users table, and students table;

I do not think this is right;

The intended users of the system - are 
1. Teachers
2. Students
3. Subordinate staff

During registration - we get the main info, that is
firstname, lastname, regno or staffid, and password

But in the system, there is a way to register a student afresh.

=====================================================
## REMOVE REGISTRATION FUNCTION 


Ama - what if we eliminate the need to register

So that the student or teachers are put into the system by an admin - IT admin

I think this is better, because the school is a controlled setting;

If it were a website being used by so many users, then the idea above would not be feasible;

## $$$$$$$$$$$$$$$$$$$

So, we need to include an area to register teachers;

So teachers, or students, or subordinate staff, when they get hired, their info taken in hardcopies will be used to create an account for them - so that they get a school email, and a password they can change later if they so wish;



### %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

Therefore, the cpsmarkssystem.php will serve very important functions and will be accessed only byt the administrators and IT department.


## ==========================================================================





## SYSTEM NAME AS OF 21-12-2023
basealpha



## LATEST VERSION OF consolata website Upload on 21-12-2-23 0337am -cps ictlab

https://consolataschoolnyeri.org/templates/bsalphaone/

Connection to webhost database successfull;

Settings for db configuration located in './wp-config.php' file in server root dir

https://www.inmotionhosting.com/support/edu/cpanel/reset-database-password/


# 22nd DEC 2023 - HOMe - IN MY CRIB


## CHANGES AS FROM 28TH DEC 2023
Registration function removed

If a student clicks register, should be notified to visit the admin or IT

Students will be registered by senior teacher or IT department, or anyone with access to the registration panel

During registration, the above personell will create an account with a default registration number and a password; 

The student may change the password later


## Details taken from new student
id - auto
registration number - username in db
stream or class
entrymarks
healthstatus
profileimg
gender
dateofbirth
feebalance
parentphone
language
status
nationality
password
confirmpass

16 rows

## BUG XXCCCSS

Adjust the resgister container to autofit new additions

Student data can now be entered successfully into the database!

Changes made in cpsmarkssystem.php and studentsregister.php to reflect the same;


-- Login should check students table and not users

In fact, delete users table


## The login - should check the username, and check if the username is that of a student or a teacher, and redirect accordingly;

//So we have to define, how do I know that this is a username of a student?

We have two login in platforms, that of students and that of teachers, and each is processed differently

This means students have their own table and teachers or staff their own table

That of students have already been defined, 

Now what data do we need from the staff:


CREATE TABLE `teachers` (
  `staffid` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dateofbirth` datetime DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `basicpay` decimal(19,4) DEFAULT 0.0000,
  `department` varchar(255) DEFAULT NULL,
  `subjects` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `nextofkin` varchar(255) DEFAULT NULL,
  `remedialallocation` varchar(255) DEFAULT NULL,
  `maritalstatus` varchar(255) DEFAULT NULL,
  `yearofemployment` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `nhifno` varchar(255) DEFAULT NULL,
  `nssfno` varchar(255) DEFAULT NULL,
  `tscno` varchar(255) DEFAULT NULL,
  `bankname` varchar(255) DEFAULT NULL,
  `bankaccno` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `confpassword` varchar(255) DEFAULT NULL

);


There should be a html table to help IT and secretary to add staff

## STAFF REGISTRATION PANEL COMPLETE
02-JAN-2024
The panel can NOW be used by IT and secretary to add new teachers 
Data is successfully uploaded to database;

staffid and password may be used to login staff to their predefined dashboard;

Update functionality is currently absent;

## ADD A BUTTON FOR TEACHERS RECORDS OR ALTERNATIVELY CREATE TABS FOR EACH - The latter is recommended;


## STUDENT DASHBOARD V1 COMPLETE

## TEACHER'S DASHBOARD IN PROGRESS

staffrecords.php created to handle staff records

delete_staff.php added to handle editing functions

delete_student.php edited -regno changed to username

# NOTES TABLE 

NOTES TABLE TO contain the following fields
1. notesid
2. filename
3. dateuploaded
4. deadline
5. teacher
6. instructions


# ASSIGNMENTS TABLE

Assignments TABLE TO contain the following fields
1. assignmentid
2. filename
3. dateuploaded
4. deadline
5. teacher
6. instructions


# PAST PAPERS 
Past papers TABLE TO contain the following fields
1. pastpaperid
2. filename
3. dateuploaded
4. grade
5. year
6. teacher
7. instructions


## FORCE REFRESH - CTRL +F5
Changes in css and Javascript may not reflect immediately as the browser uses the cached styles and scripts - However, to view immediate changes, press Ctrl + F5 to force refresh and see the updated version.



## 3rd jan 2023 -10:44pm

stafflogin.php and studentlogin.php created



The number of variables must match the number of parameters in the prepared statement 

The number of elements in the type definition string must match the number of bind variables 


## bug setsssxxx
It seems img displayed is the same for all users - php does not pick the uploaded image


## AS AT 4TH JAN 2024
A teacher may upload and view the following:
Announcements
Exams/past papers
assignment
Notes

NB:Discussion capability not enabled;


## MAJOR UPDATE

4TH JAN 2023

examresults.html page created 
This will be used to search and display results based on student class, exam type, year, etc;

However for this to happen

Data will be obtained from the already registered students;

NOTE, we are assuming all students are already enrolled in the students table, thus, from this table, we create a query, i.e, anytime the search button is clicked, a new query is performed, requesting data for the specified students;

Before that, we need to have marks for students - which means we need a way to input them

When a teacher wants to enter marks, they will click a grade;
Once clicked, a query will be created, requesting for all students in the specified class and stream;

NOTE, the students table has all the data of a student needed, and so, the query will return the student's assessment no., full name, and for each, create a table with all subjects, with inputs fields where the teacher can enter marks for each student;


new file 
entermarks.htm - we start as htm them php

This file will enable teachers to click on a certain grade, and stream, and a table is generated for them with input fields to fill marks for their students;



Not working:

Fatal error: Uncaught mysqli_sql_exception: No data supplied for parameters in prepared statement in C:\xampp\htdocs\bsalphathree\exresults.php:26 Stack trace: #0 C:\xampp\htdocs\bsalphathree\exresults.php(26): mysqli_stmt->execute() #1 {main} thrown in C:\xampp\htdocs\bsalphathree\exresults.php on line 26

Currently the php returns all the records in the database, and creates inputs for all the students in the db;

This can be used, however, if we have a school of a thousand students, it would be very difficult to keep looking for a student of a specific grade and stream;

Thus, the script has to select students whose grade and stream is passed when the button is clicked;

So, the script kinda picks students who matches the criteria passed, and returns their name, and asssess. no.

Thus, create a script that takes the inputs grade and stream, and use them as criteria for which the db is searched for students who fit the same;


Completed;

The teacher can now search their students by their grade and stream and fill their marks;

Next, how do we upload the marks to db when save btn is clicked?

# Solution one
Enclose the table in a form;

Perfect idea!

One prob though, how do we upload the username, assess no. and name 

Using a form causes an error!


## LEAVE EXAMS RESULTS FOR NOW

Issue - 
A teacher can now get students from their grade and stream and fill marks for them;

However, we do not have a way to upload these marks;

Issue 2
The uploaded items include
assess no.
name
stream - not required
all subjects--

Now, we may save these in a 'grades' table

that will have the following fields;
assess no - primary key
name
stream
all subject names


However, to display marks, the following items are required;
grade
stream
year
term eg 1st term
level -eg opener

Now, where should these be? a new table? in in grades table

# solution A
we may provide a way to input the year, term and level for every student

so that when getting results from table, we create a query where the above fields will be used as parameters;

But this is tedious;

I want a teacher to select year, select exam term eg 
and exam level/type eg opener, then use the  grade and stream query to get students from the specific class


# Solution b
Using the grades, straeam, year, term, and level filter function,
use it as an input - i.e
when button is clicked, it should check whether there is an input with all these parameters, if not, save in the grades table
the grades table will therefore have the following fields:
assess no.
name
stream
grade
year
term
type/level
all subjnames

so that, when btn is clicked, the year, term, grade and stream are saved - saying if they do not exist already, save, 

And then, very key - generates a table with assess no, name, with students of grade x and stream y - where x and y rep any;

## 6TH JAN 2024 = 0542hrs
Modifying e-learning section
So that each grade shows specific exams, notes, or assignments for their grade


## Remove action buttons for students/parents

The action buttons deletes and edits the files, -we do not want a student deleting an assignment once they have downloaded theirs do we?


In the exams tab, create two tabs 
one - for showing available past papers
Two - provides a link to view (parents and students) or enter marks (teachers)

# ENTER MARKS LINK
For teachers - Include it in the teacher's dashboard

# Create a link in the students dashboard redirecting to each of these grades 

teachers too

# Exams section tabs status complete

# E-LEARNING CENTER
The original version of the e-learning is for students and parents

# Option
Use this template and append it in teacher's dashboard - modify to increase priviledges - eg modify files

# Option 2
Take fragments of the e-learning and append them to teacher's dashboard-
e.g enter marks

I think option one is best as it provides the teacher with a comprehensive platform to modify whatever is required;


# ENTERING MARKS SYSTEM

Must be in teacher's dashboard;



Before working on exresults - work on a previous bug

## STAFF DASHBOARD
# PROFILE IMG UPDATE ERROR IN DASHBOARDS

It seems the code does not get the img of each user that is logged in, 

Code now works perfectly and as intended; Profile pictures are updated dynamically


# Assignments, exams, etc 
I think these should have the staff id of the one who uploaded either of these

This will help in displaying uploaded work only for the logged in staff

Right now, the code displays all uploaded work, which is great yes, but not relevant

Anyway, provide a way to view all assignments on a different page


GOING BACK TO RESULTS

Currently the system allows for this function:

If user wants to enter marks, they will go to 'entermarks.php'
Here, they will select grade and stream

This will go to the students table - get the students who match the grade and stream passed
return them and create a table for the subjects the student is taking  -should be like this - but creates a table for all subjects;

Now - Say user enters marks, how is this data record in the db

Do we create another table
What fields will it have?

# examresult.php 
It selects students of grade and stream specified

Creates a table for each, containing input fields to enter marks

A save button when clicked sends data to savemarks.php

It saves marks to the passed username

//error

this is not happening

# savemarks.php 
for processing
 
error - invalid request

The network - request section shows that the data is sent, but it seems this file does not process it - that is - put it into db



## 9TH JAN 2024

MOVING TO bsalphafour




