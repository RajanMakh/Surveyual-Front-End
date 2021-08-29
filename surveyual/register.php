<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Surveyual Registration</title>
    <link rel="stylesheet" type="text/css" href="styles/register.css">
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body class="preload">

<div class="container">

    <div class="slideshow" style="background-color: #e5e5e5">
        <h1>Welcome to <span style="color:#14213d;font-weight:bold">SURVEY</span><span style="color:#fca311;font-weight:bold">UAL</span></h1>
        <br>
        <h2>Making visual data collection a whole lot easier!</h2>
        <br>
        <br>
        <br>
        <!-- Icons -->
        <lord-icon
                src="https://cdn.lordicon.com/fgkmrslx.json"
                trigger="loop"
                colors="primary:#14213d,secondary:#fca311"
                style="width:200px;height:200px">
        </lord-icon>
        <lord-icon
                src="https://cdn.lordicon.com/nocovwne.json"
                trigger="loop"
                colors="primary:#14213d,secondary:#fca311"
                style="width:200px;height:200px">
        </lord-icon>
        <lord-icon
                src="https://cdn.lordicon.com/tdxypxgp.json"
                trigger="loop"
                colors="primary:#14213d,secondary:#fca311"
                style="width:200px;height:200px">
        </lord-icon>
    </div>

    <div class="break" style="background-color: #14213d">
    </div>

    <div class="form" style="background-color: #fca311">
        <div class="login">
            <h1>Create An Account</h1>
            <div class="fixed">
                <input style="font-size: 20px" id="username" type="text" placeholder="Username" name="username" required>
                <br>
                <br>
                <input style="font-size: 20px" id="email" type="email" placeholder="Email Address" name="email" required>
                <br>
                <br>
                <input style="font-size: 20px" id="password" type="password" placeholder="Password" name="password" required>
                <br>
                <br>
                <input style="font-size: 20px" id="passwordConfirm" type="password" placeholder="Confirm Password" name="passwordrepeat" required>
                <br>
            </div>
            <br>
            <br>
            <br>
            <button onclick="register()">Register</button>
            <p> <a href="login.php">Already Have An Account?</a></p>
        </div>
    </div>

    <script >
        const register = async () => {
            let username = document.getElementById("username").value ;
            let email = document.getElementById("email").value ;
            let password = document.getElementById("password").value;

            let data = {
                username: username,
                email: email,
                password: password
            };

            let resLogin = await axios.post('http://20.108.35.241/surveyualBackend/system/api/register', data);

            console.log(resLogin.data);

            if(resLogin.data.status === 200) {
                window.location.href = "dashboard.php"
            }

            if(resLogin.data.status === 401) {
                alert("Incorrect Details! Please try again!");
            }
        }
    </script>
</div>


</body>
</html>

