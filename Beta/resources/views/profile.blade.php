@extends('layouts.main')

@section('title','Profiel')

@section('content')

    <?php
        $checkUrl = new \App\Jobs\CheckUrlJob;
        $user = $checkUrl->checkProfileUrl();
        $userSkills = \App\Http\Controllers\UserController::getExperience($user->id);
        $friendsCount = \App\Jobs\FriendsCounterJob::handle($user);
        $friends = \App\Http\Controllers\FriendsController::getFriends($user->id);

    ?>

    <div class="col-sm-4">
        <div class="co-panel">
            <div class="co-panel__heading--sub">Status</div>
            <div class="co-panel__content--top">
                <span class="mo-timer__status--big"><!--Werken--></span>
                <!--<span class="mo-timer__time">01 : 04 : 24</span>-->
            </div>
        </div>
    </div>

    <!--
      <div class="col-sm-4">
        <div class="co-panel">
          <div class="co-panel__heading--sub">Ervaring</div>
          <div class="co-panel__content--top">
            <span class="mo-experiance__level--big">Level 35</span>
            <span class="mo-experiance__metric">15452 / 35000</span>
          </div>
        </div>
      </div>
    -->

    <div class="col-sm-4">
        <div class="co-panel">
            <div class="co-panel__heading--sub">Reputatie</div>
            <div class="co-panel__content--top">
                <span class="mo-reputation__amount--big">{{$user->find($user->id)->UserStats->reputation}}</span>
                <span class="mo-experiance__metric">/ 100</span>
            </div>
        </div>
    </div>

    <!-- Float breaker -->
    <div class="la-half clearfix">
        <div class="col-xs-12">
            <div class="co-panel">
                <img class="co-panel__image--top img-responsive" src="http://placehold.it/890x340" alt="">
                <div class="mo-profile__accountinfo--card">
                    <img class="mo-profile__image--card" width="140" height="140" src=""
                         onerror="this.onerror=null;this.src='{{ asset('css/gfx/no_profile.png') }}'" alt="">
                    <span class="mo-profile__username--big">@if(isset($user->username)){{$user->username}}@endif</span>
                    <span class="mo-profile__businessname--card">@if(isset($user->company_name)){{$user->company_name}}@endif</span>
                    <p>
                        @if ($user->online_status === 1)
                            Online
                        @else
                            Offline
                        @endif
                    </p>
                </div>
                <div class="col-xs-12">
                    <div class="mo-skill">
                        <div class="col-xs-offset-4 col-xs-8">
                            @foreach(\App\EntryLevels::all() as $entryLevel)
                                <div class="col-xs-4 mo-skill__entry">{{$entryLevel->title}}</div>
                            @endforeach
                        </div>

                        @foreach($userSkills as $userSkill)
                            <div class="mo-skill__row">
                                <div class="col-xs-4">
                                    <span class="mo-skill__name">{{App\Http\Controllers\SkillsController::getSkillTitle($userSkill->skill_id)[0]->title}}</span>
                                </div>
                                <div class="col-xs-8">
                                    <div class="mo-skill__barContainer">
                                        <div style=" width: calc(23px * ({{$userSkill->level - 1}})); height: 15px; overflow: hidden; position: absolute;">
                                            <img class="mo-skill__bar mo-skill__bar--top"
                                                 src="{{ asset('css/gfx/skillbar.svg') }}" alt=""></div>
                                        <img class="mo-skill__bar" src="{{ asset('css/gfx/skillbar-empty.svg') }}"
                                             alt="">
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: Achievements
        <div class="col-xs-12">
          <div class="co-panel">
            <div class="co-panel__heading">Achievement <span class="mo-indicator--heading pull-right">4</span></div>
            <div class="co-panel__content">
              <div class="mo-achievement">
                <img class="mo-achievement__image" src="http://placehold.it/120x120">
                <span class="mo-achievement__title">Title of an achivement</span>
                <p class="mo-achievement__text">You collected something!</p>
              </div>
              <div class="mo-achievement">
                <img class="mo-achievement__image" src="http://placehold.it/120x120">
                <span class="mo-achievement__title">Title of an achivement</span>
                <p class="mo-achievement__text">You collected something!</p>
              </div>
              <div class="mo-achievement">
                <img class="mo-achievement__image" src="http://placehold.it/120x120">
                <span class="mo-achievement__title">Title of an achivement</span>
                <p class="mo-achievement__text">You collected something!</p>
              </div>
              <div class="mo-achievement">
                <img class="mo-achievement__image" src="http://placehold.it/120x120">
                <span class="mo-achievement__title">Title of an achivement</span>
                <p class="mo-achievement__text">You collected something!</p>
              </div>
            </div>
          </div>
        </div>
        END: Achievements -->

    </div>

    <div class="la-half clearfix">
        <div class="col-xs-12">
            <div class="co-panel">
                <div class="co-panel__heading">Netwerk
                    <span class="mo-indicator--heading pull-right">{{$friendsCount}}</span>
                </div>
                <div class="co-panel__list">
                    @if ($friendsCount === 0)
                        <div class="row">
                            <div style="padding: 20px; text-align: center;">
                                <p>
                                    {{$user->username}} heeft nog geen vrienden toegevoegd.
                                </p>
                            </div>
                        </div>
                    @elseif ($friends)
                        @foreach($friends as $friend)
                            <div class="row">
                                <a href="/profile/{{$friend->id}} "
                                   class="mo-friendslist col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                    <div class="mo-friendslist__status mo-friendslist__status--offline">
                                        <img src="{{ asset('css/gfx/no_profile.png') }}" alt="" class="mo-profile__image--friendslist" onerror="this.onerror=null;this.src='{{ asset('css/gfx/no_profile.png') }}'">
                                    </div>
                                    <span class="mo-profile__username--friendslist">{{$friend->username}}</span>
                                </a>
                            </div>
                        @endforeach
                    @endif

                <!-- <div class="row">
                  <ul class="co-pagination">
                    <li><a href="#" class="co-pagination__item co-pagination__item--active">1</a></li>
                    <li><a href="#" class="co-pagination__item">2</a></li>
                    <li><a href="#" class="co-pagination__item">3</a></li>
                    <li><a href="#" class="co-pagination__item">4</a></li>
                    <li><a href="#" class="co-pagination__item">5</a></li>
                  </ul>
                </div> -->
                </div>
            </div>
        </div>

        <!-- BEGIN: Price
        <div class="col-xs-12">
          <div class="co-panel">
            <div class="co-panel__heading">Prijzen <span class="mo-indicator--heading pull-right">3</span></div>
            <div class="co-panel__content">
              <div class="mo-price">
                <img class="mo-price__image" src="http://placehold.it/120x120">
                <span class="mo-price__title">Title of won price</span>
                <p class="mo-price__text">Status or year of the price</p>
              </div>
              <div class="mo-price">
                <img class="mo-price__image" src="http://placehold.it/120x120">
                <span class="mo-price__title">Title of won price</span>
                <p class="mo-price__text">Status or year of the price</p>
              </div>
              <div class="mo-price">
                <img class="mo-price__image" src="http://placehold.it/120x120">
                <span class="mo-price__title">Title of won price</span>
                <p class="mo-price__text">Status or year of the price</p>
              </div>
            </div>
          </div>
        </div>
         END: Price -->

    </div>
@endsection