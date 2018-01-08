<?php

    $assignmentData = \App\Http\Controllers\UserAssignmentsController::getActiveAssignment();

?>

<h1 class="co-menubar__title">@yield('title')</h1>
<a href="/profile" class="pull-right">
    <img class="mo-profile__image--circle" width="35" height="35" alt="Profile picture" src="{{auth()->user()->picture}}@if(strpos(auth()->user()->picture, 'google')){{'?sz=50'}}@else{{'?type=normal'}}@endif" onerror="this.onerror=null;this.src='{{ asset('css/gfx/no_profile.png') }}'" />
    <div class="mo-profile__accountinfo--menubar">
        <span class="mo-profile__username--menubar">@if(isset(auth()->user()->username)){{auth()->user()->username}}@endif</span>
        <span class="mo-profile__businessname--menubar">@if (isset(auth()->user()->company_name)) {{ auth()->user()->company_name }}@endif</span>
    </div>
</a>
<div class="mo-money pull-right">
    <i class="mo-icon-font mo-icon-font__currency"></i> <span id="mo-money__amount" class="mo-money__amount">{{auth()->user()->find(auth()->user()->id)->userStats->peanuts}}</span>
</div>
<div class="mo-timer pull-right">

    <span id="mo-timer__status" class="mo-timer__status"></span>

    <span id="mo-timer__time" class="mo-timer__time"></span>
    <input id="assignment-start-time" type="hidden" value="@if (isset($assignmentData[0])){{$assignmentData[0]->start_time}}@else{{0}}@endif" />
    <input id="assignment-duration" type="hidden" value="@if (isset($assignmentData[0])){{$assignmentData[0]->duration}}@else{{0}}@endif" />
    <input id="assignment-peanuts" type="hidden" value="@if (isset($assignmentData[0])){{$assignmentData[0]->peanuts}}@else{{0}}@endif" />
    <input id="assignment-status" type="hidden" value="@if (isset($assignmentData[0])){{$assignmentData[0]->assignment_type_id}}@else{{0}}@endif" />
</div>