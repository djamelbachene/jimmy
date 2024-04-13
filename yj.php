<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NetUnity | Accueil</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .header {
            background-color: #000000;
            color: #ff0000;
            text-align: center;
            padding: 20px 0;
            margin-bottom: 20px;
            flex: 0 0 25%;
            border: 2px solid #ff0000;
        }
        .navbar {
            background-color: #000000;
            padding: 10px 0;
            text-align: center;
            border: 2px solid #ff0000;
        }
        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .navbar li {
            display: inline;
            margin-right: 25px;
        }
        .navbar a {
            text-decoration: none;
            color: #ff0000;
            font-size: 20px;
        }
        .navbar a:hover {
            color: #f2f2f2;
        }
        .content {
            background-color: #000000;
            margin-left: 0%;
            width: 75%;   
        }
        .friends{
            flex: 0 0 25%;
            background-color: #000000;
            color: #ff0000;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 5px;
            width: 20%;
            text-align: center;
            margin-left: 80%;
        }
        .friends_container{
            background-color: #000000;
            width: 20%;
            margin-left: 80%;
            padding-top: 10px;
            border-radius: 1px;   
            text-align: center;
            height: 636px;
        }
        .list_friends ul{
            list-style-type: none;
            margin: -2%;
        }
        .list_friends li{
            border: 1px solid white;
            text-align: center;
            color: white;
            margin-top: 0px;
            width: 106%;
            margin-left: -9%;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .list_friends a{
            color: white;
            font-size: 20px;
            padding: 20px;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>NetUnity</h1>
    </div>
    <div class="navbar">
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#news">News</a></li>
            <li><a href="#profile">Profile</a></li>
        </ul>
    </div>

    <?php
    $HOST = "localhost";
    $admin = "root";
    $password = "";
    $db = "project.db";
    
    $con = mysqli_connect($HOST, $admin, $password, $db);
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $query = "SELECT name FROM emailpass WHERE email='djameledinee@gmail.com'";
    $result = mysqli_query($con, $query);
    
    $name = "Friend"; 
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
    }
    
    mysqli_close($con);
    ?>

    <div class="content">
    </div>
    <div class="friends">
        <h2>Friends</h2>
    </div>
    <div class="friends_container">
        <div class="list_friends">
            <ul>
                <li><a href="#$name"><?php echo $name; ?></a></li>
            </ul>
        </div>
    </div>
</body>
</html>
