
    logInWithFacebook = function()
    {
        FB.login( function( response )
        {
            if( response.authResponse )
            {
                console.log('You are logged in. cookie set! ');

                document.location.href = 'fblogin/login';
            }
            else
                alert('User cancelled login or did not fully authorize.'); // To do: Beautify error
        },
        {
            scope: 'email'
        });

        return false;
    };

    window.fbAsyncInit = function()
    {
        FB.init({
            appId: '1082095225245985',
            cookie: true,
            version: 'v2.2',
            oauth: true,
            xfbml: true
        });
    };

    (function( d, s, id )
    {
        var js, fjs = d.getElementsByTagName( s )[ 0 ];

        if( d.getElementById( id ) )
            return;

        js = d.createElement( s );
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore( js, fjs );
    }
    ( document, 'script', 'facebook-jssdk' ) );
