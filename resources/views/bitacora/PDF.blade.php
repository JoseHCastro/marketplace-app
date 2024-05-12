<!DOCTYPE html>
<html>

<head>
    <title>Bitácora</title>
    <style>
        /* Estilos CSS para el PDF */
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Bitácora</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Hora</th>
                <th>Usuario Afectado</th>
                <th>Evento</th>
                <th>Contexto</th>
                <th>Descripción</th>
                <th>Origen</th>
                <th>IP</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bitacoras as $bitacora)
                <tr>
                    <td>{{ $bitacora->id }}</td>
                    <td>{{ $bitacora->usuario }}</td>
                    <td>{{ $bitacora->hora }}</td>
                    <td>{{ $bitacora->usuario_afectado }}</td>
                    <td>{{ $bitacora->evento }}</td>
                    <td>{{ $bitacora->contexto }}</td>
                    <td>{{ $bitacora->descripcion }}</td>
                    <td>{{ $bitacora->origen }}</td>
                    <td>{{ $bitacora->ip }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
