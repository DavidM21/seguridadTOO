<!doctype html>
<html lang="es">

<body>
<p>¡Hola! {{ $user->email }},</p>
<p>Se te ha asignado el nombre de usuario </p>
<ul>
    <li><b>{{$user->username}}</b></li>
</ul>
<p>Además, la siguiente contraseña provisional:</p>
<ul>
    <li><b>{{$password}}</b></li>


</ul>
<a class="btn" href="{{ route('password.update') }}">
    Verificarme
</a>
</body>
</html>


