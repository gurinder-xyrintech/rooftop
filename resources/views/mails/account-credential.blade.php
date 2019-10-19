@extends('mails.layouts.layout')				
	
@section('content')
<tr>
	<td width="800" align="center"style="padding-bottom:25px;">
		<div class="contentEditableContainer contentTextEditable">
			<div class="contentEditable" align='left' >
			 	<p>Please use following credentials to login</p>
			 	<p>Email : {{ $email }} ,
			 	<br>
			 	<p>Password : {{ $password }}</p>
			</div>
		</div>
	</td>
</tr>
@endsection