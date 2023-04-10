<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
</head>

<body>
    <?php
    // Start session to retrieve first name
    session_start();
    if (isset($_SESSION["firstName"])) {
        $firstName = $_SESSION["firstName"];
        echo "<h1>Welcome, $firstName!</h1>";
    } else {
        // Redirect to registration form if first name not available
        header("Location: registration_form.php");
        exit;
    }
    ?>
</body>

</html>