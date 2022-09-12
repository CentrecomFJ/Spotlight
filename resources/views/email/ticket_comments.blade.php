<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Support Ticket</title>
</head>
<body>

    {!! $comment->comment !!}



<p>Replied by: {{ $user->name }}</p>

<p>Title: {{ $ticket->title }}</p>
<p>Ticket ID: {{ $ticket->id }}</p>
<p>Status: {{ $ticket->status }}</p>

<p>
    You can view the ticket at any time at <a href="{{ url('tickets/'. $ticket->id) }}">{{ url('ticket/'. $ticket->id) }}</a>
</p>

</body>
</html>