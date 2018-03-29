@component('mail::message')

# Bem Vindo!

{{ $user->name }} Este email é para confirmar o seu cadastro em seu sistema,
Agora você pode acompanhar as suas vendas e outras informações em noso site.

@component('mail::button', ['url' => $url])
Acessar Sistema
@endcomponent

Muito Obrigado,<br>
{{ config('app.name') }}
@endcomponent
