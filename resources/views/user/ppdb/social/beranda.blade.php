@extends('user.app_ppdb')
@section('content')
<!-- START: Card Data-->
<div class="row">
    <div class="col-12 mt-3">
        <div class="position-relative">
            <div class="background-image-maker py-5"></div>
            <div class="holder-image">
                <img src="dist/images/portfolio13.jpg" alt="" class="img-fluid d-none">
            </div>
            <div class="position-relative px-3 py-5">
                <div class="media d-md-flex d-block">
                    <a href="#"><img src="dist/images/contact-3.jpg" width="100" alt="" class="img-fluid rounded-circle"></a>
                    <div class="media-body z-index-1">
                        <div class="pl-4">
                            <h1 class="display-4 text-uppercase text-white mb-0">John Deo</h1>
                            <h6 class="text-uppercase text-white mb-0">Founder / CEO</h6>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="profile-menu mt-4 theme-background border  z-index-1 p-2">
            <div class="d-sm-flex">
                <div class="align-self-center">
                    <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
                        <li class="nav-item ml-0">
                            <a class="nav-link  py-2 px-3 px-lg-4  active" data-toggle="tab" href="#timeline"> Timeline</a>
                        </li>
                        <li class="nav-item ml-0">
                            <a class="nav-link  py-2 px-4 px-lg-4" data-toggle="tab" href="#about"> About</a>
                        </li>
                        <li class="nav-item ml-0">
                            <a class="nav-link py-2 px-4 px-lg-4" data-toggle="tab" href="#activities">Activities </a>
                        </li>
                        <li class="nav-item ml-0 mb-2 mb-sm-0">
                            <a class="nav-link py-2 px-4 px-lg-4" data-toggle="tab" href="#message"> Message</a>
                        </li>
                    </ul>
                </div>
                <div class="align-self-center ml-auto text-center text-sm-right">
                    <a href="#">
                        <i class="icon-social-dropbox h5"></i>
                    </a>
                    <a href="#">
                        <i class="icon-social-facebook h5"></i>
                    </a>
                    <a href="#">
                        <i class="icon-social-github h5"></i>
                    </a>
                    <a href="#">
                        <i class="icon-social-google h5"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-xl-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Who To Follow</h4>
            </div>
            <div class="card-body p-0">
                <ul class="nav flex-column chat-menu">
                    <li class="nav-item active px-3">
                        <a href="#" class="nav-link online-status green">
                            <div class="media d-block d-flex text-left py-2">
                                <img class="img-fluid mr-3 rounded-circle" src="dist/images/author2.jpg" alt="">
                                <div class="media-body align-self-center mt-0 color-primary d-flex">
                                    <div class="message-content"> <b class="mb-1 font-weight-bold d-flex">Harry Jones</b>
                                        How are you? ...
                                        <br>
                                        <small class="body-color">23 hours ago</small></div>
                                    <div class="new-message ml-auto bg-primary text-white">3</div>

                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item  px-3">
                        <a href="#" class="nav-link online-status green">
                            <div class="media d-block d-flex text-left py-2">
                                <img class="img-fluid  mr-3 rounded-circle" src="dist/images/author3.jpg" alt="">
                                <div class="media-body align-self-center mt-0 color-primary d-flex">
                                    <div class="message-content"> <b class="mb-1 font-weight-bold d-flex">Daniel Taylor</b>
                                        I am waiting ...
                                        <br>
                                        <small class="body-color">14 hours ago</small></div>
                                    <div class="new-message ml-auto bg-primary text-white">1</div>

                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item  px-3">
                        <a href="#" class="nav-link online-status yellow">
                            <div class="media d-block d-flex text-left py-2">
                                <img class="img-fluid mr-3 rounded-circle" src="dist/images/author.jpg" alt="">
                                <div class="media-body align-self-center mt-0">
                                    <b class="mb-1 font-weight-bold">Charlotte </b>
                                    video <i class="fa fa-file-video-o"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item  px-3">
                        <a href="#" class="nav-link online-status yellow">
                            <div class="media d-block d-flex text-left py-2">
                                <img class="img-fluid  mr-3 rounded-circle" src="dist/images/author7.jpg" alt="">
                                <div class="media-body align-self-center mt-0">
                                    <b class="mb-1 font-weight-bold">Jack Sparrow</b>
                                    tour pictures <i class="fa fa-photo"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="#" class="nav-link online-status yellow">
                            <div class="media d-block d-flex text-left py-2">
                                <img class="img-fluid  mr-3 rounded-circle" src="dist/images/author6.jpg" alt="">
                                <div class="media-body align-self-center mt-0">
                                    <b class="mb-1 font-weight-bold">Bhaumik</b>
                                    Lorem Ipsum has been the industry ...
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3">
                        <a href="#" class="nav-link online-status yellow">
                            <div class="media d-block d-flex text-left py-2">
                                <img class="img-fluid  mr-3 rounded-circle" src="dist/images/author8.jpg" alt="">
                                <div class="media-body align-self-center mt-0">
                                    <b class="mb-1 font-weight-bold">Wood Walton</b>
                                    Aldus PageMaker including versions ...
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">Latest Tweets</h4>

            </div>
            <div class="card-body p-0">
                <ul class="list-unstyled mb-0">
                    <li class="border-bottom p-2">
                        <p class="mb-0">Lorem ipsum <a href="#">@Drew Wllon</a> dolor sit amet, consectetuer adipiscing elit.</p>
                        <p class="d-block pt-2"><i class="fa fa-clock-o"></i> 2 Minutes Ago</p>
                    </li>
                    <li class="border-bottom p-2">
                        <p class="mb-0">Lorem ipsum <a href="#">@Drew Wllon</a> dolor sit amet, consectetuer adipiscing elit.</p>
                        <p class="d-block pt-2"><i class="fa fa-clock-o"></i> 2 Minutes Ago</p>
                    </li>
                    <li class="border-bottom p-2">
                        <p class="mb-0">Lorem ipsum <a href="#">@Drew Wllon</a> dolor sit amet, consectetuer adipiscing elit.</p>
                        <p class="d-block pt-2"><i class="fa fa-clock-o"></i> 2 Minutes Ago</p>
                    </li>
                    <li class="border-bottom p-2">
                        <p class="mb-0">Lorem ipsum <a href="#">@Drew Wllon</a> dolor sit amet, consectetuer adipiscing elit.</p>
                        <p class="d-block pt-2"><i class="fa fa-clock-o"></i> 2 Minutes Ago</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-9">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group mb-0">
                        <textarea class="form-control height-200" placeholder="Whats New"></textarea>
                        <ul class="list-inline mb-0 pt-3 bg-light p-3 border  border-top-0 d-flex justify-content-between align-items-center">
                            <li id="dropzone" class="dropzone list-inline-item mr-3 position-relative border-0 p-0 h-auto"><i class="icon-film"></i> <input type="file" class="text-hide"></li>
                            <li id="dropzone1" class="dropzone list-inline-item mr-3 position-relative border-0 p-0 h-auto"><i class="icon-camrecorder"></i> <input type="file" class="text-hide"></li>
                            <li id="dropzone2" class="dropzone list-inline-item position-relative border-0 p-0 h-auto"><i class="icon-microphone"></i> <input type="file" class="text-hide"></li>
                            <li class="list-inline-item ml-auto"><a href="#" class="btn btn-primary btn-xs text-uppercase">Post</a></li>
                        </ul>
                    </div>
                </form>
                <div class="row mt-4 portfolio-box">
                    <div class="col-md-12 post mb-4">
                        <div class="border">
                            <div class="card-body pb-0">
                                <div class="media mb-3">
                                    <a href="#"><img src="dist/images/author.jpg" alt="" class="img-fluid rounded-circle d-flex mr-3"></a>
                                    <div class="media-body">
                                        <a class="bg-transparent border-0 collapsed redial-light float-right post-btn" data-toggle="collapse" data-target="#demo"><i class="icon-arrow-down"></i></a>
                                        <span><a href="#" class="text-primary font-weight-bold">Agatha Ford</a> Comments On This</span>
                                        <span class="d-block"><a href="#" class="font-weight-bold">53 minutes ago</a></span>
                                    </div>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetuer elit.<a href="#" class="text-primary font-weight-bold"> #John Miller</a></p>
                                <div id="demo" class="collapse show">
                                    <a href="dist/images/post1.jpg"><img src="dist/images/post1.jpg" data-toggle="lightbox" data-gallery="example-gallery" alt="" class="img-fluid"></a>
                                    <div class="clearfix my-2">
                                        <div class="float-sm-left float-none">
                                            <small><a href="#" class="font-weight-bold mr-2"><i class="fa fa-thumbs-up pr-1"></i> Like</a></small>
                                            <small><a href="#" class="font-weight-bold"><i class="fa fa-share pr-1"></i> Share</a></small>
                                        </div>
                                        <div class="float-sm-right float-none">
                                            <small><a href="#" class="font-weight-bold"> likes: ruby dixon, John Deo, and 2.2k others</a></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-light border border-bottom-0 border-left-0 border-right-0">
                                <div class="media mb-3">
                                    <a href="#"><img src="dist/images/author.jpg" width="30" alt="" class="img-fluid d-flex mr-2 mt-1"></a>
                                    <div class="media-body">
                                        <small><a href="#" class="text-primary font-weight-bold">Ruby Dixon</a> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.</small>
                                        <small class="d-block"><a href="#" class="text-primary font-weight-bold">Like</a>.
                                            <a href="#" class="text-primary font-weight-bold">Reply <sup>.</sup></a>
                                            <a href="#"><i class="fa fa-thumbs-up"></i> 69 <sup>.</sup></a>
                                            <a href="#"> 47 mins</a>
                                        </small>
                                    </div>
                                </div>
                                <div class="media mb-3">
                                    <a href="#"><img src="dist/images/author1.jpg" width="30" alt="" class="img-fluid d-flex mr-2 mt-1"></a>
                                    <div class="media-body">
                                        <small><a href="#" class="text-primary font-weight-bold">John Dixon</a> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula.</small>
                                        <small class="d-block"><a href="#" class="text-primary font-weight-bold">Like</a>.
                                            <a href="#" class="text-primary font-weight-bold">Reply <sup>.</sup></a>
                                            <a href="#"><i class="fa fa-thumbs-up"></i> 49 <sup>.</sup></a>
                                            <a href="#"> 27 mins</a>
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" placeholder="Add A Comments">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Card DATA-->
@endsection