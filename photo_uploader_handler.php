<?php

    //Connect to Database
    function ConnectToDatabase() {
    $serverName = "localhost:8012";
    $username = "root";
    $password = "";
    $databaseName = "swinburne";
    return mysqli_connect($serverName, $username, $password, $databaseName);
    }

    //Render unchecked form (validating /wOUT JS)
    function CheckLegitimateValues(array $value) {
        foreach ($value as $item)
        {
            if (empty($item)) throw new Exception("$item cannot be empty");
        }
    }





//MAIN PROGRAM HERE


//Handle Database connection
if (!($connection = ConnectToDatabase())) {
    echo "Failed to connection to Database";
}
//Listen for Submission.
if (isset($_POST['submit'])) {




    //Render all values sent by form
    $title = $_POST['photo-title'];
    $description = $_POST['description-title'];
    $photo = $_POST['upload-photo'];
    $date = $_POST['date-title'];

    var $checkArray = [$title, $description, $photo, $date];
    CheckLegitimateValues($checkArray);


    //Search for id for query
    $query = "SELECT * ORDER by ID LIMIT 1 FROM images";
    $result = $connection->query($query);
    if ($result->num_rows > 0) {
        $id = $result["id"];
    } else {
        $id = 0;
    }

    //Upload to DB
    $target = '/pictures';
    $target = $target . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $target);
    //NEED TO DO
    //move_uploaded_file($titleDuplication, $uploads_dir. '/')

    //Query to Insert (SQL)
    $sql = "INSERT INTO images(id, Title, Photo, Description, DateTaken) VALUES('$title', '$description', '$photo', '$date') ";

    if (mysqli_query($connection, $sql)) {
        echo "Successfully Uploaded!";
    } else {
        echo "Error";
    }

}

?>