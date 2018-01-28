<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 44px;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading title flex-center">River Stour readings</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Vue.js component -->
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div id="app">
                    <component v-bind:is="currentView">
                      <!-- component changes when vm.currentView changes! -->
                    </component>
                </div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
        <script>
            window.Laravel = <?php echo json_encode([
               'csrfToken' => csrf_token(),
                    ]); ?>
        </script>
    </body>
</html>
