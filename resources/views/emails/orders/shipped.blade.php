@component('mail::message')
# Introduction

The body{{$order['a']}} of your message.{{$order['c']}}



@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
