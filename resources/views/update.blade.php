<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact Management - Update</title>
    @stack('styles')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/app.css" >
    <style>
        
    </style>

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

        #update-contact {
            background-color: #6b7280;
            padding: 15px;
            border-radius: 4px;
            max-width: 450px;
            margin: 0 auto;
            margin-top: 10px;
        }

        #contact {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }

        #new {
            background-color: #2d3748;
            padding-left: 13px;
            padding-top: 4px;
            width: 48px;
            height: 48px;
            border-radius: 100px;
            font-weight: bold;
            color: #fff;
            font-size: 28px;
            position: fixed;
            bottom: 15px;
            right: 15px;
        }

        form {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }

        input {
            padding: 10px 10px;
            border: 1px solid #1a202c;
            border-radius: 4px;
            width: 100%;
        }

        button {
            background-color: #296b3a;
            padding: 10px;
            cursor: pointer;
            border-radius: 4px;
            font-weight: bold;
            color: #fff;
        }

        .alert {
            background-color: #c47213;
            padding: 10px;
            max-width: 450px;
            border-radius: 4px;
            margin: 0 auto;
            margin-top: 10px;
            font-weight: bold;
            text-align: center;
            color: #ffffff;
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

        @if(session('status'))
            <div class="alert">
                {{ session('status') }}
            </div>
        @endif

        @if($data == null)
                <div class="alert">This contact does not exist!</div>
        @else
        <div id="update-contact">
            <form method="post" action="{{url('update')}}/{{$data->id}}">
                @csrf
                <input type="text" name="name" placeholder="Name" value="{{$data->name}}" />
                <input type="text" name="contact" placeholder="Contact" value="{{$data->contact}}" />
                <input type="email" name="email" placeholder="E-mail" value="{{$data->email}}" />

                <button>Update Contact</button>
            </form>
        </div>
        @endif
    </div>
</body>

</html>