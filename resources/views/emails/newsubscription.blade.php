<!DOCTYPE html>
<html>
<head>
    <title>New Subscription Notification!!</title>
</head>

<body>
<h2>New Subscription Notification!!</h2>
<br/>
{{$contactUs->email}}  just subscribed to MEM.
<br/> 

<a href="{{url('/login')}}" class="btn btn-primary">Check Out all New Subscriptions</a>
</body>

</html>