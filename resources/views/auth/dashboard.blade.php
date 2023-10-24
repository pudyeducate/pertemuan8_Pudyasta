@extends('layouts.app')
@section('css')
<link href="/style.css" rel="stylesheet" />
<style>
  .navx {
    display: none;
  }
</style>
@endsection
@section('content')

<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a>Portfolio</a></h1>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="#about">About</a></li>
        <li><a class="nav-link scrollto" href="#services">Services</a></li>
        <li><a class="nav-link scrollto " href="#work">Work</a></li>
        <li><a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>
  </div>
</header>


<div id="hero" class="hero route bg-image" style="background-image: url(/hero.jpg)">
  <div class="overlay-itro"></div>
  <div class="hero-content display-table">
    <div class="table-cell">
      <div class="container">
        <h1 class="hero-title mb-4">I am Pudyasta Satria</h1>
        <p class="hero-subtitle"><span class="typed" data-typed-items="Developer, Coding Mentor, Freelancer, Photographer"></span></p>
        <p class="pt-3 fw-semibold"><a target="_blank" class="btn btn-primary btn js-scroll px-4 py-2 fw-semibold" href="https://www.linkedin.com/in/pudyasta-satria-947bba201/" role="button">Visit Linkedin</a></p>
      </div>
    </div>
  </div>
</div>

<main id="main">
  <section id="about" class="about-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="box-shadow-full">
            <div class="row row-gap-3">
              <div class="col-md-6">
                <div class="row ">
                  <div class="col-sm-6 col-md-5">
                    <div class="about-img" style="width: 100%;">
                      <img style="width: 100%;" src="/prof.png" class="img-fluid rounded b-shadow-a" width="100" alt="">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-7">
                    <div class="about-info">
                      <p><span class="title-s">Name: </span> <span>Pudyasta Satria Pinandhita</span></p>
                      <p><span class="title-s">Profile: </span> <span>Full Stack <Datag></Datag>eveloper</span></p>
                      <p><span class="title-s">Email: </span> <span>pudyastasatria@gmail.com</span></p>
                      <p><span class="title-s">Phone: </span> <span>(62) 557-0089</span></p>
                    </div>
                  </div>
                </div>
                <div class="skill-mf">
                  <p class="title-s">Skill</p>
                  <span>NextJS</span> <span class="pull-right">85%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span>ExpressJs</span> <span class="pull-right">75%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span>Laravel</span> <span class="pull-right">80%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span>Javascript</span> <span class="pull-right">90%</span>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="about-me pt-4 pt-md-0">
                  <div class="title-box-2">
                    <h5 class="title-left">
                      About me
                    </h5>
                  </div>
                  <p class="lead">
                    I am an ungraduated student from Universitas Gadjah Mada Yogyakarta in
                    the Software engineering program. I am a person that curious about new
                    things. I am familiar with many website frameworks such as NextJS, Gatsby,
                    Vue, etc. I am experienced in building a frontend progressive web
                    application based on NextJS framework.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="services" class="services-mf pt-5 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Services
            </h3>

            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle"><i class="bi bi-palette-fill"></i></span>
            </div>
            <div class="service-content">
              <h2 class="s-title">Web Design</h2>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle"><i class="bi bi-code-slash"></i></span>
            </div>
            <div class="service-content">
              <h2 class="s-title">Software Development</h2>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="service-box">
            <div class="service-ico">
              <span class="ico-circle"><i class="bi bi-camera2"></i></span>
            </div>
            <div class="service-content">
              <h2 class="s-title">Photography</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

  <section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Portfolio
            </h3>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="work-box">
            <a href="/work/pionir.png" data-gallery="portfolioGallery" class="portfolio-lightbox">
              <div class="work-img">
                <img src="/work/pionir.png" alt="" class="img-fluid">
              </div>
            </a>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">PPSMB Pionir Official Website</h2>
                  <div class="w-more">
                    <span class="w-ctegory">AR and Web Development</span> / <span class="w-date">18 Sep. 2018</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="/work/scano.png" data-gallery="portfolioGallery" class="portfolio-lightbox">
              <div class="work-img">
                <img src="/work/scano.png" alt="" class="img-fluid">
              </div>
            </a>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Scanocular Application</h2>
                  <div class="w-more">
                    <span class="w-ctegory">App and Web Development</span> / <span class="w-date">18 Sep. 2018</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="/work/herba.png" data-gallery="portfolioGallery" class="portfolio-lightbox">
              <div class="work-img">
                <img src="/work/herba.png" alt="" class="img-fluid">
              </div>
            </a>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Herbacare Application</h2>
                  <div class="w-more">
                    <span class="w-ctegory">App and Web Development</span> / <span class="w-date">18 Sep. 2018</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="/work/swift.png" data-gallery="portfolioGallery" class="portfolio-lightbox">
              <div class="work-img">
                <img src="/work/swift.png" alt="" class="img-fluid">
              </div>
            </a>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Swift OMS PWA Version</h2>
                  <div class="w-more">
                    <span class="w-ctegory">Frontend Development</span> / <span class="w-date">18 Sep. 2018</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="/work/jajan.png" data-gallery="portfolioGallery" class="portfolio-lightbox">
              <div class="work-img">
                <img src="/work/jajan.png" alt="" class="img-fluid">
              </div>
            </a>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">Jajan App</h2>
                  <div class="w-more">
                    <span class="w-ctegory">Web Development</span> / <span class="w-date">18 Sep. 2018</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="/work/sitani.png" data-gallery="portfolioGallery" class="portfolio-lightbox">
              <div class="work-img">
                <img src="/work/sitani.png" alt="" class="img-fluid">
              </div>
            </a>
            <div class="work-content">
              <div class="row">
                <div class="col-sm-8">
                  <h2 class="w-title">SiTani Web Version</h2>
                  <div class="w-more">
                    <span class="w-ctegory">Web Development</span> / <span class="w-date">18 Sep. 2017</span>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="w-like">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection