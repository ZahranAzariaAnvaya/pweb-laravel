<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Praktikum Pemrograman Web : Laravel</h1>
    @yield('content')
</body>

</html>