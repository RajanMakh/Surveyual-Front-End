<?php

// Gets survey ID from URL
$getSurveyID = $_GET["surveyID"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surveyual Project Response</title>
    <link rel="stylesheet" type="text/css" href="styles/dashboardResponse.css">
    <link rel="stylesheet" type="text/css" href="styles/projectResponse.css">
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
                <button onclick="window.location='register.php';"><span class="surveyual-logo" style="color:#14213d;background-color: #e5e5e5;font-size:20px;font-weight:bold">SURVEY</span><span style="color:#fca311;background-color:#e5e5e5;font-size:20px;font-weight:bold">UAL</span></button>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main_container">

        <div class="projectDetails">
            <br>
            <h1>Welcome to <span class="surveyual-logo" style="color:#14213d;font-weight:bold">SURVEY</span><span style="color:#fca311;font-weight:bold">UAL</span></h1>
            <br>
            <div class="questionInfo">
                <center>
                    <p>You have been invited to take part in this research project!</p>
                </center>
                <br>
                <br>
            </div>

            <div class="projectDetailsForm">
                <center>
                    <form class="details" method="post">

                        <div class="fixed">
                            <h2>Project Details</h2>
                            <br>
                            <h3>Project Title</h3>
                            <p id="title">Title</p>
                            <br>
                            <h3>Project Description</h3>
                            <p id="description">Description</p>
                        </div>
                    </form>
                </center>
            </div>
        </div>

        <div class="questionInfo">
            <h1>Questions</h1>
            <center>
                <br>
                <p>Please fill out the survey questions down below and click "Submit Answers" when you're done! </p>
            </center>
            <br>
        </div>

        <div id="questionContainer">

            <div class=questions>
                <br>
                <center>
                    <br>
                    <h2>Question</h2>
                    <p id="question">Display Question</p>
                    <br>
                    <hr class="new1">
                    <br>
                    <h2>Media</h2>
                    <video width="520" height="440" id="media" src="" poster="images/Thumbnail.jpg" controls></video>
<!--                <img id="media" src="" width="520" height="440">-->
                    <hr class="new1">
                    <br>

                    <h2>Answer</h2>
                    <p>Please enter an answer down below</p>
                    <br>
                    <input style="font-size: 20px" type="text" placeholder="Answer" name="answer" id="answer" required>
                    <!-- Hidden Inputs for IDs -->
                    <input type="hidden" name="questionID" id="questionID">
                    <input type="hidden" name="surveyID" id="surveyID">
                    <br>
                    <hr class="new2">
                </center>
            </div>

        </div>

        <div class="submit">
            <center>
                <button onclick="submit()" id="submit" type="submit">Submit Answers</button>
                <br>
                <br>
                <br>

                <script>
                    const submit = async () => {
                        let surveyID = document.getElementById("surveyID").value ;
                        let questionID = document.getElementById("questionID").value ;
                        let answer = document.getElementById("answer").value ;

                        console.log(surveyID);
                        console.log(questionID);
                        console.log(answer);

                        // var data = new FormData();
                        // data.append('surveyID', surveyID);
                        // data.append('questionID', questionID);
                        // data.append('answer', answer);

                        let data = {
                            surveyID: surveyID,
                            questionID: questionID,
                            answer: answer,
                        };

                        console.log(data);

                        let resAdd = await axios.post('http://20.108.35.241/surveyualBackend/system/api/submitAnswers', data );

                        console.log(resAdd.data);

                        // document.getElementById("message").innerHTML = "Success! The Sponsor Has Been Uploaded.";

                            setTimeout(function() {
                                window.location.href = 'submitSuccess.php';
                            }, 5000);

                        document.getElementById("loading").style.visibility = "visible";
                        document.getElementById("message").innerHTML = "Your response is being saved ...";
                    }
                </script>
            </center>

            <script>
                // Gets SurveyID of Project Response
                window.onload = async (event) => {
                    const queryString = window.location.search;
                    console.log(queryString);

                    const urlParams = new URLSearchParams(queryString);

                    const surveyID = urlParams.get('surveyID');
                    console.log(surveyID);

                    let postData = {
                        surveyID: surveyID
                    };

                    // Retrieves questions from api using surveyID
                    let retQuestions = await axios.post('http://20.108.35.241/surveyualBackend/system/api/retrieveQuestions',
                        postData );
                    console.log(retQuestions.data);

                    // Renders data from api using surveyID
                    const retrievedQuestion = retQuestions.data;
                    document.getElementById('title').innerHTML = retrievedQuestion.surveyTitle;
                    document.getElementById('description').innerHTML = retrievedQuestion.surveyDescription;
                    document.getElementById('questionID').value = retrievedQuestion.questionID;
                    document.getElementById('surveyID').value = surveyID;
                    document.getElementById('question').innerHTML = retrievedQuestion.question;
                    document.getElementById('media').src = 'http://20.108.35.241/surveyualBackend/system/' + retrievedQuestion.mediaPath;
                };
            </script>

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

    <div class="footer">
        <footer>
            <p>© Copyrighted by Surveyual 2021 | Developed By Rajan Makh W18013561</p>
        </footer>
    </div>

</div>

</body>
</html>