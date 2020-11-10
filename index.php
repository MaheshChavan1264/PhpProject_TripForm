<?php
$insert = false;
if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("connection failed due to " . mysqli_connect_error($con));
    }

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip`(`name`,`age`,`gender`,`email`,`phone`,`other`,`dt`) values('$name',
 '$age', '$gender', '$email', '$phone','$desc', current_timestamp());";
    // echo $sql;

    if ($con->query($sql) == true) {
        // echo "success";
        $insert = true;
    } else {
        echo "fail: $sql <br> $con->error";
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Welcome to MMT Solapur US Trip form</h1>
        <p>Enter your details to confirm your participation in the trip</p>
        <?php
if ($insert == true) {
    echo "<p>Thanks to submit your form. We are happy to joinig us..</p>";
}
?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your Name" value="">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10"
                placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>

</html>