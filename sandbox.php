<?php

    $score = 50;
    if($score > 40){
        echo "$score é maior do que 40";
    } else {
        echo "$score é menor do que 40";
    };
    echo "<br>";

    // Ternary
    // echo $score > 40 ? "$score é maior do que 40" : "$score é menor do que 40";

    // Sessions
    if(isset($_POST["submit"])){
        // Cookie com duração de 1 dia e guardando a informação sobre o gênero
        setcookie("gender", $_POST["gender"], time() + 86400);

        session_start();
        // Criamos uma sessão para depois ter acesso ao objeto global $_SESSION onde da pra criar variaveis para persistir informação
        $_SESSION["name"] = $_POST["name"];
        echo $_SESSION["name"];

        header("Location: index.php");
    };

    // Interagir com o sistema
    // $text = readfile('readme.txt');
    // echo $text;
    $file = "readme.txt";

    if(file_exists($file)):
        echo readfile($file);
        copy($file, "queroquero.txt");
        echo "<br>";

        // Caminho absoluto
        echo realpath($file) . "<br>";

        echo filesize($file) . "<br>";

        rename($file, "test.txt");
    else:
        echo "Arquivo não existe <br>";
    endif;

    // mkdir("data");

    $fileRenamed = "test.txt";
    $handle = fopen($fileRenamed, "r"); // red deixar o arquivo aberto nessa variavel "r" readonly
    $handleWrite = fopen($fileRenamed, "r+"); // red deixar o arquivo aberto nessa variavel "r+" read + write
    $handleWriteFinal = fopen($fileRenamed, "a+"); // red deixar o arquivo aberto nessa variavel "a+" possibilta escrever no fim do arquivo
    // echo fread($handle, filesize($fileRenamed)) . "<br>"; // red ler o arquivo e escolher o quanto quer ler

    // echo fgets($handle); // red retornar uma linha individual, se usado duas vezes, a segunda vez vai ler a segunda linha (pointer)
    // echo fgetc($handle); // red ler apenas um caracter  
    fwrite($handleWrite, "\nA ética é construída");

    fclose($handle);
    fclose($handleWrite);
    fclose($handleWriteFinal);

    unlink($fileRenamed); // red Deleta um arquivo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $score > 40 ? "$score é maior do que 40" : "$score é menor do que 40"; ?></h1>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input type="text" name="name">
        <select name="gender">
            <option value="male">Masculino</option>
            <option value="female">Feminino</option>
        </select>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>