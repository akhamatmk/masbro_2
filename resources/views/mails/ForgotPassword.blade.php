Hello <i>{{ $user->name }}</i>,
<p>This is a email for reset Your Password.</p>
 
<p>Please click link <u><a href="{{ url('reset/password/'.$user->remember_token.'/'.$user->email) }}">this</a></u> for reset your password</p>
 
Thank You,
<br/>
<i>Admin Masbro</i>