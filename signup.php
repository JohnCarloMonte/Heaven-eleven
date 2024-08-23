include<connection.php>
include<signup_process.php>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        html {
            font-family: sans-serif;
        }
        body {
            background-color: azure;
            overflow: hidden;
        }
        h1 {
            margin: 0;
            text-align: center;
            padding-top: 20px;
            font-size: 30px;
        }
        h2 {
            margin: 4;
            text-align: center;
        }
        #form {
            position: relative;
            z-index: 2000;
            width: 25%;
            margin: 50px auto;
            padding: 50px;
            box-shadow: 1px 1px;
            border-radius: 2%;
            text-align: center;
        }
        #form input {
            width: 80%;
            height: 30px;
            font-size: 20px;
            margin-bottom: 10px;
        }
        #btn {
            color: rgb(0, 0, 0);
            background-color: #9AC8CD;
            padding: 10px 0px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
            font-size: 16px;
            line-height: 0px;
        }
        #btn1 {
            padding: 10px 0px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
            font-size: 16px;
            line-height: 0px;
        }
        #btn:hover {
            background-color: #7CA6B8;
        }
        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        /* Background waves */
        section {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: #3586ff;
            overflow: hidden;
            z-index: 1000;
        }
        section .air {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url(https://1.bp.blogspot.com/-xQUc-TovqDk/XdxogmMqIRI/AAAAAAAACvI/AizpnE509UMGBcTiLJ58BC6iViPYGYQfQCLcBGAsYHQ/s1600/wave.png);
            background-size: 1000px 100px;
        }
        section .air.air1 {
            animation: wave 30s linear infinite;
            z-index: 1000;
            opacity: 1;
            animation-delay: 0s;
            bottom: 0;
        }
        section .air.air2 {
            animation: wave2 15s linear infinite;
            z-index: 999;
            opacity: 0.5;
            animation-delay: -5s;
            bottom: 10px;
        }
        section .air.air3 {
            animation: wave 30s linear infinite;
            z-index: 998;
            opacity: 0.2;
            animation-delay: -2s;
            bottom: 15px;
        }
        section .air.air4 {
            animation: wave2 5s linear infinite;
            z-index: 997;
            opacity: 0.7;
            animation-delay: -5s;
            bottom: 20px;
        }
        @keyframes wave {
            0% {
                background-position-x: 0px;
            }
            100% {
                background-position-x: 1000px;
            }
        }
        @keyframes wave2 {
            0% {
                background-position-x: 0px;
            }
            100% {
                background-position-x: -1000px;
            }
        }
    </style>
</head>
<body>
    <section>
        <div class='air air1'></div>
        <div class='air air2'></div>
        <div class='air air3'></div>
        <div class='air air4'></div>
    </section>
    <div id="form">
        <h1>Sign Up</h1>
        <br><br>
        <h2>CREATE YOUR ACCOUNT</h2>
        <br>
        <form name="form" action="signup_process.php" method="post">
            <div class="input-container">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="input-container">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <input type="submit" id="btn" value="Sign Up" name="submit">
        </form>
        <div class="button-container">
            <button onclick="window.location.href='index.php'" id="btn1">Back to Login</button>
        </div>
    </div>
</body>
</html>
