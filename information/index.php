<?php 

require 'db.php';

if(isset($_POST['button'])) {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $country = $_POST["country"];
    $gender = $_POST["gender"];

    $languages = isset($_POST["Languages"]) ? $_POST["Languages"] : [];
    $language = implode(",", $languages);

    $query = "INSERT INTO info_data (name, age, country, gender, languages)
    VALUES ('$name', '$age','$country','$gender','$language ')";
    if(mysqli_query($conn, $query)) {
        echo "<script> alert('Data Inserted Successfully')</script>";
    }
    else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST" autocomplete="off">
            <label for="">Name</label>
            <input type="text" name="name" require>
            <label for="">Age</label>
            <input type="number" name="age" require>
            <label for="">Country</label>
            <select name="country" require id="">
                <option value="" selected hidden>Select Country</option>
                <option value="USA">USA</option>
                <option value="RUSSIA">RUSSIA</option>
                <option value="JAPAN">JAPAN</option>
                <option value="PHILIPPINES">PHILIPPINES</option>
            </select>
            <label for="">Gender</label>
            <input type="radio" name="gender" value="Male" require> Male
            <input type="radio" name="gender" value="Female" require> Female
            <label for="">Languages</label>
            <input type="checkbox" name="Languages[]" value="English"> English
            <input type="checkbox" name="Languages[]" value="Spanish"> Spanish
            <input type="checkbox" name="Languages[]" value="Tagalog"> Tagalog
            <input type="checkbox" name="Languages[]" value="Chinese"> Chinese
            <br>
            <button type="submit" name="button">Submit</button>
        </form>
    </div>
</body>
</html>