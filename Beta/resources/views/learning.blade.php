@extends('layouts.main')

@section('title', 'Leren')

@section('content')

    <?php $i = 1; ?>

    @foreach($assignments as $assignment)
        <div class='col-xs-12 col-sm-6 col-md-6 col-lg-4'>
            <div class='co-panel'>
                <img class='co-panel__image--top img-responsive' src='{{asset('css/gfx/assignments/' . $i . '.png')}}' alt=''>
                <span class='mo-label mo-label__card--right'>{{$assignment->skill_type[0]->title}}</span>

                <div class='co-panel__content'>
                    <span class='font__focus'>{{$assignment->converted_duration}} </span>{{$assignment->title}}
                </div>
                <div class='co-actionbar col-xs-12'>
                    <div class='co-actionbar__values'>
                        <span class='co-actionbar__item'>
                            @if ($assignment->peanuts > 0 || $assignment->peanuts < 0)
                                <i class="mo-icon-font mo-icon-font__currency">
                                </i>
                                {{$assignment->peanuts}}
                            @else
                                Gratis
                            @endif
                        </span>
                        <span class='co-actionbar__item'>XP {{$assignment->experience_points}}</span>
                    </div>
                    <div class='co-actionbar__button--right'>
                        <a href='/learning/start-assignment/{{$assignment->id}}' class='mo-button mo-button__secondary @if($assignments->disabled === 1) assignment-start-button-disabled @endif '>start <i class='mo-icon-font mo-icon-font__start'></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php $i++; ?>
    @endforeach

@endsection