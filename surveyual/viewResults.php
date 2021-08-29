<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surveyual Project Results</title>
    <link rel="stylesheet" type="text/css" href="styles/dashboard.css">
    <link rel="stylesheet" type="text/css" href="styles/viewResults.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.css" integrity="sha512-3icgkoIO5qm2D4bGSUkPqeQ96LS8+ukJC7Eqhl1H5B2OJMEnFqLmNDxXVmtV/eq5M65tTDkUYS/Q0P4gvZv+yA==" crossorigin="anonymous" /></head>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
        <h1>Project Results</span></h1>
        <br>

        <br>

        <div class="container">

            <div class="Title">
                <h2>Project Title</h2>
                <p id="projectTitle">Title</p>
            </div>

            <div class="Description">
                <h2>Description</h2>
                <p id="projectDescription">Description</p>
            </div>

            <br>
            <br>
            <br>

        </div>

        <br>

        <div class="container2">

            <div class="Questions">
                <h2>Questions</h2>
                <p id="projectQuestion">Questions</p>
            </div>

            <div class="Answers">
                <h2>Answers</h2>
                <p id="projectAnswers">Answers</p>
            </div>

            <br>
            <br>
            <br>

        </div>

        <br>
        <button onclick="submit()" id="submit" type="submit">View Projects</button>

        <script>
            const submit = async () => {
                window.location.href = 'viewSurveys.php';
            }
        </script>

        <script>
            window.onload = async (event) => {

                // Retrieves survey info from api
                let retAnswers = await axios.post('http://20.108.35.241/surveyualBackend/system/api/retrieveResponses');
                console.log(retAnswers.data);

                // Renders survey data from api
                const retrievedAnswers = retAnswers.data.data[0];
                console.log(retrievedAnswers);
                document.getElementById('projectTitle').innerHTML = retrievedAnswers.surveyTitle;
                document.getElementById('projectDescription').innerHTML = retrievedAnswers.surveyDescription;

                document.getElementById('projectQuestion').innerHTML = retrievedAnswers.question;
                document.getElementById('projectAnswers').innerHTML = retrievedAnswers.answer;
            };
        </script>

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