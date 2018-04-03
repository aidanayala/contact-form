<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Enquiry Recieved</title>

</head>
<body>
<h1>We have received your enquiry!</h1>
<div>
    <p>Here's a copy for your records.</p>
    <p><b>Name: </b> {{ $enquiry->name }}</p>
    <p><b>E-mail Address: </b> {{ $enquiry->email }}</p>
    <p><b>Enquiry Text: </b> {{ $enquiry->text }}</p>
</div>
</body>
</html>
