<html>
    <head> 
        <title>Calculadora de Juros</title>
    </head>
    
    <body> 
        <h1> Calculadora de Juros </h1>
        <form action="" method="post">
            <input type="number" name="num" placeholder="Digite o capital:" required> 
            <input type="number" name="num" placeholder="Digite a taxa:" required>
            <input type="number" name="num" placeholder="Digite o Tempo:" required>
            <input type="number" name="num" placeholder="Digite o Juros:" required>
            <input type="submit" value="Calcular!">
        </form>

        <?php
        // Verifica se o formulário foi enviado
        if (isset($_POST['num'])) {
            $num = (int) $_POST['num']; 

            echo "<h1>Tabuada do $num</h1>";

            for ($i = 1; $i <= 10; $i++) {
                echo "<h3>$i x $num = " . ($i * $num) . "</h3>";
            }
        }
        ?>
    </body>
</html>
