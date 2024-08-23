<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
            position: relative;
            height: 100vh;
            overflow: hidden;
        }
        h1 {
            margin: 0;
            font-size: 30px;
        }
        h2 {
            margin: 4;
        }
        #form {
            position: relative;
            z-index: 2000;
            width: 35%;
            top: 120px;
            margin: 0 auto;
            padding: 50px;
            box-shadow: 1px 1px 1px 1px;
            border-radius: 20px;
            text-align: center;
            justify-content: center;
            font-size: 20px;
        }
        #form input {
            width: 70%;
            height: 30px;
            font-size: 20px;
        }
        #btn {
            color: rgb(0, 0, 0);
            background-color: azure;
            padding: 8px 0;
            font-size: large;
            width: 75%;
            margin: auto;
            display: block;
            text-align: center;
            line-height: 0px;
        }
        @media screen and (max-width: 700px) {
            #form {
                width: 65%;
                padding: 40px;
            }
        }
        #form .input-container {
            align-items: center;
            margin-bottom: 10px;
            padding-top: 5px;
        }
        #form .input-container label {
            width: 25%;
        }
        #form .input-container input {
            width: 50%;
            font-size: 20px;
        }
        .button-container {
            margin-top: 20px;
            text-align: center;
        }
        .button-container button {
            background-color: #9AC8CD;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
            font-size: 16px;
        }
        .button-container button:hover {
            background-color: #7CA6B8;
        }

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
        <h1>HEAVEN ELEVEN</h1>
        <h2>INVENTORY SYSTEM</h2>
        <br><br>
        <form name="form" action="login.php" method="POST">
            <div class="input-container">
                <label for="user">Username</label>
                <input type="text" id="user" name="user">
            </div>
            <br>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" id="password" name="pass">
            </div><br>
            <input type="submit" id="btn" value="Login" name="submit">
        </form>
        <div class="button-container">
            <button onclick="window.location.href='signup.php'">Sign up</button>
        </div>
    </div>
</body>
<script>
    window.history.forward();


</script>
</html>
