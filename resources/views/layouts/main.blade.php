<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ trans('panel.site_title') }}</title>
</head>

<body>
    <div class="wrapper">
        <div class="wrapper-inner">
            <div class="container main-container">

                <div class="row header">
                    <div class="col-md-12">
                        <div class="header-search">
                            <form id="main-search-form" action="/search" method="GET" enctype="multipart/form-data">
                                <input id="main-search-input" type="text" placeholder="Type to search..." class="typeahead form-control"  name="keywords" autocomplete="chrome-off">
                                <!-- <a class="buttonsearch btn btn-info btn-search">Search</a> -->
                            </form>
                        </div>
                        <div class="">
                            <!-- <div class="logo"> -->
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('images/logo-centrecom.png') }}" alt="logo-centrecom">
                            </a>
                        </div>
                    </div>


                </div>
                <!--Navigation-->
                @include('partials.nav')
                <!-- Navigation end -->

                <!-- Hero Section -->
                <div class="row">
                    <div class="bg-hed-search">
                        <!-- <h1 class="white">{{ trans('panel.site_title') }}</h1> -->
                        &nbsp;<br>
                        &nbsp;<br>
                        &nbsp;<br>
                    </div>
                </div>
                <!-- End Hero Section -->

                <div class="row pb-2">
                    <!-- Main Content -->
                    <div class="col-md-9">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                    <!--- End Main Content-->
                    <!-- Sidebar -->
                    <div class="sidebar-wrapper col-md-3">
                        <div class="sidebar-item">
                            <div class="card">
                                <div class="card-body p-0">
                                    <img src="{{ asset('images/logo.svg') }}">
                                    <!-- <span class="float-right pr-3">
                                        <small>Advertisement</small>
                                    </span> -->
                                </div>
                            </div>
                        </div>
                        @if(!isset($exception))
                        @include('partials.sidebar')
                        @endif
                    </div>
                    <!-- End Sidebar -->
                </div>
                @include('partials.footer')
            </div>
        </div>
    </div>

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