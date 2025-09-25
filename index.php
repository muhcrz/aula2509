<html>
    <head> 
        <title>Calculadora de Juros</title>
    </head>
    
    <body> 
        <h1>Calculadora de Juros</h1>
        <form action="" method="post">
            <label>Capital:</label><br>
            <input type="number" name="capital" placeholder="Digite o capital" required><br><br>

            <label>Taxa (% ao período):</label><br>
            <input type="number" step="0.01" name="taxa" placeholder="Digite a taxa" required><br><br>

            <label>Prazo (tempo):</label><br>
            <input type="number" name="tempo" placeholder="Digite o tempo" required><br><br>

            <label>Juros (se já souber):</label><br>
            <input type="number" step="0.01" name="juros" placeholder="Digite o juros"><br><br>

            <label>Tipo de Juros:</label><br>
            <input type="radio" name="tipo" value="simples" required> Juros
            <input type="radio" name="tipo" value="capital"> Capital
            <input type="radio" name="tipo" value="prazo"> Prazo
            <input type="radio" name="tipo" value="composto"> Taxa<br><br>

            <input type="submit" value="Calcular!">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $capital = floatval($_POST['capital']);
            $taxa    = floatval($_POST['taxa']);
            $tempo   = floatval($_POST['tempo']);

            // transforma taxa percentual em decimal
            $taxa_decimal = $taxa / 100;

            // cálculo do juros simples
            $juros = $capital * $taxa_decimal * $tempo;

            echo "<h2>Resultado:</h2>";
            echo "Capital: R$ " . number_format($capital, 2, ',', '.') . "<br>";
            echo "Taxa: " . $taxa . "%<br>";
            echo "Tempo: " . $tempo . "<br>";
            echo "<strong>Juros: R$ " . number_format($juros, 2, ',', '.') . "</strong>";
        }
        ?>
    </body>
</html>
