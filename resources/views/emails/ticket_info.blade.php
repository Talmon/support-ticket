
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Support Ticket Information</title>
</head>
<body>
<p>
Thank you {{ ucfirst($user->name) }} for
contacting our support team.A support ticket has been opened for you with the details below.You will be notified
when your problem is rectified.
<p>Title : {{ $ticket->title }}</p>
<p>Priority : {{ $ticket->priority }}</p>
<p>Status : {{ $ticket->status }}</p>
<p>
You can view the ticket anytime at {{ url('tickets/'.$ticket->ticket_id) }}
</p>

