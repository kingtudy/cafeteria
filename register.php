<?php include "theme/header.php"; ?>

<div class="container-fluid background-img">
    <div class="container login-container">
        <?php include "widgets/navbar-admin.php"; ?>
        <div class="login-box">
            <div class="login-title">
                <h1 style="color: white;">REGISTER</h1>
            </div>
            <form action="register-query.php" method="post">
                <div class="login-form register">
                    <label for="name"><b>Name:</b></label>
                    <input type="text" placeholder="John Doe" name="name" required>

                    <label for="email"><b>Email:</b></label>
                    <input type="email" placeholder="client@gmail.ro" name="email" required>

                    <label for="pass"><b>Parola:</b></label>
                    <input type="password" placeholder="Password" name="pass" required>

                    <label for="perm"><b>Tip cont:</b></label>
                    <select name="perm" required>
                            <option value="">-</option>
                            <option value="student">Client</option>
                            <option value="admin">Admin</option>
                    </select>

                    <button class="btn-register btn btn-primary" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "theme/footer.php"; ?>
