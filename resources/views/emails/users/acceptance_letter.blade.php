<x-mail::message>
<strong>Congratulations</strong>

We are happy to inform you that you have been accepted to the prestigious Waterfall Institute. 
Please use the credentials below to login to your account.

<strong>Username: </strong> {{ $user->email }} <br>
<strong>Passcode: </strong> {{ $user->code }}

The fees summary for this year is also outlined below.
<x-mail::table>
|    Semester   |    Duration   |   Amount  |
| ------------- |:-------------:| ---------:|
|     1<sup>st</sup>|    15 weeks   | Ksh.85000 |
|     2<sup>nd</sup>|    15 weeks   | Ksh.50000 |
|               | **Total**         | Ksh.135000|
</x-mail::table>

<x-mail::button :url="'http://localhost:8000'">
Visit Website
</x-mail::button>

Kind Regards<br>
</x-mail::message>
