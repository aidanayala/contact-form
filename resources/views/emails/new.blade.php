<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Enquiry Recieved</title>

</head>
<body>
<h1>A enquiry has been received!</h1>
<div>
    <p><b>Name: </b> {{ $enquiry->name }}</p>
    <p><b>E-mail Address: </b> {{ $enquiry->email }}</p>
    <p><b>Enquiry Text: </b> {{ $enquiry->text }}</p>
</div>
</body>
</html>
