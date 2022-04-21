<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact Management - Home</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/app.css" >

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #cbd5e0;
        }

        header {
            display: flex;
            background-color: #2d3748;
            padding: 10px;
            text-align: center;
            color: #f7fafc;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        #delete-contact {
            background-color: #6b7280;
            padding: 15px;
            border-radius: 4px;
            max-width: 450px;
            margin: 0 auto;
            margin-top: 10px;
            color: #f7fafc;
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }

        button {
            background-color: #296b3a;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
            font-weight: bold;
            color: #fff;
            margin-top: 10px;
        }
    </style>
</head>

<body class="antialiased">
    <div class="container">
        <header>
            <a href="/"><i class="fa-solid fa-house"></i></a>
            <h2>Contact Management</h2>
            <a href="/new"><i class="fa-solid fa-plus"></i></a>
        </header>

                <div id="delete-contact">
                    <h3>Are you sure want to delete the contact {{$data->name}} ?</h3>
                    <form method="post" action="{{url('delete')}}/{{$data->id}}">
                        @csrf

                        <button>Delete Contact</button>
                    </form>
                </div>
            </div>
    </body>
</html>
