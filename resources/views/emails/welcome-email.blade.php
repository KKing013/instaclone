@component('mail::message')
# Welcome to InstaClone!

We hope you enjoy using this new social network. A new world awaits!

<img src="https://www.androidcentral.com/sites/androidcentral.com/files/styles/large/public/article_images/2020/10/genshin-impact-klee_2.png" alt="image" class="w-100">

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thank you ,<br>
{{ config('app.name') }}
@endcomponent
