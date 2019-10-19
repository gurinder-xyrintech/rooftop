@extends('mails.layouts.layout')				
	
@section('content')
<tr>
       	<td width="800" align="center"style="padding-top:20px;padding-right:5px;padding-left:8px;">
       		<div class="contentEditableContainer contentTextEditable">
       			<div class="contentEditable" align='left' style="padding-bottom:0;" >
       			 	<h1 style="margin-bottom:8px;">Join {{ $production->name }} on Boxset</h1>
       			 	<br>
       			 	<strong>Hi {{ $user->name }},</strong>
       			 	<p>{{ $admin->name }} ({{ $admin->email }}) has invited you to join the <strong>{{ $role }}</strong>
       			 	department in the Boxset workspace <strong>{{ $production->name }}</strong>.Join now and combine forces!</p>
       			 
       			 	<a href="{{ env('ANGULAR_URL').'/auth' }}" class="link">
       			 	  Join Now</a>
       			</div>
       		</div>
       	</td>
       </tr>
@endsection