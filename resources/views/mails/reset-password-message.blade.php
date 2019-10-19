<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<p>@extends('mails.layouts.layout') @section('content')</p>
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" align="left">
<h1>Hi {{ $user->name }},</h1>
<br />
<p>Your new password has been set.You can now <a href="{{ env('APP_URL').'/login'}}">access your account</a> with your new credentials.</p>
<a class="link" href="{{ env('APP_URL').'/login'}}"> Login to Boxset</a></div>
</div>
<p>@endsection</p>
</body>
</html>