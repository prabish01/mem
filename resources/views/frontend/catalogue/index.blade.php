@extends('layouts.frontend')
@section('content')
    <div class="content-body">
        <section class="section-padd">
            <div class="container">
                <h4 class="justify">Our Catalogues</h4>
                <hr>
                <div>
                    @if ($Catalogues->count() > 0)
                        <div class="col-md-9">
                            <div class="product-grid">
                                <div class="row">
                                    @foreach ($Catalogues as $catalogue)
                                        <div class="col-md-3">
                                            <div class="product-card">
                                                <img src="{{ asset('uploads/catalogue' . '/' . $catalogue->catalogue_title . '/' . $catalogue->page) }}"
                                                    class="product-card-img" style="max-width: 200px; max_height:200px;">
                                                <div class="product-card-txt">
                                                    <div class="product-card-btn">
                                                        <a href="{{ url('catalogues', $catalogue->id) }}" target="_blank"
                                                            rel="noopener noreferrer">
                                                            <button class="btn btn-dark"
                                                                style="border-radius: 50%; margin-top:10px;"> <i
                                                                    class="fa fa-eye"></i></button>
                                                        </a>
                                                          @if ($catalogue->catalogue_pdf!="" )
                                                        <a href="{{url('frontcatalogues/pdf', $catalogue->id)}}"   title="Download Catalogue">
                                                            <button class="btn btn-success"
                                                            style="border-radius: 50%; margin-top:10px;"> <i
                                                                class="fa fa-download"></i></button>  </a>
                                                        @endif
                                                        <button class="btn btn-info"
                                                            style="border-radius: 50%; margin-top:10px;" data-toggle="modal"
                                                            data-target="#cataloguesharemodal{{ $catalogue->id }}"
                                                            data-target-id="{{ $catalogue->id }}"> <i
                                                                class="fa fa-share"></i></button>
                                                        <div id="cataloguesharemodal{{ $catalogue->id }}"
                                                            class="modal fade" role="dialog">
                                                            <div class="modal-dialog"> 
                                                                <!-- Modal content-->
                                                                <div class="modal-content" style=" min-height:200px;">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Share this Catalogue</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                                                        <div id="sharetoolbox"
                                                                            class="addthis_inline_share_toolbox"
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
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <h2 class="align-content-center"> No catalogue Found.</h2>
                        </div>
                    @endif

                </div>
            </div>
        </section> 
    </div>

@endsection
<!-- Modal -->
<!-- Trigger the modal with a button -->
<!-- Modal -->
