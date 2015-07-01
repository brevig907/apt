<!doctype html>
<html lang="en">
    <head>
        <title>Apartment Living Guide</title>

        <link rel="stylesheet" href="/foundation/bower_components/foundation/css/foundation.min.css">

        <!-- This is how you would link your custom stylesheet -->
        <link rel="stylesheet" href="/foundation/css/app.css">
        <link rel="stylesheet" href="/foundation/css/template.css">

        <script src="/foundation/bower_components/foundation/js/vendor/modernizr.js"></script>
    </head>
    <body>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">

    <nav class="menu">
        <ul class="inline-list">
            <li><a href="/dashboard">Home</a></li>
            <li><a href="/dashboard/meta">Meta Tool</a></li>

        </ul>
        <ul class="inline-list hide-for-small-only account-action">
            <!-- <li><a href="#" data-reveal-id="myModal">Login</a></li> -->
        </ul>
        <a class="account hide-for-medium-up" href="#" data-reveal-id="myModal"><i class="fi-unlock"></i></a>
    </nav>

    <!-- modal content -->

    <div id="myModal" class="reveal-modal" data-reveal aria-labelledby="login or sign up" aria-hidden="true" role="dialog">
        <div class="row">
            <div class="large-6 columns auth-plain">
                <div class="signup-panel left-solid">
                    <p class="welcome">Registered Users</p>
                    <form>
                        <div class="row collapse">
                            <div class="small-2  columns">
                                <span class="prefix"><i class="fi-torso-female"></i></span>
                            </div>
                            <div class="small-10  columns">
                                <input type="text" placeholder="username">
                            </div>
                        </div>
                        <div class="row collapse">
                            <div class="small-2 columns ">
                                <span class="prefix"><i class="fi-lock"></i></span>
                            </div>
                            <div class="small-10 columns ">
                                <input type="text" placeholder="password">
                            </div>
                        </div>
                    </form>
                    <a href="#" class="button ">Log In </a>
                </div>
            </div>

            <div class="large-6 columns auth-plain">
                <div class="signup-panel newusers">
                    <p class="welcome"> New User?</p>
                    <p>By creating an account with us, you will be able to move through the checkout process faster, view and track your orders, and more.</p><br>
                    <a href="#" class="button ">Sign Up</a></br>
                </div>
            </div>

        </div>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>

        @yield('content')

        <script src="/foundation/bower_components/foundation/js/vendor/jquery.js"></script>
        <script src="/foundation/bower_components/foundation/js/foundation.min.js"></script>
        <script>
            $(document).foundation();
        </script>

        @yield('footer-scripts')
    </body>
</html>