<!doctype html>
<html lang="es">

<body>
<p>¡Hola! {{ $user->email }},</p>
<p>Se te ha asignado el nombre de usuario:</p>
<ul>
    <li><b>{{$user->username}}</b></li>
</ul>
<p>Además, la siguiente contraseña provisional:</p>
<ul>
    <li><b>{{$password}}</b></li>
</ul>
<p>La cual debes cambiar en el siguiente enlace:</p>
<a class="btn" href="{{ route('temporary.password', $user->id) }}">
    Verificarme
</a>
</body>
</html>


