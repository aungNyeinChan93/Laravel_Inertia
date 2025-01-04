<x-mail::message>
# Introduction

This {{$user->name}} has been created. {{$user->created_at->diffForHumans()}}

<x-mail::button :url="''">
Button Text {{$user->name}}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
