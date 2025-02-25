<!DOCTYPE html>
<html>
<head>
    <title>Te has unido a un evento</title>
</head>
<body>
    <h1>Hola {{ $user->name }},</h1>
    <p>Te has unido al evento {{ $event->title }}.</p>
    <p>Este evento es 
        @if($event->access_type === 'all')
            <strong>público</strong>.
        @elseif($event->access_type === 'anticipated')
            <strong>de acceso anticipado</strong>.
        @elseif($event->access_type === 'exclusive')
            <strong>de acceso exclusivo</strong>.
        @endif
    </p>
    <p>Comienza el {{ $event->date_start }} y termina el {{ $event->date_end }}</p>
</body>
</html>