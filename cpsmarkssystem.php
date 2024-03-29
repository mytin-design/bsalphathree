<!doctype html>
<html>
    <head>
        <title>CPS Registration Management System</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="RMS, registration management system, system school, cpc, junior secondary, primary">
        <meta name="description" content="CPS Registration Management System">
        <link rel="icon" href="./images/icon-for-interface.PNG" sizes="10x10">
        <link rel="stylesheet" href="./cpsmarkssystem.css">

        <!--Bootstrap 3, 4, 5-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/boostrap/3.4.1/bootstrap.css.min">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/bootstrap.css.min">
    </head>
    <body>
        <header>
            <nav class="navbar nav nav-panel">
                <div class="head">
                    <a href="./index.html" class="x-logo">
                        <img src="./images/cpslogomain.png" width="50" alt="School Logo" class="schoolLogo">
                    </a>
                
                    

                </div>

                <div class="sec-nav">
                    <div class="sec_nav-panel tab-panel">
                        <a href="#" id="defaultOpen" class="task tab-nav tabLink" onclick="openTab(event, 'home')">Home</a>
                        <a href="#" id="performanceOpener"  class="performance tab-nav tabLink" onclick="openTab(event, 'performance')">Registry</a>
                        <a href="#" id="graphicsOpener" class="graphics tab-nav tabLink" onclick="openTab(event, 'graphics')">Records</a>
                    </div>

                    <div class="nav-actions">
                        <form action="#" method="get" id="searchApp">
                            <input type="search" name="search" id="searchcpsMarks" placeholder="Search students...">
                            <button id="submitcpsMarks">Search</button>
                        </form>

                        <a href="https://www.google.com" target="_blank" class="help na-nav" onclick="openHelp()">Help</a>
                        <a href="https://www.consolataschool.org" target="_top" class="rateApp na-nav">Rate App</a>
                    </div>
                </div>
            </nav>
        </header>

        <main class="container">
            <!--Containers below contain tabs contents. Each tab displays content when the tab buttons in header are clicked-->
            <!--Home tab contents =============================================-->
            <div id="home" class="grid-container tabcontents homeTab">
                <div class="side-bar home-side-bar">
                    <!--Navigation panel for items displayed on central container-->
                    <div class="top-sb-box">
                        <p  class="sb-nav">
                            <?xml version="1.0" encoding="utf-8"?>
                            <svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                              <defs>
                                <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_wel1" />
                              </defs>
                              <use xlink:href="#img_wel1" fill="#FFFFFF" stroke="none" transform="scale(0.5208333 0.5208333)" />
                            </svg>                            
                            <span class="sb-title">Welcome</span>
                        </p>
                    </div>

                    <div class="bottom-sb-box">
                    <form class="bt-sb-link" action="loggerout.php" method="post">
                          <input type="submit" id="logoutinput" class="bt-sb-btn" value="Logout">
                     </form>
                        
                        <a href="#" class="terms bt-sb-title bt-sb-terms">Terms</a>
                        <p class="copyright bt-sb-title bt-sb-cpright">CPS &copy; 2023. All rights reserved.</p>
                    </div>

                </div>
                <!--Items in the central container-->
                <div id="centralcpsBox" class="central home-central-box">
                    <!--Adopted - from school system - interface-->
                    <!--Appears when document onload-->
                    <div id="app">
                        <aside class="or-tbox oraside">
                            <h1 class="ortitle">Online School Register</h1>
                        </aside>
                        <aside class="oractbox oraside">
                            <button class="orbtn" id="orRegister" onclick="openRegistry()">Register Student</button>
                            <button class="orbtn" id="ortRegister">Register Teacher</button>
                            <button class="orbtn" id="orMarks" onclick="openMarksbox()">Grade Student</button>
                            <button class="orbtn" id="orMarks" onclick="enterMarksbox()">Enter Marks</button>
                            <button class="orbtn" id="orMarks" onclick="uploadMarksbox()">Upload Marks</button>
                            <button class="orbtn" id="orRecords" onclick="openStudentRecords()">Student Records</button>
                        </aside>
                    </div>

         <!--START UPLOAD BOX-->

         <div id="uploadRoot" class="body_root" style="display:none;" >
            <div class="header-mark">
                <h1 class="header_marker">CPS UPLOADS</h1>
            </div>
            <div class="main_root">
                <!--Up_rows with at least two subjects inline-->
                <div class="up_row up_row_one">
                    <form method="post" action="gradeone.php" class="upload_box subject_math" enctype="multipart/form-data">
                        <label for="grd1" class="uplabelbtn">Upload Grade 1 File</label>
                        <input type="file" id="grd1" class="upload_input"  name="gradeoneup" onchange="displayFileName('grd1')" required>
                        <button type="submit" class="uploadcpsbtns">Save</button>
                    </form>
                    <form method="post" action="gradethree.php" class="upload_box subject_eng" enctype="multipart/form-data">
                        <label for="grd2" class="uplabelbtn">Upload Grade 2 File</label>
                        <input type="file" id="grd2" class="upload_input"  name="gradetwoup" onchange="displayFileName('grd2')" required>
                        <button type="submit" class="uploadcpsbtns">Save</button>
                    </form>
                </div>
    
                <!--Basically, the up_rows and subject boxes have a similar structure, so copy,paste and change text-->
    
                <div class="up_row up_row_two">
                    <form method="post" action="gradethree.php" class="upload_box subject_kisw">
                        <label for="grd3" class="uplabelbtn">Uplaod Grade 3 File</label>
                        <input type="file" id="grd3" class="upload_input"  name="gradethreeup" onchange="displayFileName('grd3')" required>
                        <button type="submit" class="uploadcpsbtns">Save</button>
                    </form>
                    <form method="post" action="gradefour.php" class="upload_box subject_scie" enctype="multipart/form-data">
                        <label for="grd4" class="uplabelbtn">Upload Grade 4 File</label>
                        <input type="file" id="grd4" class="upload_input"  name="gradefourup" onchange="displayFileName('grd4')" required>
                        <button type="submit" class="uploadcpsbtns">Save</button>
                    </form>
                </div>
    
                <!--Up_row 3-->
                
                <div class="up_row up_row_three">
                    <form method="post" action="gradefive.php" class="upload_box subject_comp" enctype="multipart/form-data">
                        <label for="grd5" class="uplabelbtn">Upload Grade 5 File</label>
                        <input type="file" id="grd5" class="upload_input"  name="gradefiveup" onchange="displayFileName('grd5')" required>
                        <button type="submit" class="uploadcpsbtns">Save</button>
    
                    </form>
                    <form method="post" action="gradesix.php" class="upload_box subject_insha" enctype="multipart/form-data">
                        <label for="grd6" class="uplabelbtn">Upload Grade 6 File</label>
                        <input type="file" id="grd6" class="upload_input"  name="gradesixup" onchange="displayFileName('grd6')" required>
                        <button type="submit" class="uploadcpsbtns">Save</button>
    
                    </form>
                </div>
    
                <!--Up_row 4-->
                
                <div class="up_row up_row_three">
                    <form method="post" action="gradeseven.php" class="upload_box subject_comp" enctype="multipart/form-data">
                        <label for="grd7" class="uplabelbtn">Upload Grade 7 File</label>
                        <input type="file" id="grd7" class="upload_input"  name="gradesevenup" onchange="displayFileName('grd7')" required>
                        <button type="submit" class="uploadcpsbtns">Save</button>
    
                    </form>
                    <form method="post" action="gradeeight.php" class="upload_box subject_insha" enctype="multipart/form-data">
                        <label for="grd8" class="uplabelbtn">Upload Grade 8 File</label>
                        <input type="file" id="grd8" class="upload_input"  name="gradeeightup" onchange="displayFileName('grd8')" required>
                        <button type="submit" class="uploadcpsbtns">Save</button>
    
                    </form>
                </div>
    
                <!--Up_row 5-->
                
                <div class="up_row up_row_three">
                    <form method="post" action="gradenine.php" class="upload_box subject_comp" enctype="multipart/form-data">
                        <label for="grd9" class="uplabelbtn">Upload Grade 9 File</label>
                        <input type="file" id="grd9" class="upload_input"  name="gradenineup" onchange="displayFileName('grd9')" required>
                        <button type="submit" class="uploadcpsbtns">Save</button>
    
                    </form>
                    <form method="post" action="gradeten.php" class="upload_box subject_insha" enctype="multipart/form-data">
                        <label for="grd10" class="uplabelbtn">Upload Grade 10 File</label>
                        <input type="file" id="grd10" class="upload_input"  name="gradetenup" onchange="displayFileName('grd10')" required>
                        <button type="submit" class="uploadcpsbtns">Save</button>
    
                    </form>
                </div>
            </div>
           <div class="notifs_up">
            <p class="notif" id="upNotif1"></p>
            <p class="notif" id="upNotif2"></p>
            <p class="notif" id="upNotif3"></p>
            <p class="notif" id="upNotif4"></p>
            <p class="notif" id="upNotif5"></p>
            <p class="notif" id="upNotif6"></p>
            <p class="notif" id="upNotif7"></p>
            <p class="notif" id="upNotif8"></p>
            <p class="notif" id="upNotif9"></p>
            <p class="notif" id="upNotif10"></p>
           </div>
            <hr color="lightgray">
            <div class="stdActbtns">
                <div class="stdActbtnsIn">
                    <button id="delStudent" class="stdinfobtn" onclick="clearAllFiles()" >Clear Files</button>
                    <button id="saveStudent" class="stdinfobtn" >SaveAll</button>
                    <button id="closeRegbox" class="stdinfobtn" onclick="closeupLoad()">Close</button>
    
                </div>                
            </div>
           
        </div>
    <!--END UPLOAD BOX-->

                </div>
            </div>

            <!--Performance tab contents-->
            <!--Replaced by registration interface from school system========================-->
            <div id="performance" class="grid-container tabcontents performanceTab">
                <div class="side-bar p-side-bar">
                    <!--Navigation panel for items displayed on central container-->
                    <div class="top-sb-box">
                        <p  class="sb-nav">
                            <?xml version="1.0" encoding="utf-8"?>
                            <svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                              <defs>
                                <image width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABHNCSVQICAgIfAhkiAAAA+RJREFUeJztl01PE0EYx/+zqS+JUaqoRCu1aOxRS+LFxASNBz169eJn0IvxW+hH8OYVv4EXhRgTX6IiCdFWFIKIFt9Sdrs7Hlra7s60O1DoY/T/S0jLPM/OPjO/nZktQAghhBBCCCGEEEIIIYSQfx3llHV7poBo7Q6gSoAuKK2bAQ3o9U/d7LD9PRlXybaO78rS1kjXiXi7bf27srSt379Va6ymzlrjbbGaYvF4fSpZS7u+sqfxPLPTu1m9d62cNrXpAm7PFKCDZ9A62yiqYzCWQccEJAZtCIhNVHyAXSfCMuiuArROTFT8vsrSFpvgDcXb9SsNKKWrmR2Z8TQJXq9go+/gLqCzloDRoixttjzRNqNZW/61XdujW0tca2Trfng3JdtBADCxmQK2Pq4tcW0uYb39Il0fNK2jM5bEGJm0BACxp3/3Tg8Xz+UwNroPXkbh1ewKHj9dgL8Wxi7avcvDhXN5jB3Pwst4eD2zjKknH6x5E+dPYKxwoJH3ZgnTU+/g+x15m5SmUuL99m+LJx6IQsqVTisgtiyvTORRPJmF9hRqQYR8fgjjp0eMaq5cPIHiqWFoz0MtiDBa2I/SeM7Iu3ypiGLxUDtvbBils3n76LawTTnmbbotTVoTlxXQQgE4ltuLmh/BDyME9cbnwcN7jNxcbsjIGx7Za9SdG91v5B0YGWrFu74lbONWp4y4Jdl5q+uNg4B4p7UgbE2UX9cIwghrQWjsi93ynPqrR10Gk9KmU/KcDuAe9Bu34LYFddxgrlxFLYiafyH8eoSlpV9GAXPvvxp5nxd/GF3Ovfti5C0vVM0bJ/q3HsADeJPq703PZGMCoPH4ySLK86v4+TtAGGl8+vgdb98sG3lTU/Mof/iGn799hJHGwnwVs68WjbzpR2VUKiutvMXKCmZffnIfx997ADuRfs2tF621a/3h8j/+Au5SszJ/FePX/es959h5BcR6GdBTtXUHsG2vt28bTgdwH1tOkg1uQfYbDeQXcOKtQyXzeh7A3ZsHFu+Cu4C+CnB9AxmAyL/oAG70mcLVBesLL3Fk8qjamjOAbA8UIAwFCEMBwlCAMBQgDAUIQwHCUIAwFCAMBQhDAcJQgDAUIAwFCEMBwlCAMBQgDAUIQwHCUIAwFCAMBQhDAcJQgDAUIAwFCEMBwlCAMBQgDAUIQwHCUIAwFCAMBQhDAcJQgDAUIAwFCEMBwlCAMBQgDAUIQwHCUIAwLgJWt72Kf5dKWoKLgIf91/Hf8jwtIV2Awg1wFWyG1ebc9SRVwOQRVYZCCcADOCwpggqAB1AoTR5RZeliCCGEEEIIIYQQQgghhBAizx8uJY6yt9P84wAAAABJRU5ErkJggg==" id="img_rg1" />
                              </defs>
                              <use xlink:href="#img_rg1" fill="#FFFFFF" stroke="none" transform="scale(0.5208333 0.5208333)" />
                            </svg>
                            
                            <span class="sb-title regtitle">Register</span>
                        </p>
                    </div>

                    

                </div>
                <!--registration box-->
                <div class="central perfCentral p-central-box">
                        <!--Registry box 
        -- function:
    1. to enter student info
    2. to show student info-->

    <div id="studentRegbox" class="stdmainbx hbox">
        <p class="studentRegTitle stdmaintitle">Register Student</p>
        <hr>
        <form method="post" action="studentsregister.php" class="studentRegIn stdmainin" enctype="multipart/form-data">
            <p class="studentInTitle stdmainintitle">New Student</p>
            <div class="studentDetails stdgdatabx">
                <aside class="stda stdaside">
                    <div class="studentNamebx sflex">
                        <p class="studentNamenm">Name:</p>
                        <input type="text" id="studentNameinput" name="studentname" class="sflexinp" placeholder="Student Name">
                    </div>
                    <div class="studentRegbx sflex">
                        <p class="studentRegNo">Assessment No:</p>
                        <input type="text" id="studentRegNo" name="regno" class="sflexinp" placeholder="Assessment Number">
                    </div>
                    <div class="studentStreambx sflex">
                        <p class="studentStreamnm">Stream:</p>
                        <!-- <input type="text" id="studentStream" name="stream" class="sflexinp" placeholder="Stream"> -->
                        <select name="stream" class="exfilter sflexinp" id="streamftr">
                            <option class="optionVal" value="default" id="fstreamdef">--Select Stream--</option>
                            <option class="optionVal" value="x" id="fstreamx">X</option>
                            <option class="optionVal" value="y" id="fstreamy">Y</option>
                            <option class="optionVal" value="z" id="fstreamz">Z</option>
                      </select>
                    </div>
                    <div class="entryMarksbx sflex">
                        <p class="entryMarks">Grade:</p>
                        <!-- <input type="text" id="entryMarks" name="entrymarks" class="sflexinp" placeholder="Entry Marks"> -->
                        <select name="stdgrade" class="exfilter sflexinp" id="gradeftr">
                            <option class="optionVal" value="null" id="fgradedef">--Select Grade/Class--</option>
                            <option class="optionVal" value="gradeone" id="fgrade1">Grade 1</option>
                            <option class="optionVal" value="gradetwo" id="fgrade2">Grade 2</option>
                            <option class="optionVal" value="gradethree" id="fgrade3">Grade 3</option>
                            <option class="optionVal" value="gradefour" id="fgrade4">Grade 4</option>
                            <option class="optionVal" value="gradefive" id="fgrade5">Grade 5</option>
                            <option class="optionVal" value="gradesix" id="fgrade6">Grade 6</option>
                            <option class="optionVal" value="gradeseven" id="fgrade7">Grade 7</option>
                            <option class="optionVal" value="gradeeight" id="fgrade8">Grade 8</option>
                            <option class="optionVal" value="gradenine" id="fgrade9">Grade 9</option>
                            <option class="optionVal" value="gradeten" id="fgrade10">Grade 10</option>
                            <option class="optionVal" value="gradeeleven" id="fgrade11">Grade 11</option>
                            <option class="optionVal" value="gradetwelve" id="fgrade12">Grade 12</option>

                        </select>
                    </div>
                    <div class="healthstatusbx sflex">
                        <p class="healthStatus">Health Status:</p>
                        <!-- <input type="text" id="healthStatus" name="healthstatus" class="sflexinp" placeholder="Healthy/Sick"> -->
                        <select name="healthstatus" class="exfilter sflexinp" id="statusftr">
                            <option class="optionVal" value="default" id="fhstatusdef">--Select Health Status--</option>
                            <option class="optionVal" value="good" id="fhstatusx">Good</option>
                            <option class="optionVal" value="bad" id="fhstatusy">Bad</option>
                            <option class="optionVal" value="worse" id="fhstatusz">Worse</option>
                      </select>
                    </div>
                    <div class="studentProfile">
                        <label for="changeProfile">Upload Photo</label>
                        <input type="file" name="profileimg" id="changeProfile">
                        <!-- <img src="./images/students1.jpg" class="stdImg" width="50" alt="Student Profile">
                        <button id="changeProfile" onclick="changeProfile()">Change Profile</button> -->
                    </div>
                    <div class="studentGenderbx sflex">
                        <p class="studentGender">Gender:</p>
                        <!-- <input type="text" id="studentGender" name="gender" class="sflexinp" placeholder="Male/Female/Other"> -->
                        <select name="gender" class="exfilter sflexinp" id="genderftr">
                            <option class="optionVal" value="default" id="fstreamdef">--Select Gender--</option>
                            <option class="optionVal" value="male" id="fstreamx">Male</option>
                            <option class="optionVal" value="female" id="fstreamy">Female</option>
                            <option class="optionVal" value="LGBTQ" id="fstreamz">LGBTQ</option>
                      </select>
                    </div>
                    <div class="studentAgebx sflex">
                        <p class="studentAge">Birth Date</p>
                        <input type="date" name="date" class="sflexinp" id="studentAge">
                    </div>
                </aside>
                <aside class="stdb stdaside">
                    
                    
                    
                    <div class="studentfeebalbx sflex">
                        <p class="studentfeeBal">Fee Balance:</p>
                        <input type="text" id="studentfeeBalr" name="feebalance" class="sflexinp" placeholder="Fee Balance">
                    </div>
                    <div class="studentparphonebx sflex">
                        <p class="studentparentPhone">Parent Phone:</p>
                        <input type="text" id="studentparentPhone" name="parentphone" class="sflexinp" placeholder="Parent Phone">
                    </div>
                    <div class="studentlangbx sflex">
                        <p class="studentLang">Language:</p>
                        <!-- <input type="text" id="studentLang" name="language" class="sflexinp" placeholder="Language"> -->
                        <select name="language" class="exfilter sflexinp" id="langftr">
                            <option class="optionVal" value="default" id="flangdef">--Select Language--</option>
                            <option class="optionVal" value="english" id="flangx">English</option>
                            <option class="optionVal" value="kiswahili" id="flangy">Kiswahili</option>
                            <option class="optionVal" value="engkisw" id="flangz">Eng & Kisw</option>
                            <option class="optionVal" value="other" id="flangz">Other</option>

                      </select>
                    </div>
                    <div class="studentstatbx sflex">
                        <p class="studentStatus">Status:</p>
                        <!-- <input type="text" id="studentStatus" name="status" class="sflexinp" placeholder="Status"> -->
                        <select name="status" class="exfilter sflexinp" id="statusftr">
                            <option class="optionVal" value="default" id="fstatusdef">--Select Status--</option>
                            <option class="optionVal" value="active" id="fstatusx">Active</option>
                            <option class="optionVal" value="suspended" id="fstatusy">Suspended</option>
                            <option class="optionVal" value="absent" id="fstatusz">Absent</option>
                      </select>
                    </div>
                    <div class="studentnatbx sflex">
                        <p class="studentNat">Nationality:</p>
                        <input type="text" id="studentNat" name="nationality" class="sflexinp" placeholder="Nationality">
                    </div>
                    <div class="studentpassbx sflex">
                        <p class="studentPass">Password:</p>
                        <input type="password" id="studentPass" name="password" class="sflexinp" placeholder="Password">
                    </div>
                    <div class="studentconfpassbx sflex">
                        <p class="studentconfPass">Confirm Password:</p>
                        <input type="password" id="studentcPass" name="confirmpassword" class="sflexinp" placeholder="Confirm Password">
                    </div>
                </aside>
            </div>
                <p class="notif" id="regNotif"></p>

            <hr color="lightgray">
            <div class="stdActbtns">
                <div class="stdActbtnsIn">
                    <button type="button" id="delStudent" class="stdinfobtn" onclick="delRegStd()">Clear Record</button>
                    <button type="submit" id="saveStudent" class="stdinfobtn">Save</button>
                    <button type="button" id="closeRegbox" class="stdinfobtn" onclick="closeRegistry()">Close</button>

                </div>                
            </div>
        </form>
    </div>

    <!--ENDIF TO REGISTER STUDENTS-->

    <!--TO REGISTER TEACHERS-->

    <div id="staffRegbox" class="stdmainbx hbox">
        <p class="studentRegTitle stdmaintitle">Register Staff</p>
        <hr>
        <form method="post" action="staffregister.php" class="studentRegIn stdmainin" enctype="multipart/form-data">
            <p class="studentInTitle stdmainintitle">New Staff</p>
            <div class="staffDetails stdgdatabx ">
                <aside class="stda stdaside staffaside">
                    <div class="staffidbx sflex">
                        <p class="staffidnm">Staff ID:</p>
                        <input type="text" id="staffidinput" name="staffid" class="sflexinp" placeholder="Staff ID">
                    </div>
                    <div class="studentnamebx sflex">
                        <p class="studentRegNo">Staff Name:</p>
                        <input type="text" id="studentRegNo" name="staffname" class="sflexinp" placeholder="Staff Name">
                    </div>
                    <div class="studentStreambx sflex">
                        <p class="studentStreamnm">Date of Birth:</p>
                        <input type="date" id="studentStream" name="dateofbirth" class="sflexinp" placeholder="Date of Birth">
                    </div>
                    <div class="entryMarksbx sflex">
                        <p class="entryMarks">Staff Role:</p>
                        <input type="text" id="entryMarks" name="staffrole" class="sflexinp" placeholder="Staff Role">
                    </div>
                    <div class="healthstatusbx sflex">
                        <p class="healthStatus">Basic Pay:</p>
                        <input type="text" id="healthStatus" name="basicpay" class="sflexinp" placeholder="Basic Pay">
                    </div>
                    <div class="studentProfile">
                        <label for="changeProfile">Upload Photo</label>
                        <input type="file" name="profileimg" id="changeProfile">
                        <!-- <img src="./images/students1.jpg" class="stdImg" width="50" alt="Student Profile">
                        <button id="changeProfile" onclick="changeProfile()">Change Profile</button> -->
                    </div>
                    <div class="studentGenderbx sflex">
                        <p class="studentGender">Department:</p>
                        <input type="text" id="studentGender" name="department" class="sflexinp" placeholder="Department">
                    </div>
                    <div class="studentAgebx sflex">
                        <p class="studentAge">Subjects:</p>
                        <input type="text" name="subjects" class="sflexinp" id="studentAge" placeholder="Subjects">
                    </div>
                    <!--Use email to login staff -->
                    <div class="studentfeebalbx sflex">
                        <p class="studentfeeBal">Staff Email:</p>
                        <input type="email" id="studentfeeBalr" name="staffemail" class="sflexinp" placeholder="Staff Email">
                    </div>
                    <div class="studentparphonebx sflex">
                        <p class="studentparentPhone">Staff Phone:</p>
                        <input type="text" id="studentparentPhone" name="staffphone" class="sflexinp" placeholder="Staff Phone">
                    </div>
                    <div class="studentlangbx sflex">
                        <p class="studentLang">Next of Kin:</p>
                        <input type="text" id="studentLang" name="nextofkin" class="sflexinp" placeholder="Next of Kin">
                    </div>
                    <div class="studentstatbx sflex">
                        <p class="studentStatus">Remedial Allocation:</p>
                        <input type="text" id="studentStatus" name="remedialallocation" class="sflexinp" placeholder="Remedial Allocation">
                    </div>
                </aside>
                <aside class="stdb stdaside staffaside">
                    
                    <div class="studentnatbx sflex">
                        <p class="studentNat">Marital Status:</p>
                        <input type="text" id="studentNat" name="maritalstatus" class="sflexinp" placeholder="Marital Status">
                    </div>
                    <div class="studentnatbx sflex">
                        <p class="studentNat">Year of Employment:</p>
                        <input type="date" id="studentNat" name="yearofemp" class="sflexinp" placeholder="Year of Employment">
                    </div>
                    <div class="studentnatbx sflex">
                        <p class="studentNat">Active Status:</p>
                        <input type="text" id="studentNat" name="activestatus" class="sflexinp" placeholder="Active Status">
                    </div>
                    <div class="studentnatbx sflex">
                        <p class="studentNat">Gender:</p>
                        <input type="text" id="staffGender" name="staffgender" class="sflexinp" placeholder="Gender">
                    </div>
                    <div class="studentnatbx sflex">
                        <p class="studentNat">NHIF NO:</p>
                        <input type="text" id="studentNat" name="nhifno" class="sflexinp" placeholder="NHIF NO">
                    </div>
                    <div class="studentnatbx sflex">
                        <p class="studentNat">NSSF NO:</p>
                        <input type="text" id="studentNat" name="nssfno" class="sflexinp" placeholder="NSSF NO">
                    </div>
                    <div class="studentnatbx sflex">
                        <p class="studentNat">TSC NO:</p>
                        <input type="text" id="studentNat" name="tscno" class="sflexinp" placeholder="TSC NO">
                    </div>
                    <div class="studentnatbx sflex">
                        <p class="studentNat">Bank Name:</p>
                        <input type="text" id="studentNat" name="bankname" class="sflexinp" placeholder="Bank Name">
                    </div>
                    <div class="studentnatbx sflex">
                        <p class="studentNat">Bank ACC No:</p>
                        <input type="text" id="studentNat" name="bankaccno" class="sflexinp" placeholder="Bank Acc No">
                    </div>
                    <div class="studentnatbx sflex">
                        <p class="studentNat">Nationality:</p>
                        <input type="text" id="studentNat" name="nationality" class="sflexinp" placeholder="Nationality">
                    </div>
                    <div class="studentpassbx sflex">
                        <p class="studentPass">Password:</p>
                        <input type="password" id="studentPass" name="password" class="sflexinp" placeholder="Password">
                    </div>
                    <div class="studentconfpassbx sflex">
                        <p class="studentconfPass">Confirm Password:</p>
                        <input type="password" id="studentcPass" name="confirmpassword" class="sflexinp" placeholder="Confirm Password">
                    </div>
                </aside>
            </div>
                <p class="notif" id="regNotif"></p>

            <hr color="lightgray">
            <div class="stdActbtns">
                <div class="stdActbtnsIn">
                    <button type="button" id="delStaff" class="stdinfobtn" onclick="delRegStd()">Clear Record</button>
                    <button type="submit" id="saveStaff" class="stdinfobtn">Save</button>
                    <button type="button" id="closetRegbox" class="stdinfobtn" onclick="closetRegistry()">Close</button>

                </div>                
            </div>
        </form>
    </div>


    <!--END IF - TO REGISTER TEACHERS-->

    <div class="rgshow">Please Select <a href="#" onclick="trygoingHome()">Register Student</a> or <a href="#" onclick="trygoingHome()">Grade Student</a> to proceed.</div>

    <!--Grade box-->
    <!-- This section is dynamic -  should list subjects enrolled by student to enable grading the perticular student -->
    <div id="studentGradebox" class="stdmainbx hbox">
        <p class="studentRegTitle stdmaintitle">Grade Student</p>
        <hr>
        <div class="studentRegIn stdmainin">
            <p class="studentInTitle stdmainintitle">UNIT: UCU101</p>
            <div class="studentDetails stdgdatabx stdgradebx">
                <aside class="stda stdaside">
                    <div class="studentNamebx sflex">
                        <p class="studentNamenm">Name:</p>
                        <input type="text" id="studentNameinput" class="sflexinp" placeholder="Student Name">
                    </div>
                    <div class="studentRegbx sflex">
                        <p class="studentRegNo">Reg No:</p>
                        <input type="text" id="studentRegNo" class="sflexinp" placeholder="Registration Number">
                    </div>
                    <div class="studentGradebx sflex">
                        <p class="studentGrade">Grade:</p>
                        <input type="text" id="studentGrade" class="sflexinp" placeholder="Grade">
                    </div>
                    
                </aside>
                <aside class="stdb stdaside">
                    <div class="studentProfile">
                        <img src="./images/students14.jpg" class="stdImg" width="50" alt="Student Profile">
                        <button id="changeProfile">Change Profile</button>
                    </div>
                </aside>
            </div>
                <p class="notif" id="grdNotif"></p>


            <hr color="lightgray">
            <div class="stdActbtns">

                <div class="stdActbtnsIn">

                    <button id="delStudent" onclick="delcpsGrades()" class="stdinfobtn">Clear Record</button>
                    <button id="saveStudent" onclick="savecpsGrades()" class="stdinfobtn">Save</button>
                    <button id="closeGradebox" class="stdinfobtn" onclick="closeGradebox()">Close</button>

                </div>                
            </div>
        </div>
    </div>

    <!--Register close confirm-->
    <div class="confirmAppOuter regConfirm" id="regConfirm" style="display: none;">
        <div class="confirmApp">
            <div class="confirmAppInner">
                <div class="confirmHead">
                    <!--Consider using p elements sometimes for headings - as h elements have more margin or 
                    remove all margin and padding from all elements using the * selector-->
                    <h2 class="confirmTitle">Confirm</h2>
                    <button title="Close" id="closeConfirm" onclick="closeconfirmRecords()">&times;</button>
                </div>
                <div class="confirmMain">
                    <p class="confirmRequest">Are you sure you want to Exit?</p>
                </div>
            </div>
            <div class="confirmButtons">
                <button class="confirmYes confirmbtn" onclick="confirmRYes()">Yes</button>
                <button class="confirmNo confirmbtn"onclick="confirmRNo()">No</button>
            </div>
        </div>
    </div>

    <!--End Register close confirm-->

    <!--Enter marks-->
    <div id="bodyRoot" class="body_root" style="display: none">
        <div class="header-mark">
            <h1 class="header_marker">CPS MARKS</h1>
        </div>
        <div class="main_root">
            <!--Rows with at least two subjects inline-->
            <div class="row row_one">
                <div class="subject_box subject_math">
                    <label for="math">Mathematics</label>
                    <input type="number" id="math" class="subject_input" placeholder="Mathematics" name="Mathematics" required>
                </div>
                <div class="subject_box subject_eng">
                    <label for="eng">English</label>
                    <input type="number" id="eng" class="subject_input" placeholder="English" name="English" required>
                </div>
            </div>

            <!--Basically, the rows and subject boxes have a similar structure, so copy,paste and change text-->

            <div class="row row_two">
                <div class="subject_box subject_kisw">
                    <label for="kisw">Kiswahili</label>
                    <input type="number" id="kisw" class="subject_input" placeholder="Kiswahili" name="Kiswahili" required>
                </div>
                <div class="subject_box subject_scie">
                    <label for="scie">Science</label>
                    <input type="number" id="scie" class="subject_input" placeholder="Science" name="Science" required>
                </div>
            </div>

            <!--Row 3-->
            
            <div class="row row_three">
                <div class="subject_box subject_comp">
                    <label for="comp">Composition</label>
                    <input type="number" id="comp" class="subject_input" placeholder="Composition" name="Composition" required>
                </div>
                <div class="subject_box subject_insha">
                    <label for="insha">Insha</label>
                    <input type="number" id="insha" class="subject_input" placeholder="Insha" name="Insha" required>
                </div>
            </div>
        </div>
        <p class="notif" id="regNotif"></p>
        <hr color="#eee">

        <!--CONTAINER HOLDS total and stuff like that-->

        <div class="lower_bottom">
            <div class="row row_three">
                <div class="subject_box subject_comp">
                    <button type="button" id="subject_output_btn1" class="subject_total_btn">Total</button>
                    <p id="total_marks" class="subject_input" ></p>
                </div>
                <div class="subject_box subject_insha">
                    <button type="button" id="subject_output_btn2" class="subject_total_btn">Num. of Subj.</button>
                    <p id="total_subjs" class="subject_input" ></p>
                </div>
        </div>
        <div class="lower_output">
            
        </div>
        </div>

        <hr color="lightgray">
            <div class="stdActbtns">

                <div class="stdActbtnsIn">

                    <button id="delStudent" class="stdinfobtn">Clear Record</button>
                    <button id="saveStudent" onclick="dispcpsMarks()" class="stdinfobtn">Save</button>
                    <button id="closeGradebox" class="stdinfobtn" onclick="closeMarksbox()">Close</button>

                </div>                
            </div>

    </div>

    <!--END enter marks-->

                </div>
            </div>

            <!--Graphics Tab contents-->
            <!--Replaced by records ===========================================-->
            <div id="graphics" class="grid-container tabcontents graphicsTab">
                <div class="side-bar p-side-bar">
                    <!--Navigation panel for items displayed on central container-->
                    <div class="top-sb-box">
                        <p class="sb-nav">
                            <?xml version="1.0" encoding="utf-8"?>
                            <svg width="50px" height="50px" viewBox="0 0 50 50" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                              <defs>
                                <image width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABHNCSVQICAgIfAhkiAAAAgZJREFUeJzt2b9KXEEUx/HfLK6CBLXwX4LvYGWwsExhGQTB0s7aJi8h5AVsrGRBCIFYpEgXQfA5FoNmURKwyYKTLsVicXaYm3PnzvdTz86eOz/2sueMBAAAAAAAAAAAAHRZmGbx/n1cH491qqBtScsN1VSqkaKue7M6+rQSflg/ZA5g72d8/fxHNwraSKuvElHD/ittXiyGB8vynnnfsU44fIOgjfGTPlqX2wOQ3qVVVKVd60JzAJLWEgqplfmspgkADSAAZwTgjACcEYCzmdwbXp0N9Ot+lHvbVlhcXdbO4UHWPbP/Arp6+FIzz8YryBkBOCMAZ9kDWFjt7pS6iWczj6Pf38aY/ds77PObYDpbXkHOCMAZATgjAGcE4KzKWZBlpvP9bKDfE8/BLCgTS42Th2/93LR4BTmrshO21PjSGjrhgtAJF4IAnBGAsyr6gJT/7/QBGaXURB9QiSr6gJSa6AMKRx9QCAJwRgDOqugDJnEf4Iz7APxTRR8wifuACtAHFIIAnBGAMwJwRgDOCMAZATjLPgtqm5dmOqmKmAW1Ta7Dl5gFdVLnA8g5v2EWVBBmQYWYJoC7xqroHvNZmQMI0re0Wqr01brQHMBcXx8UNUyrpyJRw/l5HVuXmwMYrITb3qzeKuqLpPZf/P5/I0Vd9vvaOl8Kj97FAAAAAAAAAAAAAO3wF7f4n348LKEMAAAAAElFTkSuQmCC" id="img_rec1" />
                              </defs>
                              <use xlink:href="#img_rec1" fill="#FFFFFF" stroke="none" transform="scale(0.5208333 0.5208333)" />
                            </svg>
                            
                            <span class="sb-title">Record</span>
                        </p>

                        <p style="display:none;" class="sb-nav">
                            <?xml version="1.0" encoding="utf-8"?>
                            <svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                              <defs>
                                <image width="64" height="64" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABHNCSVQICAgIfAhkiAAABPdJREFUeJztW9tx2zgUPdD4f9VB2EGYCsIOrA6irSBOBeZWYHcgbwWKKzBTgZUKpFRguYKzHwClCxAgAT5W2g3PjGcoEvcJ3IuLh4EZM2bMmDFjxowZvydUX0KStwByAJn525m/Z6XUcQzlPDJzAJ8BFACWACoARyPzMIVMnxJfSe4ZxhvJDclsRJkFyZcWmTTf87Fk+pTISb52KOHinuRygMwYw108jGl3rUhO3bMSB5KPRsmC5Jrkk0ehN5JfE+VlJLcBA59IrozMldHh6LTZcIDju4w/kiw7lPc5Yk/yS4ThGw/tkWQZMork0jhCYjvQ9BPjvaNIVJwZx1UBR9xT5AiStwHDaZyZhSVZMtcObdnLcMHQHYbJSYZ6qB4CxrWhIln0kOc6YZXKI8Ro3YuRzS/GEb0Md2TJcHhjn3xAe+h/H6KQwzenHtY7x+hHjjiN0Q6/MpW4FMTHXh68MKhDTyKLJVzSzvrlpJpOCNqz0VMskYz9w6QaTgzqaTVtFNCu9u6mV3NaOKOg7GqcOx4Lxr6JsY3jsFeSDxyYxbtA8gs7iirRVtq072rcGTMmR4TKVIltmwP7gnaIriNp5IwQrgtoJ7/GlEQdU/sI408e54irQqODnKHKSBrpNGtKX4hGBfQaGwB+KaV2Hl5b6LV/jb8BfFIGAD6ZdzUyQ3NpSKM/e1vQrp4ePd+l51uHEvUqTaIcbIJfj2i+tMOgqN8vRBvpmcrDQy5pvymlgtWh+fYtQHspSH3tzqM9Xza2s2hXVYdYibRr/1HK3AEjQNr46n6UQ7byEN+1hUeLUBlWSTWFJ+RSUAZ4njZO6nd1CMjeqTy0cjpL2fCUbVOnxPvE9jG0Vf1Akwd8DvBl/76G9HUcAPyV2D6GVtp2tpn23J65VLRzQHs1ZdNJvhfNAYZW2vEInEdAVjfy7a8rpSoA73XbmHg2bWq+74G64t9GYwQsaNftP1qIZfJ7YEcdAEBuT0cnzinhHNh8ANAYFlUbA9q7OKReDOXie87m5uaoPT8kBAz9aWoGgBvYiarqoF+ZNh/M7zWAtZhVXPyEPsa6Jhxw1h8L2DNAK0x+yAE8RzR/BlBMcE54CDwng2R+k0pkDFqZ3LGC7uGP5vNP6BHy3STO0aGUeqpHnFLqqQeLCueyf5nsAKFIhe6QmQQ9Dfdi0d3k/43ZAZdW4ALI5I/f3gE3CC0QRoIplG5xvkqzbJGzg1401ddtfkxw9eWP+kEpVSVVgrGg3jnesHmpog/2HHjTxNHtBKnsSdhIQoZsZoTwRn3mMOTKjbR1BwA3SqkjyXfooZGRXI5QvcmweofejzvgXDcc5eqQegmemZ8ZdIgUOBdYgA6dO+gi7M+ehZYMvcPpibEHBwmgXhgNyimmx0r67xUkX4ZiaCHlfLiKpasL6n1J9zJU0ukT7WO8Qn6IPz+zabapSgwB9c6uuyR/jZHPjp1vdwu76GDm3hwre1uVCBMW8gwzygm0d7abZxpOGLy0MMrYvDaXDTctDalOoL0/2cxzbF4mKDxtlrTjKPra3BRg826g1wlO5x5iGb6xud0lvXhR44VerSOBKbfdTA/LXFBffN44TK7C+BoeJ9RF04vzvophlrM53Vyt8TXYDAcXO8bOVgxfc62u0fga1Gecvs6rQsa3/sOEMbaAWaFdyeFGK4yhBXTZewRQ/Rf0njFjxmXwDySuoJRqj97WAAAAAElFTkSuQmCC" id="img_1" />
                              </defs>
                              <use xlink:href="#img_1" fill="#FFFFFF" stroke="none" transform="scale(0.625 0.625)" />
                            </svg>
                            
                            <span class="sb-title">Graphics Link</span>
                        </p>

                        <p style="display:none;" class="sb-nav sb-three">
                            <?xml version="1.0" encoding="utf-8"?>
                            <svg width="40px" height="40px" viewBox="0 0 40 40" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                              <defs>
                                <image width="64" height="64" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABHNCSVQICAgIfAhkiAAABPdJREFUeJztW9tx2zgUPdD4f9VB2EGYCsIOrA6irSBOBeZWYHcgbwWKKzBTgZUKpFRguYKzHwClCxAgAT5W2g3PjGcoEvcJ3IuLh4EZM2bMmDFjxowZvydUX0KStwByAJn525m/Z6XUcQzlPDJzAJ8BFACWACoARyPzMIVMnxJfSe4ZxhvJDclsRJkFyZcWmTTf87Fk+pTISb52KOHinuRygMwYw108jGl3rUhO3bMSB5KPRsmC5Jrkk0ehN5JfE+VlJLcBA59IrozMldHh6LTZcIDju4w/kiw7lPc5Yk/yS4ThGw/tkWQZMork0jhCYjvQ9BPjvaNIVJwZx1UBR9xT5AiStwHDaZyZhSVZMtcObdnLcMHQHYbJSYZ6qB4CxrWhIln0kOc6YZXKI8Ro3YuRzS/GEb0Md2TJcHhjn3xAe+h/H6KQwzenHtY7x+hHjjiN0Q6/MpW4FMTHXh68MKhDTyKLJVzSzvrlpJpOCNqz0VMskYz9w6QaTgzqaTVtFNCu9u6mV3NaOKOg7GqcOx4Lxr6JsY3jsFeSDxyYxbtA8gs7iirRVtq072rcGTMmR4TKVIltmwP7gnaIriNp5IwQrgtoJ7/GlEQdU/sI408e54irQqODnKHKSBrpNGtKX4hGBfQaGwB+KaV2Hl5b6LV/jb8BfFIGAD6ZdzUyQ3NpSKM/e1vQrp4ePd+l51uHEvUqTaIcbIJfj2i+tMOgqN8vRBvpmcrDQy5pvymlgtWh+fYtQHspSH3tzqM9Xza2s2hXVYdYibRr/1HK3AEjQNr46n6UQ7byEN+1hUeLUBlWSTWFJ+RSUAZ4njZO6nd1CMjeqTy0cjpL2fCUbVOnxPvE9jG0Vf1Akwd8DvBl/76G9HUcAPyV2D6GVtp2tpn23J65VLRzQHs1ZdNJvhfNAYZW2vEInEdAVjfy7a8rpSoA73XbmHg2bWq+74G64t9GYwQsaNftP1qIZfJ7YEcdAEBuT0cnzinhHNh8ANAYFlUbA9q7OKReDOXie87m5uaoPT8kBAz9aWoGgBvYiarqoF+ZNh/M7zWAtZhVXPyEPsa6Jhxw1h8L2DNAK0x+yAE8RzR/BlBMcE54CDwng2R+k0pkDFqZ3LGC7uGP5vNP6BHy3STO0aGUeqpHnFLqqQeLCueyf5nsAKFIhe6QmQQ9Dfdi0d3k/43ZAZdW4ALI5I/f3gE3CC0QRoIplG5xvkqzbJGzg1401ddtfkxw9eWP+kEpVSVVgrGg3jnesHmpog/2HHjTxNHtBKnsSdhIQoZsZoTwRn3mMOTKjbR1BwA3SqkjyXfooZGRXI5QvcmweofejzvgXDcc5eqQegmemZ8ZdIgUOBdYgA6dO+gi7M+ehZYMvcPpibEHBwmgXhgNyimmx0r67xUkX4ZiaCHlfLiKpasL6n1J9zJU0ukT7WO8Qn6IPz+zabapSgwB9c6uuyR/jZHPjp1vdwu76GDm3hwre1uVCBMW8gwzygm0d7abZxpOGLy0MMrYvDaXDTctDalOoL0/2cxzbF4mKDxtlrTjKPra3BRg826g1wlO5x5iGb6xud0lvXhR44VerSOBKbfdTA/LXFBffN44TK7C+BoeJ9RF04vzvophlrM53Vyt8TXYDAcXO8bOVgxfc62u0fga1Gecvs6rQsa3/sOEMbaAWaFdyeFGK4yhBXTZewRQ/Rf0njFjxmXwDySuoJRqj97WAAAAAElFTkSuQmCC" id="img_1" />
                              </defs>
                              <use xlink:href="#img_1" fill="#FFFFFF" stroke="none" transform="scale(0.625 0.625)" />
                            </svg>
                            
                            <span class="sb-title">Graphics Link</span>
                        </p>

                        

                        



                    </div>   

                </div>

                <div id="recCentral" class="central g-central-box">
                           
                    <div class="recordstabbtns">
                        <a href="#" class="recbtn"  id="stdhrecords" onclick="openRecord(event, 'stdRecords')">Student Records</a>
                        <a href="#" class="recbtn" onclick="openRecord(event, 'stafRecords')">Staff Records</a>
                    </div>
                    <div id="stdRecords" class="recordtabs">
                        
                        <!--Data table-->
                             <?php
                            // Enable error reporting
                            error_reporting(E_ALL);
                            ini_set('display_errors', 1);
                            
                            // Your include statement
                            include 'studentrecords.php';
                            ?>
                    </div>

                    <div id="stafRecords" class="recordtabs staffrecordtabs">
                        
                             <!--Data table-->
                            <?php
                            // Enable error reporting
                            error_reporting(E_ALL);
                            ini_set('display_errors', 1);
                            
                            // Your include statement
                            include 'staffrecords.php';
                            ?>
                    </div>

                </div>
            </div>

            
        </main>
        <script src="./cpsmarkssystem.js"></script>
        <script>

        </script>
    </body>
</html>

