<?php
require_once('config.php');

$email = $jelszo = $confirm_jelszo = "";
$email_err = $jelszo_err = $confirm_jelszo_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["email"]))){
        $email_err = "Írja be az email címét";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Hibás email cím";
    } else {
        $sql = "SELECT id FROM users WHERE email = ?";

        if($stmt = $pdo->prepare($sql)){
            $stmt = bindParam(":email:", $param_email, PDO::PARAM_STR);

            $param_email = trim($_POST["username"]);

            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $email_err = "Ez az email cím már használatban van";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Próbálja meg később";
            }
            unset($stmt);
        }
    }
    if(empty(trim($_POST["jelszo"]))){
        $jelszo_err = "Írja be a jelszót"; 

    } elseif (strlen(trim($_POST["jelszo"])) < 6) {
        $jelszo_err = "Túl rövid a jelszó!";

    } elseif (strlen(trim($_POST["jelszo"])) > 12) {
        $jelszo_err = "Túl hosszú a jelszó!";

    } elseif (!preg_match("#[0-9]+#", $_POST["jelszo"])) {
        $jelszo_err = "A jelszónak tartalmaznia kell legalább egy számot!";

    } elseif (!preg_match("#[A-Z]+#", $_POST["jelszo"])) {
       $jelszo_err = "A jelszónak tartalmaznia kell legalább egy nagy betűt!";
    } else {
        $jelszo = trim($_POST["jelszo"]);
    }

    if(empty(trim($_POST["confirm_jelszo"]))){
        $confirm_jelszo_err = "Írja be jelszavát mégegyszer";

    } else {
        $confirm_jelszo =trim($_POST["confirm_jelszo"]);

        if(empty($jelszo_err) && ($jelszo != $confirm_jelszo)) {
            $confirm_jelszo_err = "A jelszavak nem egyeznek!";
        }
    }
    if(empty($email_err) && empty($jelszo_err) && empty($confirm_jelszo_err)) {
        $sql = "INSERT INTO users (email, jelszo) VALUES (:email:, :jelszo:)";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":jelszo:", $param_jelszo, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = $email;
            $param_jelszo = password_hash($jelszo, PASSWORD_DEFAULT);

            if($stmt->execute()){
                header("location: bejelentkezes.php");

            } else {
                echo "Kaka van a palacsintában";
            }
            unset($stmt);
        }
    }
    unset($pdo);
}?>


    <main class="mx-auto">
    <link rel="stylesheet" type="text/css" href="/css/regisztracio.css">

    <div class="container">
        <a href="https://webshop-beadando.000webhostapp.com">
            <img src="img/logo.png" alt="logo" class="d-block mx-auto">
        </a>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-3">

                <form class="form-container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h2 class="card-title fs-3">Regisztráció</h2>
                    <div class="form-group">
                        <label for="exampleInputEmail1">E-mail cím</label>
                        <input type="email"  name="email" id="exampleInputEmail1" aria-describedby="EmailHelp"
                        placeholder="valaki@gmail.com" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">>
                        <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jelszó</label>
                        <input type="password" name="jelszo" id="exampleInputPassword1" placeholder="******" 
                        class="form-control <?php echo (!empty($jelszo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $jelszo; ?>">
                <span class="invalid-feedback"><?php echo $jelszo_err; ?></span>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Jelszó megerősítés</label>
                        <input type="password" name="jelszo_confirm" id="exampleInputPassword1" placeholder="******"
                        class="form-control <?php echo (!empty($confirm_jelszo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_jelszo; ?>">
                        <span class="invalid-feedback"><?php echo $confirm_jelszo_err; ?></span>>
                    </div>
                    <button type="submit" name="create" class="btn btn-primary">Regisztráció</button>
                    <p>Már van fiókja? <a href="/bejelentkezes">Jelentkezzen be!</a></p>
                </form>
            </div>
        </div>
    </div>
</main>