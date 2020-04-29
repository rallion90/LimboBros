@component('mail::message')
# Introduction

Your order is shits.

{{ $data['product_name'] }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
