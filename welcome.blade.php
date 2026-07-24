@extends('frontend_layouts.app')
@section('content')

<!-- ======= Slider Section ======= -->
<!-- <section class="d-xl-none d-lg-none d-xl-block d-md-none d-lg-block">
                    <div class="owl-carousel portfolio-details-carousel">
                        <img src="{{ url('/') }}/images/ab-2.jpeg" alt="img" class="img-fluid">
                    </div>
</section> -->

<section id="hero" class="d-sm-none d-md-block d-none d-sm-block">
    <!-- <div id="heroCarousel" class="carousel slide carousel-fade d-lg-none d-xl-block d-xl-none" data-ride="carousel" style="max-height: 600px !important;">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url({{ url('/') }}/images/ab-2.jpeg); ">
                <div class="carousel-container">
                    <div class="container">
                        <br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <a href="{{ url('/About Us') }}"
                            class="btn-get-started animate__animated animate__fadeInUp scrollto">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <!-- <ol class="carousel-indicators" id="hero-carousel-indicators"></ol> -->

        <div class="carousel-inner" role="listbox">

            <!-- Slide 1 must stay -->
            <div class="carousel-item active" style="background-image: url({{ url('/') }}/images/ab-2.jpeg)">
                <div class="carousel-container">
                    <div class="container">
                        <br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <a href="{{ url('/About Us') }}"
                            class="btn-get-started animate__animated animate__fadeInUp scrollto">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            <div class="carousel-item d-sm-none d-md-block d-none d-sm-block">
                <div class="carousel-container">
                    <div class="container">
                        <div class="row d-flex align-items-center justify-content-center">
                            <h2 class="animate__animated animate__fadeInDown" style=" margin-top: 110px;"></span>

                        </div>
                        <!-- <h2 class="animate__animated animate__fadeInDown" style="color: #d9232d !important; margin-top: 75px;">Bangladesh Malaysia Joint Venture</span> -->
                        <!--</h2>-->
                        <!-- <p class="animate__animated animate__fadeInLeft"> -->
                        <!-- <br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <img src="{{ url('/') }}/images/iso.jpeg" alt="img"
                            class="img-fluid animate__animated animate__fadeInLeft"
                            style="float: left; width:120px; height: 180px;"> -->
                        <!-- </p> -->
                        <!--<p class="animate__animated animate__fadeInUp">First IMS Certified Hospital And Nursing College In Bangladesh.</p>-->
                        <!-- <br>
                        <br><br><br><br>
                        <a href="{{ url('/About Us') }}" class="btn-get-started animate__animated animate__fadeInUp scrollto">
                            Read More
                        </a> -->
                        <!-- <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6" style="color: #d9232d !important;"> -->


                        <!-- <h3 style="color: #d9232d !important; font-size: 35px; list-style-type: none;" class="float-md-left" data-aos="fade-right" data-aos-duration="500">Internation Chain</h3> <br> -->
                        <!-- <h3 style="color: #d9232d !important; font-size: 35px !important;" class="float-md-left" data-aos="fade-right" data-aos-duration="1000">Authentic lab repotr</h3><br> -->
                        <!-- <h3 style="color: #d9232d !important; font-size: 35px;" class="float-md-left" data-aos="fade-right" data-aos-duration="1500">Worldcalss healthcare</h3> -->
                        <!-- <ul
                                style="color: #d9232d !important; font-size: 35px; list-style-type: none; padding-left: 150px; margin-top: 175px;">
                                <li class="float-md-left animate__animated animate__fadeInLeft">International Chain</li>
                                <li class="float-md-left animate__animated animate__fadeInRight">Authentic lab repotr
                                </li>
                                <li class="float-md-left animate__animated animate__fadeInLeft">Worldcalss healthcare
                                </li>
                            </ul> -->
                        <!-- </div> -->
                        <div class="row">
                            <div class="col-md-3 col-3">
                                <div class="honorable">
                                    <img src="{{ url('/') }}/images/Bangabandhu Sheikh Mujibur Rahman.jpeg" alt="img"
                                        class="img-fluid">
                                    <div class="d-flex justify-content-center">
                                        <p>Father of Nation Bangabandhu Sheikh Mujibur Rahman</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-3">
                                <div class="honorable">
                                    <img src="{{ url('/') }}/images/Bangamata Sheikh Fazilatunnesa Mujib.jpeg" alt="img"
                                        class="img-fluid">
                                    <div class="d-flex justify-content-center">
                                        <p>Bangamata Sheikh Fazilatunnessa Mujib</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-3">
                                <div class="honorable">
                                    <img src="{{ url('/') }}/images/Prime Minister Sheikh Hasina.jpeg" alt="img"
                                        class="img-fluid">
                                    <div class="d-flex justify-content-center">
                                        <p>Prime Minister Sheikh Hasina</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-3">
                                <div class="honorable">
                                    <img src="{{ url('/') }}/images/Sheikh Rehana Siddiq.jpeg" alt="img"
                                        class="img-fluid">
                                    <div class="d-flex justify-content-center">
                                        <p>Sheikh Rehana Siddiq</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <a href="{{ url('/About Us') }}"
                            class="btn-get-started animate__animated animate__fadeInUp scrollto">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Dynamic slider-->
            @foreach($slider as $slid)
            <div class="carousel-item " style="background-image: url({{ url('/') }}/images/sliders/{{ $slid->image }})">
                <div class="carousel-container">
                    <div class="container">
                        <!--<h2 class="animate__animated animate__fadeInDown">{{ $slid->headline }}</span>-->
                        <!--</h2>-->
                        <!--<p class="animate__animated animate__fadeInUp">{{ $slid->sub_headline }}</p>-->
                        <br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <a href="{{ url('/slider', ['id'=> Crypt::encrypt($slid->id)]) }}"
                            class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- news and event -->
            <div class="carousel-item" style="background-image: url({{ url('/') }}/images/news_and_events/{{ $news_and_event_s->image }})">
                <div class="carousel-container">
                    <div class="container">
                        <!-- <h2 class="animate__animated animate__fadeInDown" style="color: #d9232d !important;">{{ $news_and_event_s->headline }}</span><br> -->
                        <!--</h2>-->
                        
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <a href="{{ url('News & Event', ['id'=> Crypt::encrypt($news_and_event_s->id)]) }}"
                            class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                    </div>
                </div>
            </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
</section>
<section class=" div-only-mobile about visible-xs visible-sm">
    <div class=""  style="margin-top: 22.5% !important;">
        <img src="{{ url('/') }}/images/ab-2.jpeg" alt="img" class="img-fluid">
    </div>
    <p class="mname" >
        SHEIKH FAZILATUNNESSA MUJIB MEMORIAL<mark class="mred"><br>KPJ</mark> <mark class="mblue">SPECIALIZED HOSPITAL
    </p>
</section>
<!-- End Slider -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">

            <div class="row content">
                <div class="col-lg-6">
                    <!-- <div class="embed-responsive embed-responsive-16by9">
                        <iframe width="853" height="480" src="https://www.youtube.com/embed/6taFPGZGdGo" frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div> -->


                    <!-- <div class="owl-carousel portfolio-details-carousel">
                        <img src="{{ url('/') }}/images/ceo.png" alt="img" class="img-fluid">
                        <img src="{{ url('/') }}/images/ab-1.png" alt="img" class="img-fluid">
                        <img src="{{ url('/') }}/images/ab-2.png" alt="img" class="img-fluid">
                        <img src="{{ url('/') }}/images/ab-2.jpeg" alt="img" class="img-fluid">
                    </div> -->

                    <div id="carousel-leaflet-generic" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row">
                                    <div class="col-lg-12 pt-4 pt-lg-0">
                                        <a href="{{ url('/leaflet/leaflet')}}">
                                            <img src="https://sfmmkpjsh.com/images/leaflet/leaflet.jpeg" class="img-fluid img-thumbnail" style="height: 399px; width: 600px"  alt=""> 
                                        </a>    
                                    </div>
                                </div>
                            </div>
                            @foreach($leaflets as $data)
                            <div class="item">
                                <div class="row">
                                    <div class="col-lg-12 pt-4 pt-lg-0">
                                        <a href="{{ url('/leaflet', ['id'=> Crypt::encrypt($data->id)]) }}">
                                            <img src="{{ url('/') }}/images/leaflet/{{ $data->image }}" class="img-fluid img-thumbnail" style="height: 399px; width: 600px"  alt=""> 
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="controls testimonial_control pull-right">
                            <a class="left fa fa-chevron-left btn btn-default testimonial_btn"
                                href="#carousel-leaflet-generic" data-slide="prev"></a>

                            <a class="right fa fa-chevron-right btn btn-default testimonial_btn"
                                href="#carousel-leaflet-generic" data-slide="next"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <p>
                        SHEIKH FAZILATUNNESSA MUJIB MEMORIAL KPJ SPECIALIZED HOSPITAL & NURSING COLLEGE (SFMMKPJSH&NC)
                        is being named after the Bangamata Sheikh Fazilatunnessa Mujib which is being established by the
                        Father of the Nation Bangabandhu Sheikh Mujibur Rahman Memorial Trust. The hospital has its
                        maximum capacity of 250 patients’ beds is being operated by KPJ Healthcare Berhad , a renowned
                        Malaysian Private Healthcare Organization. KPJ Healthcare Berhad currently has a chain of 26
                        hospitals within Malaysia and also present in Indonesia, Australia and Thailand.
                    </p>
                    <div data-aos="fade-up" data-aos-duration="1000" class="card">
                        <div class="card-body card_manual">
                            <li data-aos="fade-right" data-aos-duration="1500"><i class="ri-check-double-line"></i>
                                Bangladesh And Malaysia Join venture Hospital</li>
                            <li data-aos="fade-right" data-aos-duration="1700"><i class="ri-check-double-line"></i>
                                Excellent service under 1 roof</li>
                            <li data-aos="fade-right" data-aos-duration="1900"><i class="ri-check-double-line"></i>
                                Qualified and experienced doctors</li>
                            <li data-aos="fade-right" data-aos-duration="1900"><i class="ri-check-double-line"></i>
                                24 hours service</li>
                        </div>
                    </div>
                    <br>
                    <p class="font-italic">
                        KPJ Healthcare’s commitment towards excellence in healthcare will be in placed in SFMMKPJSH
                        through innovative strategic approaches in developing high quality medical services and
                        standards.
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->
    
    <!-- ======= dynamic department sliders ======= -->
    <section id="about" class="about" style="padding-bottom: 20px; padding-top: 0px;">

        <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <script src="https://use.fontawesome.com/5a8a7bb461.js"></script>


        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div data-aos="fade-up" data-aos-duration="1000" class="section-title">
                        <!-- <h2>Service</h2> -->
                        <p>Featured Departments</p>
                        <h2 data-aos="fade-right" data-aos-duration="1500">Leading Services</h2>
                    </div>
                    <!-- <h3><strong>Educational Video</strong></h3>
                    <div class="seprator"></div> -->
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row" style="padding: 20px;">
                                    <div class="col-lg-6 pt-4 pt-lg-0">
                                        <button  class="specialbutton"> <a href="#"> Surgery </a></button> <br> <br>
                                        <p class="testimonial_para">
                                            The Department of Surgery is one of the finest departments in the country, offering innovative surgical procedures, state-of-the-art technology, and high-quality patient care. Our surgeons pioneer and refine surgical procedures to provide leading-edge, compassionate care to patients who require surgical services in a wide range of specialties. 

                                            In SFMMKPJSH, patients have access to advanced procedures and technological innovations. We have state of art operating theater and integrated imaging systems.

                                            Our breadth of surgical capabilities ensures that patients receive world-class care as well as research into the deepest fathom of the disease.

                                            The Surgical team along with medical and oncology team take a complete care of the patients
                                        </p><a href="https://sfmmkpjsh.com/department/detail/eyJpdiI6Im5ET0NiYVloRTRNSmlOa3RER3hJbXc9PSIsInZhbHVlIjoiU01hSXM4RkcwZnh3cll2dnFwekVuUT09IiwibWFjIjoiNmE3YTM2ZjhiZjI0ZGEwZDg3YzUxMTQxMDI0Nzc0ZDg0MTMzOWY2MThiODA2MDc3YWI1ODdlNzU3YjgyNTBlNCJ9"> Read More...</a><br>
                                    </div>
                                    <div class="col-lg-6 pt-4 pt-lg-0">
                                    <img src="https://sfmmkpjsh.com/images/departments/Surgery1386550075.png" class="img-fluid img-thumbnail" style="height: 350px; width: 600px"  alt=""> 
                                    </div>
                                </div>
                            </div>
                            @foreach($ddepartments as $data)
                            <div class="item">
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-6 pt-4 pt-lg-0">
                                    <button style="border: none; font-weight: bold color: #556270;">{{ $data->department_name }}</button> <br> <br>
                                        <p class="testimonial_para"> {!! Str::limit($data->details, 800) !!}</p> <a href="{{ url('department/detail', ['id'=> Crypt::encrypt($data->id)]) }}"> Read More...</a><br>
                                    </div>
                                    <div class="col-lg-6 pt-4 pt-lg-0">
                                        <img src="{{url('/')}}/images/departments/{{ $data->image }}" class="img-fluid img-thumbnail" style="height: 350px; width: 600px"  alt=""> 
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="controls testimonial_control pull-right">
                            <a class="left fa fa-chevron-left btn btn-default testimonial_btn"
                                href="#carousel-example-generic" data-slide="prev"></a>

                            <a class="right fa fa-chevron-right btn btn-default testimonial_btn"
                                href="#carousel-example-generic" data-slide="next"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End dynamic department Section -->

    <section id="departments" class="departments" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
            <div data-aos="fade-up" data-aos-duration="1000" class="section-title">
                <!-- <h2>We Have</h2> -->
                <p>Departments</p>
                <h2 data-aos="fade-right" data-aos-duration="1500">Our Other Departments</h2>
            </div>
            <div class="row">
                
                @foreach($departments as $row)
                <div class="col-6 col-lg-2">
                    <div class="icon-box">
                        <a href="{{ url('department/detail', ['id'=> Crypt::encrypt($row->id)]) }}">
                        
                            <i class="{{ $row->icon }}"></i>
                            <h4>{{ $row->department_name }}</h4>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Team Section -->

    <!-- ======= Why us Section ======= -->
    <section id="services" class="services" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
            <div data-aos="fade-up" data-aos-duration="1000" class="section-title">
                <!-- <h2>Service</h2> -->
                <p>Why SFMMKPJSH</p>
                <h2 data-aos="fade-right" data-aos-duration="1500">Know our Key Points </h2>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="text-center" style="color: #d9232d;">
                        <i class="icofont-certificate icofont-4x "></i>
                        <h2 class="">IMS-Certified</h2>
                    </div>
                    <!-- <p class="">We have recieved several prestigious awards throughout the years including the Top
                        International Insurance Award, Best International Private Medical Insurance Award, International
                        Health Insurer of the Year and more. </p> -->
                </div>

                <div class="col-md-3 mb-4">
                    <div class="text-center" style="color: #d9232d;">
                        <i class="icofont-dashboard-web icofont-4x"></i>
                        <h2 class="">Innovative </h2>
                    </div>
                    <!-- <p class="">We are committed to making life easier, simpler and safer for our members. That includes
                        introducing digital tools such as the

                        , which manages claims, stores policy documents securely
                        and supports our members.
                    </p> -->
                </div>
                <div class="col-md-3 mb-4">
                    <div class="text-center" style="color: #d9232d;">
                        <i class="icofont-abacus-alt icofont-4x"></i>
                        <h2 class="">Efficient </h2>
                    </div>
                    <!-- <p class="">As a long-time provider of international insurance, we offer a streamlined service and
                        fast turnarounds. We're proud to reimburse our members for their claims within 48 hours.**
                    </p> -->
                </div>
                <div class="col-md-3 mb-4">
                    <div class="text-center" style="color: #d9232d;">
                        <i class="icofont-diamond icofont-4x "></i>
                        <h2 class=" justify-content-center">Professional Service </h2>
                    </div>
                    <!-- <p class="">Allianz Care is recognised throughout the world as a provider of first class
                        international health insurance. We're proud to have combined satisfaction ratings of almost 90%
                        for both offline and online services to our members.
                    </p> -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Why us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
            <div data-aos="fade-up" data-aos-duration="1000" class="section-title">
                <!-- <h2>Service</h2> -->
                <p>The Services We Offer</p>
                <h2 data-aos="fade-right" data-aos-duration="1500">Get your service</h2>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-6 col-lg-2">
                    <a href="{{ url('/service', ['id'=> Crypt::encrypt($service->id)]) }}">
                        <div class="icon-box">
                            <i class="{{ $service->icon }}"></i>
                            <h4>{{ $service->name }}</h4>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Services Section -->
    <!-- ======= FAQ Section ======= -->
    <section id="about" class="about" style="padding-bottom: 20px; padding-top: 20px;">
        <div class="container">
            <div data-aos="fade-up" data-aos-duration="1000" class="section-title">
                <!-- <h2>Service</h2> -->
                <p>FAQ, News And Event </p>
                <h2 data-aos="fade-right" data-aos-duration="1500">Know our Activitys</h2>
            </div>
            <div class="row content">
                <div class="col-12 col-md-6 col-lg-6 pt-4 pt-lg-0">
                    <div class="panel-group" id="faqAccordion">
                        <div class="panel panel-default ">
                            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse"
                                data-parent="#faqAccordion" data-target="#question0">
                                <h4 class="panel-title" style="cursor: pointer;">
                                    Q: How Qualified our Doctors are?
                                </h4>

                            </div>
                            <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <h5><span class="label label-primary">Answer</span></h5>

                                    <p><a href="{{ url('/') }}/Doctors"
                                            class="label label-success">Doctors Read More...</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default ">
                            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse"
                                data-parent="#faqAccordion" data-target="#question1">
                                <h4 class="panel-title" style="cursor: pointer;">
                                    Q: Cabin and  Room facility?
                                </h4>

                            </div>
                            <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <h5><span class="label label-primary">Answer</span></h5>
                                    <p>
                                        <a href="{{ url('/') }}/Bed%20Category"
                                            class="label label-success">Bed Category Read More...</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default ">
                            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse"
                                data-parent="#faqAccordion" data-target="#question2">
                                <h4 class="panel-title" style="cursor: pointer;">
                                    Q: Any Special Packages?
                                </h4>

                            </div>
                            <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <h5><span class="label label-primary">Answer</span></h5>
                                    <p>
                                    <a href="{{ url('/') }}/Package"
                                            class="label label-success">Packages Read More...</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <br><br><br>
                    <!--/panel-group-->
                </div>
                <div class="col-12 col-md-6 col-lg-6 news_table_manual_div" style="height:300px !important;">
                    <div class="news_table_manual_header">Recent News & Events</div>
                    <marquee width="100%" direction="up" height="100%" onmouseover="this.stop();"
                        onmouseout="this.start();">
                        @foreach($news_and_event as $data)
                        <a href="{{ url('News & Event', ['id'=> Crypt::encrypt($data->id)]) }}">
                            <div class="card">
                                <div class="card-body" style="color:black;">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="{{ url('/') }}/images/news_and_events/{{ $data->image }}"
                                                alt="..." class="img-thumbnail float-left">
                                        </div>
                                        <div class="col-md-9">
                                            {{  date("d M, Y", strtotime($data->created_at)) }} <br>
                                            <b>{{ $data->headline }}</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach

                    </marquee>

                </div>

            </div>

        </div>
    </section>
    <!-- End FAQ Section -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet"> -->
    <!-- <script src="https://use.fontawesome.com/5a8a7bb461.js"></script> -->

    <style>
    .testimonial_btn {
        background-color: #d9232d !important;
        color: #fff !important;
    }

    .seprator {
        height: 2px;
        width: 56px;
        background-color: red;
        margin: 7px 0 10px 0;
    }
    </style>
    <!-- ======= Healthcare Video Section ======= -->
    <section id="about" class="about" style="padding-bottom: 20px; padding-top: auto;">

        <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
        <script src="https://use.fontawesome.com/5a8a7bb461.js"></script>


        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div data-aos="fade-up" data-aos-duration="1000" class="section-title">
                        <!-- <h2>Service</h2> -->
                        <p>Healthcare Video</p>
                        <h2 data-aos="fade-right" data-aos-duration="1500">Boost your knowledge</h2>
                    </div>
                    <!-- <h3><strong>Educational Video</strong></h3>
                    <div class="seprator"></div> -->
                    <div id="carousel-video-generic" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-6 pt-4 pt-lg-0">
                                        <button style="border: none;"><i class="fa fa-quote-left testimonial_fa"
                                                aria-hidden="true"></i></button>
                                        <p class="testimonial_para">
                                            About Us
                                        </p><br>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="testimonial_subtitle">
                                                    SHEIKH FAZILATUNNESSA MUJIB MEMORIAL KPJ SPECIALIZED HOSPITAL & NURSING COLLEGE (SFMMKPJSH&NC)
                                                    is being named after the Bangamata Sheikh Fazilatunnessa Mujib which is being established by the
                                                    Father of the Nation Bangabandhu Sheikh Mujibur Rahman Memorial Trust. The hospital has its
                                                    maximum capacity of 250 patients’ beds is being operated by KPJ Healthcare Berhad , a renowned
                                                    Malaysian Private Healthcare Organization. KPJ Healthcare Berhad currently has a chain of 26
                                                    hospitals within Malaysia and also present in Indonesia, Australia and Thailand.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pt-4 pt-lg-0">
                                        <div class="embed-responsive embed-responsive-16by9">

                                            <iframe width="853" height="480"
                                                src="https://www.youtube.com/embed/6taFPGZGdGo" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @foreach($videos as $data)
                            <div class="item">
                                <div class="row" style="padding: 20px">
                                    <div class="col-lg-6 pt-4 pt-lg-0">
                                        <button style="border: none;"><i class="fa fa-quote-left testimonial_fa"
                                                aria-hidden="true"></i></button>
                                        <p class="testimonial_para">{!! $data->description !!}</p><br>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <img src="{{ url('/') }}/images/doctors/{{ $data->doctors->image }}"
                                                    class="img-responsive" lazy="loading" style="width: 80px">
                                            </div>
                                            <div class="col-sm-10">
                                                <h4><strong> <a
                                                    href="{{ url('profile', ['id'=> Crypt::encrypt($data->doctors->id)]) }}">
                                                    {{ $data->doctors->name }} </a></strong>
                                                </h4>
                                                <p class="testimonial_subtitle"><span>{{ $data->doctors->designation }}</span><br>
                                                    <span>{{ $data->doctors->department->department_name }}</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 pt-4 pt-lg-0">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            {!! $data->youtube_link !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="controls testimonial_control pull-right">
                            <a class="left fa fa-chevron-left btn btn-default testimonial_btn"
                                href="#carousel-video-generic" data-slide="prev"></a>

                            <a class="right fa fa-chevron-right btn btn-default testimonial_btn"
                                href="#carousel-video-generic" data-slide="next"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Healthcare Video Section -->
    <!-- ======= Success Story Section ======= -->
    <section id="services" class="services">
        <div class="container">
            <div data-aos="fade-up" data-aos-duration="1000" class="section-title">
                <!-- <h2>Service</h2> -->
                <p>Success Stories</p>
                <h2 data-aos="fade-right" data-aos-duration="1500">Know our success </h2>
            </div>
            <div class="row">
                @foreach($success_history as $success)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img style="width: 100%; height: 20vw; object-fit: cover;" class="card-img-top"
                            src="{{ URL::to('/') }}/images/doctors/success_history/{{ $success->image }}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $success->headline }}</h5>

                            <a href="{{ url('/doctor_success_history', ['id'=> Crypt::encrypt($success->id)]) }}"
                                class="btn btn-danger">Read More...</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Success Story Section -->


</main>
<!-- End #main -->
<script>
AOS.init();
</script>
<script>
var application = new Vue({
    el: '#crudApp',
    data: {
        allData: '',
        myModel: false,
        actionButton: 'Insert',
        dynamicTitle: 'Add Data',
    },
    methods: {
        fetchAllData: function() {
            axios.post('action.php', {
                action: 'fetchall'
            }).then(function(response) {
                application.allData = response.data;
            });
        },
        fetchData: function(id) {
            axios.post('action.php', {
                action: 'fetchSingle',
                id: id
            }).then(function(response) {
                application.first_name = response.data.first_name;
                application.last_name = response.data.last_name;
                application.hiddenId = response.data.id;
                application.myModel = true;
                application.actionButton = 'Update';
                application.dynamicTitle = 'Edit Data';
            });
        },
    },
});
</script>
<div class="covid-banner">
    <div>
        <p>
            COVID-19 patient and visitor guidelines, plus trusted health information. Get our Telemedicine Service.
            <a class="banner-more" href="{{ url('/') }}/Covid-19">Learn More</a>
            <a class="banner-dismiss" href="#">Dismiss</a>
        </p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script>
// Banner Trigger if Not Closed
if (!localStorage.bannerClosed) {
  $('.covid-banner').css('display', 'inherit');
} else {
  $('.covid-banner').css('display', 'none');
}
$('.covid-banner button').click(function() {
  $('.covid-banner').css('display', 'none');
  localStorage.bannerClosed = 'true';
});
$('.banner-dismiss').click(function() {
  $('.covid-banner').css('display', 'none');
  localStorage.bannerClosed = 'true';
});
if (navigator.userAgent.match(/Opera|OPR\//)) {
  $('.covid-banner').css('display', 'inherit');
}
</script>
@endsection