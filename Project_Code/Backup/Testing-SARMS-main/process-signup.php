<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 4) {
    die("Password must be at least 8 characters");
}


if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO user (name, email, password_hash)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash);
                  
if ($stmt->execute()) {

    header("Location: index.php");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    
    <title>Sign in || Sign up from</title>
     <!-- font awesome icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
* {
    padding: 0px;
    margin: 0px;
    box-sizing: border-box;
}

:root {
    --linear-grad: linear-gradient(to right, #141E30, #243B55);
    --grad-clr1: #141E30;
    --grad-clr2: #243B55;
}

body {
    height: 100vh;
    background: #a5b6ab;
    display: grid;
    place-content: center;
    font-family: 'Poppins', sans-serif;
}
.container{
    position: relative;
    width:850px;
    height:500px;
    background-color: #fff;
    box-shadow: 25px 30px 55px #5557;
    border-radius: 13px;
    overflow: hidden;
}
.form-container{
    position: absolute;
    width:60%;
    height:100%;
    padding:0px 40px;
    transition: all 0.6s ease-in-out;
}
.sign-up-container{
    opacity:0;
    z-index:1;
}
.sign-in-container{
    z-index: 2;
}
form{
    height:100%;
    display:flex;
    flex-direction: column;
    align-items: center;
    padding:0px 50px;
}
h1{
    color:var(--grad-clr1);
    margin-top: 30px;
    padding-top:30px;
    font-size: 1.5rem;
}

span{
    font-size: 12px;
}
.infield{
    position: relative;
    margin: 8px 0px;
    width: 100%;
}
input{
    width:100%;
    padding:12px 8px;
    background-color: #f3f3f3;
     border: none;
     outline:none;
}
label{
    position: absolute;
    left:50%;
    top:100%;
    transform: translateX(-50%);
    width:0%;
    height:2px;
    background: var(--linear-grad);
    transition: 0.3s;
}
input:focus~label{
    width:100%;
}
a{
    color:#333;
    font-size: 14px;
    text-decoration: none;
    margin:15px 0px;
}
a.forgot{
    padding-bottom: 3px;
    border-bottom: 2px solid #eee;
}
button{
    border-radius:20px;
    border:1px solid var(--grad-clr1);
    background: var(--grad-clr2);
    color:#fff;
    font-size: 12px;
    font-weight: bold;
    padding:12px 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
}
.form-container button{
    margin-top: 17px;
    transition: 80ms ease-in;
}
.form-container button:hover{
    background: #fff;
    color:var(--grad-clr1);
}
.overlay-container{
    position: relative;
    top:0;
    left:60%;
    width:40%;
    height:100%;
    overflow: hidden ;
    transition: transform 0.6s ease-in-out;
    z-index: 9;
}
.overlay-container h1{
    font-size: 2rem;
    font-weight: 800;
}
#overlayBtn{
    cursor: pointer;
    position: absolute;
    left:50%;
    top:304px;
    transform: translateX(-50%);
    width:143.67px;
    height:40px;
    border:1px solid #fff;
    background: transparent;
    border-radius: 20px;
    margin-top: 75px;
}
.overlay{
    position: relative;
    background: transparent;
    color:#fff;
    left:-150%;
    height:100%;
    width:250%;
    transition: transform 0.6s ease-in-out;
    
}
.background-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('images/mainbg2.jpg');
    filter: blur(2px);
    background-size: cover;
    z-index: -1;
  }

.overlay-panel{
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0px 40px;
    text-align: center;
    height: 100%;
    width:340px;
    transition: 0.6s ease-in-out;
}
.overlay-left{
    right:60%;
    transform: translateX(-12%);
}
.overlay-right{
    right:0;
    transform: translateX(0%);
}
.overlay-panel h1{
    color: #fff;
} 
p{
    font-size: 14px;
    font-weight: 300;
    line-height: 20px;
    letter-spacing: 0.5px;
}
.overlay-panel button{
    border:none;
    background-color: transparent;
}
.right-panel-active .overlay-container{
    transform: translateX(-150%);
}
.right-panel-active .overlay{
    transform: translateX(50%);
}
.right-panel-active .overlay-left{
    transform:translateX(25%);
}
.right-panel-active .overlay-right{
    transform:translateX(35%);
}
.right-panel-active .sign-in-container{
    transform:translateX(20%);
    opacity:0;
}
.right-panel-active .sign-up-container{
    transform:translateX(66.7%);
    opacity:1;
    z-index: 5;
    animation: show 0.6s;
}
@keyframes show{
    0%, 50%{
        opacity: 0;
        z-index: 1;
    }
    50.1%, 100%{
        opacity: 1;
        z-index: 5;
    }
}
.btnScaled{
    animation: scaleBtn 0.6s;
}
@keyframes scaleBtn{
    0%{
        width:143.67px;
    }
    50%{
        width: 250px;
    }
    100%{
        width:143.67px;
    }
    
}
footer {
    position: absolute;
    left: 50%;
    bottom: 30px;
    transform: translateX(-50%);
}
footer mark {
    padding: 8px 30px;
    border-radius: 7px;
}
footer a {
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    color: #003;
}
</style>
</head>
<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="process-signup.php" method="post" id="signup" novalidate>
                <h1>নতুন একাউন্ট তৈরি করুন</h1>
            
                <div class="infield">
                    
                    <input type="text" placeholder="নাম" id="name" name = "name"/>
                
                </div>
                <div class="infield">
                    
                    <input type="email" placeholder="ইমেইল" id="email" name="email"/>
                </div>
                <div class="infield">
                    
                    <input type="password" placeholder="পাসওয়ার্ড" id="password" name="password"/>
                </div>
                <div class="infield">
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="পুনরায় পাসওয়ার্ড দিন">
                </div>
                <button>রেজিস্ট্রেশন</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            
            <form action="login.php" method="POST">

                <h1>লগইন করুন</h1>
                
                <div class="infield">
                    <input type="email" id="email" name="email" placeholder="ইমেইল"/>
                </div>
                <div class="infield">
                    <input type="password" id="password" name="password" placeholder="পাসওয়ার্ড" /> 
                </div>
                <a href="#" class="forgot">পাসওয়ার্ড ভুলে গিয়েছেন ?</a>
                <button>লগইন</button>
            </form>
        </div>
        <div class="overlay-container" id="overlayCon">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <div class="background-image"></div>
                    <h1>শাবিপ্রবি অটোরিকশা ম্যানেজমেন্ট সিস্টেম<br><br></h1> 
                    <button>লগইন করুন</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <div class="background-image"></div>
                    <h1>শাবিপ্রবি অটোরিকশা ম্যানেজমেন্ট সিস্টেম<br><br></h1>
                    <button>রেজিস্ট্রেশন করুন</button>
                </div>
            </div>
            <button id="overlayBtn"></button>
        </div>
    </div>

    <footer>
        <mark>Learn more on <a href="https://github.com/Sumonta056/SUST-Autorickshaw-Management-System">Github</a></mark>
    </footer>
    
    <!-- js code -->
    <script>
        const container = document.getElementById('container');
        const overlayCon = document.getElementById('overlayCon');
        const overlayBtn = document.getElementById('overlayBtn');

        overlayBtn.addEventListener('click', ()=>{
            container.classList.toggle('right-panel-active');

            overlayBtn.classList.remove('btnScaled');
            window.requestAnimationFrame(()=>{
                overlayBtn.classList.add('btnScaled');
            })
        });
    </script>

</body>
</html>









