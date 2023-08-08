<?php
#Initializare sesiune login
session_start();

#VALIDARE: Verificam daca user-ul este deja autentificat si daca este, il redirectionam unde trebuie
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    if($_SESSION["role"] === 'admin') {
        header("location: index_admin.php"); #Redirectionam catre pagina care trebuie
        exit;
    } else if($_SESSION["role"] === 'student') {
        header("location: index_client.php");
        exit;
    } else {
        echo 'Eroare sesiune';
        exit;
    }
}

#Includere fisier cu datele de conectare la baza
require_once "sys.php";

#Definire variabile si initializare
$email = $pass = $email_err = $pass_err = $login_err = "";

#Procesare date trimise prin formular
    #Verificare ca email-ul sa nu fie NULL
    if(empty(trim($_POST["email"]))) {
        $email_err = "Nu a fost introdus email-ul";
    } else {
        $email = trim($_POST["email"]);
    }

    #Verificare ca parola sa nu fie NULL
    if(empty(trim($_POST["pass"]))){
        $pass_err = "Nu a fost introdusa parola";
    } else {
        $pass = trim($_POST["pass"]);
    }

    #Procesare validare creditentiale
    if(empty($email_err) && empty($pass_err)){
        #Preluare user
        $sql = "SELECT id_user, email, name, role, password FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){ #mysqli_prepare = imi ia interogarea din variabila $sql si o apeleaza in baza($link)
            #Alipire variabile in interogare
            mysqli_stmt_bind_param($stmt, "s", $param);

            #Setare parametrii
            $param = $email;

            #Executarea interogarii
            if(mysqli_stmt_execute($stmt)){
                #Stocare rezultat
                mysqli_stmt_store_result($stmt);

                #Verificare daca email-ul exista in baza si daca da, verificare parola
                if(mysqli_stmt_num_rows($stmt) == 1){
                    #Alipire variabile
                    mysqli_stmt_bind_result($stmt, $user_id, $email, $name, $role, $hashed_pass);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($pass, $hashed_pass) === true){
                            #Daca am ajuns pana aici, parola este corecta deci incepem sesiune noua
                            session_start();

                            #Stocam datele in variabila globala a sesiunii
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["email"] = $email;
                            $_SESSION["name"] = $name;
                            $_SESSION["role"] = $role;

                            #Redirectionare conform rol cont
                            if($_SESSION["role"] === 'admin') {
                                header("location: index_admin.php");
                                exit;
                            } else if($_SESSION["role"] === 'student') {
                                header("location: index_client.php");
                                exit;
                            } else {
                                echo 'Eroare sesiune';
                                exit;
                            }
                        } else {
                            #Parola nu a fost valida, generam eroare
                            $login_err = "Email sau parola invalida";
                        }
                    }
                } else{
                    $login_err = "Date incorecte";
                }
            } else{
                echo "ERROR! EROARE CONEXIUNE BAZA";
            }

            #Inchidere flux date
            mysqli_stmt_close($stmt);
        }
    }

    #Inchidere conexiune
    mysqli_close($link);

if(!empty($login_err)){
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
} ?>