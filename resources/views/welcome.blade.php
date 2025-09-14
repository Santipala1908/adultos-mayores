<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #ff758c, #ff7eb3, #fceabb);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .container {
            max-width: 700px;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .emoji {
            font-size: 100px;
            margin-bottom: 20px;
            display: block;
        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 40px;
            color: #f8f8f8;
        }

        .buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .btn {
            padding: 15px 40px;
            font-size: 1.2rem;
            font-weight: bold;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-login {
            background: white;
            color: #e63946;
        }

        .btn-login:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .btn-register {
            background: #f1c40f;
            color: #333;
        }

        .btn-register:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <span class="emoji">👵👴</span>
        <h1>Bienvenido al Sistema</h1>
        <p>Gestiona adultos mayores, recordatorios, citas y notas de salud fácilmente.</p>

        <div class="buttons">
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn btn-login">🚪 Iniciar Sesión</a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-register">✨ Registrarse</a>
            @endif
        </div>
    </div>
</body>
</html>
