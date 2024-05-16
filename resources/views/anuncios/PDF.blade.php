<!DOCTYPE html>
<html>

<head>
    <title>Anuncios</title>
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

    <h2>Anuncios</h2>

    <table>
        <thead>
            <tr>   
                <th>Usuario</th>             
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Precio</th>               
                <th>Fecha de publicación</th>
                <th>Visitas</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anuncios as $anuncio)
                <tr>
                    <td>{{ $anuncio->usuario->name }}</td>
                    <td>{{ $anuncio->titulo }}</td>
                    <td>{{ $anuncio->descripcion }}</td>
                    <td>{{ $anuncio->precio }} {{ $anuncio->Moneda->nombre }}</td>
                    <td>{{ $anuncio->fecha_publicacion }}</td>
                    <td>{{ $anuncio->visitas }}</td>
                    <td>{{ $anuncio->categoria->nombre}}</td>                   
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
