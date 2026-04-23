<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prácticas PHP - Gallardo Gonzalez Diana Laura</title>
    <style>
        /* ESTILOS GENERALES Y LAYOUT */
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f0f4f8; display: flex; min-height: 100vh; }
        
        /* MENÚ LATERAL */
        .sidebar { background-color: #2c3e50; width: 250px; padding: 20px 0; color: white; display: flex; flex-direction: column; }
        .sidebar h2 { text-align: center; margin-bottom: 20px; font-size: 1.2rem; padding: 0 10px; border-bottom: 1px solid #34495e; padding-bottom: 15px; }
        .sidebar a { color: #ecf0f1; text-decoration: none; padding: 15px 20px; display: block; transition: background 0.3s; border-left: 4px solid transparent; }
        .sidebar a:hover, .sidebar a.active { background-color: #34495e; border-left-color: #3498db; }
        
        /* ÁREA DE CONTENIDO */
        .content { flex: 1; padding: 40px; overflow-y: auto; }
        .card { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); max-width: 600px; margin: 0 auto; }
        .card h2 { color: #1a73e8; margin-bottom: 20px; border-bottom: 2px solid #f0f4f8; padding-bottom: 10px; text-align: center; }
        
        /* FORMULARIOS Y BOTONES */
        .input-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #333; }
        input[type="number"], input[type="text"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem; }
        button { width: 100%; padding: 12px; background-color: #3498db; color: white; border: none; border-radius: 6px; font-size: 1rem; font-weight: bold; cursor: pointer; margin-top: 10px; }
        button:hover { background-color: #2980b9; }
        
        /* ALERTAS Y RESULTADOS */
        .resultado { margin-top: 20px; padding: 15px; border-radius: 6px; text-align: center; background-color: #e8f4fd; color: #0d47a1; border: 1px solid #bbdefb; }
        .grid-tablas { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 20px; margin-top: 20px; max-width: 100%; }
        .tabla-card { background: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border-top: 4px solid #3498db; text-align: center; }
        .linea { font-family: monospace; font-size: 1.1rem; color: #555; }
    </style>
</head>
<body>

    <?php
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
        <a href="?p=28" class="<?= $practica == '28' ? 'active' : '' ?>">28. Celsius a Fahrenheit</a>
        <a href="?p=29" class="<?= $practica == '29' ? 'active' : '' ?>">29. Par o Impar</a>
        <a href="?p=30" class="<?= $practica == '30' ? 'active' : '' ?>">30. Crear Usuario</a>
        <a href="?p=31" class="<?= $practica == '31' ? 'active' : '' ?>">31. Edad para Votar</a>
        <a href="?p=32" class="<?= $practica == '32' ? 'active' : '' ?>">32. Calif. con Letra</a>
    </div>

    <div class="content">
        
        <?php if ($practica == '21'): ?>
            <div class="card">
                <h2>P21: Operaciones Aritméticas Dinámicas</h2>
                <form method="POST" action="?p=21">
                    <div class="input-group">
                        <label>Ingresa el primer número (Num1):</label>
                        <input type="number" step="any" name="num1" required value="<?= isset($_POST['num1']) ? $_POST['num1'] : '' ?>">
                    </div>
                    <div class="input-group">
                        <label>Ingresa el segundo número (Num2):</label>
                        <input type="number" step="any" name="num2" required value="<?= isset($_POST['num2']) ? $_POST['num2'] : '' ?>">
                    </div>
                    <button type="submit" name="btnCalcular21">Calcular Operaciones</button>
                </form>
                <?php
                if (isset($_POST['btnCalcular21'])) {
                    $n1 = (float)$_POST['num1']; $n2 = (float)$_POST['num2'];
                    echo "<div class='resultado'>";
                    echo "<p>Suma: <b>" . ($n1 + $n2) . "</b></p>";
                    echo "<p>Resta: <b>" . ($n1 - $n2) . "</b></p>";
                    if ($n2 != 0) echo "<p>División: <b>" . round($n1 / $n2, 2) . "</b></p>";
                    else echo "<p>División: <b style='color:red;'>Error (División entre 0)</b></p>";
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
                    <div class="input-group"><label>Valor de a:</label><input type="number" step="any" name="a" required></div>
                    <div class="input-group"><label>Valor de b:</label><input type="number" step="any" name="b" required></div>
                    <div class="input-group"><label>Valor de c:</label><input type="number" step="any" name="c" required></div>
                    <button type="submit" name="btnCalcular22">Calcular x1 y x2</button>
                </form>
                <?php
                if (isset($_POST['btnCalcular22'])) {
                    $a = (float)$_POST['a']; $b = (float)$_POST['b']; $c = (float)$_POST['c'];
                    echo "<div class='resultado'>";
                    if ($a == 0) echo "<span style='color:red;'>'a' no puede ser 0.</span>";
                    else {
                        $disc = pow($b, 2) - (4 * $a * $c);
                        if ($disc < 0) echo "<span style='color:red;'>Raíces imaginarias.</span>";
                        else {
                            $x1 = (-$b + sqrt($disc)) / (2 * $a); $x2 = (-$b - sqrt($disc)) / (2 * $a);
                            echo "x1 = " . round($x1, 4) . "<br>x2 = " . round($x2, 4);
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
                    <div class="input-group"><label>Peso (kg):</label><input type="number" step="0.1" name="peso" required></div>
                    <div class="input-group"><label>Estatura (m):</label><input type="number" step="0.01" name="estatura" required></div>
                    <button type="submit" name="btnCalcular23" style="background-color: #ff69b4;">Calcular IMC</button>
                </form>
                <?php
                if (isset($_POST['btnCalcular23'])) {
                    $p = (float)$_POST['peso']; $e = (float)$_POST['estatura'];
                    if ($e > 0) {
                        $imc = $p / ($e * $e);
                        echo "<div class='resultado'><h1>IMC: " . number_format($imc, 1) . "</h1></div>";
                    }
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if ($practica == '24'): ?>
            <div class="card">
                <h2>P24: Fecha con Switch</h2>
                <div class="resultado" style="font-size: 1.2rem; padding: 30px;">
                    <?php
                    date_default_timezone_set('America/Mazatlan');
                    $dNames = ["domingo","lunes","martes","miércoles","jueves","viernes","sábado"];
                    $mNames = [1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
                    echo "Hoy es <strong>" . $dNames[date('w')] . " " . date('j') . " de " . $mNames[date('n')] . " del " . date('Y') . "</strong>";
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($practica == '25'): ?>
            <div class="card" style="max-width: 1000px;">
                <h2>P25: Tablas 1 al 10</h2>
                <div class="grid-tablas">
                    <?php for ($i=1;$i<=10;$i++): ?>
                        <div class="tabla-card">
                            <h3>Tabla del <?= $i ?></h3>
                            <?php for ($j=1;$j<=10;$j++) echo "<div class='linea'>$i x $j = ".($i*$j)."</div>"; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($practica == '26'): ?>
            <div class="card" style="max-width: 1000px;">
                <h2>P26: Tablas Dinámicas</h2>
                <form method="POST" action="?p=26" style="max-width: 300px; margin: 0 auto 20px auto;">
                    <div class="input-group"><label>Hasta la tabla del:</label><input type="number" name="limite" min="1" required></div>
                    <button type="submit" name="btnGenerar26">Generar</button>
                </form>
                <div class="grid-tablas">
                    <?php if (isset($_POST['btnGenerar26'])): $n = (int)$_POST['limite'];
                        for ($i=1;$i<=$n;$i++): ?>
                            <div class="tabla-card">
                                <h3>Tabla del <?= $i ?></h3>
                                <?php for ($j=1;$j<=10;$j++) echo "<div class='linea'>$i x $j = ".($i*$j)."</div>"; ?>
                            </div>
                        <?php endfor; endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($practica == '28'): ?>
            <div class="card">
                <h2>P28: Conversión de Celsius a Fahrenheit</h2>
                <form method="POST" action="?p=28">
                    <div class="input-group">
                        <label>Grados Celsius:</label>
                        <input type="number" step="any" name="celsius" required>
                    </div>
                    <button type="submit" name="btnCalcular28">Convertir</button>
                </form>
                <?php
                if (isset($_POST['btnCalcular28'])) {
                    $c = (float)$_POST['celsius'];
                    $f = ($c * 9/5) + 32;
                    echo "<div class='resultado'>$c Celsius = " . number_format($f, 1) . " Fahrenheit</div>";
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if ($practica == '29'): ?>
            <div class="card">
                <h2>P29: Números Pares e Impares</h2>
                <form method="POST" action="?p=29">
                    <div class="input-group">
                        <label>Ingresa un número:</label>
                        <input type="number" name="numero" required>
                    </div>
                    <button type="submit" name="btnCalcular29">Verificar</button>
                </form>
                <?php
                if (isset($_POST['btnCalcular29'])) {
                    $n = (int)$_POST['numero'];
                    $res = ($n % 2 == 0) ? "Par" : "Impar";
                    echo "<div class='resultado'>El número $n es: <strong>$res</strong></div>";
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if ($practica == '30'): ?>
            <div class="card">
                <h2>P30: Crea un Usuario</h2>
                <form method="POST" action="?p=30">
                    <div class="input-group">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" required>
                    </div>
                    <div class="input-group">
                        <label>Apellido:</label>
                        <input type="text" name="apellido" required>
                    </div>
                    <button type="submit" name="btnCalcular30">Generar Usuario</button>
                </form>
                <?php
                if (isset($_POST['btnCalcular30'])) {
                    $nom = trim($_POST['nombre']);
                    $ape = trim($_POST['apellido']);
                    $user = strtolower($nom . $ape);
                    $ini = strtoupper($nom[0] . $ape[0]);
                    echo "<div class='resultado' style='text-align: left;'>";
                    echo "Nombre de usuario: <b>$user</b><br>";
                    echo "Iniciales: <b>$ini</b>";
                    echo "</div>";
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if ($practica == '31'): ?>
            <div class="card">
                <h2>P31: Edad para Votar</h2>
                <form method="POST" action="?p=31">
                    <div class="input-group">
                        <label>Nombre:</label>
                        <input type="text" name="votante" required>
                    </div>
                    <div class="input-group">
                        <label>Edad:</label>
                        <input type="number" name="edad" required>
                    </div>
                    <button type="submit" name="btnCalcular31">Verificar</button>
                </form>
                <?php
                if (isset($_POST['btnCalcular31'])) {
                    $nom = $_POST['votante'];
                    $edad = (int)$_POST['edad'];
                    $msj = ($edad >= 18) ? "puede votar." : "no puede votar.";
                    echo "<div class='resultado'>$nom $msj</div>";
                }
                ?>
            </div>
        <?php endif; ?>

        <?php if ($practica == '32'): ?>
            <div class="card">
                <h2>P32: Calculadora de Calificaciones</h2>
                <form method="POST" action="?p=32">
                    <div class="input-group">
                        <label>Puntuación (0-100):</label>
                        <input type="number" name="puntos" min="0" max="100" required>
                    </div>
                    <button type="submit" name="btnCalcular32">Calcular Letra</button>
                </form>
                <?php
                if (isset($_POST['btnCalcular32'])) {
                    $p = (int)$_POST['puntos'];
                    if ($p >= 90) $letra = "A";
                    elseif ($p >= 80) $letra = "B";
                    elseif ($p >= 70) $letra = "C";
                    elseif ($p >= 60) $letra = "D";
                    else $letra = "F";
                    echo "<div class='resultado'>Puntuación: $p <br> Calificación: <b>$letra</b></div>";
                }
                ?>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>