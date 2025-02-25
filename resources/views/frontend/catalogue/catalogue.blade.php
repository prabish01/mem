<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Catalogue-{{ $catalogue->catalogue_title }}</title>
    <style>
        html,
        body {

            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .wrapper {
            align-items: center;
            display: flex;
            height: 90%;
            justify-content: center;
            margin: 5%;
            width: 90%;
        }

        .aspect {
            padding-bottom: 70%;
            position: relative;
            width: 100%;
            margin-top: 10%;
            margin-left: 10%;
        }

        .aspect-inner {
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
        }

        .flipbook {
            border-radius: 20px;
            height: 78%;
            /*transition: margin-left 0.25s ease-out;*/
            width: 80%;
            /*box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 1);*/
        }

        .flipbook .page {
            height: 100%;
            width: 100%;
            border-radius: 20px;
        }

        .flipbook .page img {
            max-width: 100%;
            height: 100%;
            border-radius: 20px;
        }

        .test {
            position: absolute;
            top: 0;
            right: 0;
            margin-right: 10px;
        }

        .flip-control {
            position: absolute;
            width: 400px;
            text-align: center;
        }

        .flip-control a {
            margin-left: 10px;
        }

        #prev {
            position: absolute;
            left: 0;
            margin-left: 10px;
        }

        #next {
            position: absolute;
            right: 0;
            margin-right: 10px;
        }

    </style>
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/material-design/css/material-design-iconic-font.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="https://rkei0.csb.app/turn.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="aspect">
            <div class="aspect-inner">
                <div class="flipbook" id="flipbook">

                    <div class="page"><img
                            src="{{ asset('uploads/catalogue' . '/' . $catalogue->catalogue_title . '/' . $catalogue->page) }}"
                            draggable="false" alt="" /></div>
                    @foreach ($cataloguePages as $cataloguepage)
                        <div class="page"><img
                                src="{{ asset('uploads/catalogue' . '/' . $catalogue->catalogue_title . '/' . $cataloguepage->filename) }}"
                                draggable="false" alt="" /></div>

                    @endforeach

                </div>

            </div>
        </div>
        <a href="#" role="button" class="card m-2 p-2" id="prev"> <i class="fa fa-arrow-alt-circle-left text-danger"></i> </a>
        <a href="#" role="button" class="card m-2 p-2" id="next">  <i class="fa fa-arrow-alt-circle-right text-danger"></i> </a>

        <div class="test">
            <div class="card m-2 p-2">
                @if ($catalogue->catalogue_pdf != '')
                    <a href="{{ url('frontcatalogues/pdf', $catalogue->id) }}" title="Download Catalogue">
                        <button class="btn btn-success" style="border-radius: 50%; margin-top:10px;"> <i
                                class="fa fa-download"></i></button> </a>
                @endif

                <button class="btn btn-info" style="border-radius: 50%; margin-top:10px;" data-toggle="modal"
                    data-target="#cataloguesharemodal{{ $catalogue->id }}" data-target-id="{{ $catalogue->id }}"> <i
                        class="fa fa-share"></i></button>
            </div>
            <div id="cataloguesharemodal{{ $catalogue->id }}" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content" style=" min-height:200px;">
                        <div class="modal-header">
                            <h4 class="modal-title">Share this Catalogue</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div id="sharetoolbox" class="addthis_inline_share_toolbox"
                                data-url="{{ url('catalogues', $catalogue->id) }}">
                            </div>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-60e473e9d1a067eb"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    var flipbookEL = document.getElementById('flipbook');

    window.addEventListener('resize', function(e) {
        flipbookEL.style.width = '';
        flipbookEL.style.height = '';
        flipbookEL.style.autoCenter = true;

        $(flipbookEL).turn('size', flipbookEL.clientWidth, flipbookEL.clientHeight);
    });

    $(flipbookEL).turn({
        autoCenter: true,
        page: 1,
        when: {
            start: function(event, pageObject, corner) {

            },
            turning: function(event, page, view) {
                if (page != 1 )
                    $(".flipbook").css("box-shadow", "0 4px 8px 0 rgba(0, 0, 0, 1)");
                if (page == 1||  page=={{ $cataloguePageCount }})
                    $(".flipbook").css("box-shadow", "0 0 0 0");
            }
        }
    });


    $("#prev").click(function(e) {
        e.preventDefault();
        $(flipbookEL).turn("previous");
    });

    $("#next").click(function(e) {
        e.preventDefault();
        $(flipbookEL).turn("next");
    });
</script>
