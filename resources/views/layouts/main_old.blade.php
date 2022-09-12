<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ trans('panel.site_title') }}</title>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="header">
                <div class="col col-4 col-sm-12">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('images/logo.svg') }}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.nav')

    @if(!isset($exception))
    <div class="searchfield bg-hed-search">
        <div class="container" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="row text-center margin-bottom-20">
                <h1 class="white">{{ trans('panel.site_title') }}</h1>
            </div>
            <br>
            <div class="row search-row">
                <form id="main-search-form" action="/search" method="GET" enctype="multipart/form-data">
                

                    <input id="main-search-input" type="text" class="search typeahead" name="keywords" placeholder="What do you need help with?" autocomplete="chrome-off">
                    <!-- <select id="main-search-input" class="search form-control" name="keywords"></select> -->
                    <a class="buttonsearch btn btn-info btn-lg btn-search">Search</a>
                </form>
            </div>
        </div>
    </div>
    @endif

    <div class="container-fluid featured-area-default padding-30">
        <div class="row">
            @yield('content')

            @if(!isset($exception))
            @include('partials.sidebar')
            @endif
        </div>
    </div>

    @yield('about')

    @include('partials.footer')

    <script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src='https://cdn.rawgit.com/VPenkov/okayNav/master/app/js/jquery.okayNav.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js" integrity="sha512-P2Z/b+j031xZuS/nr8Re8dMwx6pNIexgJ7YqcFWKIqCdbjynk4kuX/GrqpQWEcI94PRCyfbUQrjRcWMi7btb0g==" crossorigin="anonymous"></script> -->

    <script>
        $(document).ready(function() {
            $(".btn-search").on("click", function(e) {
                e.preventDefault();
                $('form#main-search-form').submit();
            });

            var path = "{{ route('kb.search.select_search') }}";

            // function processData(data) {
            //     var newData = [];
            //     $.each(data, function() {
            //         newData.push(this.title);
            //     });
            //     // console.log(newData);
            //     return newData;
            // }

            window.query_cache = {};

            $('input.typeahead').typeahead({
                source: function(query, process) {
                    // if in cache use cached value, if don't wanto use cache remove this if statement
                    if (query_cache[query]) {
                        process(query_cache[query]);
                        return;
                    }
                    if (typeof searching != "undefined") {
                        clearTimeout(searching);
                        process([]);
                    }
                    searching = setTimeout(function() {
                        return $.getJSON(
                            path, {
                                q: query
                            },
                            function(data) {
                                // save result to cache, remove next line if you don't want to use cache
                                query_cache[query] = data;
                                // only search if stop typing for 300ms aka fast typers
                                return process(data);
                            }
                        );
                    }, 300); // 300 ms
                }
            });

            // $('#main-search-input').select2({
            //     placeholder: 'What do you need help with?',
            //     ajax: {
            //         url: '/select-search',
            //         dataType: 'json',
            //         // method:"POST",
            //         delay: 250,
            //         processResults: function (data) {
            //             return {
            //                 results: $.map(data, function (item) {
            //                     return {
            //                         text: item.title,
            //                         id: item.title
            //                     }
            //                 })
            //             };
            //         },
            //         cache: true
            //     }
            // });
        });
    </script>
</body>

</html>