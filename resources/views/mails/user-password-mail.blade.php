@extends('mails.layouts.layout')	

@section('content')
 <tr>
       	<td width="800" align="center"style="padding:20px 20px 0 20px;">
       		<div class="contentEditableContainer contentTextEditable">
       			<div class="contentEditable" align='left' >
       			 	<h1>Hi {{ $user->firstname }},</h1>
       			 	<br>
       			 	<p>You can login with following details:
                        <p>{{$user->email}}</p>
                        <p>{{$password}}</p>
       			</div>
       		</div>
       	</td>
       </tr>
@endsection