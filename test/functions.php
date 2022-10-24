<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
            function say($str = "Murilo", $timeStamp = "dia"){
                echo "<h1>Olá $str, bom $timeStamp</h1>";
            };
            say();
            say("Sanches", "curso");
        ?>
    </div>
    <div>
        <?php
            $name = "Sanches";
            function scope(){
                $name = "<h1 style=\"color:blue\">Murilo</h1>";
                echo $name;
                global $name;
                echo "<h1 style=\"color:red\">$name</h1>";
            };
            scope();
            
            // function globall(&$name){ // com o & eu referencio que o valor da variavel global esta interligado com a variavel "local"
            function globall($name){
                $name = "Murilo"; // teoricamente mudei o valor global de $name para Murilo, mas a variavel de fora da funcao continua
                                  // intacta porque essa $name dentro de globall virou uma variavel local
                echo "<h1 style=\"color:green\">$name</h1>";
            };
            globall($name); // pasei a variavel global com valor de sanches
            echo $name; // mudei o valor de $name na funcao globall porem o valor continua o original porque $name dentro de globall() é local
        ?>
    </div>
    <div>
        <?php
            // function formatProduct($product){
            //     echo "{$product["Name"]} custa: {$product["Price"]}";
            // };
            // formatProduct([
            //     "Name" => "Abacate",
            //     "Price" => "5 dól"
            // ]);
            function formatProduct($product){
                return "{$product["Name"]} custa: {$product["Price"]}";
            };
            $formatted = formatProduct([
                "Name" => "Abacate",
                "Price" => "5 dól"
            ]);
            echo "<h1> $formatted </h1>";
        ?>
    </div>
</body>
</html>