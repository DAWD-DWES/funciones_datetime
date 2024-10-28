<!DOCTYPE html>
<html>
    <head>
        <title>Pogramación con librería Datetime</title>
        <meta name="viewport" content="width=device-width">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="stylesheet.css">
    </head>
    <body>
        <h2>Programación con librería Datetime</h2>
        <table>
            <tr><td><p>Crea una instancia de la clase DateTime para la fecha actual. Define un huso horario por defecto asociado a 'Europe/Madrid'</p></td></tr>
            <tr>
                <td><?php
                    date_default_timezone_set('Europe/Madrid');
                    $fechaActual = new DateTime();
                    print_r($fechaActual);
                    ?></td>
            </tr>
            <tr><td><p>Cambia el huso horario de la fecha actual a la zona de 'America/Los_Angeles'</p></td></tr>
            <tr>
                <td> <?php
                    $fechaActual = new DateTime();
                    $fechaActual->setTimezone(new DateTimezone('America/Los_Angeles'));
                    print_r($fechaActual);
                    ?></td>
            </tr>
            <tr>
                <td><p>Muestra la fecha actual en un formato específico Año-mes-dia Hora:minuto:segundo</p></td>
            </tr>
            <tr>
                <td><?php
                    $fechaActual = new DateTime();
                    echo "Fecha actual: " . $fechaActual->format('Y-m-d H:i:s')
                    ?></td>
            </tr>
            <tr>
                <td><p>Modifica y muestra la fecha según el formato W3C que corresponde a la fecha de hace una semana</p></td>
            </tr>
            <tr>
                <td><?php
                    $fechaActual = new DateTime();
                    echo "Fecha de hace una semana: " . $fechaActual->modify('-1 week')->format(DateTime::W3C)
                    ?></td>
            </tr>
            <tr>
                <td><p>Crea una instancia de la clase DateTime para una fecha específica a partir de la cadena "20/12/2024". Muestra el objeto DateTime</p></td>
            </tr>
            <tr>
                <td><?php
                    $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
                    print_r($fechaEspecifica);
                    ?></td>
            </tr>
            <tr>
                <td><p>Muestra la fecha específica en el formato "20 December 2024"</p></td>
            </tr>
            <tr>
                <td><?php
                    $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
                    echo "Fecha específica: " . $fechaEspecifica->format('d F Y')
                    ?></td>
            </tr>
            <tr>
                <td><p>Muestra el timestamp de dicha fecha</p></td>
            </tr>
            <tr>
                <td><?php
                    $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
                    echo "Timestamp Fecha específica: " . $fechaEspecifica->getTimestamp()
                    ?></td>
            </tr>
            <tr>
                <td><p>Calcula la diferencia en días entre las fecha actual y la fecha específica</p></td>
            </tr>
            <tr>
                <td><?php
                    $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
                    $intervalo = $fechaActual->diff($fechaEspecifica);
                    echo "Días restantes hasta la fecha específica: " . $intervalo->days . " días"
                    ?></td>
            </tr>
            <tr>
                <td><p>Suma un intervalo de tiempo de dos meses a la fecha específica</p></td>
            </tr>
            <tr>
                <td><?php
                    $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
                    $fechaEspecifica->add(new DateInterval('P2M'));
                    echo "Fecha específica después de sumar 2 mes: " . $fechaEspecifica->format('Y-m-d H:i:s');
                    ?></td>
            </tr>
            <tr>
                <td><p>Resta un intervalo de tiempo de 5 días a la fecha específica</p></td>
            </tr>
            <tr>
                <td><?php
                    $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
                    $fechaEspecifica->sub(new DateInterval('P5D')); // Restar 5 días
                    echo "Fecha específica después de restar 5 días: " . $fechaEspecifica->format('d F Y');
                    ?></td>
            </tr>
            <tr>
                <td><p>Compara la fechas actual y la específica para saber cuál es anterior</p></td>
            </tr>
            <tr>
                <td><?php
                    $fechaActual = new DateTime();
                    $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
                    echo match ($fechaActual <=> $fechaEspecifica) {
                        -1 => "La fecha actual es anterior a la fecha específica.",
                        0 => "Las dos fechas son iguales.",
                        1 => "La fecha actual es posterior a la fecha específica.",
                    };
                    ?></td>
            </tr>
            <tr>
                <td><p>Muestra las fechas que hay entre la fecha actual y la específica con un intervalo de una semana, dos días y 13 horas</p></td>
            </tr>
            <tr>
                <td><?php
                    $fechaActual = new DateTime();
                    $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
                    $intervaloSemana = new DateInterval('P1W2DT13H');
                    $periodo = new DatePeriod($fechaActual, $intervaloSemana, $fechaEspecifica);
                    echo "Las fechas del periodo son:";
                    foreach ($periodo as $fecha) { // Devuelve fechas desde la fecha inicial cada dos días
                        echo $fecha->format('j-M-Y'), "<br>";
                    }
                    ?></td>
            </tr>
        </table>
    </body>
</html>