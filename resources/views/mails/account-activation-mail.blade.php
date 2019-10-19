@extends('mails.layouts.layout')				
@section('content')
<tr style="margin-top:30px;">
   <td width="800" align="center"style="padding:20px 20px 0 20px;">
      <div class="contentEditableContainer contentTextEditable">
         <div class="contentEditable" align='left' >
            <h1>Hi {{ $user->name }},</h1>
            <br>
            <p>Thanks for signing up to Boxset App,we are delighted to have you on board.
               Just one more step,please verify your email address to complete your
               Boxset App account signup.
            </p>
            <p>To verify your email simply click button below.</p>
            <a href="{{ env('APP_URL').'/auth/activate/'.$token }}" class="link">
            Verify Email Address</a>
         </div>
      </div>
   </td>
</tr>
@endsection