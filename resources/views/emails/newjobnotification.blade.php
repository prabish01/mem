<!DOCTYPE html>
<html>
<head>
    <title>New  Job Application  Notification!!</title>
</head>

<body>
<h2>New Job Application Notification!!</h2>
<br/>
{{$contactUs->applicants_name}} ({{$contactUs->applicants_email}} ) tried to contact you from MEM Website.
<br/>  
<p>  
     <ul class="list-group">
        <li class="list-group-item">
            Name : {{ $contact->applicants_name }}
        </li>
        <li class="list-group-item">
            Email : {{ $contact->applicants_email }}
        </li>
        <li class="list-group-item">
            Address : {{ $contact->applicants_address }}
        </li>
        <li class="list-group-item">
            Applied Post : {{ $contact->applied_post }}
        </li>
        <li class="list-group-item">
            PhoneNumber : {{ $contact->phone_number }}
        </li> 
<ul>
      
</p>

<a href="{{url('/login')}}" class="btn btn-primary">Check out all New Applicants</a>
</body>

</html>