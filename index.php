<?php

    include('./config/dbconnect.php');

    // Preparar a query
    $sql = "SELECT id, title, ingredients FROM pizzas ORDER BY created_at";
    // Realizar a query e armazenar o resultado bruto
    $data = mysqli_query($conn, $sql);
    // Transformar o resultado bruto em arrays individuais
    $pizzas = mysqli_fetch_all($data, MYSQLI_ASSOC);    
    // Liberar da memória o bruto que não precisamos mais
    mysqli_free_result($data);
    // Encerrar a conexão com o banco
    mysqli_close($conn);

    // print_r($pizzas);

    // print_r(explode(",", $pizzas[0]["ingredients"]));

?>

<!DOCTYPE html>
<html lang="en">

    <?php include('./includes/header.php') ?>
    
    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <img src="img/pizza.svg" alt="" class="pizza">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza["title"]); ?></h6>
                            <!-- <div><?php echo htmlspecialchars($pizza["ingredients"]); ?></div> -->
                            <ul>
                                <?php foreach(explode(",", $pizza["ingredients"]) as $item): ?>
                                    <li><?php echo htmlspecialchars($item); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $pizza["id"]; ?>" class="brand-text">Mais informações</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include('./includes/footer.php') ?>

</html>