
<?php
    $checkUrl = new \App\Jobs\CheckUrlJob();
    $urlItems = $checkUrl->explodeUrl()[1];
    $activeClass= ' co-menu--active';
?>
<a href="/profile" class="co-menu co-menu__profile{{$urlItems === 'profile' ? $activeClass : ''}}">profiel</a>
<!-- <a href="inbox" class="co-menu co-menu__[=menu_item_inbox]">inbox</a> -->
<a href="/working" class="co-menu co-menu__work {{$urlItems === 'working' ? $activeClass : ''}}">werken</a>
<a href="/learning" class="co-menu co-menu__learn {{$urlItems === 'learning' ? $activeClass : ''}}">leren</a>
{{--<a href="/projects" class="co-menu co-menu__project {{$urlItems === 'projects' ? $activeClass : ''}}">projecten</a>--}}
<a href="/users/0/10" class="co-menu co-menu__profile {{$urlItems === 'users' ? $activeClass : ''}}">gebruikers</a>

<!--
<a href="events" class="co-menu co-menu__[=menu_item_events]">evenementen</a>
<a href="office" class="co-menu co-menu__[=menu_item_office]">kantoor</a>
<a href="administration" class="co-menu co-menu__[=menu_item_administration]">administratie</a>
-->
<a href="/logout" class="co-menu co-menu__administration {{$urlItems[1] == 'logout' ? $activeClass : ''}}">uitloggen</a>