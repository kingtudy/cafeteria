<?php include "theme/header.php"; ?>

<div class="background-video-container">
    <div class="background-video-content">
        <video class="background-video-frame" autoplay muted loop>
            <source src="res/video/coffee.mp4" type="video/mp4">
        </video>
    </div>
</div>


<div class="container-fluid" style="position: absolute; top: 0;">
    <div class="container login-container">
        <div class="login-box">
            <img class="logo-login-left" src="res/img/coffee_icon.png" alt="logo">
            <img class="logo-login-right" src="res/img/coffee_icon.png" alt="logo">
            <div class="login-title">
                <h1 style="color:white;">LOGIN PANEL</h1>
            </div>
            <form action="login_query.php" method="post">
                <div class="login-form">
                    <div class="wrap-field-login">
                        <label style="color:white;" for="email"><b>Email:</b></label>
                        <input type="text" placeholder="client@gmail.ro" name="email" required>
                    </div>

                    <div class="wrap-field-login">
                        <label style="color:white;" for="pass"><b>Password:</b></label>
                        <input type="password" placeholder="Password" name="pass" id="myPassword" required>
                        <a class="see-password" onclick="showPassword()"><i style="color:white;" class="fas fa-eye"></i></a>
                    </div>
                </div>
                <div class="demo-data">
                    <div class="wrap-buttons-login">
                        <p style="color:white;">DEMO(click to copy):</p>
                    </div>
                    <div class="text-white wrap-temp-login-data">Admin:</div>
                    <div class="wrap-temp-login-data">
                        <p class="text-white">
                            <i>
                                <span id="register_mail_text_admin">user: </span>
                                <a id="register_mail_admin" href="#" onclick="clipboard('#register_mail_admin','#register_mail_text_admin');">admin@sophirion.com</a>
                                |
                                <span id="register_pass_text_admin">pass: </span>
                                <a id="register_pass_admin" href="#" onclick="clipboard('#register_pass_admin','#register_pass_text_admin');">11C@feteri@03</a>
                            </i>
                        </p>
                    </div>
                    <div class="text-white wrap-temp-login-data">Client:</div>
                    <div class="wrap-temp-login-data">
                        <p class="text-white">
                            <i>
                                <span id="register_mail_text_client">user: </span>
                                <a id="register_mail_client" href="#" onclick="clipboard('#register_mail_client','#register_mail_text_client');">client@sophirion.com</a>
                                |
                                <span id="register_pass_text_client">pass: </span>
                                <a id="register_pass_client" href="#" onclick="clipboard('#register_pass_client','#register_pass_text_client');">!Client1234</a>
                            </i>
                        </p>
                    </div>
                    <div class="wrap-buttons-login">
                        <button class="btn-login btn btn-primary" type="submit">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "theme/footer.php"; ?>
