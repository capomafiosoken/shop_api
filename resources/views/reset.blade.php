<!DOCTYPE html>
<html lang="en">

<body>

<p>Dear {{ $user ->name }}</p>
<p>Your requested to reset password, please follow the link below get the reset password</p>
<p><a href="{{ route('reset',$user ->reset_password_token) }}">
        {{ route('reset',$user ->reset_password_token) }}
    </a></p>

<p>Thanks</p>

</body>

</html>
