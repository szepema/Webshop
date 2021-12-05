<?php 
require_once('config.php');

session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
    header("location: https://webshop-beadando.000webhostapp.com");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $jelszo = "";
    $email_err = $jelszo_err= "";

    if(empty(trim($_POST["email"]))){
        $email_err = "Írja be az email címét";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["jelszo"]))){
        $jelszo_err = "írja be a jelszavát";
    } else{
        $jelszo = trim($_POST["jelszo"]);
    }
    if(empty($email_err) && empty($jelszo_err)){
        $sql = "SELECT id, email, jelszo FROM users WHERE email = :email";

        if($stmt = $pdo->prepare($sql)){

            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $param_email = trim($_POST["email"]);

            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["id"];
                        $email = $row["email"];
                        $hashed_jelszo = $row["jelszo"];
                        if(password_verify($jelszo, $hashed_jelszo)){
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;

                            header("location: https://webshop-beadando.000webhostapp.com");
                        } else {
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else {
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Kaka van a palacsintában.";
            }
            unset($stmt);
        }
    }
    unset($pdo);
}
?>


<main class="mx-auto">

<link rel="stylesheet" type="text/css" href="/css/bejelentkezes.css">
<link rel="stylesheet" type="text/css" href="/css/custom.css">

    <div class="container">
        <a href="https://webshop-beadando.000webhostapp.com">
        <img src="img/logo.png" alt="logo" class="d-block mx-auto">
        </a>
    </div>
    <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-3">

                <form class="form-container" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post">
                    <h2 class="card-title fs-3">Bejelentkezés</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail cím</label>
                        <input type="email" name="email" id="exampleInputEmail1" aria-describedby="EmailHelp" placeholder="valaki@gmail.com" 
                        class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jelszó</label>
                        <input type="password" name="jelszo" id="exampleInputPassword1" placeholder="****"
                        class="form-control <?php echo (!empty($jelszo_err)) ? 'is-invalid' : ''; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Bejelentkezés</button>
                    <p>Még nincs fiókja?  <a href="/regisztracio">Regisztráljon!</a></p>
                </form>
            </div>
        </div>
    </div>
</main>