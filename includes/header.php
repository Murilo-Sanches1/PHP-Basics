<?php

    session_start();

    
    if($_SERVER["QUERY_STRING"] == "noname"){
        unset($_SESSION["name"]);
        // session_unset();
    };
    
    $name = $_SESSION["name"] ?? "convidado";

    // Resgatar cookie
    $gender = $_COOKIE["gender"] ?? "unknown";

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIZZA</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style type="text/css">
        .brand{
            background-color: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .pizza{
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
    </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Murilo Pizzaria</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text">Olá <?php echo htmlspecialchars($name); ?></li>
                <li class="grey-text">(<?php echo htmlspecialchars($gender); ?>)</li>
                <li><a href="add.php" class="btn brand z-depth-0">Adicionar pizza</a></li>
                <li><a href="sandbox.php" class="btn brand z-depth-0">Sandbox</a></li>
            </ul>
        </div>
    </nav>
    