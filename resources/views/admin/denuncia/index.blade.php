<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denuncia de Linktree</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-title">
                <h1>Denuncia de Linktree</h1>
            </div>
            <div class="card-body">
                <p><strong>Correo:</strong> {{$mensaje['email']}}</p>
                <p><strong>Asunto:</strong> {{$mensaje['subcject']}}</p>
                <p><strong>Usuario denunciado:</strong> {{$mensaje['userlink']}}</p>
                <p><strong>Mensaje:</strong> {{$mensaje['message']}}</p>
            </div>
        </div>
    </div>
</body>
</html>