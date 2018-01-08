
@extends('layouts.main')
@section('title', 'Leren')
<?php

?>

@section('content')
    @foreach($assignments as $assignment)
    <div class='col-xs-12 col-sm-6 col-md-6 col-lg-4'>
        <div class='co-panel'>
            <img class='co-panel__image--top img-responsive' src='' alt=''>
            <span class='mo-label mo-label__card--right'></span>
            <div class='co-panel__content'>
                <span class='font__focus'>{{$assignment->duration}}</span>{{$assignment->title}}
            </div>
            <div class='co-actionbar col-xs-12'>
                <div class='co-actionbar__values'>
                    <span class='co-actionbar__item'>{{$assignment->price}}<i class="mo-icon-font mo-icon-font__currency"></i></span>
                    <span class='co-actionbar__item'>XP {{$assignment->experience_points}}</span>
                </div>
                <div class='co-actionbar__button--right'>
                    <a href='/learning/start-assignment/{{$assignment->id}}' class='mo-button mo-button__secondary" . $start_button_class_addition . "'>start <i class='mo-icon-font mo-icon-font__start'></i></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach

@endsection