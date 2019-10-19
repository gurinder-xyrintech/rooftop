@extends('mails.layouts.layout')				
	
@section('content')
 <tr>
       	<td width="800" align="center"style="padding:20px 20px 0 20px;">
       		<div class="contentEditableContainer contentTextEditable">
       			<div class="contentEditable" align='left' >
       			 	<h1>Hi {{ $user->name }},</h1>
       			 	<br>
       			 	<p>We received a request to reset your password for your Boxset App account:
       			 	   <a href="#">{{ $user->email }}</a></p>
       			  	<p>Simply click on the button to set a new password:</p>
       			 	<a href="{{ env('APP_URL').'/auth/reset-password/'.$token  }}" class="link">
       			 	  Set a New Password</a>
       			 	  <p style="margin-top:24px;">If you didn't ask to reset your password,not to worry,your account is still safe
       			 	  and you can ignore this email.</p>
       			</div>
       		</div>
       	</td>
       </tr>
@endsection