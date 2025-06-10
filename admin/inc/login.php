<?php
session_start();
require_once('db.php');

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($email) || empty($password)) {
        $error = "Please fill in both fields.";
    } else {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['email' => $email]);    
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['admin_logged_in'] = true;
                header("Location: slider.php");
                exit;
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "No user found with that email.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Glaztech</title>
    <link rel="icon" href="../assets/images/favicon/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../assets/images/favicon/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="../assets/css/vendors/%40fortawesome/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/vendors/%40fortawesome/fontawesome-free/css/fontawesome.css" />
    <link rel="stylesheet" href="../assets/css/vendors/%40fortawesome/fontawesome-free/css/brands.css" />
    <link rel="stylesheet" href="../assets/css/vendors/%40fortawesome/fontawesome-free/css/solid.css" />
    <link rel="stylesheet" href="../assets/css/vendors/%40fortawesome/fontawesome-free/css/regular.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/%40icon/icofont/icofont.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/flag-icon.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/themify-icons/themify-icons/css/themify.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/animate.css/animate.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/vendors/weather-icons/css/weather-icons.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link id="color" rel="stylesheet" href="../assets/css/color-1.css" media="screen" />
</head>

<body>
    <div class="tap-top ">
        <svg class="feather">
            <use href="https://admin.pixelstrap.net/edmin/assets/svg/feather-icons/dist/feather-sprite.svg#arrow-up">
            </use>
        </svg>
    </div>
    <style>
    body, html {
        height: 100%;
        margin: 0;
    }

    .login-wrapper {
        background: url('../assets/images/login/acuostic-folding-stacking-walls.webp') no-repeat center center fixed;
        background-size: cover;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-card {
        background: rgba(255, 255, 255, 0.95); /* Light white background with slight transparency */
        border-radius: 15px;
        padding: 40px 30px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="login-wrapper"> <!-- NEW: Background and centering wrapper -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-5 p-0">
                <div class="login-card login-dark login-bg">
                    <div>
                        <div>
                            <a class="logo">
                                <!-- <img class="img-fluid for-light" src="../assets/images/login/01.jpg" alt="loginpage" /> -->
                                <img class="for-dark m-auto" src="../assets/images/logo/dark-logo.png" alt="logo" />
                            </a>
                        </div>
                        <div class="login-main">
                            <form class="theme-form" method="post" action="">
                                <h2 class="text-center">Glaztech Admin</h2>
                                <p class="text-center">Enter your email &amp; password to login</p>

                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input class="form-control" name="email" type="email" required
                                        placeholder="Test@gmail.com" />
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control password-field" name="password" type="password"
                                            required placeholder="*********" />
                                        <div class="show-hide"><span class="show"></span></div>
                                    </div>
                                </div>

                                <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const toggle = document.querySelector('.show-hide');
                                    const passwordInput = document.querySelector('.password-field');
                                    const showIcon = toggle.querySelector('.show');

                                    toggle.addEventListener('click', function() {
                                        const type = passwordInput.getAttribute('type');
                                        passwordInput.setAttribute('type', type === 'password' ? 'text' : 'password');
                                    });
                                });
                                </script>

                                <div class="form-group mb-0 checkbox-checked">
                                    <div class="form-check checkbox-solid-info">
                                        <input class="form-check-input" id="solid6" type="checkbox" />
                                        <label class="form-check-label" for="solid6">Remember password</label>
                                    </div>

                                    <?php if (!empty($error)) : ?>
                                    <div class="alert alert-danger mt-2"><?= htmlspecialchars($error) ?></div>
                                    <?php endif; ?>

                                  

                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100 text-white" type="submit">Sign
                                            in</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- col -->
        </div> <!-- row -->
    </div> <!-- container -->
</div> <!-- login-wrapper -->

        <script src="../assets/js/vendors/jquery/dist/jquery.min.js"></script>
        <script src="../assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/config.js"></script>
        <script src="../assets/js/password.js"></script>
        <script src="../assets/js/script.js"></script>
    </div>
</body>

</html>