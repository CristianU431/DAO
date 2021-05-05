<?php
session_start();
if(isset($_SESSION['admin_name']))
{
    header("location:alumno.php");
}
$connect = mysqli_connect("localhost","root","","bdcolegio");
if(isset($_POST["login"]))
{
    if(!empty($_POST['member_name']) && !empty($_POST['member_password']))
    {
        $name = mysqli_real_escape_string($connect,$_POST['member_name']);
        $pass = mysqli_real_escape_string($connect,$_POST['member_password']);
        $sql = "SELECT * FROM tlogin where usuario ='".$name."' and contrasenia = '".$pass."'";
        $result = mysqli_query($connect,$sql);
        $user = mysqli_fetch_array($result);

        if($user)
        {
            if(!empty ($_POST['remember']))
            {
                setcookie("member_name", $name, time()+(10*365*24*60*60));
                setcookie("member_password", $pass, time()+(10*365*24*60*60));
                $_SESSION['admin_name'] = $name;
            }else{
                if(isset($_COOKIE['member_name']))
                {
                    setcookie("member_name","");
                    $_SESSION['admin_name'] = $name;
                }
                if(isset($_COOKIE['member_password']))
                {
                    setcookie("member_password","");
                    $_SESSION['admin_name'] = $name;
                }
            }
            header("location:alumno.php");
            $_SESSION['admin_name'] = $name;
        }else
        {
            $mensaje = "ingreso invalido";
        }
    }else
    {
        $mensaje = "Ambos son campos obligatorios";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel = "stylesheet" href = "css/main.min.css" >
    <link rel = "stylesheet" href = "css/style.css" >
    <link rel = "stylesheet" href = "css/color.css" >
    <link rel = "stylesheet" href = "css/responsive.css" >
</head>
<body>
    <div class = "theme-layout">
        <div class = "container-fluid pdng0">
            <div class = "row merged">
                <div class = "col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <div class = "login-reg-bg">
                        <div class = "log-reg-area sign">
                            <h2 class = "log-title" style = "text-aling: center;">Iniciar Sesion </h2>
                            <p>Todavia no usas Web? <a href = "#">Haz el recorrido o unete ahora</a> </p>
                        
                            <form method = "post" action = "<?php echo $_SERVER['PHP_SELF'];?>">
                                <div class = "form-group">
                                <?php if(isset($mensaje)){ echo $mensaje;}?>
                                    
                                <div>      
                                <div class = "form-group">
                                    <input type = "email" name = "member_name" id = "input" value="<?php if(isset($_COOKIE['member_name']))
                                    {
                                        echo $_COOKIE['member_name'];
                                    }?>" required>
                                    <label class = "control-label" for="input">Nombre de usuario<label><i class = "mtrl-select"></i>
                                </div>
                                <div class = "form-group">
                                    <input type = "password" name = "member_password" id = "inputp" value = "<?php if(isset($_COOKIE['member_password']))
                                    {
                                        echo $_COOKIE['member_password'];
                                    }?>" required>
                                    <label class = "control-label" for = "inputp"> Contraseña<label><i class = "mtrl-select"></i>
                                </div>
                                <div class = "checkbox">
                                    <label>
                                        <input type="checkbox" name = "remember"<?php if(isset($_COOKIE['member_name']))
                                        {
                                        ?>
                                        checked
                                        <?php
                                    }?>><i class = "check-box"></i>Recordar Contraseña.
                                    </label>
                                </div>
                                <a href="#" class = "forgot-pwd">¿Se olvido la contraseña?</a>
                                <div class = "submit-btns">
                                    <button class = "mtr.btn signip" name = "login" type = "submit"><span>Iniciar Sesion</span></button>
                                    <button class = "mtr.btn signup" type = "button"><span>Registro</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>