<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surveyual Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.css" integrity="sha512-3icgkoIO5qm2D4bGSUkPqeQ96LS8+ukJC7Eqhl1H5B2OJMEnFqLmNDxXVmtV/eq5M65tTDkUYS/Q0P4gvZv+yA==" crossorigin="anonymous" /></head>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>

<body>

<div class="wrapper hover_collapse">

    <!-- Navigation Bar -->
    <div class="top_navbar">
        <div class="logo">
            <div class="toggle-menu">
                <button><span class="surveyual-logo" style="color:#14213d;background-color: #e5e5e5;font-size:20px;font-weight:bold">SURVEY</span><span style="color:#fca311;background-color:#e5e5e5;font-size:20px;font-weight:bold">UAL</span></button>
            </div>
        </div>

        <div class="navbar">
            <a href="helpSupport.php">Help & Support</a>
            <a href="aboutUs.php">About Us</a>
            <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-user"></i> Rajan Makh <i class="fa fa-caret-down"></i></button>
                <div class="dropdown-content">
                    <a href="settings.php">Settings</a>
                    <a href="login.php">Log Out</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Side Bar -->
    <div class="sidebar">
        <div class="sidebar_inner">
            <br>
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="newProject.php">
                        <span class="text">New Project</span>
                    </a>
                </li>
                <li>
                    <a href="viewSurveys.php">
                        <span class="text">All Projects</span>
                    </a>
                </li>
                <li>
                    <a href="helpSupport.php">
                        <span class="text">Help & Support</span>
                    </a>
                </li>
                <li>
                    <a href="aboutUs.php">
                        <span class="text">About Us</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main_container">
        <h1>Welcome to <span class="surveyual-logo" style="color:#14213d;font-weight:bold">SURVEY</span><span style="color:#fca311;font-weight:bold">UAL</span></h1>
        <br>

        <div class="dashBtns">
            <center>
            <button onclick="location.href = 'newProject.php';" id="newSurvey" class="dashBtn" >Create New Project</button>
            <button onclick="location.href = 'viewSurveys.php';" id="allSurveys" class="dashBtn" >View All Projects</button>
            <button onclick="location.href = 'helpSupport.php';" id="helpSupport" class="dashBtn" >Help and Support</button>
            <button onclick="location.href = 'aboutUs.php';" id="aboutUs" class="dashBtn" >About Us</button>
            </center>
        </div>

        <div class="info">
            <center>
                <br>
                <br>
                <p>Please select from an option above to get started!</p>
                <br>
                <br>
                <br>
                <lord-icon
                    src="https://cdn.lordicon.com/jvucoldz.json"
                    trigger="hover"
                    colors="primary:#14213d,secondary:#fca311"
                    style="width:150px;height:150px">
                </lord-icon>
            </center>
        </div>
    </div>


</div>

<div class="footer">
    <footer>
        <p>© Copyrighted by Surveyual 2021 | Developed By Rajan Makh W18013561</p>
    </footer>
</div>

<!-- Javascript Side Bar Animation-->
<script src="sidebar.js"></script>


</body>
</html>