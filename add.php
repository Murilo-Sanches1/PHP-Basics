<?php

    include('./config/dbconnect.php');

    // print_r($_GET);

    // if(isset($_GET["submit"])){
    //     print_r($_GET);
    // };

    
    function transformForm($array){
        $truefalse = true;
        foreach($array as $key => $value){
            if(empty($value)){
                $truefalse = false;
                break;
            };
        };
        return $truefalse;
    };
    
    $email = $title = $ingredients = "";

    $res = array("email" => "", "title" => "", "ingredients" => "");
    if(isset($_POST["submit"])){
        // echo htmlspecialchars($_POST['email']);
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['ingredients']); 
        /*
            htmlspecialchars converte <> "", etc para entidades em html, para
            evitar XSS Attacks. Assim o browser não lê como javascript
        */ 
        if(transformForm($_POST)){
            $email = $_POST["email"];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $res["email"] = "Preencha um email válido";
            };

            $title = $_POST["title"];
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $res["title"] = "Título tem que ter apenas letras e espaços";
            }

            $ingredients = $_POST["ingredients"];
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $res["ingredients"] = "Separe cada ingrediente por uma vírgula";
            };

            if(!array_filter($res)){
                $email = mysqli_real_escape_string($conn, $_POST["email"]);
                $title = mysqli_real_escape_string($conn, $_POST["title"]);
                $ingredients = mysqli_real_escape_string($conn, $_POST["ingredients"]);
                
                $sql = "INSERT INTO pizzas(email, title, ingredients) VALUES('$email', '$title', '$ingredients')";

                if(mysqli_query($conn, $sql)){
                    header("Location: index.php");
                } else {
                    echo "Query falhou: " . mysqli_error($conn);
                };
            };
        };
    } else{
        $res["email"] = "Insira um email";
        $res["title"] = "Insira um título";
        $res["ingredients"] = "Pelo menos 1 ingrediente";
    };
?>

<!DOCTYPE html>
<html lang="en">

    <?php include('./includes/header.php') ?>
    
    <section class="container grey-text">
        <h4 class="center">Adicionar Pizza</h4>
        <form action="add.php" method="POST" class="white">
            <label for="">Email</label>
            <input type="text" name="email" value="<?php echo $email ?>">
            <div class="red-text"><?php echo $res["email"]; ?></div>
            <label for="">Título da pizza</label>
            <input type="text" name="title" value="<?php echo $title ?>">
            <div class="red-text"><?php echo $res["title"]; ?></div>
            <label for="">Ingredientes</label>
            <input type="text" name="ingredients" value="<?php echo $ingredients ?>">
            <div class="red-text"><?php echo $res["ingredients"]; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>

    <?php include('./includes/footer.php') ?>

</html>