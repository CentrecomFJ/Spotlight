<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Support Ticket</title>
</head>

<body>
    <p>Created by {{ $user->name }}</p>
    <p>Title: {{ $ticket->title }}</p>
    <p>Priority: {{ $ticket->priority }}</p>
    <p>Status: {{ $ticket->status }}</p>
   
    {!! $ticket->message !!}
</body>

</html>