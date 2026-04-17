<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prácticas PHP - Gallardo Gonzalez Diana Laura</title>
    <style>
        /* estilos generales y layout */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f4f8; display: flex; min-height: 100vh; }
        
        /* menú lateral */
        .sidebar { background-color: #2c3e50; width: 250px; padding: 20px 0; color: white; display: flex; flex-direction: column; }
        .sidebar h2 { text-align: center; margin-bottom: 20px; font-size: 1.2rem; padding: 0 10px; border-bottom: 1px solid #34495e; padding-bottom: 15px; }
        .sidebar a { color: #ecf0f1; text-decoration: none; padding: 15px 20px; display: block; transition: background 0.3s; border-left: 4px solid transparent; }
        .sidebar a:hover, .sidebar a.active { background-color: #34495e; border-left-color: #3498db; }
        
        /* área de contenido */
        .content { flex: 1; padding: 40px; overflow-y: auto; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); max-width: 600px; margin: 0 auto; }
        .card h2 { color: #1a73e8; margin-bottom: 20px; border-bottom: 2px solid #f0f4f8; padding-bottom: 10px; text-align: center; }
        
        /* fromulario y botones */
        .input-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; }
        input[type="number"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem; }
        button { width: 100%; padding: 12px; background-color: #3498db; color: white; border: none; border-radius: 6px; font-size: 1rem; font-weight: bold; cursor: pointer; margin-top: 10px; }
        button:hover { background-color: #2980b9; }
        
        /* alertas y resultados */
        .resultado { margin-top: 20px; padding: 15px; border-radius: 6px; text-align: center; background-color: #e8f4fd; color: #0d47a1; border: 1px solid #bbdefb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        
        /* grid para las tablas */
        .grid-tablas { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px; margin-top: 20px; max-width: 100%; }
        .tabla-card { background: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-top: 4px solid #3498db; text-align: center; }
        .tabla-card h3 { margin-bottom: 10px; color: #333; }
        .linea { font-family: monospace; font-size: 1.1rem; color: #555; }
    </style>
</head>
<body>

    <?php
        // capturar la práctica seleccionada por la URL (dejé por defecto la 21)
        $practica = isset($_GET['p']) ? $_GET['p'] : '21';
    ?>

    <div class="sidebar">
        <h2>Prácticas PHP<br><small>Diana Gallardo</small></h2>
        <a href="?p=21" class="<?= $practica == '21' ? 'active' : '' ?>">21. Operaciones</a>
        <a href="?p=22" class="<?= $practica == '22' ? 'active' : '' ?>">22. Fórmula General</a>
        <a href="?p=23" class="<?= $practica == '23' ? 'active' : '' ?>">23. Calculadora IMC</a>
        <a href="?p=24" class="<?= $practica == '24' ? 'active' : '' ?>">24. Fecha (Switch)</a>
        <a href="?p=25" class="<?= $practica == '25' ? 'active' : '' ?>">25. Tablas 1 al 10</a>
        <a href="?p=26" class="<?= $practica == '26' ? 'active' : '' ?>">26. Tablas Dinámicas</a>
    </div>

    <div class="content">
        
<?php if ($practica == '21'): ?>
            <div class="card">
                <h2>P21: Operaciones Aritméticas Dinámicas</h2>
                
                <form method="POST" action="?p=21">
                    <div class="input-group">
                        <label>Primer número (n1):</label>
                        <input type="number" step="any" name="num1" required 
                               value="<?= isset($_POST['num1']) ? $_POST['num1'] : '' ?>">
                    </div>
                    <div class="input-group">
                        <label>Segundo número (n2):</label>
                        <input type="number" step="any" name="num2" required 
                               value="<?= isset($_POST['num2']) ? $_POST['num2'] : '' ?>">
                    </div>
                    <button type="submit" name="btnCalcular21">Calcular Ahora</button>
                </form>

                <?php
                // procesamiento de datos al hacer clic
                if (isset($_POST['btnCalcular21'])) {
                    $n1 = (float)$_POST['num1'];
                    $n2 = (float)$_POST['num2'];

                    echo "<div class='resultado' style='margin-top:20px; text-align:left;'>";
                        echo "<p>Suma: <b>" . ($n1 + $n2) . "</b></p>";
                        echo "<p>Resta: <b>" . ($n1 - $n2) . "</b></p>";
                        
                        if ($n2 != 0) {
                            echo "<p>División: <b>" . round($n1 / $n2, 2) . "</b></p>";
                        } else {
                            echo "<p>División: <b style='color:red;'>No se puede dividir entre 0</b></p>";
                        }
                        
                        echo "<p>Exponenciación: <b>" . ($n1 ** $n2) . "</b></p>";
                    echo "</div>";
                }
                ?>
            </div>
        <?php endif; ?>
        
        <?php if ($practica == '22'): ?>
            <div class="card">
                <h2>P22: Fórmula General</h2>
                <p style="text-align: center; margin-bottom: 15px;">ax² + bx + c = 0</p>
                
                <form method="POST" action="?p=22">
                    <div class="input-group">
                        <label>Valor de a:</label>
                        <input type="number" step="any" name="a" required>
                    </div>
                    <div class="input-group">
                        <label>Valor de b:</label>
                        <input type="number" step="any" name="b" required>
                    </div>
                    <div class="input-group">
                        <label>Valor de c:</label>
                        <input type="number" step="any" name="c" required>
                    </div>
                    <button type="submit" name="btnCalcular22">Calcular x1 y x2</button>
                </form>

                <?php
                if (isset($_POST['btnCalcular22'])) {
                    $a = (float)$_POST['a'];
                    $b = (float)$_POST['b'];
                    $c = (float)$_POST['c'];

                    echo "<div class='resultado'>";
                    if ($a == 0) {
                        echo "<span style='color:red;'>El valor de 'a' no puede ser 0.</span>";
                    } else {
                        $discriminante = pow($b, 2) - (4 * $a * $c);
                        if ($discriminante < 0) {
                            echo "<span style='color:red;'>El discriminante es negativo ($discriminante). Raíces imaginarias.</span>";
                        } else {
                            $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
                            $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
                            echo "<strong>Resultados:</strong><br> x1 = " . round($x1, 4) . "<br>x2 = " . round($x2, 4);
                        }
                    }
                    echo "</div>";
                }
                ?>
            </div>
        <?php endif; ?>


        <?php if ($practica == '23'): ?>
            <div class="card">
                <h2>P23: Calculadora de IMC</h2>
                <form method="POST" action="?p=23">
                    <div class="input-group">
                        <label>Peso (kg):</label>
                        <input type="number" step="0.1" name="peso" required>
                    </div>
                    <div class="input-group">
                        <label>Estatura (metros):</label>
                        <input type="number" step="0.01" name="estatura" required>
                    </div>
                    <button type="submit" name="btnCalcular23" style="background-color: #ff69b4;">Calcular IMC</button>
                </form>

                <?php
                if (isset($_POST['btnCalcular23'])) {
                    $peso = (float)$_POST['peso'];
                    $estatura = (float)$_POST['estatura'];

                    if ($estatura > 0 && $peso > 0) {
                        $imc = $peso / ($estatura * $estatura);
                        $categoria = "";

                        if ($imc < 18.5) { $categoria = "Bajo peso"; $color = "#1976d2"; $bg = "#e3f2fd"; }
                        elseif ($imc <= 24.9) { $categoria = "Peso Normal (Saludable)"; $color = "#2e7d32"; $bg = "#e8f5e9"; }
                        elseif ($imc <= 29.9) { $categoria = "Sobrepeso"; $color = "#ef6c00"; $bg = "#fff3e0"; }
                        else { $categoria = "Obesidad"; $color = "#c62828"; $bg = "#ffebee"; }

                        echo "<div class='resultado' style='background-color: $bg; color: $color; border-color: $color;'>";
                        echo "<h1 style='margin:10px 0;'>IMC: " . number_format($imc, 1) . "</h1>";
                        echo "<h3>$categoria</h3>";
                        echo "</div>";
                    }
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if ($practica == '24'): ?>
            <div class="card">
                <h2>P24: Fecha con Switch (PHP)</h2>
                <div class="resultado" style="font-size: 1.2rem; padding: 30px;">
                <?php
                    // configurar zona horaria de los mochis, sinaloa
                    date_default_timezone_set('America/Mazatlan');

                    $diaSemanaNum = date('w'); 
                    $diaMes = date('j');
                    $mesNum = date('n'); 
                    $anio = date('Y');

                    $nombreDia = "";
                    $nombreMes = "";

                    switch ($diaSemanaNum) {
                        case 0: $nombreDia = "domingo"; break;
                        case 1: $nombreDia = "lunes"; break;
                        case 2: $nombreDia = "martes"; break;
                        case 3: $nombreDia = "miércoles"; break;
                        case 4: $nombreDia = "jueves"; break;
                        case 5: $nombreDia = "viernes"; break;
                        case 6: $nombreDia = "sábado"; break;
                    }

                    switch ($mesNum) {
                        case 1: $nombreMes = "Enero"; break;
                        case 2: $nombreMes = "Febrero"; break;
                        case 3: $nombreMes = "Marzo"; break;
                        case 4: $nombreMes = "Abril"; break;
                        case 5: $nombreMes = "Mayo"; break;
                        case 6: $nombreMes = "Junio"; break;
                        case 7: $nombreMes = "Julio"; break;
                        case 8: $nombreMes = "Agosto"; break;
                        case 9: $nombreMes = "Septiembre"; break;
                        case 10: $nombreMes = "Octubre"; break;
                        case 11: $nombreMes = "Noviembre"; break;
                        case 12: $nombreMes = "Diciembre"; break;
                    }

                    echo "Hoy es <strong>$nombreDia $diaMes de $nombreMes del año $anio</strong>";
                ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($practica == '25'): ?>
            <div class="card" style="max-width: 1000px;">
                <h2>P25: Tablas de Multiplicar (1 al 10)</h2>
                <div class="grid-tablas">
                <?php
                    for ($i = 1; $i <= 10; $i++) {
                        echo "<div class='tabla-card'>";
                        echo "<h3>Tabla del $i</h3>";
                        for ($j = 1; $j <= 10; $j++) {
                            $resultado = $i * $j;
                            echo "<div class='linea'>$i x $j = $resultado</div>";
                        }
                        echo "</div>";
                    }
                ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($practica == '26'): ?>
            <div class="card" style="max-width: 1000px;">
                <h2>P26: Tablas Dinámicas</h2>
                <form method="POST" action="?p=26" style="max-width: 300px; margin: 0 auto 20px auto;">
                    <div class="input-group">
                        <label>Generar hasta la tabla del:</label>
                        <input type="number" name="limite" min="1" required>
                    </div>
                    <button type="submit" name="btnGenerar26">Generar</button>
                </form>

                <div class="grid-tablas">
                <?php
                if (isset($_POST['btnGenerar26'])) {
                    $n = (int)$_POST['limite'];
                    
                    if ($n > 0) {
                        for ($i = 1; $i <= $n; $i++) {
                            echo "<div class='tabla-card'>";
                            echo "<h3>Tabla del $i</h3>";
                            for ($j = 1; $j <= 10; $j++) {
                                echo "<div class='linea'>$i x $j = " . ($i * $j) . "</div>";
                            }
                            echo "</div>";
                        }
                    }
                }
                ?>
                </div>
            </div>
        <?php endif; ?>

    </div>
</body>
</html>