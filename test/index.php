<?php

    echo "<h1>Php é um saco<h1>";

    $myName = "Murilo Sanches";
    $myName = "Sanches Murilo";
    $myNumber = 50;

    define('constante', 'Define cria uma constante, bem estranho por sinal usar uma função pré-construída pra isso');

    $string1 = "meu nome é ";
    $string2 = "Murilo";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            font-size: 25px;
            font-family: sans-serif;
            background-color: grey;
        }
        h2{
            color: red;
            margin-top: 25px;
        }
        h3{
            color: blue;
            margin-top: 25px;
        }
        h4{
            color: green;
            margin-top: 25px;
        }
        h5{
            color: yellow;
            margin-top: 25px;
        }
        h6{
            color: pink;
            margin-top: 25px;
        }
        span{
            color: black;
        }
    </style>
</head>
<body>
    <h2><?php echo "olá" ?></h2>
    <h2><?php echo $myName ?></h2>
    <h2><?php echo $myNumber ?></h2>
    <h2><?php echo constante ?></h2>
    <h2><?php echo $string1 . $string2 ?></h2>
    <h2><?php echo "wtf" . $string2 ?></h2>
    <h2><?php echo "Posso usar variáveis diretamente na string com aspas duplas $string2" ?></h2>
    <h2><?php echo 'Com aspas simples não funciona $string2' ?></h2>
    <h2><?php echo "Uma citação de um livro: \"Para usar aspas duplas dentro de aspas duplas\"" ?></h2>
    <h2>================================</h2>
    <h2>
        <?php 
            echo $string2[1]."<br>";
            echo strlen("strlen retorna o tamanho de uma string (base 0), parecido com lenght do javascript")."<br>";
            for($i = 0; $i < strlen($string2); $i++){
                echo $string2[$i]."<br>";
            }
            echo strtoupper($string2)."<br>";
            echo strtolower($string2)."<br>";
            echo str_replace('M', 'SUBSTITUI', $string2)
        ?>
    </h2>
    <h3>
        <?php
            $radiusINT = 5;
            $piFloat = 3.14;
            $DOUBLE = "Double assim como float serve para guardar números reais, a diferença é que Double tem uma precisão maior em relação as casas decimais";
            echo "$DOUBLE: " . $radiusINT ** $piFloat . "<br>";
            echo "With BIDMAS, division and multiplication have the same priority, so typically you work left to right if both occur, so the multiplication occurs before the division. It didn't matter in that case, but if you had, say, 8 / 2(3 + 3), you'd do (8 / 2) * (3 + 3) <br>";
        
            echo $radiusINT++ . "<span>Não funciona direto porque desse jeito o valor já é mostrado, por isso tem que chamar a váriavel mais uma vez</span>";
            echo $radiusINT . "<br>";
            echo $radiusINT-- . "<span>Não funciona direto porque desse jeito o valor já é mostrado, por isso tem que chamar a váriavel mais uma vez</span>";
            echo $radiusINT . "<br>";

            $age = 18;
            echo $age += 2;
            echo $age -= 2;
            echo $age *= 2;
            echo $age /= 2;

            echo "<br>" . floor($piFloat) . "<br>";
            echo ceil($piFloat) . "<br>";
            echo pi() . "<br>";
        ?>
    </h3>
    <h4>
        <?php
            // indexed array
            $people = ["Murilo", "Miguel", "Alencar"];
            echo $people[0] . "<br";
            $peopleT = array("Sanches", "Lamente", "Gabriel");
            echo $peopleT[1] . "<br>";

            $numbers = [50, 80, 60, 70, 90];
            // echo não funciona para mostrar arrays porque echo espera uma string
            print_r($numbers);
            echo "<br>";
            $numbers[0] = 5;
            print_r($numbers);
            echo "<br>";
            $numbers[] = "Novo elemento";
            print_r($numbers);
            echo "<br>";
            array_push($numbers, 500);
            print_r($numbers);
            echo "<br>";
            echo count($numbers);
            echo "<br>";
            $arrayMerged = array_merge($people, $numbers);
            print_r($arrayMerged);
            echo "<br>";

            // Associative array
            $arrayKeyValuePair = [
                "Primeiro" => "Maça",
                "Segundo" => "Banana",
                "Terceiro" => "Melancia",
                "Quarto" => "Abacate",
            ];
            $arrayKeyValuePair["Segundo"] = "Manga";
            echo $arrayKeyValuePair["Segundo"] . "<br>";
            print_r($arrayKeyValuePair);
            $arrayKeyValuePair["Quinto"] = "TOMATE";
            echo "<br>" . $arrayKeyValuePair["Quinto"] . "<br>";
            print_r($arrayKeyValuePair);
            echo count($arrayKeyValuePair);
            echo "<br>";
            echo "<br>";
            // multi-dimensional array
            $arrayComArray = [
                [
                    "PrimeiroNome" => "Red", 
                    "SegundoNome" => "dead", 
                    "TerceiroNome" => "redemption"
                ],
                [ 
                    "PrimeiroNome" => "Hollow", 
                    "SegundoNome" => "knight", 
                    "TerceiroNome" => "silksong"
                ],
            ];
            print_r($arrayComArray);
            print_r($arrayComArray[1]);
            echo "<br>";
            print_r($arrayComArray[1]["SegundoNome"]);
            echo "<br>";
            echo $arrayComArray[0]["TerceiroNome"];
            echo "<br>";
            $arrayComArray[] = [50, 500, 5000];
            print_r($arrayComArray);
            echo "<br>";
            $ultimoElemento = array_pop($arrayComArray);
            print_r($ultimoElemento);
        ?>
    </h4>
    <h5>
        <?php
            $presidentes = ["Lula", "Dilma", "Temer", "Bolsonabo"];
            echo count($presidentes) . "<br>";
            for($i = 0; $i <= count($presidentes) - 1;$i++){
                echo $presidentes[$i] . "<br>";
            };

            foreach($presidentes as $presidente){
                echo "<br>" . $presidente . "<br>";
            }
            echo "<br>";
            $produtos = [
                ["Nome" => "Pão", "Preço" => "50 cents"],
                ["Nome" => "Leite", "Preço" => "999 reais"],
                ["Nome" => "Danonão Grosso", "Preço" => "5"],
                ["Nome" => "Water", "Preço" => "666"],
            ];
            foreach($produtos as $produto){
                echo $produto["Nome"] . " " . $produto["Preço"] . "<br>";
            };
        ?>
    </h5>
    <h6>
        <?php 
            echo true;
            echo false;

            echo 5 < 10;
            echo 5 > 10;
            echo 5 == 10;
            echo 5 === 10;

            echo "<br>";
            
            echo "murilo" < "sanches";
            echo "<br>";
            echo "shaun" > "Shaun";
            // The reason why echo 'shaun'>'Shaun' returns  true (1) is that lowercase 
            // letter are coded further than the capital ones. You can see that in ASCII 
            // table   's' has decimal value of 115 and the 'S' has value of '83' . 
            // So if you compare them , you will have 115>83, which is true.   
        ?>
    </h6>
</body>
</html>