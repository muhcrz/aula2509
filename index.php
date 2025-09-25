<!DOCTYPE html>
<html>
<head> 
    <title>Calculadora de Juros</title>
    <meta charset="UTF-8">
</head>
<body> 
    <h1>Calculadora de Juros</h1>
    <form action="" method="post">
        <label>Capital:</label><br>
        <input type="number" name="capital" step="0.01" placeholder="Digite o capital"><br><br>

        <label>Taxa (% ao período):</label><br>
        <input type="number" step="0.01" name="taxa" placeholder="Digite a taxa"><br><br>

        <label>Prazo (tempo):</label><br>
        <input type="number" name="tempo" step="0.01" placeholder="Digite o tempo"><br><br>

        <label>Juros:</label><br>
        <input type="number" step="0.01" name="juros" placeholder="Digite o juros"><br><br>

        <label>O que você deseja calcular?</label><br>
        <input type="radio" name="tipo" value="simples" required> Juros<br>
        <input type="radio" name="tipo" value="capital"> Capital<br>
        <input type="radio" name="tipo" value="taxa"> Taxa<br>
        <input type="radio" name="tipo" value="tempo"> Prazo (tempo)<br><br>

        <input type="submit" value="Calcular!">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $capital = isset($_POST['capital']) ? floatval($_POST['capital']) : null;
        $taxa    = isset($_POST['taxa']) ? floatval($_POST['taxa']) : null;
        $tempo   = isset($_POST['tempo']) ? floatval($_POST['tempo']) : null;
        $juros   = isset($_POST['juros']) ? floatval($_POST['juros']) : null;
        $tipo    = $_POST['tipo'];

        echo "<h2>Resultado:</h2>";

        if ($tipo == "simples") {
            // Calcular Juros
            if ($capital === null || $capital == 0 || $taxa === null || $tempo === null) {
                echo "Erro: informe valores válidos para capital, taxa e tempo.";
            } else {
                $taxa_decimal = $taxa / 100;
                $juros = $capital * $taxa_decimal * $tempo;

                echo "Capital: R$ " . number_format($capital, 2, ',', '.') . "<br>";
                echo "Taxa: " . $taxa . "%<br>";
                echo "Tempo: " . $tempo . "<br>";
                echo "<strong>Juros: R$ " . number_format($juros, 2, ',', '.') . "</strong>";
            }

        } elseif ($tipo == "capital") {
            // Calcular Capital
            if ($juros === null || $juros == 0 || $taxa === null || $tempo === null || $taxa == 0 || $tempo == 0) {
                echo "Erro: informe valores válidos de juros, taxa e tempo para calcular o capital.";
            } else {
                $taxa_decimal = $taxa / 100;
                $capital = $juros / ($taxa_decimal * $tempo);

                echo "Juros: R$ " . number_format($juros, 2, ',', '.') . "<br>";
                echo "Taxa: " . $taxa . "%<br>";
                echo "Tempo: " . $tempo . "<br>";
                echo "<strong>Capital: R$ " . number_format($capital, 2, ',', '.') . "</strong>";
            }

        } elseif ($tipo == "taxa") {
            // Calcular Taxa
            if ($juros === null || $juros == 0 || $capital === null || $capital == 0 || $tempo === null || $tempo == 0) {
                echo "Erro: informe valores válidos de juros, capital e tempo para calcular a taxa.";
            } else {
                $taxa_decimal = $juros / ($capital * $tempo);
                $taxa_percentual = $taxa_decimal * 100;

                echo "Juros: R$ " . number_format($juros, 2, ',', '.') . "<br>";
                echo "Capital: R$ " . number_format($capital, 2, ',', '.') . "<br>";
                echo "Tempo: " . $tempo . "<br>";
                echo "<strong>Taxa: " . number_format($taxa_percentual, 2, ',', '.') . "%</strong>";
            }

        } elseif ($tipo == "tempo") {
            // Calcular Prazo (tempo)
            if ($juros === null || $juros == 0 || $capital === null || $capital == 0 || $taxa === null || $taxa == 0) {
                echo "Erro: informe valores válidos de juros, capital e taxa para calcular o tempo.";
            } else {
                $taxa_decimal = $taxa / 100;
                $tempo = $juros / ($capital * $taxa_decimal);

                echo "Juros: R$ " . number_format($juros, 2, ',', '.') . "<br>";
                echo "Capital: R$ " . number_format($capital, 2, ',', '.') . "<br>";
                echo "Taxa: " . $taxa . "%<br>";
                echo "<strong>Tempo: " . number_format($tempo, 2, ',', '.') . "</strong>";
            }

        } else {
            echo "Operação inválida.";
        }
    }
    ?>
</body>
</html>