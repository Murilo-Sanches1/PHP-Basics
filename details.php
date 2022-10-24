<?php

    include('./config/dbconnect.php');

    if(isset($_POST["delete"])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST["id_to_delete"]);

        $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            header("Location: index.php");
        } else {
            echo "Query falhou: " . mysqli_error($conn);
        };
    };
    
    if(isset($_GET["id"])):
        $id = mysqli_real_escape_string($conn, $_GET["id"]);

        $sql = "SELECT * FROM pizzas WHERE id = '$id'";

        $data = mysqli_query($conn, $sql);

        $pizza = mysqli_fetch_assoc($data);

        mysqli_free_result($data);

        mysqli_close($conn);
    endif;

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('./includes/header.php') ?>
        
        <div class="container center grey-text">
            <?php if($pizza): ?>
                <h4><?php echo htmlspecialchars($pizza["title"]); ?></h4>
                <p>Criado por: <?php echo htmlspecialchars($pizza["email"]); ?></p>
                <p><?php echo date($pizza["created_at"]); ?></p>
                <h5>Ingredientes: </h5>
                <p><?php echo htmlspecialchars($pizza["ingredients"]); ?></p>

                <form action="details.php" method="POST">
                    <input type="hidden" name="id_to_delete" value="<?php echo $pizza["id"]; ?>">
                    <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
                </form>
            <?php else: ?>
                <h5>Essa pizza não existe</h5>
            <?php endif; ?> 
        </div>

    <?php include('./includes/footer.php') ?>

</html>