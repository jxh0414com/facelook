@component('mail::message')
# Reset Password Notification

<p>This is a request to reset password. Link will be invalid after 60 minutes</p>
<p>Click below to follow the instruction in order to proceed</p>
<p>If you did not request a reset password. No further action is required</p>

@component('mail::button', ['url' => $linkToReset])
Click!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
