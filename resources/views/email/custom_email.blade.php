<!-- resources/views/emails/custom_email.blade.php -->

<p>Hello, {{ ucfirst($user) }}</p>
<p>&nbsp;&nbsp;&nbsp; Here is your Username and Reset password link</p>
<p>&nbsp;&nbsp;&nbsp; username : {{ $user }}</p>
<p>&nbsp;&nbsp;&nbsp; For resetting your password : <a href="{{ $link }}">click here</a></p>
<br/>
<p>Thanks & Regards</p>
<p>SVIM, Indore(M.P.) </p>
