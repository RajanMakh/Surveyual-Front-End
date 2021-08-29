<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surveyual New Project</title>
    <link rel="stylesheet" type="text/css" href="styles/dashboard.css">
    <link rel="stylesheet" type="text/css" href="styles/newProject.css">
    <link rel="stylesheet" type="text/css" href="styles/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.css" integrity="sha512-3icgkoIO5qm2D4bGSUkPqeQ96LS8+ukJC7Eqhl1H5B2OJMEnFqLmNDxXVmtV/eq5M65tTDkUYS/Q0P4gvZv+yA==" crossorigin="anonymous" />
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
</head>

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

        <div class="projectDetails">
            <br>
            <h1>New Project</h1>
            <br>

            <div class="projectDetailsForm">
                <center>
                    <form class="details" method="post">

                        <div class="fixed">
                            <h2 class="projectInfo">Project Details</h2>

                            <input style="font-size: 20px" type="text" placeholder="Title" name="title" id="title" required>
                            <br>
                            <br>
                            <!--                        <input style="font-size: 20px" type="text" placeholder="Description" name="description" required>-->
                            <textarea style="font-size: 20px" type="text" placeholder="Description" name="description" id="description" rows="4" cols="50" required></textarea>
                        </div>
                    </form>
                </center>
            </div>
        </div>

        <div class="questionInfo">
            <h1>Questions</h1>
            <center>
                <p>Click on the "+" button to insert a question.</p>
            </center>
            <br>
        </div>

        <div id="questionContainer"
            <div class=questions>
                <section id="mainSection">
            </div>

            <div class="submit">
                <center>
                    <button onclick="submit()" type="submit">Submit Project</button>
                    <br>

                    <script>
                        const submit = async () => {
                            let title = document.getElementById("title").value ;
                            let description = document.getElementById("description").value ;
                            let question = document.getElementById("question").value ;
                            const selectedFile = document.getElementById('file').files[0];

                            console.log(title);
                            console.log(description);
                            console.log(question);
                            console.log(selectedFile);

                            var data = new FormData();
                            data.append('title', title);
                            data.append('description', description);
                            data.append('question', question);
                            data.append('file', selectedFile);

                            console.log(data);

                            let resAdd = await axios.post('http://20.108.35.241/surveyualBackend/system/api/submitSurvey', data, {
                                headers: {
                                    "Content-Type": "multipart/form-data; ",
                                },
                            });

                            console.log(resAdd.data);

                            setTimeout(function() {
                                window.location.href = 'surveyLink.php';
                            }, 5000);

                            // document.getElementById("message").innerHTML = "Success! The Project Has Been Created. Your project can be shared using this link: ";
                            document.getElementById("loading").style.visibility = "visible";
                            document.getElementById("message").innerHTML = "Your project is being saved ...";

                        }
                    </script>
                </center>
                <br>
                <br>

                <div id="log"></div>

                <center>
                    <p id="message"></p>
                    <lord-icon
                            id="loading"
                            src="https://cdn.lordicon.com/nocovwne.json"
                            trigger="loop"
                            colors="primary:#14213d,secondary:#fca311"
                            style="width:250px;height:250px">
                    </lord-icon>
                </center>

                <br>

            </div>
        </div>

<!--        <div class="alert">-->
<!--            <h1 id="message"></h1>-->
<!--        </div>-->

        <div class="flBtnCntr">
            <button id="newQuestion" class="flBtnBox big">+</button>
        </div>

        <script>
            document.getElementById("newQuestion").onclick = function() {
                document.getElementById("mainSection").insertAdjacentHTML("beforeend",

                "                <br>\n" +
                "                <center>\n" +

                "                    <div class=\"questionsForm\">\n" +
                "                        <br>\n" +
                "                           <h2>Question</h2>\n" +
                "                           <div>Write a Question</div>\n" +
                "                        <br>\n" +
                "                           <input style=\"font-size: 20px\" type=\"text\" placeholder=\"Question\" name=\"question\" id=\"question\" required>\n" +
                "                        <hr class=\"new1\">\n" +
                "                        <br>\n" +

                "                        <div class=\"upload\">\n" +
                "                           <h2>Media</h2>\n" +

                "                            <div id=\"upload-button\" class=\"button\">Upload Media</div>\n" +
                "                               <br>\n" +
                "                               <div id=\"upload-input\">\n" +
                "                                   <input id=\"file\" name=\"file\" type=\"file\">\n" +
                "                               </div>\n" +
                "                            </div>\n" +
                "                        </div>\n" +
                "                    </div>\n" +

                "                <hr class=\"new2\">\n" +
                "                </center>\n" +
                "                </section>\n");
            };
        </script>

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