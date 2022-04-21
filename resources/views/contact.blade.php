<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contact Management - Details</title>

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

            #contact {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr 1fr;
            }

            .contact {
                background-color: #6b7280;
                padding: 15px;
                border-radius: 4px;
                max-width: 450px;
                margin: 0 auto;
                margin-top: 10px;
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
                
                @if($data == null)
                    <div class="alert">This contact does not exist!</div>
                @else
                <section class="contact">
                    <div id="contact-detail">
                        <div>Name: {{$data->name}}</div>
                        <div>Contact: {{$data->contact}}</div>
                        <div>Email: {{$data->email}}</div>

                        <a href="/contact/{{$data->id}}/update"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="/contact/{{$data->id}}/delete"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                </section>
                @endif
            </div>
    </body>
</html>
