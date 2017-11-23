
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Startup City</title>
    <base href='[=@base_url]'/>
    <link rel="stylesheet" href="{{ asset('css/home/home.css')}}">
    <script type="text/javascript" src="{{ asset('js/home/jquery-3.2.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/home/fb_login.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/home/home.js') }}"></script>

    <link href="{{ asset('css/home/multifont.css') }}" rel="stylesheet">
</head>

<body>

{{--@todo make independent--}}
@if(Session::has('success') || Session::has('error'))
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         style="display: none;">
        <defs>
            <g id="close">
                <rect id="Rectangle-2"
                      transform="translate(8.485281, 8.485281) rotate(-45.000000) translate(-8.485281, -8.485281) "
                      x="-2.51471863" y="7.48528137" width="22" height="2" rx="1"></rect>
                <rect id="Rectangle-2"
                      transform="translate(8.485281, 8.485281) rotate(-315.000000) translate(-8.485281, -8.485281) "
                      x="-2.51471863" y="7.48528137" width="22" height="2" rx="1"></rect>
            </g>
        </defs>
    </svg>
    <!-- notification -->
    <div class="notification

        @if(Session::has('success'))
                success
        @elseif(Session::has('error'))
                  error
        @endif

            ">
        <div class="notification_container">

            @if(Session::has('success'))
                {{Session::get('success')}}
            @elseif(Session::has('error'))
            {{Session::get('error')}}
            @endif

            <svg viewBox="0 0 17 17" class="close_notification">
                <use xlink:href="#close"></use>
            </svg>
        </div>
    </div>
@endif

<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: none;">
    <defs>
        <g id="close">
            <rect id="Rectangle-2"
                  transform="translate(8.485281, 8.485281) rotate(-45.000000) translate(-8.485281, -8.485281) "
                  x="-2.51471863" y="7.48528137" width="22" height="2" rx="1"></rect>
            <rect id="Rectangle-2"
                  transform="translate(8.485281, 8.485281) rotate(-315.000000) translate(-8.485281, -8.485281) "
                  x="-2.51471863" y="7.48528137" width="22" height="2" rx="1"></rect>
        </g>
        <g id="svg_logo">
            <g id="svg_logo_path" transform="translate(-1.000000, 0.000000)">
                <path d="M4.0811373,116.132759 C2.73436798,115.7788 1.56891201,115.282402 0.584734423,114.64355 L2.37178478,111.198946 C4.21927603,112.355786 6.23076671,112.934198 8.40631716,112.934198 C10.4264711,112.934198 11.436533,112.433483 11.436533,111.432039 C11.436533,110.896785 11.1559603,110.478084 10.5948064,110.175924 C10.0336525,109.873764 9.14876924,109.541394 7.94013011,109.178802 C6.67969215,108.81621 5.63509828,108.449307 4.80631716,108.078083 C3.97753603,107.706858 3.26531294,107.162978 2.66962651,106.446428 C2.07394008,105.729877 1.77610133,104.793196 1.77610133,103.636356 C1.77610133,102.462249 2.1041556,101.430605 2.76027399,100.541392 C3.41639238,99.6521788 4.34444065,98.9658547 5.54444665,98.4823991 C6.74445265,97.9989434 8.14731632,97.7572192 9.75307975,97.7572192 C11.0998491,97.7572192 12.3861671,97.9385124 13.6120726,98.3011041 C14.837978,98.6636958 15.8135078,99.1557772 16.5386913,99.7773631 L14.8034395,103.221967 C14.0437234,102.669447 13.2063217,102.242113 12.2912092,101.939953 C11.3760968,101.637793 10.49553,101.486716 9.64948262,101.486716 C8.69983759,101.486716 7.94876596,101.637793 7.39624521,101.939953 C6.84372447,102.242113 6.56746824,102.660814 6.56746824,103.196068 C6.56746824,103.748589 6.84804097,104.171606 7.40919485,104.465133 C7.97034874,104.75866 8.86386498,105.078081 10.0897704,105.423406 C11.3674746,105.785998 12.416385,106.148584 13.236533,106.511176 C14.056681,106.873768 14.7645876,107.409014 15.360274,108.116931 C15.9559604,108.824849 16.2537992,109.739947 16.2537992,110.862255 C16.2537992,112.709746 15.5545256,114.138509 14.1559574,115.148586 C12.7573893,116.158663 10.7804307,116.663694 8.22502219,116.663694 C6.80918778,116.663694 5.42790662,116.486717 4.0811373,116.132759 Z M22.2982953,116.396733 L23.4378636,101.893136 L17.8954176,101.893136 L18.206209,97.9564455 L34.1083672,97.9564455 L33.8234751,101.893136 L28.3069284,101.893136 L27.1932593,116.396733 L22.2982953,116.396733 Z M46.2372144,116.19353 L44.8904518,112.386336 L36.6803799,112.386336 L34.7638331,116.19353 L29.8170705,116.19353 L39.8659914,97.7532421 L43.7508835,97.7532421 L50.8990849,116.19353 L46.2372144,116.19353 Z M38.5451281,108.734537 L43.5954878,108.734537 L41.4976461,102.8554 L38.5451281,108.734537 Z M65.4803799,109.369069 C65.7911728,109.740294 66.04153,110.245325 66.231459,110.884177 L68.0185094,116.19353 L62.8904518,116.19353 L60.9739051,110.0554 C60.7667098,109.364749 60.1710323,109.019429 59.1868547,109.019429 L57.3480058,109.019429 L56.8041209,116.19353 L52.012754,116.19353 L53.4372144,97.7532421 L62.4501641,97.7532421 C64.3839867,97.7532421 65.8947629,98.2366905 66.9825382,99.2036018 C68.0703134,100.170513 68.6141928,101.456831 68.6141928,103.062595 C68.6141928,106.066926 67.1811136,107.905757 64.3149123,108.579141 C64.7811016,108.734538 65.169587,108.997845 65.4803799,109.369069 Z M61.4918907,105.39353 C62.3379381,105.39353 62.9767806,105.212237 63.4084374,104.849645 C63.8400943,104.487053 64.0559195,103.977706 64.0559195,103.321587 C64.0559195,102.682735 63.8746263,102.20792 63.5120346,101.897127 C63.1494428,101.586334 62.5710313,101.43094 61.7767828,101.43094 L57.91779,101.43094 L57.6069986,105.39353 L61.4918907,105.39353 Z M74.6487252,116.19353 L75.7882936,101.689933 L70.2458475,101.689933 L70.5566389,97.7532421 L86.4587972,97.7532421 L86.1739051,101.689933 L80.6573583,101.689933 L79.5436892,116.19353 L74.6487252,116.19353 Z M87.4688691,109.200724 C87.4688691,108.958996 87.4861351,108.59641 87.5206677,108.112954 L88.3494446,97.7532421 L93.1149123,97.7532421 L92.2861353,108.26835 C92.268869,108.458279 92.260236,108.725902 92.260236,109.071228 C92.260236,110.297133 92.5494417,111.212232 93.1278619,111.816551 C93.7062821,112.420871 94.5911653,112.723026 95.7825382,112.723026 C96.7321832,112.723026 97.4832548,112.429504 98.0357756,111.842451 C98.5882963,111.255397 98.9249836,110.262602 99.0458475,108.864033 L99.9523223,97.7532421 L104.691891,97.7532421 L103.863114,108.553242 C103.673185,111.160449 102.874632,113.124458 101.46743,114.445328 C100.060229,115.766198 98.0789538,116.426623 95.5235454,116.426623 C90.1537343,116.426623 87.4688691,114.018014 87.4688691,109.200724 Z M119.085919,98.3459393 C120.035564,98.7862292 120.760737,99.4034892 121.261458,100.197738 C121.76218,100.991986 122.012538,101.907085 122.012538,102.943062 C122.012538,104.825085 121.425493,106.292697 120.251387,107.345939 C119.07728,108.399182 117.393844,108.925795 115.201027,108.925795 L111.031243,108.925795 L110.461458,116.125795 L105.618293,116.125795 L107.068653,97.6855076 L115.693113,97.6855076 C117.00535,97.6855076 118.136274,97.9056493 119.085919,98.3459393 Z M116.780883,104.756011 C117.247072,104.393419 117.480163,103.884072 117.480163,103.227954 C117.480163,101.984782 116.668661,101.363205 115.045631,101.363205 L111.652825,101.363205 L111.342034,105.299896 L114.70894,105.299896 C115.624053,105.299896 116.314694,105.118603 116.780883,104.756011 Z"
                      id="title_startup"
                      transform="translate(61.298636, 107.174601) rotate(-4.500000) translate(-61.298636, -107.174601) "></path>
                <path d="M92.3120415,134.394854 C90.956639,133.678303 89.9163617,132.650975 89.1911782,131.312839 C88.4659947,129.974703 88.1034084,128.399179 88.1034084,126.586221 C88.1034084,124.566067 88.5134762,122.800617 89.3336242,121.289818 C90.1537722,119.779019 91.3105952,118.613563 92.8041278,117.793415 C94.2976605,116.973267 96.0372114,116.563199 98.0228328,116.563199 C99.2487383,116.563199 100.405561,116.735859 101.493336,117.081185 C102.581112,117.42651 103.548008,117.927224 104.394056,118.583343 L102.632905,122.027947 C101.890455,121.45816 101.165282,121.043776 100.457365,120.784782 C99.749448,120.525788 99.0156424,120.396292 98.2559264,120.396292 C96.5983641,120.396292 95.3120461,120.944488 94.3969336,122.040897 C93.4818211,123.137305 93.0242717,124.652398 93.0242717,126.586221 C93.0242717,128.226517 93.3825415,129.478303 94.0990918,130.341616 C94.8156422,131.20493 95.8645526,131.63658 97.2458544,131.63658 C97.9710379,131.63658 98.717793,131.502769 99.4861422,131.235141 C100.254491,130.967514 101.09621,130.557446 102.011322,130.004926 L103.228588,133.44953 C102.607002,134.053849 101.735069,134.541614 100.612761,134.912839 C99.4904531,135.284064 98.3336302,135.469674 97.1422573,135.469674 C95.2774998,135.469674 93.6674439,135.111404 92.3120415,134.394854 Z M105.611322,135.23658 L107.035782,116.796292 L111.904847,116.796292 L110.454488,135.23658 L105.611322,135.23658 Z M129.10197,116.796292 L113.873193,116.796292 L113.562401,120.732983 L119.104847,120.732983 L117.965279,135.23658 L122.860243,135.23658 L123.973912,120.732983 L130.825753,120.749353 L135.291898,128.114278 L134.748013,135.23658 L139.617077,135.23658 L140.160962,128.191976 L148.837221,116.796292 L143.242977,116.796292 L137.959523,124.332983 L133.841538,116.796292 L129.10197,116.796292 Z"
                      id="title_city"
                      transform="translate(118.470315, 126.016436) rotate(-4.500000) translate(-118.470315, -126.016436) "></path>
                <rect id="Rectangle-path" fill-rule="nonzero" x="86.3977325" y="18.1812499" width="12.2768326"
                      height="2.24650845"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="86.3977325" y="25.5641928" width="12.2768326"
                      height="2.24650845"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="86.3977325" y="32.9483473" width="12.2768326"
                      height="2.24650845"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="86.3977325" y="40.3325018" width="9.69853235"
                      height="2.24650845"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="86.3977325" y="47.7166563" width="9.69853235"
                      height="2.24650845"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="86.3977325" y="55.0995991" width="9.69853235"
                      height="2.24650845"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="86.3977325" y="62.4837537" width="9.69853235"
                      height="2.24650845"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="86.3977325" y="69.8506601" width="9.69853235"
                      height="2.24650845"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="86.3977325" y="77.2175666" width="9.69853235"
                      height="2.24650845"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="109.215524" y="68.5301815" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="109.215524" y="73.4521433" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="109.215524" y="78.3753169" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="117.563851" y="68.5301815" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="117.563851" y="73.4521433" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="117.563851" y="78.3753169" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="109.215524" y="48.8399105" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="109.215524" y="53.7618724" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="109.215524" y="58.685046" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="109.215524" y="63.6070079" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="117.563851" y="48.8399105" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="117.563851" y="53.7618724" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="117.563851" y="58.685046" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="117.563851" y="63.6070079" width="3.4729559"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="58.1607757" y="56.2240651" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="58.1607757" y="61.1460269" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="58.1607757" y="66.0692005" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="63.0722341" y="56.2240651" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="63.0722341" y="61.1460269" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="63.0722341" y="66.0692005" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="58.1607757" y="70.9911624" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="58.1607757" y="75.914336" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="58.1607757" y="80.8362979" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="63.0722341" y="70.9911624" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="63.0722341" y="75.914336" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="63.0722341" y="80.8362979" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="58.1607757" y="36.5337941" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="58.1607757" y="41.455756" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="58.1607757" y="46.3789296" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="58.1607757" y="51.3008915" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="63.0722341" y="36.5337941" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="63.0722341" y="41.455756" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="63.0722341" y="46.3789296" width="2.45512476"
                      height="2.46098094"></rect>
                <rect id="Rectangle-path" fill-rule="nonzero" x="63.0722341" y="51.3008915" width="2.45512476"
                      height="2.46098094"></rect>
                <path d="M130.14513,64.0589753 L130.14513,33.8316831 L105.591465,41.2158376 L105.591465,7.4491435 L100.680007,7.4491435 L100.680007,0.0649889768 L84.3934997,0.0649889768 L84.3934997,7.4491435 L79.4820413,7.4491435 L79.4820413,36.9845499 L73.6700079,36.9845499 L73.6700079,27.1394144 L50.0169178,27.1394144 L50.0169178,54.2138399 L20.4738981,54.2138399 L20.4738981,85.0142019 L15.1127567,85.3825472 L15.1127567,89.4017859 L24.4835726,88.6650953 L24.4835726,58.2330786 L50.0169178,58.2330786 L50.0169178,86.6574163 L54.0265922,86.3359937 L54.0265922,58.2330786 L54.0265922,56.2228534 L54.0265922,31.1598648 L69.6603335,31.1598648 L69.6603335,41.0050003 L79.4820413,41.0050003 L79.4820413,84.3514993 L83.4917158,84.027969 L83.4917158,41.0050003 L83.4917158,38.9947751 L83.4917158,11.4695939 L84.3922908,11.4695939 L100.680007,11.4695939 L101.580582,11.4695939 L101.580582,41.4569677 L99.125457,42.580222 L99.125457,82.8127089 L103.135131,82.5125407 L103.135131,46.1511283 L126.134247,39.2346935 L126.134247,68.078214 L133.50083,68.078214 L133.50083,101.767936 L142.871646,101.031245 L142.871646,97.0120063 L137.510505,97.3803516 L137.510505,64.0589753 L130.14513,64.0589753 Z M96.6703323,7.4491435 L88.4031741,7.4491435 L88.4031741,4.08543937 L96.6703323,4.08543937 L96.6703323,7.4491435 Z"
                      id="Shape" fill-rule="nonzero"></path>
                <polygon id="Line" fill-rule="nonzero"
                         points="13.9710697 136.117407 78.27568 131.064902 77.9713764 127.191946 13.666766 132.244451"></polygon>
            </g>
        </g>
    </defs>
</svg>


<!-- notification -->


<!-- overlay -->

<div class="overlay overlay_signup">
    <img src="{{ asset('css/gfx/close.png') }}" class="close_popup"/>
    <h3>Aanmelden</h3>
    <a href="/facebook" class="button button_facebook"><img
                src="{{ asset('css/gfx/facebook_icon.png') }}">Aanmelden met Facebook</a>
    <a href="/google" class="button button_google"><img src="{{ asset('css/gfx/google_icon.png') }}">Aanmelden met
        Google</a>
    <div class="of">
        <span>of</span>
    </div>
    <form method="post" action="/register">
        {{ csrf_field() }}
        <label for="email">E-mailadres</label>
        <input type="email" name="email" id="email" required="required" maxlength="40">
        <label for="password">Wachtwoord</label>
        <input type="password" name="password" id="password" required="required" maxlength="30">
        <a href="#" class="subbutton to_signin" onclick="return false;">Al lid?</a>
        <input type="submit" value="Aanmelden" name="ipt-smregister">
    </form>
</div>

<div class="overlay overlay_signin">
    <img src="{{ asset('css/gfx/close.png') }}" class="close_popup"/>
    <h3>Inloggen</h3>
    <a href="/facebook" class="button button_facebook"><img
                src="{{ asset('css/gfx/facebook_icon.png') }}">Inloggen met Facebook</a>
    <a href="/google" class="button button_google"><img src="{{ asset('css/gfx/google_icon.png') }}">Inloggen met
        Google</a>
    <div class="of">
        <span>of</span>
    </div>
    <form method="post" action="/profile">
        {{ csrf_field() }}
        <label for="email">Gebruikersnaam of e-mailadres</label>
        <input type="email" name="email" id="email" maxlength="40">
        <a href="#" class="forgot_password" onclick="return false;">Vergeten?</a>
        <label for="password">Wachtwoord</label>
        <input type="password" name="password" id="password" maxlength="30">
        <a href="#" class="subbutton to_signup" onclick="return false;">Nog geen account?</a>
        <input type="submit" value="Inloggen" name="ipt-smlogin">
    </form>
</div>

<div class="overlay overlay_forgot">
    <img src="{{ asset('css/gfx/close.png') }}" class="close_popup"/>
    <h3>Wachtwoord vergeten</h3>
    <p>Voer je e-mailadres in en je krijgt een email met instructies om je wachtwoord te herstellen.</p>
    <form>
        <label>E-mailadres</label>
        <input type="email" name="email" required="required" maxlength="40">
        <a href="#" class="subbutton to_signin" onclick="return false;">Terug naar inloggen</a>
        <input type="submit" value="Versturen" name="">
    </form>
</div>

<div id="overlay_bg" class="hidden"></div>


<div id="container" style="background-image: url(css/gfx/bg.png);">

    <div class="header">

        <svg viewBox="0 0 150 138" class="logo">
            <use xlink:href="#svg_logo"></use>
        </svg>

        <a class="signin_button">Inloggen</a>
    </div>

    <div class="content">


        <div class="intro">
            <h1>Van zolderkamer naar droombedrijf</h1>
            <p>In deze online game kan je jouw eigen startup opzetten en je creativiteit en ambities in uiten. Werk je
                voor klanten of zet je een eigen product in de markt? Zoek je investering of doe je het helemaal zelf?
                Het kan allemaal!</p>
            <a class="signup_button">Speel nu mee!</a>
        </div>

        <div class="screenshot">
            <img src="{{ asset('css/gfx/screenshot.png') }}" class="desktop"/>
            <img src="{{ asset('css/gfx/screenshot_mobile.png') }}" class="mobile"/>
        </div>

        <div class="clear"></div>

    </div>

</div>

<div id="instruction">

    <h2>Hoe ga jij het aanpakken?</h2>

    <div class="item">
        <img src="{{ asset('css/gfx/item1.png') }}"/>
        <h3>1. Train je skills</h3>
        <p>Of je nu beter wilt worden in Sales, Strategie of Programmeren: Door te werken en te leren doe je ervaring op
            en verdien je jouw eerste geld als aanstormend talent.</p>
    </div>
    <div class="item">
        <img src="{{ asset('css/gfx/item2.png') }}"/>
        <h3>2. Bouw je netwerk</h3>
        <p>Leer mensen kennen die je misschien nog wel nodig gaat hebben. Door competities te winnen, zoals Hackathons,
            bouw je jouw reputatie op in deze wereld.</p>
    </div>
    <div class="item">
        <img src="{{ asset('css/gfx/item3.png') }}"/>
        <h3>3. Breid je bedrijf uit</h3>
        <p>Een kantoor, personeel, auto van de zaak en hele grote opdrachten: Het kan allemaal zolang jij de juiste
            keuzes blijft maken en de belastingdienst tevreden houdt.</p>
    </div>
    <div class="item">
        <img src="{{ asset('css/gfx/item4.png') }}"/>
        <h3>4. The sky is the limit</h3>
        <p>Heb jij het ei van columbus en ga jij het anders aanpakken dan al die anderen? Verdien bij Startup City veel
            geld, wordt gefinancieerd of ga zelf iemand financieren.</p>
    </div>
    <div class="clear"></div>

</div>

</body>
</html>
