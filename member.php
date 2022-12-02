<?php
if(!isset($_COOKIE['userid'])) {
    header("Location: memberlogin.php");
  } else {
    echo "show: {$_COOKIE['userid']}<br>";
  }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SneakerUp</title>
        <link rel="stylesheet" href="home.css" />
        <script src="home.js" defer></script>
        <script src="./jquery/jquery-3.6.1.min.js"></script>
    </head>
    <body>
        <section id="header">
            <a href="#"><img src="logoipsum-226.svg" class="logo"></a>
            <div>
                <ul id="navbar">
                    <li><a href="home.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="site.html">Site Description</a></li>
                    <li><a href="checklist.html">Checklist</a></li>
                    <li><a href="member.php">Member</a></li>
                </ul>
            </div>
        </section>
        <section id="table">
            <h2>Looking for a shoe thas not here yet? Fill out form to get notified when we get it!</h2>
            <form onsubmit="return(InsertInfo())">
            Name:<input type=text id=email>
            Phone:<input type=text id=phone>
            Shoe:<input type=text id=shoe>
            Size:<input type=text id=size>
            <input type=submit value=submit>
        </form>

        <div id=ShowInfo></div>
        <script>
            function InsertInfo() {
                val = $("#email").val();
                val1 = $("#phone").val();
                val2 = $("#shoe").val();
                val3 = $("#size").val();
                $.get("./memberajax.php",{"cmd": "create", "email": val, "phone": val1, "shoe": val2, "size": val3}, function(data) {
                    $("#ShowInfo").html(data);
                });
                return(false);
            }
            function DeleteInfo(id) {
                $.get("./memberajax.php",{"cmd": "delete", "id" : id}, function(data) {
                    $("#ShowInfo").html(data);
                });
                return(false);
            }
            function ShowInfo() {
                $.get("./memberajax.php",{"cmd": ""}, function(data) {
                    $("#ShowInfo").html(data);
                });
                return(false);
            }
            ShowInfo();
         
        </script>
        </section>    
    </body>
</html>