<!DOCTYPE html>
<html lang="en">
<head>


    <title>AWS Photo Uploader</title>
    <meta name="description" context="AWS Photo Uploader and Receiver">
    <meta name="author" context="Joshua Piper StuID: 102678001">
    <meta charset="utf-8>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {margin: 0;
        background-image: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('./Images/background.jpg'); background-attachment: fixed; background-size: cover; background-repeat: no-repeat;}
        nav { width: 100%;}
        .menu {margin: 0; width: 100%; overflow: hidden; background-color: gray;
        text-align: center;}
        .menu ul {list-style-type: none; padding: 15px;}
        .menu ul li {display: inline; padding: 20px;}
        .menu ul li a {text-decoration: none;  color: white; padding: 10%; font-weight: bold; letter-spacing: 1px;
        font-size: 150%;}
        .menu ul li a:hover {background-color: darkgray;}

        .header-main {text-decoration: underline; text-align: center;}


        .form {background-color: #c0bfbf;
            border: 10px solid darkgray;
            border-radius: 10px;
        box-sizing: border-box;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        position: absolute;
        text-align: center;
            padding: 30px;

        }


        .form input {padding: 5px; margin: 10px;

        }

        #uploaded-file {
            display: inline;
            float: left;
        }

        #file-selector {
            display: inline;
        }


        form p label {
            display: inline-block;
            text-align: left;
            width: 80px;
        }


.hidden {
    display: none;
}

#submit-button {    
border-radius: 5px;
    border: 0;
    width: 80px;
    height:25px;
    font-family: Tahoma;
    background: #f4f4f4;
	background: -webkit-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
	background: -moz-linear-gradient(top, #f4f4f4 1%, #ededed 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(1%, #f4f4f4), color-stop(100%, #ededed));

    </style>
    <script>
    function displayFileName() {
    var files = $('input[type="file"]')[0].files;
    document.getElementsByClassName('hidden').innerHTML = files.length + " images to upload";`
    }

</script>
</head>

<nav>
    <div class="menu">
        <ul>
            <li><a href="photo_uploader.html">Upload</a></li>
            <li><a href="photo_viewer.html">View</a> </li>
            <li> <a href="photo_searcher.html">Search</a></li>
        </ul>
    </div>
</nav>
<body>



<div class="form">
    <div class="header-main"><h1 class="header-title">Photo Uploader</h1></div>
<form id="photo-form" method="POST" action="">
    <p>
<label for="photo-title">Title of Photo: </label>
<input type="text" id="photo-title" name="photo-title"><br>
    </p>
    <p>
<label for="file-selector" id="uploaded-file">Upload Photo: </label>
        <input type="button" id="file-selector" value="Upload" onclick="document.getElementById('upload-photo').click();"/>
<input type="file" class="hidden" title="hello" id="upload-photo" name="upload-photo"><br>

    </p>
    <p>
<label for="description-title">Description of Photo: </label>
<input type="text" id="description-title" name="description-title"><br>
    </p>
    <p>
<label for="date-title">Date of Photo: </label>
<input type="text" id="date-title" name="date-title"><br>
    </p>
<input type="submit" id="submit-button" value="Submit" name="submit">


</div>



</form>

</body>

</html>

<?php



if (isset($_POST['submit'])) {
    $message = "successful";
    $color = "White";
    echo '<div style="color:'.$color.'">'.$message.'</div>';
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "swinburne";
    $conn = mysqli_connect($serverName, $username, $password, $databaseName, "8012") || die (mysql_error());
    if ($connection) {
        $message = "DB Connect set";
        echo '<div style="color:'.$color.'">'.$message.'</div>';
    } else {
        $message = "DB NOT set";
        echo '<div style="color:'.$color.'">'.$message.'</div>';
    }
} 


?>
