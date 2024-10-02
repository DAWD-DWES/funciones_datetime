<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <meta charset="UTF-8">
        <title>Uso DateTime</title>
        <style>
            p {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <p> Crea una instancia de la clase DateTime para la fecha actual. Muestra el objeto creado</p>
        <?php
        $fechaActual = new DateTime();
        print_r($fechaActual);
        ?>

        <p> Cambia el huso horario de la fecha actual a la zona de 'America/Los_Angeles'. Muestra el objeto DateTime </p>
        <?php
        $fechaActual = new DateTime();
        $fechaActual->setTimezone(new DateTimezone('America/Los_Angeles'));
        print_r($fechaActual);
        ?>

        <p> Muestra la fecha actual en un formato específico Año-mes-dia Hora:minuto:segundo </p>
        $fechaActual = new DateTime();
        <?= "Fecha actual: " . $fechaActual->format('Y-m-d H:i:s') ?>

        <p> Modifica y muestra la fecha según el formato W3C que corresponde a la fecha de hace una semana </p>
        $fechaActual = new DateTime();
        <?= "Fecha de hace una semana: " . $fechaActual->modify('-1 week')->format(DateTime::W3C) ?>

        <p> Crea una instancia de la clase DateTime para una fecha específica a partir de la cadena "20/12/2024". Muestra el objeto DateTime </p>
        <?php
        $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
        print_r($fechaEspecifica);
        ?>

        <p> Muestra la fecha específica en el formato "20 December 2024"</p>
        $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
        <?= "Fecha específica: " . $fechaEspecifica->format('d F Y') ?>

        <p> Muestra el timestamp de dicha fecha </p>
        $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
        <?= "Timestamp Fecha específica: " . $fechaEspecifica->getTimestamp() ?>

        <p> Calcula la diferencia en días entre las fecha actual y la fecha específica </p>
        <?php
        $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
        $intervalo = $fechaActual->diff($fechaEspecifica);
        echo "Días restantes hasta la fecha específica: " . $intervalo->days . " días"
        ?>

        <p> Suma un intervalo de tiempo de dos meses a la fecha específica </p>
        <?php
        $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
        $fechaEspecifica->add(new DateInterval('P2M'));
        echo "Fecha específica después de sumar 2 mes: " . $fechaEspecifica->format('Y-m-d H:i:s');
        ?>

        <p> Resta un intervalo de tiempo de 5 días a la fecha específica </p>
        <?php
        $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
        $fechaEspecifica->sub(new DateInterval('P5D')); // Restar 5 días
        echo "Fecha específica después de restar 5 días: " . $fechaEspecifica->format('d F Y');
        ?>

        <p> Compara la fechas actual y la específica para saber cuál es anterior </p>
        $fechaActual = new DateTime();
        $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
        <?= ($fechaActual > $fechaEspecifica) ? "La fecha actual es posterior a la fecha específica" : "La fecha actual es anterior o igual a la fecha específica"
        ?>

        <p> Muestra las fechas que hay entre la fecha actual y la específica con un intervalo de una semana </p>
        <?php
        $fechaActual = new DateTime();
        $fechaEspecifica = DateTime::createFromFormat('d/m/Y', "20/12/2024");
        $intervaloSemana = new DateInterval('P1W');
        $periodo = new DatePeriod($fechaActual, $intervaloSemana, $fechaEspecifica);
        echo "Las fechas del periodo son:";
        foreach ($periodo as $fecha) { // Devuelve fechas desde la fecha inicial cada dos días
            echo $fecha->format('j-M-Y'), "<br>";
        }
        ?>
    </body>
</html>
