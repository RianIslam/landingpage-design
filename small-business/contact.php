<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

    <title>Contact Page</title>
</head>

<style>
    .sliderStyle {
        height: 100vh;
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.html">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./service.html">Service Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./portfolio.html">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./blog.html">Blog Page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact.php">Contact Page</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-5">

        <h1>Contact Us</h1>
        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form values
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirmPassword = $_POST["confirmPassword"];

            // Validate form fields
            $errors = array();
            if (empty($firstName)) {
                $errors[] = "First name is required";
            }
            if (empty($lastName)) {
                $errors[] = "Last name is required";
            }
            if (empty($email)) {
                $errors[] = "Email address is required";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }
            if (empty($password)) {
                $errors[] = "Password is required";
            }
            if (empty($confirmPassword)) {
                $errors[] = "Confirm password is required";
            } elseif ($password != $confirmPassword) {
                $errors[] = "Password and confirm password do not match";
            }

            // If no errors, redirect to welcome page
            if (empty($errors)) {
                // Save first name in session for welcome page
                session_start();
                $_SESSION["firstName"] = $firstName;
                header("Location: welcome.php");
                exit;
            } else {
                // Display error messages
                echo "<p>Please fix the following errors:</p>";
                echo "<ul>";
                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }
                echo "</ul>";
            }
        }
        ?>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="firstName">First Name:</label>
            <input class="form-control" type="text" id="firstName" name="firstName"><br>
            <label for="lastName">Last Name:</label>
            <input class="form-control" type="text" id="lastName" name="lastName"><br>
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email"><br>
            <label for="password">Password:</label>
            <input class="form-control" type="password" id="password" name="password"><br>
            <label for="confirmPassword">Confirm Password:</label>
            <input class="form-control" type="password" id="confirmPassword" name="confirmPassword"><br>
            <input type="submit" value="Register">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>