<!DOCTYPE html>
<html>
<head>
    <title>New Complain Notification!!</title>
</head>

<body>
<h2>New Complain Notification!!</h2>
<br/>
{{$contactUs->name}} ({{$contactUs->email}} ) just sent a new complain through MEM.
<br/>  
Complain Details:
<br/>  
<p> 
    <li class="list-group-item">
        <strong>Sender Phone No</strong> : {{ $contactUs->phone }}
    </li>
    <li class="list-group-item">
        <strong>Sender State</strong> : {{ $contactUs->state }}
    </li>
    <li class="list-group-item">
        <strong>Sender City</strong> : {{ $contactUs->city }}
    </li>
    <li class="list-group-item">
        <strong>Sender Address</strong> : {{ $contactUs->address }}
    </li>
    <li class="list-group-item">
        <strong>Sender Street</strong> : {{ $contactUs->street }}
    </li>
    <li class="list-group-item">
        <strong>Sender Landmark</strong> : {{ $contactUs->landmark }}
    </li>
    <li class="list-group-item">
        <strong> Category</strong> : {{ $contactUs->category }}
    </li>
    <li class="list-group-item">
        <strong> Product Name</strong> : {{ $contactUs->product }}
    </li>
    <li class="list-group-item">
        <strong>Product Serial No</strong> : {{ $contactUs->productserial }}
    </li>
    <li class="list-group-item">
        <strong>Purchased Date</strong> : {{ \Carbon\Carbon::parse($contactUs->purchase_date)->format('M d, Y') }}
    </li> 
    <li class="list-group-item">
        <strong>Remark</strong> : {!! $contactUs->remark !!}
    </li>
</p>

<a href="{{url('/login')}}" class="btn btn-primary">Check Out all New Complains</a>
</body>

</html>