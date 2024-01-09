

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['staffid'])) {
    // Redirect to the login page if not logged in
    header("Location: portal-login.php");
    
    exit();
}

require('./connect.php'); // Include your database connection script

// Retrieve updated user preferences from the database
$username = $_SESSION['staffid'];
$stmt = $connect->prepare("SELECT color, layout FROM staffsettings WHERE staffid = ?");
$stmt->bind_param('s', $staffid);
$stmt->execute();
$result = $stmt->get_result();

$userPreferences = $result->fetch_assoc(); // Fetch user preferences

$stmt->close();
$connect->close();

// Use retrieved preferences to customize the dashboard
// Example usage of retrieved preferences to style the dashboard
?>


<!-- ====User  Learner home Page====-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CPS Learners: Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:title" content="CPS Teachers: Dashboard">
        <meta property="og:image" content="https://www.presence.co.ke/ke/docs/root/images">
        <meta property="og:url" content="https://www.presence.co.ke">
        <meta name="keywords" content="Payment, Loans, Employee data, employment system, manage employee">
        <meta name="description" content="CPS monitoring monitoring and grading system">
        <link rel="stylesheet" href="./staffdash.css">
        <link rel="icon" href="./akkadian.svg" type="img/svg-xml">
        <style>
             body {
          Background-color : <?php echo $userPreferences['color']; ?>;
        }
        </style>
     </head>
     <body>
         <main class="wrapper">
             <header class="dashboard">

                <!--  This div houses the home icon and site name-->
                <div class="home_box">
                <?xml version="1.0" encoding="utf-8"?>
                <svg width="50px" height="35px" viewBox="0 0 50 50" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                  <defs>
                    <path d="M0 0L50 0L50 50L0 50L0 0Z" id="path_1" />
                    <clipPath id="mask_1">
                      <use xlink:href="#path_1" />
                    </clipPath>
                  </defs>
                  <g id="Home-icon">
                    <path d="M0 0L50 0L50 50L0 50L0 0Z" id="Background" fill="" fill-rule="evenodd" stroke="none" />
                    <g clip-path="url(#mask_1)">
                      <path d="M24.9629 1.05469C24.753 1.06193 24.5508 1.13505 24.3848 1.26367L1.38477 19.2109C0.94898 19.5507 0.871154 20.1794 1.21094 20.6152C1.55072 21.051 2.17944 21.1288 2.61523 20.7891L4 19.709L4 46C4.00027 46.5527 4.44813 47.0002 5.00039 47L18.832 47C18.94 47.0178 19.0502 47.0178 19.1582 47L30.832 47C30.94 47.0178 31.0502 47.0178 31.1582 47L45 47C45.5523 46.9999 45.9999 46.5523 46 46L46 19.709L47.3848 20.7891C47.8206 21.1288 48.4493 21.051 48.7891 20.6152C49.1288 20.1795 49.051 19.5507 48.6152 19.2109L41 13.2695L41 6L35 6L35 8.58594L25.6152 1.26367C25.4292 1.11939 25.1982 1.04539 24.9629 1.05469L24.9629 1.05469ZM25 3.32227L44 18.1484L44 45L32 45L32 26L18 26L18 45L6 45L6 18.1484L25 3.32227L25 3.32227ZM37 8L39 8L39 11.709L37 10.1465L37 8L37 8ZM20 28L30 28L30 45L20 45L20 28L20 28Z" id="Shape" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
                    </g>
                  </g>
                </svg>
                 <a href="./staffdashboard.php" style="text-decoration: none;" class="home_title"> Welcome, <?php echo $_SESSION['staffid']; ?>!</a>
                 </div>


                 <!-- Container for two buttons: a request payment and loan/advance request buttons-->
                 <div class="request_btns">
                     <!--we should have buttons if we have javascript - but let us use anchor tags so that we can link to target pages-->

                     <a href="#" id="pay_req"><abbrev title="Class Teacher">5Y</abbrev></a>
                     <a href="#" id="loan_advance"><abbrev title="Status">Active</abbrev></a>
                 </div>
             </header>

            
            
             <!-- This is the side bar that houses options - or user navigation system -->
            
             <div class="options_sider">

                <!-- In the following containers we have an icon and label that link to a respective page-->
                 <p class="padder navbar default" onclick="openSec(event, 'profile')" id="opendefault">
                     <span class="icon" id="profile_settings_icon">
                        <!--<?xml version="1.0" encoding="utf-8"?>
                        <svg width="25px" height="25px" viewBox="0 0 50 50" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                          <defs>
                            <path d="M0 0L50 0L50 50L0 50L0 0Z" id="path_1" />
                            <clipPath id="mask_1">
                              <use xlink:href="#path_1" />
                            </clipPath>
                          </defs>
                          <g id="Contacts-icon">
                            <path d="M0 0L50 0L50 50L0 50L0 0Z" id="Background" fill="" fill-rule="evenodd" stroke="none" />
                            <g clip-path="url(#mask_1)">
                              <path d="M24.875 3.3125C20.1836 3.41797 17.2148 5.31641 15.9375 8.25C14.7227 11.043 14.9766 14.5625 15.8437 18.2188C15.3789 18.7656 14.9961 19.5352 15.0938 20.6875L15.0938 20.75C15.2617 21.9688 15.6289 22.8281 16.0938 23.4375C16.3164 23.7266 16.6328 23.7422 16.9063 23.9063C17.1484 25.2695 17.6914 26.5703 18.3125 27.5938C18.3438 27.7422 18.4063 27.8789 18.5 28C18.5 28 18.6016 28.1289 18.625 28.1563C18.9375 28.625 19.0938 29.2773 19.0938 30C19.0938 30.7695 19.082 31.4844 19 32.2813C18.6992 33.0391 17.9492 33.6445 16.75 34.25C15.4961 34.8828 13.8555 35.4648 12.1875 36.1875C10.5195 36.9102 8.82813 37.7773 7.46875 39.1563C6.10938 40.5352 5.13672 42.4453 5 44.9375L4.9375 46L45.0625 46L45 44.9375C44.8633 42.4453 43.9141 40.5391 42.5625 39.1563C41.2109 37.7734 39.5117 36.9102 37.8438 36.1875C36.1758 35.4648 34.5234 34.8867 33.25 34.25C32.0156 33.6328 31.2422 33.0039 30.9062 32.2188C30.8281 31.2734 30.8125 30.5273 30.8125 29.6875C30.8125 29.1523 30.9961 28.668 31.3125 28.1875C31.3203 28.1758 31.3359 28.168 31.3437 28.1563C31.3477 28.1484 31.4063 28.0938 31.4063 28.0938C31.5312 27.9648 31.6172 27.8008 31.6563 27.625C32.2617 26.5859 32.7656 25.2656 33 23.9375C33.3125 23.7734 33.6641 23.7539 33.9063 23.4375C34.3867 22.8086 34.668 21.9141 34.7813 20.6875C34.8711 19.6289 34.5664 18.8594 34.0938 18.2813C34.6133 16.6797 35.2305 14.1172 35.0313 11.5C34.9219 10.0625 34.543 8.62891 33.6875 7.4375C32.9141 6.35938 31.6641 5.62109 30.0938 5.28125C29.0352 3.86719 27.1133 3.3125 24.9063 3.3125L24.875 3.3125ZM24.9063 5.3125C24.918 5.3125 24.9258 5.3125 24.9375 5.3125C26.9336 5.32031 28.2109 5.88281 28.625 6.59375L28.875 7.03125L29.375 7.09375C30.75 7.28516 31.5039 7.81641 32.0625 8.59375C32.6211 9.37109 32.9414 10.457 33.0313 11.6563C33.2148 14.0586 32.5195 16.875 32.0625 18.1563L31.75 19L32.5313 19.4063C32.5234 19.4336 32.8516 19.7656 32.8125 20.5C32.8125 20.5156 32.8125 20.5156 32.8125 20.5313C32.7188 21.4727 32.4766 22.0039 32.3125 22.2188C32.1445 22.4375 32.0586 22.4063 32.0938 22.4063L31.2188 22.4063L31.0938 23.2813C30.9219 24.5781 30.2617 26.2109 29.6875 27.0313L29.6563 27.0313C29.5977 27.1172 29.5547 27.2188 29.5 27.3125C29.2383 27.6172 28.8438 28.0195 28.2813 28.5C27.3477 29.2969 26.1094 30 25 30C23.8984 30 22.6484 29.2617 21.6875 28.4375C20.8555 27.7227 20.3594 27.1094 20.2188 26.9375C20.2148 26.9297 20.2227 26.9141 20.2188 26.9063C19.6289 26.0547 18.9531 24.5625 18.7813 23.2813L18.6875 22.4063L17.875 22.4063C17.8398 22.3906 17.7461 22.3398 17.6563 22.2188C17.4805 21.9883 17.2305 21.4492 17.0938 20.5313C17.0938 20.5117 17.0938 20.5195 17.0938 20.5C17.0898 20.4844 17.0977 20.4844 17.0938 20.4688C17.0781 19.7109 17.5469 19.2891 17.4688 19.3438L18.0313 18.9375L17.875 18.25C16.9531 14.6055 16.8086 11.3047 17.7813 9.0625C18.7539 6.82813 20.7227 5.41406 24.9063 5.3125L24.9063 5.3125ZM21.0938 30.5313C22.1484 31.3086 23.4688 32 25 32C26.5 32 27.7852 31.3438 28.8125 30.5938C28.8164 31.2031 28.8359 31.8281 28.9063 32.5938L28.9063 32.7188L28.9688 32.8438C29.1445 33.3047 29.3945 33.6953 29.6875 34.0625C29.6758 34.1016 29.6641 34.1445 29.6563 34.1875C29.6563 34.1875 29.418 34.8438 28.7188 35.5625C28.0195 36.2813 26.9336 37 25 37C23.0742 37 21.9492 36.25 21.2188 35.5C20.4883 34.75 20.25 34.0625 20.25 34.0625C20.5391 33.6875 20.7773 33.2852 20.9375 32.8125L21 32.625C21.0859 31.8672 21.0938 31.1836 21.0938 30.5313L21.0938 30.5313ZM31.25 35.4375C31.6016 35.6641 31.9648 35.875 32.3438 36.0625C33.8047 36.7891 35.4609 37.3516 37.0313 38.0313C38.6016 38.7109 40.0664 39.4805 41.125 40.5625C41.9688 41.4258 42.4766 42.5742 42.75 44L7.25 44C7.52344 42.5742 8.02734 41.4258 8.875 40.5625C9.9375 39.4805 11.4297 38.7109 13 38.0313C14.5703 37.3516 16.2109 36.793 17.6563 36.0625C18.0156 35.8789 18.3828 35.6875 18.7188 35.4688C18.9414 35.8711 19.2852 36.3945 19.7813 36.9063C20.8008 37.957 22.5273 39 25 39C27.4648 39 29.1563 37.9688 30.1562 36.9375C30.7031 36.375 31.0352 35.8516 31.25 35.4375L31.25 35.4375Z" id="Shape" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
                            </g>
                          </g>
                        </svg>-->
                        <img src="./images/upwork_up.jpg" width="25" alt="User" class="user_image">

                      </span>
                     <span class="label" id="profSetLabel">My Profile</span>
                    </p>


                 <p class="padder navbar" onclick="openSec(event, 'jobs')">
                    <span class="icon" id="jobData">
                       <?xml version="1.0" encoding="utf-8"?>
                       <svg width="25px" height="25px" viewBox="0 0 48 48" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                         <defs>
                           <linearGradient x1="0.98899984" y1="0.5" x2="0.19019985" y2="0.5" id="gradient_1">
                             <stop offset="0%" stop-color="#0D61A9" />
                             <stop offset="100%" stop-color="#16528C" />
                           </linearGradient>
                           <linearGradient x1="0.1875625" y1="0.022027776" x2="0.85740626" y2="1.003889" id="gradient_2">
                             <stop offset="0%" stop-color="#7DD8F3" />
                             <stop offset="100%" stop-color="#45B0D0" />
                           </linearGradient>
                           <linearGradient x1="0.5" y1="0.05679989" x2="0.5" y2="1.0019994" id="gradient_3">
                             <stop offset="0%" stop-color="#0176D0" />
                             <stop offset="100%" stop-color="#16538C" />
                           </linearGradient>
                           <path d="M0 0L48 0L48 48L0 48L0 0Z" id="path_1" />
                           <clipPath id="mask_1">
                             <use xlink:href="#path_1" />
                           </clipPath>
                         </defs>
                         <g id="Scroll-icon">
                           <path d="M0 0L48 0L48 48L0 48L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                           <g clip-path="url(#mask_1)">
                             <path d="M37 11L42 11L42 8C42 6.895 41.105 6 40 6L37 6L37 11L37 11Z" id="Shape" fill="url(#gradient_1)" stroke="none" />
                             <path d="M36 42L10 42C8.895 42 8 41.105 8 40L8 8C8 6.895 8.895 6 10 6L40 6C38.895 6 38 6.895 38 8L38 40C38 41.105 37.105 42 36 42L36 42Z" id="Shape" fill="url(#gradient_2)" stroke="none" />
                             <path d="M34 40L34 37L4 37L4 40C4 41.105 4.895 42 6 42L36 42C34.895 42 34 41.105 34 40L34 40Z" id="Shape" fill="url(#gradient_3)" stroke="none" />
                             <path d="M32.5 19L13.5 19C13.224 19 13 18.776 13 18.5L13 16.5C13 16.224 13.224 16 13.5 16L32.5 16C32.776 16 33 16.224 33 16.5L33 18.5C33 18.776 32.776 19 32.5 19L32.5 19Z" id="Shape" fill="#057093" stroke="none" />
                             <path d="M32.5 25L13.5 25C13.224 25 13 24.776 13 24.5L13 22.5C13 22.224 13.224 22 13.5 22L32.5 22C32.776 22 33 22.224 33 22.5L33 24.5C33 24.776 32.776 25 32.5 25L32.5 25Z" id="Shape" fill="#057093" stroke="none" />
                             <path d="M32.5 31L13.5 31C13.224 31 13 30.776 13 30.5L13 28.5C13 28.224 13.224 28 13.5 28L32.5 28C32.776 28 33 28.224 33 28.5L33 30.5C33 30.776 32.776 31 32.5 31L32.5 31Z" id="Shape" fill="#057093" stroke="none" />
                           </g>
                         </g>
                       </svg>
                      </span>
                    <span class="label" id="JobDataLabel">CourseWork</span>
                    </p>
   
   
                
   
               <p class="padder navbar" onclick="openSec(event, 'community')">
                   <span class="icon" id="comnty">
                       <?xml version="1.0" encoding="utf-8"?>
   <svg width="25px" height="25px" viewBox="0 0 48 48" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
     <defs>
       <linearGradient x1="0.002600175" y1="0.49999905" x2="0.9482007" y2="0.49999905" id="gradient_1">
         <stop offset="30.000002%" stop-color="#9C6500" />
         <stop offset="65.100006%" stop-color="#F2D33A" />
       </linearGradient>
       <linearGradient x1="0.0026001097" y1="0.49999952" x2="0.94820064" y2="0.49999952" id="gradient_2">
         <stop offset="30.000002%" stop-color="#1A7317" />
         <stop offset="65%" stop-color="#6DD669" />
       </linearGradient>
       <linearGradient x1="0.0026000396" y1="0.49999952" x2="0.9482005" y2="0.49999952" id="gradient_3">
         <stop offset="30.000002%" stop-color="#0670AD" />
         <stop offset="65%" stop-color="#08B7E8" />
       </linearGradient>
       <linearGradient x1="0.0025999697" y1="0.49999952" x2="0.94400144" y2="0.49999952" id="gradient_4">
         <stop offset="30.1%" stop-color="#5829A1" />
         <stop offset="65%" stop-color="#8F4FE8" />
       </linearGradient>
       <linearGradient x1="0.0026002363" y1="0.49999905" x2="0.94820076" y2="0.5" id="gradient_5">
         <stop offset="30.199999%" stop-color="#A63F62" />
         <stop offset="65%" stop-color="#E86B97" />
       </linearGradient>
       <linearGradient x1="0.1769655" y1="-0.010947369" x2="0.8056896" y2="0.98352635" id="gradient_6">
         <stop offset="0%" stop-color="#FC7D5B" />
         <stop offset="9.099999%" stop-color="#F87855" />
         <stop offset="68.3%" stop-color="#DF5731" />
         <stop offset="100%" stop-color="#D64B24" />
       </linearGradient>
       <radialGradient gradientUnits="objectBoundingBox" cx="49.99999%" cy="50%" fx="49.99999%" fy="50%" r="50%" gradientTransform="translate(0.49999988,0.5),translate(-0.49999988,-0.5)" id="gradient_7">
         <stop offset="48.6%" stop-color="#000000" />
         <stop offset="100%" stop-color="#000000" stop-opacity="0" />
       </radialGradient>
       <path d="M0 0L48 0L48 48L0 48L0 0Z" id="path_1" />
       <clipPath id="mask_1">
         <use xlink:href="#path_1" />
       </clipPath>
     </defs>
     <g id="Contacts-icon-2">
       <path d="M0 0L48 0L48 48L0 48L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
       <g clip-path="url(#mask_1)">
         <path d="M35 12L40 12L40 19L35 19L35 12Z" id="Rectangle" fill="url(#gradient_1)" fill-rule="evenodd" stroke="none" />
         <path d="M35 19L40 19L40 27L35 27L35 19Z" id="Rectangle" fill="url(#gradient_2)" fill-rule="evenodd" stroke="none" />
         <path d="M35 27L40 27L40 35L35 35L35 27Z" id="Rectangle" fill="url(#gradient_3)" fill-rule="evenodd" stroke="none" />
         <path d="M40 41L40 35L35 35L35 43L38 43C39.105 43 40 42.105 40 41L40 41Z" id="Shape" fill="url(#gradient_4)" stroke="none" />
         <path d="M40 7C40 5.895 39.105 5 38 5L35 5L35 12L40 12L40 7L40 7Z" id="Shape" fill="url(#gradient_5)" stroke="none" />
         <path d="M37 7C37 5.895 36.105 5 35 5L10 5C8.895 5 8 5.895 8 7L8 41C8 42.105 8.895 43 10 43L35 43C36.105 43 37 42.105 37 41L37 7L37 7Z" id="Shape" fill="url(#gradient_6)" stroke="none" />
         <path d="M18 18C18 15.2386 20.2386 13 23 13C25.7614 13 28 15.2386 28 18C28 20.7614 25.7614 23 23 23C20.2386 23 18 20.7614 18 18Z" id="Circle" fill="url(#gradient_7)" fill-opacity="0.15" fill-rule="evenodd" stroke="none" />
         <path d="M16 31L16 33.114C16 34.155 16.845 35 17.886 35L28.113 35C29.155 35 30 34.155 30 33.114L30 31C30 26 26.866 23 23 23C19.134 23 16 26 16 31L16 31Z" id="Shape" fill="#000000" fill-opacity="0.05" stroke="none" />
         <path d="M16.5 30.626L16.5 33.057C16.5 33.854 17.146 34.5 17.943 34.5L28.057 34.5C28.854 34.5 29.5 33.854 29.5 33.057L29.5 30.5C29.5 26.312 26.54 23.45 22.908 23.501C19.333 23.551 16.5 26.483 16.5 30.626L16.5 30.626Z" id="Shape" fill="#000000" fill-opacity="0.07" stroke="none" />
         <path d="M19 18C19 15.7909 20.7909 14 23 14C25.2091 14 27 15.7909 27 18C27 20.2091 25.2091 22 23 22C20.7909 22 19 20.2091 19 18Z" id="Circle" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
         <path d="M29 30C29 26.625 26.213 23.901 22.815 24.003C19.532 24.101 17 26.966 17 30.252L17 33C17 33.552 17.448 34 18 34L28 34C28.552 34 29 33.552 29 33L29 30L29 30Z" id="Shape" fill="#FFFFFF" stroke="none" />
       </g>
     </g>
   </svg>
  </span>
                   <span class="label" id="communityLabel">Community</span>
                </p>
   
               <p class="padder navbar" onclick="openSec(event, 'employees')">
                   <span class="icon" id="empProg">
                       <?xml version="1.0" encoding="utf-8"?>
   <svg width="25px" height="25px" viewBox="0 0 48 48" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
     <defs>
       <linearGradient x1="1" y1="0.4999998" x2="0" y2="0.49999964" id="gradient_1">
         <stop offset="26.6%" stop-color="#199AE0" />
         <stop offset="58.2%" stop-color="#1898DE" />
         <stop offset="74.5%" stop-color="#1590D6" />
         <stop offset="87.3%" stop-color="#1083C9" />
         <stop offset="98.2%" stop-color="#0870B7" />
         <stop offset="100%" stop-color="#076CB3" />
       </linearGradient>
       <linearGradient x1="0.05771348" y1="0.035770223" x2="0.8750498" y2="1.0402005" id="gradient_2">
         <stop offset="0%" stop-color="#32BDEF" />
         <stop offset="100%" stop-color="#1EA2E4" />
       </linearGradient>
       <linearGradient x1="0" y1="0.5" x2="1" y2="0.5" id="gradient_3">
         <stop offset="26.6%" stop-color="#199AE0" />
         <stop offset="58.2%" stop-color="#1898DE" />
         <stop offset="74.5%" stop-color="#1590D6" />
         <stop offset="87.3%" stop-color="#1083C9" />
         <stop offset="98.2%" stop-color="#0870B7" />
         <stop offset="100%" stop-color="#076CB3" />
       </linearGradient>
       <linearGradient x1="0.20706213" y1="0.0054445863" x2="0.9375354" y2="0.99328756" id="gradient_4">
         <stop offset="0%" stop-color="#32BDEF" />
         <stop offset="100%" stop-color="#1EA2E4" />
       </linearGradient>
       <path d="M0 0L48 0L48 48L0 48L0 0Z" id="path_1" />
       <clipPath id="mask_1">
         <use xlink:href="#path_1" />
       </clipPath>
     </defs>
     <g id="Refresh-icon">
       <path d="M0 0L48 0L48 48L0 48L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
       <g clip-path="url(#mask_1)">
         <path d="M14 13L23 13C23.552 13 24 12.552 24 12L24 8C24 7.448 23.552 7 23 7L14 7L14 13L14 13Z" id="Shape" fill="url(#gradient_1)" stroke="none" />
         <path d="M18.19 32L14 32L14 7L9.172 11.828C8.421 12.579 8 13.596 8 14.657L8 32L3.81 32C3.09 32 2.73 32.87 3.239 33.379L9.94 40.08C10.526 40.666 11.476 40.666 12.061 40.08L18.762 33.379C19.271 32.87 18.91 32 18.19 32L18.19 32Z" id="Shape" fill="url(#gradient_2)" stroke="none" />
         <path d="M34 35L25 35C24.448 35 24 35.448 24 36L24 40C24 40.552 24.448 41 25 41L34 41L34 35L34 35Z" id="Shape" fill="url(#gradient_3)" stroke="none" />
         <path d="M29.81 16L34 16L34 41L38.828 36.172C39.578 35.422 40 34.404 40 33.344L40 16L44.19 16C44.91 16 45.27 15.13 44.761 14.621L38.061 7.92C37.475 7.334 36.525 7.334 35.94 7.92L29.239 14.621C28.729 15.13 29.09 16 29.81 16L29.81 16Z" id="Shape" fill="url(#gradient_4)" stroke="none" />
       </g>
     </g>
   </svg>
  </span>
                   <span class="label" id="empProgLabel">Learner's Programs</span>
                   </p>
   
               <p class="padder navbar" onclick="openSec(event, 'help')">
                   <span class="icon" id="assistUser">
                       <?xml version="1.0" encoding="utf-8"?>
   <svg width="25px" height="25px" viewBox="0 0 48 48" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
     <defs>
       <path d="M0 0L48 0L48 48L0 48L0 0Z" id="path_1" />
       <clipPath id="mask_1">
         <use xlink:href="#path_1" />
       </clipPath>
     </defs>
     <g id="Idea-icon">
       <path d="M0 0L48 0L48 48L0 48L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
       <g clip-path="url(#mask_1)">
         <path d="M24 2C12.9543 2 4.00003 10.9543 4 21.9999C3.99997 33.0456 12.9542 41.9999 23.9999 42C35.0456 42 43.9999 33.0458 43.9999 22.0001C44 10.9544 35.0458 2.00009 24.0001 2L24 2Z" id="Shape" fill="#FFF59D" stroke="none" />
         <path d="M37 22C37 14.3 30.4 8.2 22.5 9.1C16.5 9.8 11.7 14.6 11.1 20.6C10.6 25.2 12.5 29.3 15.7 31.9C17.1 33.1 18 34.8 18 36.7L18 37L30 37L30 36.9C30 35.1 30.8 33.3 32.2 32.1C35.1 29.7 37 26.1 37 22L37 22Z" id="Shape" fill="#FBC02D" stroke="none" />
         <path d="M30.6 20.2L27.6 18.2C27.3 18 26.8 18 26.5 18.2L24 19.8L21.6 18.2C21.3 18 20.8 18 20.5 18.2L17.5 20.2C17.3 20.4 17.1 20.6 17.1 20.9C17.1 21.2 17.1 21.5 17.3 21.7L21.1 26.4L21.1 37L23.1 37L23.1 26C23.1 25.8 23 25.6 22.9 25.4L19.6 21.3L21.1 20.3L23.5 21.9C23.8 22.1 24.3 22.1 24.6 21.9L27 20.3L28.5 21.3L25.2 25.4C25.1 25.6 25 25.8 25 26L25 37L27 37L27 26.4L30.8 21.7C31 21.5 31.1 21.2 31 20.9C30.9 20.6 30.8 20.3 30.6 20.2L30.6 20.2Z" id="Shape" fill="#FFF59D" stroke="none" />
         <path d="M24 41C22.3431 41 21 42.3431 21 44C21 45.6568 22.3431 47 24 47C25.6568 47 27 45.6569 27 44C27 42.3432 25.6569 41 24 41L24 41Z" id="Shape" fill="#5C6BC0" stroke="none" />
         <path d="M26 45L22 45C19.8 45 18 43.2 18 41L18 36L30 36L30 41C30 43.2 28.2 45 26 45L26 45Z" id="Shape" fill="#9FA8DA" stroke="none" />
         <path d="M30 41L18.4 42.6C18.7 43.3 19.3 44 20 44.4L29.4 43.1C29.8 42.5 30 41.8 30 41L30 41ZM18 38.7L18 40.7L30 39L30 37L18 38.7Z" id="Shape" fill="#5C6BC0" fill-rule="evenodd" stroke="none" />
       </g>
     </g>
   </svg>
  </span>
                   <span class="label" id="assistUserLabel">Help</span>
              </p>
   
               <div class="padder navbar" onclick="logout()">
                   <span href="" class="icon" id="signOut">
                       <?xml version="1.0" encoding="utf-8"?>
   <svg width="25px" height="25px" viewBox="0 0 48 48" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
     <defs>
       <path d="M0 0L48 0L48 48L0 48L0 0Z" id="path_1" />
       <clipPath id="mask_1">
         <use xlink:href="#path_1" />
       </clipPath>
     </defs>
     <g id="Lock-icon">
       <path d="M0 0L48 0L48 48L0 48L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
       <g clip-path="url(#mask_1)">
         <path d="M24 4C18.5 4 14 8.5 14 14L14 18L18 18L18 14C18 10.7 20.7 8 24 8C27.3 8 30 10.7 30 14L30 18L34 18L34 14C34 8.5 29.5 4 24 4L24 4Z" id="Shape" fill="#424242" stroke="none" />
         <path d="M36 44L12 44C9.8 44 8 42.2 8 40L8 22C8 19.8 9.8 18 12 18L36 18C38.2 18 40 19.8 40 22L40 40C40 42.2 38.2 44 36 44L36 44Z" id="Shape" fill="#FB8C00" stroke="none" />
         <path d="M24 28C22.3431 28 21 29.3431 21 31C21 32.6568 22.3431 34 24 34C25.6568 34 27 32.6569 27 31C27 29.3432 25.6569 28 24 28L24 28Z" id="Shape" fill="#C76E00" stroke="none" />
       </g>
     </g>
   </svg>
                  </span>
                  <form  action="loggerout.php" method="post" style="display: inline;">
                          <input type="submit" class="cslogin" value="Logout" style="background-color: transparent; padding: 0 1pc; border: none;" >
                     </form>
                   <!-- <span class="label" id="signOutLabel">Sign Out</span> -->
      </div>
   
             </div>


<!-- ================== ================ =======   CENTRAL BOX ====================== =======================-->
             

             <div class="central">
              <!--Optimization - 11/11/2022-->
              <!--Container holds all tab contents - holder-->
              <!-- option on sider onclick - specified page should appear on the central holder-->
              <!--Profile contents-->
                 <div id="profile" class="holdwrap holder profile_settings">
                  
                  
                  <form method="post" action="profileUp.php" class="prof_pic_box">
                    <abbrev id="show_user_name" title="<?php echo $_SESSION['staffid']; ?>"><a href="#">
                    <?php
// Start the session to access session variables
//session_start();

if (isset($_SESSION['staffid'])) {
    require('./connect.php');

    // Retrieve the image path from the database for the logged-in user
    $loggedInStaffId = $_SESSION['staffid'];
    $getImageQuery = "SELECT profileimg FROM staff WHERE staffid = ?";
    $getImageStmt = $connect->prepare($getImageQuery);

    if ($getImageStmt) {
        $getImageStmt->bind_param('s', $loggedInStaffId); // Assuming staffid is a string
        if ($getImageStmt->execute()) {
            $getImgResult = $getImageStmt->get_result();

            if ($getImgResult) {
                if ($getImgResult->num_rows > 0) {
                    $col = $getImgResult->fetch_assoc();
                    $imgPath = $col['profileimg'];

                    // Display the image in HTML
                    echo '<img style="height:15pc; width: 15pc; border-radius: 4px;"  src="' . $imgPath . '" alt="Profile Image">';
                } else {
                    echo 'Profile image not found.';
                }
            } else {
                echo 'Error fetching image result: ' . $connect->error;
            }

            // Free result set
            $getImgResult->free_result();
        } else {
            echo 'Error executing image query: ' . $getImageStmt->error;
        }

        // Close database statement
        $getImageStmt->close();
    } else {
        echo 'Error in preparing image query: ' . $connect->error;
    }

    // Close database connection
    $connect->close();
} else {
    echo 'User is not logged in.';
}
?>


                    </a></abbrev>
                    <form action="#" method="post" class="stud_upload_actions">
                        <label for="studprof_upload">Upload</label>
                        <input type="file" name="studprofUpload" id="studprof_upload" style="display: none;">
                        <button type="submit" class="nameofsavebtn">Save</button>

                    </form>
                  </form>

                  <div class="user-info">
                    <!--THE DISPLAY CONTENT MAY DIFFER FROM THE CLASS NAMES AS THE SCRIPT IS BORROWED FROM THE ORIGINAL DASHBOARD SCRIPT -->

                    <!--Name of user with an option to change -->
                    <div class="data-box name_of">

                      <p class="name-of"> <?php echo $_SESSION['staffid']; ?></p>
                      

                    </div>

                    <!--JOb title with an option to change-->
                    <!--This container handles registration number-->

                    <div class="workForm data-box">
                      <p class="work_title">Staff ID:</p>

                      
                    </div>

                    <!-- skills and option to change theem or add more-->

                  <!--CLASS-->

                    <div class="skills data-box">
                      <p class="skills_title">Name:</p>

                     
                    </div>

<!--START IF-->
                    <div class="id data-box">
                      <div class="starter">
                      <span class="emp_id_passport">Phone:</span>
                      <span id="selected_value" class="selected_value">0719444041</span>
                      </div>
                     
                    </div>
<!--END IF-->
                            <!-- email of user and option to change it-->
                    <!--HOLDS DATE OF BIRTH-->
                    <div class="mail data-box">
                      <p class="email_title">Email:</p>

                      
                    </div>


                    <!-- number and option to change it-->

                    <div class="phone data-box">
                      <p class="phone_user">Role:</p>

                      
                    </div>

                    <!-- gender or sex select-->


                    <div class="gender_select data-box">
                      <div class="starter">
                        <span class="selected_gender selected_value">Gender:</span>
                        <span class="selected_gender selected_value">Male</span>

                     
                      </div>

                    </div>
                    
                    <!-- user to select national id or passport and have an option to change-->

                    <div class="id data-box">
                      <div class="starter">
                      <span class="emp_id_passport">Basic Pay:</span>
                      <span id="selected_value" class="selected_value">0</span>
                      </div>
                     
                    </div>

<!--start if-->
                    <div class="id data-box">
                      <div class="starter">
                      <span class="emp_id_passport">Remedial:</span>
                      <span id="selected_value" class="selected_value">16</span>
                      </div>
                     
                    </div>
                    <!--end if-->

                    <!-- user proficient languages and an option to change or add -- a select option-->
                    
                    <div class="lang_of data-box">
                      <div class="starter">
                      <span class="selected_lang selected_value">Department:</span>
                      <span class="selected_lang selected_value">Sciences</span>

                      
                      </div>
                      
                    </div>


                    <!--Country select-->

                    <div class="region_select data-box">
                      <div class="starter">
                        <!--Find a country/nationality API-->
                        <span class="selected_gender selected_value">Nationality:</span>
                        <span class="selected_gender selected_value">Kenyan</span>

                      
                      </div>


                    </div>
<!--click to view and edit additional info -->
                    <div class="mail data-box">
                      <a href="#" class="email_title">View More</a>

                      
                    </div>


                  </div>
                 </div>

                 <!--Job description-->
                 <div id="jobs" class="holdwrap job_holder job_settings">

                  <div class="assignBtns">
                    <a href="#" class="assign_btn" id="main_assign_tab" onclick="openAssignsec(event, 'assignUpload')">Subject Registration</a>
                    <a href="#" class="assign_btn"  onclick="openAssignsec(event, 'availableAssigns')">SchoolWork</a>
                    <a href="#" class="assign_btn"  onclick="openAssignsec(event, 'completedAssigns')">Completed Assignments</a>

                  </div>
                  
                  <!--TAB ONE-->
                        <!--SUBJECT REGISTRATION-->
                  <div class="upload_section ass_tab" id="assignUpload">
                    <h3 class="upload_sec_title">Subject Registration</h3>
                    <hr class="stuHr">
                    <div class="job_history boxer">
                      <p class="job_activity">
                        Subjects Register
                      </p>
                      <form action="#" method="post" class="upload_subj">
                        <div class="job_hist_table">
                          <table class="job_table">
                                <thead>
                                  <th>No.</th>
                                  <th>Subj. Code</th>
                                  <th>Subject Name</th>
                                  <th>Class</th>
                                  <th>Date</th>
                                  <th>Teacher</th>
                                  <th>Status</th>

                                </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td><input type="text" class="table_input" name="subjectonecode" id="subjoneCode"></td>
                                  <td><input type="text" class="table_input" name="subjectonename" id="subjectoneName"> </td>
                                  <td><input type="text" class="table_input" name="subjectoneclass" id="subjectoneClass"></td>
                                  <td><input type="date" class="table_input" name="subjectoneupdate" id="subjectoneupDate"></td>
                                  <td><input type="text" class="table_input" name="subjectonetr" id="subjectoneTr"></td>
                                  <td></td>

                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td><input type="text" class="table_input" name="subjecttwocode" id="subjtwoCode"></td>
                                  <td><input type="text" class="table_input" name="subjecttwoname" id="subjecttwoName"> </td>
                                  <td><input type="text" class="table_input" name="subjecttwoclass" id="subjecttwoClass"></td>
                                  <td><input type="date" class="table_input" name="subjecttwoupdate" id="subjecttwoupDate"></td>
                                  <td><input type="text" class="table_input" name="subjecttwotr" id="subjecttwoTr"></td>
                                  <td></td>

                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td><input type="text" class="table_input" name="subjectthreecode" id="subjthreeCode"></td>
                                  <td><input type="text" class="table_input" name="subjectthreename" id="subjectthreeName"></td>
                                  <td><input type="text" class="table_input" name="subjectthreeclass" id="subjectthreeClass"></td>
                                  <td><input type="date" class="table_input" name="subjectthreeupdate" id="subjectthreeupDate"></td>
                                  <td><input type="text" class="table_input" name="subjectthreetr" id="subjectthreeTr"></td>
                                  <td></td>

                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td><input type="text" class="table_input" name="subjectfourcode" id="subjfourCode"></td>
                                  <td><input type="text" class="table_input" name="subjectfourname" id="subjectfourName"> </td>
                                  <td><input type="text" class="table_input" name="subjectfourclass" id="subjectfourClass"></td>
                                  <td><input type="date" class="table_input" name="subjectfourupdate" id="subjectfourupDate"></td>
                                  <td><input type="text" class="table_input" name="subjectfourtr" id="subjectfourTr"></td>
                                  <td></td>

                                </tr>
                                <tr>
                                  <td>5</td>
                                  <td><input type="text" class="table_input" name="subjectfivecode" id="subjfiveCode"></td>
                                  <td><input type="text" class="table_input" name="subjectfivename"  id="subjectfiveName"> </td>
                                  <td><input type="text" class="table_input" name="subjectfiveclass"  id="subjectfiveClass"></td>
                                  <td><input type="date" class="table_input" name="subjectfiveupdate"  id="subjectfiveupDate"></td>
                                  <td><input type="text" class="table_input" name="subjectfivetr"  id="subjectfiveTr"></td>
                                  <td></td>

                                </tr>
                                <tr>
                                  <td>6</td>
                                  <td><input type="text" class="table_input" name="subjectsixcode" id="subjsixCode"></td>
                                  <td><input type="text" class="table_input" name="subjectsixname" id="subjectsixName"> </td>
                                  <td><input type="text" class="table_input" name="subjectsixclass" id="subjectsixClass"></td>
                                  <td><input type="date" class="table_input" name="subjectsixupdate" id="subjectsixupDate"></td>
                                  <td><input type="text" class="table_input" name="subjectsixtr" id="subjectsixTr"></td>
                                  <td></td>

                                </tr>
                                <tr>
                                  <td>7</td>
                                  <td><input type="text" class="table_input" name="subjectsevcode" id="subjsevCode"></td>
                                  <td><input type="text" class="table_input" name="subjectsevname" id="subjectsevName"> </td>
                                  <td><input type="text" class="table_input" name="subjectsevclass" id="subjectsevClass"></td>
                                  <td><input type="date" class="table_input" name="subjectsevupdate" id="subjectsevupDate"></td>
                                  <td><input type="text" class="table_input" name="subjectsevtr" id="subjectsevTr"></td>
                                  <td></td>

                                </tr>
                                <tr>
                                  <td>8</td>
                                  <td><input type="text" class="table_input" name="subjecteigcode" id="subjeigCode"></td>
                                  <td><input type="text" class="table_input" name="subjecteigname" id="subjecteigName"> </td>
                                  <td><input type="text" class="table_input" name="subjecteigclass" id="subjecteigClass"></td>
                                  <td><input type="date" class="table_input" name="subjecteigupdate" id="subjecteigupDate"></td>
                                  <td><input type="text" class="table_input" name="subjecteigtr" id="subjecteigTr"></td>
                                  <td></td>

                                </tr>
                                <tr>
                                  <td>9</td>
                                  <td><input type="text" class="table_input" name="subjectninecode" id="subjnineCode"></td>
                                  <td><input type="text" class="table_input" name="subjectninename" id="subjectnineName"> </td>
                                  <td><input type="text" class="table_input" name="subjectnineclass" id="subjectnineClass"></td>
                                  <td><input type="date" class="table_input" name="subjectnineupdate" id="subjectnineupDate"></td>
                                  <td><input type="text" class="table_input" name="subjectninetr" id="subjectnineTr"></td>
                                  <td></td>

                                </tr>
                          
                              </tbody>
                          </table>
                        </div>
                          <hr class="stuHr">

                          <div class="upload_submitter">
                            <button type="submit" class="up_submitter">Submit</button>
                          </div>
                      </form>

                    </div>
                    
                  </div>
                  <!--TAB 2-->
                  <!--Holds available assigns, subjects taken, etc-->
                  <div class="available_assigns ass_tab" id="availableAssigns">
                    <!-- The Job description of user -->
                  <!--DIV ONE-->
                    
                  <div class="job_title boxer">
                    <!--This page can be dynamic - because the teacher is taking classes in diff classes-->
                    <p class="job-title">Grade 5Y</p>
                  </div>
                  
                  <hr class="stuHr">
                  <!--SKILLS OF THE USER-->
                  <!--DIV THREE-->
                  <!--THESE SUBJECTS WILL BE ADDED HERE AUTOMATICALLY AFTER REGISTRATION-->
                  <div class="skills_section boxer">
                    <p class="skills_title">Enrolled Subjects</p>
                    <div class="list_of_skills">
                      <!--To be added using php -->
                      <p class="subj_name defaultsubj shome">Home</p>&centerdot;
                      <p class="subj_name css">Mathematics</p>&centerdot;
                      <p class="subj_name html">Integrated Science</p>&centerdot;
                      <p class="subj_name js">Science & Technology</p>&centerdot;
                      <p class="subj_name c">Home Science</p>&centerdot;
                      <p class="subj_name mysql">Pre-Technical</p>&centerdot;
                      <p class="subj_name php">Kiswahili</p>&centerdot;
                      <p class="subj_name py">Agriculture</p>
                    </div>
                  </div>
                  <hr class="stuHr">
                  <!-- Container for tab section for notes, exams and assignments-->
                  <!--There are two containers - The first is displayed when no subject has been registered 
                  The second is displayed when a subject has been registered-->
                  <!--DIV FOUR-->
                  <div class="tabsubjSection">
                    <div class="subj_btns_holders">
                      <button class="subj_btn_title" id="subj_main_btn" onclick="opensubjSec(event, 'subjAnnments')">Announcements</button>
                      <button class="subj_btn_title" onclick="opensubjSec(event, 'subjNotes')">Notes</button>
                      <button class="subj_btn_title" onclick="opensubjSec(event, 'subjAssignments')">Assignments</button>
                      <button class="subj_btn_title" onclick="opensubjSec(event, 'subjExams')">Exams</button>
                      <button class="subj_btn_title" onclick="opensubjSec(event, 'subjDiscussion')">Discussion</button>
                    </div>
                    <!--TAB SECTIONS FOR EACH OF THE ABOVE-->
                    <div class="subj_content_wrapper">
                      <!--THERE are the default containers - there should be containers that hold content when available-->
                      <div class="subj-content_one subj_content" id="subjAnnments">
                        <h3 class="subj_content_header">Announcements</h3>
                        <hr class="stuHr">
                        <div class="stafftab_header">
                          <button id="annstabBtn" class="staannsbtn" onclick="openAnnstab(event, 'availAnns')">Available Announcements</button>
                          <button class="staannsbtn" onclick="openAnnstab(event, 'uploadAnns')">Upload Announcements</button>
                        </div>
                        <hr class="stuHr">
                        <div class="subj_cont_info">
                              <!--Two tabs for notes and uploading notes-->
                          <div id="availAnns" class="availAnns tabforavnotes annstabcont">
                            <!-- <p class="subj_content_text">There are currently no Announcements. </p> -->
                              <?php include 'announcementsrecords.php';?>
                          </div>
                          <div id="uploadAnns" class="annstabcont uploadt_section asst_tab">
                              <h3 class="upload_sec_title">Upload Announcements</h3>
                              <hr class="stuHr">

                              <div class="uploader_inner">
                                  <form action="annupload.php" method="post" class="uploader_form" id="annuploaderForm" enctype="multipart/form-data">
                                    <!--The notesid should be generated automatically-->
                                    <div class="uploader_box annsname">
                                      <label for="annsName">Announcement Title:</label>
                                      <input type="text" name="annsname" class="uploader_inputter" id="annsName" placeholder="Annoucement Title">
                                    </div>
                                    <div class="uploader_box annsupldate">
                                      <label for="annsuplDate">Date Uploaded:</label> 
                                      <input type="date" name="dateuploaded" class="uploader_inputter" id="annsuplDate">
                                    </div>
                                    <div class="uploader_box annsauthor">
                                      <label for="annsAuthor">Author</label>
                                      <input type="text" name="annsauthor" class="uploader_inputter" id="annsAuthor" placeholder="Annoucement Author">
                                    </div>
                                    <div class="uploader_box annstype">
                                      <label for="annsType">Type/Subject:</label>
                                      <select class="typeselector" name="annstype" id="annsType">
                                        <option value="none" name="noneselected">Select</option>
                                        <option value="admin" name="admin">Admin</option>
                                        <option value="teachingstaff" name="teachingstaff">Teaching Staff</option>
                                        <option value="nonteachingstaff" name="nonteachingstaff">Non-Teaching Staff</option>
                                        <option value="general" name="general">General</option>
                                        <option value="math" name="math">Mathematics</option>
                                        <option value="english" name="english">English</option>
                                        <option value="kisw" name="kisw">Kiswahili</option>
                                        <option value="science" name="science">Science & Technology</option>
                                        <option value="socialstudies" name="socialstudies">Social Studies</option>
                                        <option value="cre" name="cre">C.R.E</option>
                                        <option value="integratedsci" name="integratedsci">Integrated Science</option>
                                        <option value="pretech" name="pretech">Pre-Technical Studies</option>
                                        <option value="artcraft" name="artcraft">Creative Arts</option>
                                        <option value="agrinu" name="agrinu">Agriculture & Nutrition</option>
                                      </select>
                                    </div>
                                    <div class="uploader_box annsgrade">
                                      <label for="annsType">Grade:</label>
                                      <select class="typeselector" name="annsgrade" id="annsGrade">
                                        <option value="none" name="noneselected">Select</option>
                                        <option value="all" name="all">All</option>
                                        <optgroup>
                                          <option value="pp1" name="pp1">PP1</option>
                                          <option value="pp2" name="pp2">PP2</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeone" name="gradeone">Grade One</option>
                                          <option value="gradetwo" name="gradetwo">Grade Two</option>
                                          <option value="gradethree" name="gradethree">Grade Three</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradefour" name="gradefour">Grade Four</option>
                                          <option value="gradefive" name="gradefive">Grade Five</option>
                                          <option value="gradesix" name="gradesix">Grade Six</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeseven" name="gradeseven">Grade Seven</option>
                                          <option value="gradeeight" name="gradeeight">Grade Eight</option>
                                          <option value="gradenine" name="gradenine">Grade Nine</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeten" name="gradeten">Grade Ten</option>
                                          <option value="gradeeleven" name="gradeeleven">Grade Eleven</option>
                                          <option value="gradetwelve" name="gradetwelve">Grade Twelve</option>
                                        </optgroup>
                                      </select>
                                    </div>
                                    <div class="uploader_box annsdetails">
                                      <label for="annsDetails">Details</label>
                                      <textarea rows="20" cols="20" name="annsdetails" class="uploader_inputter" id="annsAuthor" placeholder="Annoucement Details"></textarea>
                                    </div>
                                    <div class="uploader_box anns_file">
                                      <label for="annsFile">Upload Annoucement File</label>
                                      <input type="file" name="annsfile" class="uploader_inputter" id="annsFile">
                                    </div>
                                    <hr class="stuHr">

                                    <div class="upload_submitter">
                                      <button type="submit" class="up_submitter">Submit</button>
                                    </div>
                                  </form>
                              </div>
                          </div>
                        </div>
                      </div>
  
                      <div class="subj-content_two subj_content" id="subjNotes">
                        <h3 class="subj_content_header">Notes</h3>
                        <hr class="stuHr">
                        
                        <div class="stafftab_header">
                          <button id="notetabBtn" class="stanotebtn" onclick="openNotestab(event, 'availNotes')">Available Notes</button>
                          <button class="stanotebtn" onclick="openNotestab(event, 'uploadNotes')">Upload Notes</button>
                        </div>
                        
                        <hr class="stuHr">
                        
                        <div class="subj_cont_info">
                          <!--Two tabs for notes and uploading notes-->
                          <div id="availNotes" class="tabforavnotes notestabcont">
                            <!-- <p class="subj_content_text">There are currently no notes.</p> -->
                                <?php include 'notesrecords.php'?>
                          </div>
                          <div id="uploadNotes" class="notestabcont uploadt_section asst_tab">
                              <h3 class="upload_sec_title">Upload Notes</h3>
                              <hr class="stuHr">

                              <div class="uploader_inner">
                                  <form action="./notesupload.php" method="post" class="uploader_form" id="nuploaderForm" enctype="multipart/form-data">
                                    <!--The notesid should be generated automatically-->
                                    <div class="uploader_box assignreg">
                                      <label for="assignregno">Notes Name:</label>
                                      <input type="text" name="notesname" class="uploader_inputter" id="notesName" placeholder="Notes Subject Name">
                                    </div>
                                    <div class="uploader_box assignName">
                                      <label for="assignname">Date Uploaded:</label> 
                                      <input type="date" name="dateuploaded" class="uploader_inputter" id="nuploadDate">
                                    </div>
                                    <div class="uploader_box assigntr">
                                      <label for="assigntr">Subject Teacher</label>
                                      <input type="text" name="notestr" class="uploader_inputter" id="notestr" placeholder="Subject Teacher">
                                    </div>
                                    <div class="uploader_box notestype">
                                      <label for="notesType">Type/Subject:</label>
                                      <select class="typeselector" name="notestype" id="notesType">
                                        <option value="none" name="noneselected">Select</option>
                                        <option value="admin" name="admin">Admin</option>
                                        <option value="teachingstaff" name="teachingstaff">Teaching Staff</option>
                                        <option value="nonteachingstaff" name="nonteachingstaff">Non-Teaching Staff</option>
                                        <option value="general" name="general">General</option>
                                        <option value="math" name="math">Mathematics</option>
                                        <option value="english" name="english">English</option>
                                        <option value="kisw" name="kisw">Kiswahili</option>
                                        <option value="science" name="science">Science & Technology</option>
                                        <option value="socialstudies" name="socialstudies">Social Studies</option>
                                        <option value="cre" name="cre">C.R.E</option>
                                        <option value="integratedsci" name="integratedsci">Integrated Science</option>
                                        <option value="pretech" name="pretech">Pre-Technical Studies</option>
                                        <option value="artcraft" name="artcraft">Creative Arts</option>
                                        <option value="agrinu" name="agrinu">Agriculture & Nutrition</option>
                                      </select>
                                    </div>
                                    <div class="uploader_box notesgrade">
                                      <label for="notesGrade">Grade:</label>
                                      <select class="typeselector" name="notesgrade" id="notesGrade">
                                        <option value="none" name="noneselected">Select</option>
                                        <optgroup>
                                          <option value="pp1" name="pp1">PP1</option>
                                          <option value="pp2" name="pp2">PP2</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeone" name="gradeone">Grade One</option>
                                          <option value="gradetwo" name="gradetwo">Grade Two</option>
                                          <option value="gradethree" name="gradethree">Grade Three</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradefour" name="gradefour">Grade Four</option>
                                          <option value="gradefive" name="gradefive">Grade Five</option>
                                          <option value="gradesix" name="gradesix">Grade Six</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeseven" name="gradeseven">Grade Seven</option>
                                          <option value="gradeeight" name="gradeeight">Grade Eight</option>
                                          <option value="gradenine" name="gradenine">Grade Nine</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeten" name="gradeten">Grade Ten</option>
                                          <option value="gradeeleven" name="gradeeleven">Grade Eleven</option>
                                          <option value="gradetwelve" name="gradetwelve">Grade Twelve</option>
                                        </optgroup>
                                      </select>
                                    </div>
                                    
                                  
                                    <div class="uploader_box assign_file">
                                      <label for="assignfile">Upload Notes</label>
                                      <input type="file" name="notesfile" class="uploader_inputter" id="assignfile">
                                    </div>
                                    <hr class="stuHr">

                                    <div class="upload_submitter">
                                      <button type="submit" class="up_submitter">Submit</button>
                                    </div>
                                  </form>
                              </div>
                          </div>
                        </div>
                        
                      </div>

                      <div class="subj-content_three subj_content" id="subjAssignments">
                        <h3 class="subj_content_header">Assignments</h3>
                        <hr class="stuHr">
                        <div class="stafftab_header">
                          <button id="asstabBtn" class="staassbtn" onclick="openAsstab(event, 'availAss')">Available Assignment</button>
                          <button class="staassbtn" onclick="openAsstab(event, 'uploadAss')">Upload Assignment</button>
                        </div>
                        <hr class="stuHr">
                        <div class="subj_cont_info">
                                <!--Two tabs for notes and uploading notes-->
                          <div id="availAss" class="tabforavnotes asstabcont">
                            <!-- <p class="subj_content_text">There are currently no Assignments.</p> -->
                            <?php include 'assignmentrecords.php'; ?>
                          </div>
                          <div id="uploadAss" class="asstabcont uploadt_section asst_tab">
                              <h3 class="upload_sec_title">Upload Assignments</h3>
                              <hr class="stuHr">

                              <div class="uploader_inner">
                                  <form action="./assignmentupload.php" method="post" class="assuploader_form" id="uploaderForm" enctype="multipart/form-data">
                                    <!--The notesid should be generated automatically-->
                                    <div class="uploader_box assignreg">
                                      <label for="assignregno">Assignment Name:</label>
                                      <input type="text" name="assignname" class="uploader_inputter" id="notesName" placeholder="Notes Subject Name">
                                    </div>
                                    <div class="uploader_box assignupdate">
                                      <label for="assignUpdate">Date Uploaded:</label> 
                                      <input type="date" name="dateuploaded" class="uploader_inputter" id="assignUpdate">
                                    </div>
                                    <div class="uploader_box assigntr">
                                      <label for="assignTr">Subject Teacher</label>
                                      <input type="text" name="assigntr" class="uploader_inputter" id="assTr" placeholder="Subject Teacher">
                                    </div>
                                    <div class="uploader_box assigntype">
                                      <label for="assignType">Type/Subject:</label>
                                      <select class="typeselector" name="assigntype" id="assignType">
                                        <option value="none" name="noneselected">Select</option>
                                        <option value="general" name="general">General</option>
                                        <option value="admin" name="admin">Admin</option>
                                        <option value="teachingstaff" name="teachingstaff">Teaching Staff</option>
                                        <option value="nonteachingstaff" name="nonteachingstaff">Non-Teaching Staff</option>
                                        <option value="math" name="math">Mathematics</option>
                                        <option value="english" name="english">English</option>
                                        <option value="kisw" name="kisw">Kiswahili</option>
                                        <option value="science" name="science">Science & Technology</option>
                                        <option value="socialstudies" name="socialstudies">Social Studies</option>
                                        <option value="cre" name="cre">C.R.E</option>
                                        <option value="integratedsci" name="integratedsci">Integrated Science</option>
                                        <option value="pretech" name="pretech">Pre-Technical Studies</option>
                                        <option value="artcraft" name="artcraft">Creative Arts</option>
                                        <option value="agrinu" name="agrinu">Agriculture & Nutrition</option>
                                      </select>
                                    </div>
                                    <div class="uploader_box assgrade">
                                      <label for="assGrade">Grade:</label>
                                      <select class="typeselector" name="assigngrade" id="assGrade">
                                        <option value="none" name="noneselected">Select</option>
                                        <optgroup>
                                          <option value="pp1" name="pp1">PP1</option>
                                          <option value="pp2" name="pp2">PP2</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeone" name="gradeone">Grade One</option>
                                          <option value="gradetwo" name="gradetwo">Grade Two</option>
                                          <option value="gradethree" name="gradethree">Grade Three</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradefour" name="gradefour">Grade Four</option>
                                          <option value="gradefive" name="gradefive">Grade Five</option>
                                          <option value="gradesix" name="gradesix">Grade Six</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeseven" name="gradeseven">Grade Seven</option>
                                          <option value="gradeeight" name="gradeeight">Grade Eight</option>
                                          <option value="gradenine" name="gradenine">Grade Nine</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeten" name="gradeten">Grade Ten</option>
                                          <option value="gradeeleven" name="gradeeleven">Grade Eleven</option>
                                          <option value="gradetwelve" name="gradetwelve">Grade Twelve</option>
                                        </optgroup>
                                      </select>
                                    </div>
                                    <div class="uploader_box assignduedate">
                                      <label for="assignDuedate">Deadline:</label>
                                      <input type="date" name="duedate" class="uploader_inputter" id="assignDuedate">
                                    </div>
                                    <div class="uploader_box assignduedate">
                                      <label for="assignInst">Instructions:</label>
                                      <textarea rows="20" cols="20" name="assignintructs" class="uploader_inputter" id="assignInst"></textarea>
                                    </div>
                                    <div class="uploader_box assign_file">
                                      <label for="assignFile">Upload Assignment</label>
                                      <input type="file" name="assignfile" class="uploader_inputter" id="assignFile">
                                    </div>
                                    <hr class="stuHr">

                                    <div class="upload_submitter">
                                      <button type="submit" class="up_submitter">Submit</button>
                                    </div>
                                  </form>
                              </div>
                          </div>
                        </div>
                        
                      </div>
  
                      <div class="subj-content_four subj_content" id="subjExams">
                        <h3 class="subj_content_header">Past Papers/ Exams</h3>
                        <hr class="stuHr">
                        <div class="stafftab_header">
                          <button id="examtabBtn" class="staexambtn" onclick="openExamtab(event, 'availExam')">Available Exams</button>
                          <button class="staexambtn" onclick="openExamtab(event, 'uploadExam')">Upload Exam</button>
                        </div>
                        <hr class="stuHr">
                        <div class="subj_cont_info">
                                        <!--Two tabs for notes and uploading notes-->
                          <div id="availExam" class="tabforavnotes examtabcont">
                            <!-- <p class="subj_content_text">There are currently no Exams.</p> -->
                            <?php include 'pastpapersrecords.php' ?>

                          </div>
                          <div id="uploadExam" class="examtabcont uploadt_section asst_tab">
                              <h3 class="upload_sec_title">Upload Past Papers/Exams</h3>
                              <hr class="stuHr">

                              <div class="uploader_inner">
                                  <form action="./pastpapersupload.php" method="post" class="uploader_form" id="exuploaderForm" enctype="multipart/form-data">
                                    <!--The notesid should be generated automatically-->
                                    <div class="uploader_box assignreg">
                                      <label for="examName">Exam Name:</label>
                                      <input type="text" name="examname" class="uploader_inputter" id="examName" placeholder="Exam Name">
                                    </div>
                                    <div class="uploader_box examupdate">
                                      <label for="examUpdate">Date Uploaded:</label> 
                                      <input type="date" name="dateuploaded" class="uploader_inputter" id="examUpdate">
                                    </div>
                                    <div class="uploader_box examtr">
                                      <label for="examTr">Exam Teacher</label>
                                      <input type="text" name="examtr" class="uploader_inputter" id="examTr" placeholder="Exam Teacher">
                                    </div>
                                    <div class="uploader_box examtype">
                                      <label for="examType">Type/Subject:</label>
                                      <select class="typeselector" name="examtype" id="examType">
                                        <option value="none" name="noneselected">Select</option>
                                        <option value="general" name="general">General</option>
                                        <option value="admin" name="admin">Admin</option>
                                        <option value="teachingstaff" name="teachingstaff">Teaching Staff</option>
                                        <option value="nonteachingstaff" name="nonteachingstaff">Non-Teaching Staff</option>
                                        <option value="math" name="math">Mathematics</option>
                                        <option value="english" name="english">English</option>
                                        <option value="kisw" name="kisw">Kiswahili</option>
                                        <option value="science" name="science">Science & Technology</option>
                                        <option value="socialstudies" name="socialstudies">Social Studies</option>
                                        <option value="cre" name="cre">C.R.E</option>
                                        <option value="integratedsci" name="integratedsci">Integrated Science</option>
                                        <option value="pretech" name="pretech">Pre-Technical Studies</option>
                                        <option value="artcraft" name="artcraft">Creative Arts</option>
                                        <option value="agrinu" name="agrinu">Agriculture & Nutrition</option>
                                      </select>
                                    </div>
                                    <div class="uploader_box examgrade">
                                      <label for="examGrade">Grade:</label>
                                      <select class="typeselector" name="examgrade" id="examGrade">
                                        <option value="none" name="noneselected">Select</option>
                                        <optgroup>
                                          <option value="pp1" name="pp1">PP1</option>
                                          <option value="pp2" name="pp2">PP2</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeone" name="gradeone">Grade One</option>
                                          <option value="gradetwo" name="gradetwo">Grade Two</option>
                                          <option value="gradethree" name="gradethree">Grade Three</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradefour" name="gradefour">Grade Four</option>
                                          <option value="gradefive" name="gradefive">Grade Five</option>
                                          <option value="gradesix" name="gradesix">Grade Six</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeseven" name="gradeseven">Grade Seven</option>
                                          <option value="gradeeight" name="gradeeight">Grade Eight</option>
                                          <option value="gradenine" name="gradenine">Grade Nine</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeten" name="gradeten">Grade Ten</option>
                                          <option value="gradeeleven" name="gradeeleven">Grade Eleven</option>
                                          <option value="gradetwelve" name="gradetwelve">Grade Twelve</option>
                                        </optgroup>
                                      </select>
                                    </div>
                                    
                                    <div class="uploader_box exam_file">
                                      <label for="examFile">Upload Exam</label>
                                      <input type="file" name="examfile" class="uploader_inputter" id="examFile">
                                    </div>
                                    <hr class="stuHr">

                                    <div class="upload_submitter">
                                      <button type="submit" class="up_submitter">Submit</button>
                                    </div>
                                  </form>
                              </div>
                          </div>
                        </div>
                        
                      </div>

                      <div class="subj-content_five subj_content" id="subjDiscussion">
                        <h3 class="subj_content_header">Discussion</h3>
                        <hr class="stuHr">
                        <div class="stafftab_header">
                          <button id="distabBtn" class="stadisbtn" onclick="openDistab(event, 'availDis')">Available Discussion</button>
                          <button class="stadisbtn" onclick="openDistab(event, 'uploadDis')">Upload Discussion</button>
                        </div>
                        <hr class="stuHr">
                        <div class="subj_cont_info">
                                <!--Two tabs for notes and uploading notes-->
                          <div id="availDis" class="tabforavnotes distabcont">
                            <p class="subj_content_text">There are currently no Discussions.</p>

                          </div>
                          <div id="uploadDis" class="distabcont uploadt_section asst_tab">
                              <h3 class="upload_sec_title">Start Discussions</h3>
                              <hr class="stuHr">

                              <div class="uploader_inner">
                                  <form action="./discussion.php" method="post" class="uploader_form" id="disuploaderForm" enctype="multipart/form-data">
                                    <!--The notesid should be generated automatically-->
                                    <div class="uploader_box assignreg">
                                      <label for="disTitle">Discussion Title:</label>
                                      <input type="text" name="distitle" class="uploader_inputter" id="disTitle" placeholder="Discussion Title">
                                    </div>
                                    <div class="uploader_box disupdate">
                                      <label for="disUpdate">Date Uploaded:</label> 
                                      <input type="date" name="disuploaded" class="uploader_inputter" id="disUpdate">
                                    </div>
                                    <div class="uploader_box disauthor">
                                      <label for="disAuthor">Discussion Author</label>
                                      <input type="text" name="disauthor" class="uploader_inputter" id="disAuthor" placeholder="Discussion Author">
                                    </div>
                                    <div class="uploader_box distype">
                                      <label for="disType">Type/Subject:</label>
                                      <select class="typeselector" name="distype" id="disType">
                                        <option value="none" name="noneselected">Select</option>
                                        <option value="admin" name="admin">Admin</option>
                                        <option value="teachingstaff" name="teachingstaff">Teaching Staff</option>
                                        <option value="nonteachingstaff" name="nonteachingstaff">Non-Teaching Staff</option>
                                        <option value="general" name="general">General</option>
                                        <option value="math" name="math">Mathematics</option>
                                        <option value="english" name="english">English</option>
                                        <option value="kisw" name="kisw">Kiswahili</option>
                                        <option value="science" name="science">Science & Technology</option>
                                        <option value="socialstudies" name="socialstudies">Social Studies</option>
                                        <option value="cre" name="cre">C.R.E</option>
                                        <option value="integratedsci" name="integratedsci">Integrated Science</option>
                                        <option value="pretech" name="pretech">Pre-Technical Studies</option>
                                        <option value="artcraft" name="artcraft">Creative Arts</option>
                                        <option value="agrinu" name="agrinu">Agriculture & Nutrition</option>
                                      </select>
                                    </div>
                                    <div class="uploader_box discgrade">
                                      <label for="discGrade">Grade:</label>
                                      <select class="typeselector" name="discgrade" id="discGrade">
                                        <option value="none" name="noneselected">Select</option>
                                        <optgroup>
                                          <option value="pp1" name="pp1">PP1</option>
                                          <option value="pp2" name="pp2">PP2</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeone" name="gradeone">Grade One</option>
                                          <option value="gradetwo" name="gradetwo">Grade Two</option>
                                          <option value="gradethree" name="gradethree">Grade Three</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradefour" name="gradefour">Grade Four</option>
                                          <option value="gradefive" name="gradefive">Grade Five</option>
                                          <option value="gradesix" name="gradesix">Grade Six</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeseven" name="gradeseven">Grade Seven</option>
                                          <option value="gradeeight" name="gradeeight">Grade Eight</option>
                                          <option value="gradenine" name="gradenine">Grade Nine</option>
                                        </optgroup>
                                        <optgroup>
                                          <option value="gradeten" name="gradeten">Grade Ten</option>
                                          <option value="gradeeleven" name="gradeeleven">Grade Eleven</option>
                                          <option value="gradetwelve" name="gradetwelve">Grade Twelve</option>
                                        </optgroup>
                                      </select>
                                    </div>
                                    <div class="uploader_box dis_file">
                                      <label for="disFile">Upload File</label>
                                      <input type="file" name="disfile" class="uploader_inputter" id="disFile">
                                    </div>
                                    <hr class="stuHr">

                                    <div class="upload_submitter">
                                      <button type="submit" class="up_submitter">Submit</button>
                                    </div>
                                  </form>
                              </div>
                          </div>
                        </div>
                        
                      </div>


                    </div>

                  </div>
                  </div>

                  <!--TAB 3 - COMPLETED ASSIGN'S-->
                  <div class="completed_assigns ass_tab" id="completedAssigns">
                    <!-- The Job description of user -->
                  <!--DIV ONE-->
                    
                  <div class="job_title boxer">
                    <p class="job-title">Grade 4Y Completed Assignments</p>
                  </div>
                  

                  <hr class="stuHr">
                 

                  <!-- Work history table-->
                  <!--DIV FOUR-->
                  <div class="job_history boxer">
                    <p class="job_activity">
                      Completed Assignments
                    </p>
                    <div class="job_hist_table">
                      <table class="job_table">
                        <thead>
                          <th>Assign. Id</th>
                          <th>Date Assigned</th>
                          <th>Assign. Name</th>
                          <th>Subject</th>
                          <th>Teacher</th>
                          <th>Date Uploaded</th>
                          <th>Status</th>

                        </thead>
                        <tbody>
                          <tr>
                          <td>0100</td>
                          <td>10 Feb 2015</td>
                          <td><a href="#" class="downx" download="download.docx">download.docx</a></td>
                          <td>Computer Science</td>
                          <td>Tr. Denis</td>
                          <td>12 Dec 2023</td>
                          <td>Pending</td>
                          </tr>
                          <tr>
                            <td>0099</td>
                            <td>09 Feb 2016</td>
                            <td>BGHR International School</td>
                            <td>&dollar;500000</td>
                            <td>Ended</td>
                            <td>12 Dec 2023</td>
                          <td>Pending</td>
                          </tr>
                          <tr>
                            <td>0098</td>
                            <td>09 Feb 2017</td>
                            <td>Neema Schools</td>
                            <td>&dollar;600000</td>
                            <td>Completed</td>
                            <td>12 Dec 2023</td>
                          <td>Pending</td>
                          </tr>
                          <tr>
                            <td>0097</td>
                            <td>06 Feb 2018</td>
                            <td>Action Stars Junior School</td>
                            <td>&dollar;9000</td>
                            <td>Completed</td>
                            <td>12 Dec 2023</td>
                          <td>Completed</td>
                          </tr>
                          <tr>
                            <td>0096</td>
                            <td>04 Feb 2019</td>
                            <td>Intercom High</td>
                            <td>&dollar;500000</td>
                            <td>Completed</td>
                            <td>12 Dec 2023</td>
                          <td>Pending</td>
                          </tr>
                          
                          
                        </tbody>
                      </table>
                    </div>
                  </div>


                  </div>
                  

                </div>

                
                
                
                
                <!--Community-->
                <div id="community" class="holdwrap community_settings">
                  
                  <div class="comm_nav_panel">
                    <div class="trending">
                      <a href="#" id="stucommDef" onclick="openComms(event, 'stuNews')" class="comms-btn trending_btn">
                        <?xml version="1.0" encoding="utf-8"?>
<svg width="24px" height="24px" viewBox="0 0 48 48" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <linearGradient x1="0.20360088" y1="0.50000006" x2="1.0352001" y2="0.50000006" id="gradient_1">
      <stop offset="0%" stop-color="#3537B0" />
      <stop offset="100%" stop-color="#4646CF" />
    </linearGradient>
    <path d="M0 0L48 0L48 48L0 48L0 0Z" id="path_1" />
    <clipPath id="mask_1">
      <use xlink:href="#path_1" />
    </clipPath>
  </defs>
  <g id="News-icon">
    <path d="M0 0L48 0L48 48L0 48L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
    <g clip-path="url(#mask_1)">
      <path d="M43 11L40 11L40 41L43 41C44.105 41 45 40.105 45 39L45 13C45 11.895 44.105 11 43 11L43 11Z" id="Shape" fill="url(#gradient_1)" stroke="none" />
      <path d="M41 39L41 9C41 7.895 40.105 7 39 7L5 7C3.895 7 3 7.895 3 9L3 39C3 40.105 3.895 41 5 41L43 41C41.895 41 41 40.105 41 39L41 39Z" id="Shape" fill="#5286FF" stroke="none" />
      <path d="M37 17L7 17C6.448 17 6 16.552 6 16L6 14C6 13.448 6.448 13 7 13L37 13C37.552 13 38 13.448 38 14L38 16C38 16.552 37.552 17 37 17L37 17Z" id="Shape" fill="#FFFFFF" stroke="none" />
      <path d="M19 36L7 36C6.448 36 6 35.552 6 35L6 22C6 21.448 6.448 21 7 21L19 21C19.552 21 20 21.448 20 22L20 35C20 35.552 19.552 36 19 36L19 36Z" id="Shape" fill="#FFFFFF" stroke="none" />
      <path d="M38 24L24 24L24 22C24 21.448 24.448 21 25 21L37 21C37.552 21 38 21.448 38 22L38 24L38 24Z" id="Shape" fill="#FFFFFF" stroke="none" />
      <path d="M24 24L38 24L38 27L24 27L24 24Z" id="Rectangle" fill="#E6EEFF" fill-rule="evenodd" stroke="none" />
      <path d="M24 27L38 27L38 30L24 30L24 27Z" id="Rectangle" fill="#CCDCFF" fill-rule="evenodd" stroke="none" />
      <path d="M24 30L38 30L38 33L24 33L24 30Z" id="Rectangle" fill="#B3CBFF" fill-rule="evenodd" stroke="none" />
      <path d="M37 36L25 36C24.448 36 24 35.552 24 35L24 33L38 33L38 35C38 35.552 37.552 36 37 36L37 36Z" id="Shape" fill="#9ABAFF" stroke="none" />
    </g>
  </g>
</svg>
<span class="trending_title">Trending news</span>
                      </a>
                    </div>

                    <!--Chats -->
                    <div class="chat_box">
                      <a href="#" onclick="openComms(event, 'studDiscord')" class="comms-btn chat_box-btn">
                        <?xml version="1.0" encoding="utf-8"?>
<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_101" />
  </defs>
  <use xlink:href="#img_101" fill="#FFFFFF" stroke="none" transform="scale(0.25 0.25)" />
</svg>
<span class="chat-title">Chats</span>
                      </a>
                    </div>
                  </div>

                  <!-- trending news box-->
                  <div id="stuNews" class="stuComms news">
                    <div class="newTopic-signal">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
<defs>
  <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_102" />
</defs>
<use xlink:href="#img_102" fill="#FFFFFF" stroke="none" transform="scale(0.25 0.25)" />
</svg>
<span class="newTopic-title">New Topics</span>
                    </div>
                    <article class="newTopic">
                      
                      <section class="sec_one">
                        <h2>Petty cash to be saved for bi-annual trips.

                        </h2>
                        <p class="">People from various departments have been talking about petty cash and how it can be used for meaningful, or well put, memorable usage. Yes! I know what you are thinking. And luckily you are not alone. Everyone has ideas. We were hoping to schedule a meeting here on discord, on Friday afternoon, say what we feel about this. As usual if you are not around please do not complain later. We expect to have a unanimous decision from all departments. You want pancakes for breakfast, a cold cocktail in the afternoon, presents, t-shirts, trips, parties - these are all possibilities we have heard around. Now, think about it, make sure your decision wins!</p>
                      </section>
                      <section class="sec_two">
                        <h2>New mandate on employee fingerprint authentication</h2>
                        <p class="">You have probably noticed it already; technology is all around us and we intend to join this wave. We have installed multiple systems in all departments, basically improving job performance and increasing job satisfaction. Now we thought of fingerprint authentications. This is still a debatable issue and we wish to receive your input as well. We installed the system fully in the administration block, for simulation purposes. As long as you are an employee of this company, your records are registered in the database and the system will easily recognize you. Therefore, most have encountered this powerful technology already. Do you like it? Tell us in the comments section.</p>
                      </section>
                      <section class="sec_three">
                        <h2 class="">Health Clinic, Monday 12th</h2>
                        <p class="">CPS Hopsital has continuously provided services to over 10 million Kenyans and over 50 million around Africa. With the use of latest technology, and expert physicians, we continue to excel in this area. As a branch of CPS, we will receive physicians on Monday 12th <em>Coming Monday</em></p>, for checkups in the following areas. <a href="" class="eye">Eye checkup</a>, <a href="" class="ear">ear checkups</a>, <a href="" class="r-lab">routine lab checks</a>, <a href="" class="dental">dental checkups</a>, and <a href="" class="gen-body">general body checks.</a> You can bring your family members if want to, as the services are a community thing. Consider this as one way the CPS are giving back to the community and as part of this great family we would like you to take part. So bring a friend, or two. 
                      </section>
                    </article>
                  </div>


                  <!--START CHAT SYSTEM-->
                   <!--chats section - discord-->
                      <div id="studDiscord" class="stuComms discord" >
          <div class="your-contacts">
            <div class="recent-box cont-box">
              <P class="favs-contacts coms-cont">Recent</P>
              <ul class="favs">
               <li>
                   <div class="userChatProf"> 
                       <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                       <span class="userChatName">John</span>
                  </div>
                  <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                      <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                          <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                            <stop offset="0%" stop-color="#9DFFCE" />
                            <stop offset="100%" stop-color="#50D18D" />
                          </linearGradient>
                          <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                            <stop offset="82.4%" stop-color="#135D36" />
                            <stop offset="93.09999%" stop-color="#125933" />
                            <stop offset="100%" stop-color="#11522F" />
                          </linearGradient>
                          <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                          <clipPath id="mask_107">
                            <use xlink:href="#path_144" />
                          </clipPath>
                        </defs>
                        <g id="Checked-icon">
                          <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                          <g clip-path="url(#mask_107)">
                            <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                            <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                          </g>
                        </g>
                      </svg> 
                  </span>
              </li>
    
              <li>
                  <div class="userChatProf"> 
                      <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                      <span class="userChatName">Hellen</span>
                 </div>
                 <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                     <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                       <defs>
                         <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                           <stop offset="0%" stop-color="#9DFFCE" />
                           <stop offset="100%" stop-color="#50D18D" />
                         </linearGradient>
                         <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                           <stop offset="82.4%" stop-color="#135D36" />
                           <stop offset="93.09999%" stop-color="#125933" />
                           <stop offset="100%" stop-color="#11522F" />
                         </linearGradient>
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                         <clipPath id="mask_107">
                           <use xlink:href="#path_144" />
                         </clipPath>
                       </defs>
                       <g id="Checked-icon">
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                         <g clip-path="url(#mask_107)">
                           <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                           <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                         </g>
                       </g>
                     </svg> 
                 </span>
             </li>
    
              <li>
              <div class="userChatProf"> 
                  <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                  <span class="userChatName">Maria</span>
             </div>
             <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                 <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                   <defs>
                     <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                       <stop offset="0%" stop-color="#9DFFCE" />
                       <stop offset="100%" stop-color="#50D18D" />
                     </linearGradient>
                     <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                       <stop offset="82.4%" stop-color="#135D36" />
                       <stop offset="93.09999%" stop-color="#125933" />
                       <stop offset="100%" stop-color="#11522F" />
                     </linearGradient>
                     <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                     <clipPath id="mask_107">
                       <use xlink:href="#path_144" />
                     </clipPath>
                   </defs>
                   <g id="Checked-icon">
                     <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                     <g clip-path="url(#mask_107)">
                       <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                       <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                     </g>
                   </g>
                 </svg> 
             </span>
              </li>
              
              <li>
                  <div class="userChatProf"> 
                      <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                      <span class="userChatName">Job</span>
                 </div>
                 <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                     <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                       <defs>
                         <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                           <stop offset="0%" stop-color="#9DFFCE" />
                           <stop offset="100%" stop-color="#50D18D" />
                         </linearGradient>
                         <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                           <stop offset="82.4%" stop-color="#135D36" />
                           <stop offset="93.09999%" stop-color="#125933" />
                           <stop offset="100%" stop-color="#11522F" />
                         </linearGradient>
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                         <clipPath id="mask_107">
                           <use xlink:href="#path_144" />
                         </clipPath>
                       </defs>
                       <g id="Checked-icon">
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                         <g clip-path="url(#mask_107)">
                           <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                           <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                         </g>
                       </g>
                     </svg> 
                 </span>
              </li>
    
              <li>
                  <div class="userChatProf"> 
                      <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                      <span class="userChatName">Hostev</span>
                 </div>
                 <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                     <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                       <defs>
                         <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                           <stop offset="0%" stop-color="#9DFFCE" />
                           <stop offset="100%" stop-color="#50D18D" />
                         </linearGradient>
                         <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                           <stop offset="82.4%" stop-color="#135D36" />
                           <stop offset="93.09999%" stop-color="#125933" />
                           <stop offset="100%" stop-color="#11522F" />
                         </linearGradient>
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                         <clipPath id="mask_107">
                           <use xlink:href="#path_144" />
                         </clipPath>
                       </defs>
                       <g id="Checked-icon">
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                         <g clip-path="url(#mask_107)">
                           <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                           <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                         </g>
                       </g>
                     </svg> 
                 </span>
              </li>
    
              <li>
                  <div class="userChatProf"> 
                      <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                      <span class="userChatName">Lin</span>
                 </div>
                 <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                     <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                       <defs>
                         <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                           <stop offset="0%" stop-color="#9DFFCE" />
                           <stop offset="100%" stop-color="#50D18D" />
                         </linearGradient>
                         <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                           <stop offset="82.4%" stop-color="#135D36" />
                           <stop offset="93.09999%" stop-color="#125933" />
                           <stop offset="100%" stop-color="#11522F" />
                         </linearGradient>
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                         <clipPath id="mask_107">
                           <use xlink:href="#path_144" />
                         </clipPath>
                       </defs>
                       <g id="Checked-icon">
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                         <g clip-path="url(#mask_107)">
                           <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                           <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                         </g>
                       </g>
                     </svg> 
                 </span>
              </li>
    
              <li>
                  <div class="userChatProf"> 
                      <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                      <span class="userChatName">Ola</span>
                 </div>
                 <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                     <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                       <defs>
                         <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                           <stop offset="0%" stop-color="#9DFFCE" />
                           <stop offset="100%" stop-color="#50D18D" />
                         </linearGradient>
                         <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                           <stop offset="82.4%" stop-color="#135D36" />
                           <stop offset="93.09999%" stop-color="#125933" />
                           <stop offset="100%" stop-color="#11522F" />
                         </linearGradient>
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                         <clipPath id="mask_107">
                           <use xlink:href="#path_144" />
                         </clipPath>
                       </defs>
                       <g id="Checked-icon">
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                         <g clip-path="url(#mask_107)">
                           <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                           <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                         </g>
                       </g>
                     </svg> 
                 </span>
             </li>
    
              <li>
              <div class="userChatProf"> 
                  <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                  <span class="userChatName">Melanie</span>
             </div>
             <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                 <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                   <defs>
                     <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                       <stop offset="0%" stop-color="#9DFFCE" />
                       <stop offset="100%" stop-color="#50D18D" />
                     </linearGradient>
                     <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                       <stop offset="82.4%" stop-color="#135D36" />
                       <stop offset="93.09999%" stop-color="#125933" />
                       <stop offset="100%" stop-color="#11522F" />
                     </linearGradient>
                     <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                     <clipPath id="mask_107">
                       <use xlink:href="#path_144" />
                     </clipPath>
                   </defs>
                   <g id="Checked-icon">
                     <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                     <g clip-path="url(#mask_107)">
                       <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                       <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                     </g>
                   </g>
                 </svg> 
             </span>
              </li>
                
              </ul>
            </div>
            <div class="other-contacts cont-box">
              <P class="other-contacts coms-cont">Other</P>
              <ul class="favs">
              <li>
                  <div class="userChatProf"> 
                      <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                      <span class="userChatName">John</span>
                 </div>
                 <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                     <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                       <defs>
                         <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                           <stop offset="0%" stop-color="#9DFFCE" />
                           <stop offset="100%" stop-color="#50D18D" />
                         </linearGradient>
                         <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                           <stop offset="82.4%" stop-color="#135D36" />
                           <stop offset="93.09999%" stop-color="#125933" />
                           <stop offset="100%" stop-color="#11522F" />
                         </linearGradient>
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                         <clipPath id="mask_107">
                           <use xlink:href="#path_144" />
                         </clipPath>
                       </defs>
                       <g id="Checked-icon">
                         <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                         <g clip-path="url(#mask_107)">
                           <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                           <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                         </g>
                       </g>
                     </svg> 
                 </span>
             </li>
    
             <li>
                 <div class="userChatProf"> 
                     <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                     <span class="userChatName">Hellen</span>
                </div>
                <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                          <stop offset="0%" stop-color="#9DFFCE" />
                          <stop offset="100%" stop-color="#50D18D" />
                        </linearGradient>
                        <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                          <stop offset="82.4%" stop-color="#135D36" />
                          <stop offset="93.09999%" stop-color="#125933" />
                          <stop offset="100%" stop-color="#11522F" />
                        </linearGradient>
                        <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                        <clipPath id="mask_107">
                          <use xlink:href="#path_144" />
                        </clipPath>
                      </defs>
                      <g id="Checked-icon">
                        <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                        <g clip-path="url(#mask_107)">
                          <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                          <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                        </g>
                      </g>
                    </svg> 
                </span>
            </li>
    
             <li>
             <div class="userChatProf"> 
                 <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                 <span class="userChatName">Maria</span>
            </div>
            <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                  <defs>
                    <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                      <stop offset="0%" stop-color="#9DFFCE" />
                      <stop offset="100%" stop-color="#50D18D" />
                    </linearGradient>
                    <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                      <stop offset="82.4%" stop-color="#135D36" />
                      <stop offset="93.09999%" stop-color="#125933" />
                      <stop offset="100%" stop-color="#11522F" />
                    </linearGradient>
                    <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                    <clipPath id="mask_107">
                      <use xlink:href="#path_144" />
                    </clipPath>
                  </defs>
                  <g id="Checked-icon">
                    <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                    <g clip-path="url(#mask_107)">
                      <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                      <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                    </g>
                  </g>
                </svg> 
            </span>
             </li>
             
             <li>
                 <div class="userChatProf"> 
                     <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                     <span class="userChatName">Job</span>
                </div>
                <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                          <stop offset="0%" stop-color="#9DFFCE" />
                          <stop offset="100%" stop-color="#50D18D" />
                        </linearGradient>
                        <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                          <stop offset="82.4%" stop-color="#135D36" />
                          <stop offset="93.09999%" stop-color="#125933" />
                          <stop offset="100%" stop-color="#11522F" />
                        </linearGradient>
                        <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                        <clipPath id="mask_107">
                          <use xlink:href="#path_144" />
                        </clipPath>
                      </defs>
                      <g id="Checked-icon">
                        <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                        <g clip-path="url(#mask_107)">
                          <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                          <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                        </g>
                      </g>
                    </svg> 
                </span>
             </li>
    
             <li>
                 <div class="userChatProf"> 
                     <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                     <span class="userChatName">Hostev</span>
                </div>
                <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                          <stop offset="0%" stop-color="#9DFFCE" />
                          <stop offset="100%" stop-color="#50D18D" />
                        </linearGradient>
                        <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                          <stop offset="82.4%" stop-color="#135D36" />
                          <stop offset="93.09999%" stop-color="#125933" />
                          <stop offset="100%" stop-color="#11522F" />
                        </linearGradient>
                        <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                        <clipPath id="mask_107">
                          <use xlink:href="#path_144" />
                        </clipPath>
                      </defs>
                      <g id="Checked-icon">
                        <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                        <g clip-path="url(#mask_107)">
                          <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                          <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                        </g>
                      </g>
                    </svg> 
                </span>
             </li>
    
             <li>
                 <div class="userChatProf"> 
                     <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                     <span class="userChatName">Lin</span>
                </div>
                <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                          <stop offset="0%" stop-color="#9DFFCE" />
                          <stop offset="100%" stop-color="#50D18D" />
                        </linearGradient>
                        <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                          <stop offset="82.4%" stop-color="#135D36" />
                          <stop offset="93.09999%" stop-color="#125933" />
                          <stop offset="100%" stop-color="#11522F" />
                        </linearGradient>
                        <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                        <clipPath id="mask_107">
                          <use xlink:href="#path_144" />
                        </clipPath>
                      </defs>
                      <g id="Checked-icon">
                        <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                        <g clip-path="url(#mask_107)">
                          <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                          <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                        </g>
                      </g>
                    </svg> 
                </span>
             </li>
    
             <li>
                 <div class="userChatProf"> 
                     <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                     <span class="userChatName">Ola</span>
                </div>
                <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                          <stop offset="0%" stop-color="#9DFFCE" />
                          <stop offset="100%" stop-color="#50D18D" />
                        </linearGradient>
                        <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                          <stop offset="82.4%" stop-color="#135D36" />
                          <stop offset="93.09999%" stop-color="#125933" />
                          <stop offset="100%" stop-color="#11522F" />
                        </linearGradient>
                        <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                        <clipPath id="mask_107">
                          <use xlink:href="#path_144" />
                        </clipPath>
                      </defs>
                      <g id="Checked-icon">
                        <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                        <g clip-path="url(#mask_107)">
                          <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                          <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                        </g>
                      </g>
                    </svg> 
                </span>
            </li>
    
             <li>
             <div class="userChatProf"> 
                 <img src="./images/Denis-Profile.JPG" width="25" alt="" class="user-chat_prof">
                 <span class="userChatName">Melanie</span>
            </div>
            <span class="o-status"><?xml version="1.0" encoding="utf-8"?>
                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                  <defs>
                    <linearGradient x1="0.14644998" y1="0.14644998" x2="0.85354996" y2="0.85354996" id="gradient_108">
                      <stop offset="0%" stop-color="#9DFFCE" />
                      <stop offset="100%" stop-color="#50D18D" />
                    </linearGradient>
                    <linearGradient x1="1.090765E-05" y1="0.5" x2="0.999989" y2="0.5" id="gradient_208">
                      <stop offset="82.4%" stop-color="#135D36" />
                      <stop offset="93.09999%" stop-color="#125933" />
                      <stop offset="100%" stop-color="#11522F" />
                    </linearGradient>
                    <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_144" />
                    <clipPath id="mask_107">
                      <use xlink:href="#path_144" />
                    </clipPath>
                  </defs>
                  <g id="Checked-icon">
                    <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
                    <g clip-path="url(#mask_107)">
                      <path d="M22 12C22 17.5225 17.5225 22 12 22C6.4775 22 2 17.5225 2 12C2 6.4775 6.4775 2 12 2C17.5225 2 22 6.4775 22 12L22 12Z" id="Shape" fill="url(#gradient_108)" stroke="none" />
                      <path d="M10.6465 16.3535L6.6465 12.3535C6.451 12.158 6.451 11.8415 6.6465 11.6465L7.3535 10.9395C7.549 10.744 7.8655 10.744 8.0605 10.9395L11 13.879L16.4395 8.4395C16.635 8.244 16.9515 8.244 17.1465 8.4395L17.8535 9.1465C18.049 9.342 18.049 9.6585 17.8535 9.8535L11.3535 16.3535C11.1585 16.549 10.8415 16.549 10.6465 16.3535L10.6465 16.3535Z" id="Shape" fill="url(#gradient_208)" stroke="none" />
                    </g>
                  </g>
                </svg> 
            </span>
             </li>
              </ul>
            </div>
          </div>
    
          <div class="chat-room">
            <div class="chatroom-holder">
              <div class="current_message_contact">
                <img src="./images/Denis-Profile.JPG" width="50" class="img_c_user" alt="currentUserProfile" srcset="">
                <p class="current_user_data">+254719444041</p>
                <div class="message_actions">
                  <abbr title="Call"><?xml version="1.0" encoding="utf-8"?>
                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                      <defs>
                        <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1010" />
                      </defs>
                      <use xlink:href="#img_1010" fill="#FFFFFF" stroke="none" transform="scale(0.25 0.25)" />
                    </svg></abbr>
                    <abbr title="Video call"><?xml version="1.0" encoding="utf-8"?>
                      <svg width="24px" height="24px" viewBox="0 0 14 14" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                          <image width="96" height="96" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABHNCSVQICAgIfAhkiAAABVVJREFUeJztnE1oXFUUx/93Yk1HiFKotGpWogslkJXSKu5S7F4QRFBUUHHlqBQVhFlk41cn3YlFdCUuFAQVWsxWM7iuuBRqrFSDSYh2jDHvuMjHzLz78e55976v4fyGS2beO/e8+/73vHPmfWQAQRAEQRAEQRAEQRAEQRAEQRAEQRAEYVJRpoX3f/PSyX8G/16EwikCjpc9qCDI+iH1aQ9FWIPCylE19cJPj334W5FDM6FNwH1fPH/HNpIfCJgtezDeMEX28aWA1VtmMP/j2Y/+DBgZm1Z6wTbo3VqITweNxhoRYfyFseb2ZWj7BgSa/XsL5wvcIyM3pRcQaKGULRcQxcFGRGe5mw5FmwAAJ6J5t4jMFtirk79XspvG23dPTBPgTx2jeN8s1yTn7BVC9gSUKjLDY0yRC9K92+22ljYun0+AJxQwUMDLG0srX47a6BNAjUgVPP/lBzZu65xa6K1f7hFobjgE9T4A9wSE69esKI49N8dee2gu+S/pUYIFPWPQ3Wl7cwqqPIot24gpcv6BGTn5xiO3D27svL27kzwNw9d7G4YUpL1xU9copgCHDGY7p9tbCXUGN3ZeJ2CG299wBJiFqafIEQVmutorsJee2kpokYC78m5WrwGsgTQoip2nybytDAss5kKH5XEeMAlRzBfZhKvA5sWegnL4t+9/0VE8XOm9JcaQjp97+M6d7d1FboH1wVGEzTQpVYSeKc52Trf/SujNne3dVwloc735YExBjUoVMY33V8cqsD4YinAEoWsUxaZVLpcxC6wP+S/GNVhkp+cE35Z57cI+ARkFr2qBc7lNO6rgGlEaSxFudhRHdFI4pjtidusCCl7VUUzWD+XA/hrqbVyTKNa6Zi8olYwiXFIUBzqpu8gu3BfjoqXRolNFzNkrl8CLcYe9xv4EeOAsCHBuMqlmJhjnAc2P4qpEduG8J8ylMVFco3lgnwm7NY15iNhMvIwaQ/ZN+bqmiiCRyfmxTJxnwrmoTaqwi1ynA8TvnjBj9dCs2iiuk8gucj6WMgFRHHqkR8J5KaLRUUzam1ridzFugkWuep4CL8ZZOtUoVfgLXOsz4UmI4nqmIq/HUmoTxZlumNuowZxoz7gc/jsWhi2TQ2MyNw8vLhdjK+FqNqfZ5geLVAtnFNQVn92Ogf9DRpkCRxKZIzDTfLhKfwF7A9ns9Zc7xx6dbyk8o4BfPdXJjT4BBUVxbpFzRLFJYMLoYNy+ut1usrHU/2Smpe5tAYsKGGTufE7Yj9mFRzFTZKupPYo5B5CL1d7KYONC/60j01P3KOBjAAnfixu9Boy2ClJFZhTHFNm4gzpr73x3bfNC/9mpI615pbDM3IoTQwo6aBGjmCFypsARRKbDf/jmuV5/7/srm0v9MzELtSEFhUfxuGnRqcIQxQEi+xCzUDuOAEMzmoUVPC9cAls2Yfdlau4UZCJWoXYW4cZGsUvkyMdEaKE2FOFJiGJ/bx412Iu8hdqdgljUM4rTcxNLcBuuQq2An9P2zPMAl8g5DpISRNa72XyHp6NRDgq1gvoASv2uoK4qpV5J22k/2HTi4uPGIefC2JHvjdjdMowdq/948XPjr4gVBf+nCrw6FC2yhyFzCAVkIy9M9wOuY/R3cyIJDHBzbv4o9utC2lsFdZ3vNQytBihSy+UUPI9czEzVutnISxuQyRddsu5cQWgTcPOUOgfQqq2DU2CWyBmruSIbB+X2lWK1fet0x8syItoE/PLcZ9faNP0gkfoKpNayv7ZVGcXEEdiIgloD1NfqaOuBq09+up7fkyAIgiAIgiAIgiAIgiAIgiAIgiAIgiCM8z91IbMeNj2WqgAAAABJRU5ErkJggg==" id="img_1290" />
                        </defs>
                        <use xlink:href="#img_1290" fill="#FFFFFF" stroke="none" transform="scale(0.14583333 0.14583333)" />
                      </svg></abbr>
                </div>
              </div>
              <div class="message-container">
                <!--container holds chats from user and other users - message boxex--> 
              <div class="message-box_1 msg_box">
                <p class="secondary_mesg">Hey, wanna grab a drink?</p>
              </div>
              <div class="message-box_2-1 msg_box">
                <p class="primary_mesg">Next week on friday maybe?</p>
              </div><br><br><br>
              <div class="message-box_2-2 msg_box">
                <p class="primary_mesg">You look great btw :-)</p>
              </div><br><br><br>
              <div class="message-box_1-2 msg_box">
                <p class="secondary_mesg">Thank you! What color is my dress?</p>
              </div><br>
              <div class="message-box_2-3 msg_box">
                <p class="primary_mesg">blue</p>
              </div><br><br><br>
              </div>
              <form method="post" action="discord.php" class="chat-actions">
                <!--add action btn - add picture, video, file, etc-->
                <label for="msg-file">
                  <?xml version="1.0" encoding="utf-8"?>
    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
    <defs>
    <path d="M0 0L24 0L24 24L0 24L0 0Z" id="path_101" />
    <clipPath id="mask_103">
    <use xlink:href="#path_101" />
    </clipPath>
    </defs>
    <g id="Plus-icon">
    <path d="M0 0L24 0L24 24L0 24L0 0Z" id="Background" fill="none" fill-rule="evenodd" stroke="none" />
    <g clip-path="url(#mask_103)">
    <path d="M12 0.960007C5.90845 0.960007 0.959991 5.90847 0.959991 12C0.959991 18.0915 5.90845 23.04 12 23.04C18.0915 23.04 23.04 18.0915 23.04 12C23.04 5.90847 18.0915 0.960007 12 0.960007L12 0.960007ZM12 1.92001C17.5727 1.92001 22.08 6.4273 22.08 12C22.08 17.5727 17.5727 22.08 12 22.08C6.42727 22.08 1.91998 17.5727 1.91998 12C1.91998 6.4273 6.42727 1.92001 12 1.92001L12 1.92001ZM11.52 6.24001L11.52 11.52L6.23999 11.52L6.23999 12.48L11.52 12.48L11.52 17.76L12.48 17.76L12.48 12.48L17.76 12.48L17.76 11.52L12.48 11.52L12.48 6.24001L11.52 6.24001L11.52 6.24001Z" id="Shape" fill="#FFFFFF" fill-rule="evenodd" stroke="none" />
    </g>
    </g>
    </svg>
                </label>
                <input type="file" name="msg-file" id="msg-file" style="display: none;">
          <!--where user writes -->
              <input type="text" class="chatting-box" placeholder="Write here ...">
    
              <!--send btn-->
              <label for="dis-btn">
                <?xml version="1.0" encoding="utf-8"?>
    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
    <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_123" />
    </defs>
    <use xlink:href="#img_123" fill="#FFFFFF" stroke="none" transform="scale(0.25 0.25)" />
    </svg>
              </label>
              <button type="submit" id="dis-btn" name="dis-btn" style="display: none;">
                
              </button>
    
            </form>
    
            </div>
            
          </div>
                       </div>
                </div>

                <!--LEARNER programs-->
                <div id="employees" class="holdwrap emprog_settings">
                  <div class="programs">
                    <a href="#" id="openmainSection" onclick="openSection(event, 'lgames')" class="sectioncoms games-box prog-box">Games</a>
                    <a href="#" class="welfare-box prog-box" onclick="openSection(event, 'lwelfare')" class="sectioncoms">Welfare</a>
                    <a href="#" class="health prog-box" onclick="openSection(event, 'lclubs')" class="sectioncoms">Clubs</a>
                  </div>
                  <!--These tabs open when the buttons above are clicked - they contain games, welfare, and clubs-->
                  <!--TAB FOR GAMES-->
                  <div id="lgames" class="program-items">
                    <a href="" class="previous-scores prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1111" />
  </defs>
  <use xlink:href="#img_1111" fill="#FFFFFF" stroke="none" />
</svg>
                      Previous Scores</a>
                    <a href="#" class="info prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1113" />
  </defs>
  <use xlink:href="#img_1113" fill="#FFFFFF" stroke="none" />
</svg>
                      Announcements</a>
                    <a href="#" class="incoming-games prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1114" />
  </defs>
  <use xlink:href="#img_1114" fill="#FFFFFF" stroke="none" />
</svg>
                      Coming games</a>
                    <a href="#" class="teams prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1115" />
  </defs>
  <use xlink:href="#img_1115" fill="#FFFFFF" stroke="none" />
</svg>
                      Teams</a>
                    <a href="#" class="prizes prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1112" />
  </defs>
  <use xlink:href="#img_1112" fill="#FFFFFF" stroke="none" />
</svg>
                      Prizes</a>
                    <a href="#" class="coaches prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1116" />
  </defs>
  <use xlink:href="#img_1116" fill="#FFFFFF" stroke="none" />
</svg>
                      Coaches</a>
                  </div>

                  <!--TAB FOR WELFARE-->
                  <div id="lwelfare" class="program-items">
                    <a href="" class="previous-scores prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1111" />
  </defs>
  <use xlink:href="#img_1111" fill="#FFFFFF" stroke="none" />
</svg>
                      Previous Welfare</a>
                    <a href="#" class="info prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1113" />
  </defs>
  <use xlink:href="#img_1113" fill="#FFFFFF" stroke="none" />
</svg>
                      Welfare Announcements</a>
                    <a href="#" class="incoming-games prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1114" />
  </defs>
  <use xlink:href="#img_1114" fill="#FFFFFF" stroke="none" />
</svg>
                      Coming welfare</a>
                    <a href="#" class="teams prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1115" />
  </defs>
  <use xlink:href="#img_1115" fill="#FFFFFF" stroke="none" />
</svg>
                      Welfare</a>
                    <a href="#" class="prizes prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1112" />
  </defs>
  <use xlink:href="#img_1112" fill="#FFFFFF" stroke="none" />
</svg>
                      Wlfare Prizes</a>
                    <a href="#" class="coaches prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1116" />
  </defs>
  <use xlink:href="#img_1116" fill="#FFFFFF" stroke="none" />
</svg>
                      Welfare Coaches</a>
                  </div>
                  
                  <!--TAB FOR CLUBS-->
                  <div id="lclubs" class="program-items">
                    <a href="" class="previous-scores prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1111" />
  </defs>
  <use xlink:href="#img_1111" fill="#FFFFFF" stroke="none" />
</svg>
                      Previous clubs</a>
                    <a href="#" class="info prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1113" />
  </defs>
  <use xlink:href="#img_1113" fill="#FFFFFF" stroke="none" />
</svg>
                      Club Announcements</a>
                    <a href="#" class="incoming-games prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1114" />
  </defs>
  <use xlink:href="#img_1114" fill="#FFFFFF" stroke="none" />
</svg>
                      Coming clubs</a>
                    <a href="#" class="teams prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1115" />
  </defs>
  <use xlink:href="#img_1115" fill="#FFFFFF" stroke="none" />
</svg>
                      Club Teams</a>
                    <a href="#" class="prizes prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1112" />
  </defs>
  <use xlink:href="#img_1112" fill="#FFFFFF" stroke="none" />
</svg>
                      Club Prizes</a>
                    <a href="#" class="coaches prog_box">
                      <?xml version="1.0" encoding="utf-8"?>
<svg width="96px" height="96px" viewBox="0 0 96 96" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <image width="96" height="96" xlink:href="data:image/png;base64,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" id="img_1116" />
  </defs>
  <use xlink:href="#img_1116" fill="#FFFFFF" stroke="none" />
</svg>
                      Club Coaches</a>
                  </div>
                 

                  </div>

                  <!--Help-->
                  <div id="help" class="holdwrap help_page">
                    <h2 class="faq">FAQ</h2>
                    <section class="faq-questions">
                        <ol>
                           <li>
                               <details>
                                   <summary>What is the relevance of this system?</summary>
                                   <p class="">CPS payment monitoring system has your personal information, including profile, job description, payment methods and hobbies. The information helps us to know our staffs, and provide them with a way to manage this information and especially their payments. Consider this as a shelf where you can store and sort everything about your job or work.</p>
                               </details>
                           </li>

                            <li>
                                <details>
                                    <summary>Does my profile name have to match my payment method name?</summary>
                                   <p>Yes. Your profile name and the name used on your specified payment method must be similar. The system will automatically decline your payment method, if the name is different from that of your profile.</p>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>Problem with my payment processing</summary>
                                    <p class="">Several reasons:<br> &num; System registered name and payment name do not match. Consider requesting for a name change.<br>&num; Incorrect or expired payment card, method, details. Consider recheking payment methods validity and details;  <br> &num; If you are still facing the issue, <a href="#" class="agent">Talk to an Agent</a> </p>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>Do I have to fill the job description and profile?</summary>
                                    <p class="">Once you update your name and national id or passport, the system should automatically update the rest of your information. This information is based on the information provided to us by you on registration.</p>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>What happens if I am not able to pay my loan on time?</summary>
                                   <p class="">We will automatically deduct the loaned amount from your monthly pay.</p>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>What is the relevance of the community section?</summary>
                                    <p class="">All work without play makes jack a dull boy. This section holds a community where we can share ideas, talk business, or even about our families. We are a family after all!. We have a news section and a chat system that is secure as every conversation is deleted when the chat is closed. The option to delete is your choice and can be changed in settings.  </p>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>Employee Programs?</summary>
                                    <p class="">Again, all work without play makes Hariet a dull girl. Here you access games, and co-curricular activities among other engagements with your CPS family. CPS is a family and we wish to not only grow you financialy, but also physically and emotionally.</p>
                                </details>
                            </li>
                        </ol>
                    </section>
                    <hr>
                    <div class="more-help">
                       Having an issue?
                       <ul>
                           <li><a href="tel:+254719444041" class="gent">Talk to an Agent?</a></li>
                           <li><a href="#" class="sug">Suggestions</a></li>
                       </ul>
                   </div>
                </div>
                

                <!--End Tabs-->

             </div>
             <footer class="foo_ads"></footer>
         </main>
         <script src="staffdash.js"></script>

     </body>
</html>
