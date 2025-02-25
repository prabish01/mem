<!DOCTYPE html>
<html>
<head>
    <title>New Contact Notification!!</title>
</head>

<body>
<h2>New Contact Notification!!</h2>
<br/>
{{$contactUs->sender_name}} ({{$contactUs->sender_email}} ) tried to contact you from MEM Website.
<br/> 
<strong>Subject: </strong>{{$contactUs->subject}}<br/>
<strong>Message: </strong>
<p> 
     {{$contactUs->message}}

</p>

<a href="{{url('/login')}}" class="btn btn-primary">Check Out all New Contacts</a>
</body>

</html>