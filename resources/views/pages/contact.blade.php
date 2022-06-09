@extends('pages.layouts.main')
@section('css')
<!--Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600&amp;subset=latin-ext" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
@endsection
@section('content')
<section class="main-header" style="background-image:url(assets/images/gallery-2.jpg)">
    <header>
        <div class="container text-center">
            <h2 class="h2 title">Contact</h2>
            <ol class="breadcrumb breadcrumb-inverted">
                <li><a href="index.html"><span class="icon icon-home"></span></a></li>
                <li><a class="active" href="contact.html">Contact</a></li>
            </ol>
        </div>
    </header>
</section>

<!-- ========================  Contact ======================== -->

<section class="contact">

    <!-- === Goolge map === -->

    <div id="map"></div>

    <div class="container">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">

                <div class="contact-block">

                    <div class="contact-info">
                        <div class="row">
                            <div class="col-sm-4">
                                <figure class="text-center">
                                    <span class="icon icon-map-marker"></span>
                                    <figcaption>
                                        <strong>Địa chỉ</strong>
                                        <span>Số 41, Ngõ 7, Phố Nguyên Xá <br />Bắc Từ Liêm, Hà Nội</span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-sm-4">
                                <figure class="text-center">
                                    <span class="icon icon-phone"></span>
                                    <figcaption>
                                        <strong>Gọi cho chúng tôi</strong>
                                        <span>
                                            <strong>T</strong> +84 44 69 808 <br />
                                            {{-- <strong>F</strong> +1 222 333 5555 --}}
                                        </span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-sm-4">
                                <figure class="text-center">
                                    <span class="icon icon-clock"></span>
                                    <figcaption>
                                        <strong>Thời gian mở cửa</strong>
                                        <span>
                                            <strong>Thứ 7</strong> - Thứ 7: 10 am - 6 pm <br />
                                            <strong>Chủ nhật</strong> 12pm - 2 pm
                                        </span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>

                    <div class="banner">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10 text-center">
                                <h2 class="title">Cảm ơn khách hàng đã lựa chọn chúng tôi!</h2>
                                <p>
                                    Bạn rất quan trọng đối với chúng tôi, mọi thông tin nhận được sẽ luôn được bảo mật. Chúng tôi sẽ liên hệ với bạn ngay sau khi chúng tôi xem xét tin nhắn của bạn.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="contact-info">
                        <div class="row">
                            <div class="col-xs-6 col-sm-4">
                                <figure>
                                    <figcaption>
                                        <strong>Sales</strong>
                                        <span>
                                            <strong>T</strong> +1 125 251 4586 <br />
                                            <strong>F</strong> +1 251 333 5555
                                        </span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <figure>
                                    <figcaption>
                                        <strong>Services</strong>
                                        <span>
                                            <strong>T</strong> +1 654 333 8541 <br />
                                            <strong>F</strong> +1 125 251 5555
                                        </span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <figure>
                                    <figcaption>
                                        <strong>Support</strong>
                                        <span>
                                            <strong>T</strong> +1 222 852 9632 <br />
                                            <strong>F</strong> +1 357 333 5555
                                        </span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <figure>
                                    <figcaption>
                                        <strong>Human resources</strong>
                                        <span>
                                            <strong>T</strong> +1 963 333 8745 <br />
                                            <strong>F</strong> +1 159 333 5555
                                        </span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <figure>
                                    <figcaption>
                                        <strong>Factory</strong>
                                        <span>
                                            <strong>T</strong> +1 753 333 1259 <br />
                                            <strong>F</strong> +1 247 652 5555
                                        </span>
                                    </figcaption>
                                </figure>
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <figure>
                                    <figcaption>
                                        <strong>Delivery</strong>
                                        <span>
                                            <strong>T</strong> +1 134 197 7532 <br />
                                            <strong>F</strong> +1 291 468 4563
                                        </span>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div> --}}
                </div>


            </div><!--col-sm-8-->
        </div> <!--/row-->
    </div><!--/container-->
</section>
@endsection
@section('js')
<script>
    function initMap() {
        var contentString =
        '<div class="map-info-window">' +
        '<p><img src="{{ asset('frontend/assets/images/logo.png') }}" alt="" width="141"></p>' +
        '<p><strong>Cửa hàng Chung Hiệp</strong></p>' +
        '<p><i class="fa fa-map-marker"></i> Số 41, ngõ 7, Phố Nguyên Xá, Minh Khai, Bắc Từ Liêm, Hà Nội</p>' +
        '<p><i class="fa fa-phone"></i> +84 97 446 808</p>' +
        '<p><i class="fa fa-clock-o"></i> 10am - 6pm</p>' +
        '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });
        //set default pposition
        var myLatLng = { lat: 21.051387, lng: 105.737741 };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: myLatLng,
            styles: [{ "featureType": "administrative", "elementType": "all", "stylers": [{ "visibility": "on" }, { "saturation": -100 }, { "lightness": 20 }] }, { "featureType": "road", "elementType": "all", "stylers": [{ "visibility": "on" }, { "saturation": -100 }, { "lightness": 40 }] }, { "featureType": "water", "elementType": "all", "stylers": [{ "visibility": "on" }, { "saturation": -10 }, { "lightness": 30 }] }, { "featureType": "landscape.man_made", "elementType": "all", "stylers": [{ "visibility": "simplified" }, { "saturation": -60 }, { "lightness": 10 }] }, { "featureType": "landscape.natural", "elementType": "all", "stylers": [{ "visibility": "simplified" }, { "saturation": -60 }, { "lightness": 60 }] }, { "featureType": "poi", "elementType": "all", "stylers": [{ "visibility": "off" }, { "saturation": -100 }, { "lightness": 60 }] }, { "featureType": "transit", "elementType": "all", "stylers": [{ "visibility": "off" }, { "saturation": -100 }, { "lightness": 60 }] }]
        });
        //set marker
        var image = '{{ asset('frontend/assets/images/map-icon.png') }}';
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: "Hello World!",
            icon: image
        });
        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyASTaqFLVp9oBjxkprIFF0j3DqxoVKmiX8&callback=initMap"type="text/javascript"></script>
@endsection
