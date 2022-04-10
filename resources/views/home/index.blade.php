@extends('home.layout.main')
@section('title','Vidyasena Vihara Vidyaloka')
@section('content')
<div class="site-blocks-cover" id="home">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-12 mt-5 mt-md-0 mt-xl-0" style="position: relative;" data-aos="fade-up">
        <div class="row align-items-center text-center text-md-left cover-content">
          <div class="col-md-6 col-lg-5 mb-5 mb-md-0">
            <h1 class="mb-5">Ayo Belajar Dhamma Bersama!</h1>
            <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam assumenda ea quo
              cupiditate facere deleniti fuga officia.</p>
          </div>
          <div class="col-md-6 col-lg-7 col-xl-6 offset-xl-1">
            <img src={{asset("images/meditation.svg ")}} alt=" Image" class="img-fluid" style="width: 90%;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="site-section bg-light" id="tentang-kami">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-6">
        <img src={{asset("images/tentang.webp")}} alt="Image" class="img-fluid mb-5 mb-lg-0 rounded shadow">
      </div>
      <div class="col-lg-5 ml-auto pl-lg-5">
        <h2 class="text-black mb-4">Selamat datang kawan !</h2>
        <p class="mb-4">Dalam bahasa sansekerta, "Vidya" berarti Pengetahuan dan "Sena" berarti prajurit
          sehingga vidyasena berarti "Prajurit Pengetahuan". Sejak tahun 1986, Vidyasena telah aktif mengembangkan
          dhamma di Yogyakarta dan Indonesia.
        </p>
        <p><a href={{ url("tentang-kami") }} class="btn btn-primary">Baca Selengkapnya</a></p>
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="event-slider" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src={{asset("images/banner.webp")}}>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src={{asset("images/banner.webp")}}>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src={{asset("images/banner.webp")}}>
            </div>
          </div>
          <a class="carousel-control-prev" href="#event-slider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#event-slider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="site-section bg-light" id="program-kerja-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-12 text-center">
        <h2 class="section-title mb-3">Program Kerja</h2>
      </div>
    </div>
    <div class="row align-items-stretch">
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">

        <div class="unit-4 d-block">
          <div class="unit-4-icon mb-3">
            <span class="icon-wrap"><span class="fas fa-dharmachakra"></span></span>
          </div>
          <div>
            <h3>Dhammaduta</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.
            </p>
            <p><a href="#">Baca selengkapnya</a></p>
          </div>
        </div>

      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">

        <div class="unit-4 d-block">
          <div class="unit-4-icon mb-3">
            <span class="icon-wrap"><span class="text-primary icon-sentiment_satisfied"></span></span>
          </div>
          <div>
            <h3>Dana Anak Asuh</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.
            </p>
            <p><a href="#">Baca selengkapnya</a></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
        <div class="unit-4 d-block">
          <div class="unit-4-icon mb-3">
            <span class="icon-wrap"><span class="text-primary fas fa-tint"></span></span>
          </div>
          <div>
            <h3>Donor Darah</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.
            </p>
            <p><a href="#">Baca selengkapnya</a></p>
          </div>
        </div>
      </div>


      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
        <div class="unit-4 d-block">
          <div class="unit-4-icon mb-3">
            <span class="icon-wrap"><span class="text-primary fas fa-book"></span></span>
          </div>
          <div>
            <h3>Free Book</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.
            </p>
            <p><a href="#">Baca selengkapnya</a></p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
        <div class="unit-4 d-block">
          <div class="unit-4-icon mb-3">
            <span class="icon-wrap"><span class="text-primary fas fa-praying-hands"></span></span>
          </div>
          <div>
            <h3>Dhamma Talk</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.
            </p>
            <p><a href="#">Baca selengkapnya</a></p>
          </div>
        </div>


      </div>

      <div class="col-md-6 col-lg-4 mb-4 mb-lg-4" data-aos="fade-up">
        <div class="unit-4 d-block">
          <div class="unit-4-icon mb-3">
            <span class="icon-wrap"><span class="text-primary icon-power"></span></span>
          </div>
          <div>
            <h3>Donor Darah</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis quis molestiae vitae eligendi at.
            </p>
            <p><a href="#">Baca selengkapnya</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="site-section" id="blog-section">
  <div class="container">
    <div class="row mb-5">
      <div class="col-12 text-center">
        <h2 class="section-title mb-3">Blog</h2>
      </div>
    </div>

    <div id="blog-list" class="row mb-1 mb-lg-2" data-aos="fade-up"></div>
    <div class="row justify-content-end"><a href="blog" class="font-weight-bold">Lihat selengkapnya >>></a></div>
  </div>
</div>
@endsection

@section('script')
<script src={{ asset("js/moment.min.js") }}></script>
<script>
  loadData(1);
  
  function loadData(page) {
    $.ajax({
      url: '/blog?page=' + page,
      type: 'GET',
      success: function(response) {        
        console.log(response);
        var html = '';
        for (const blog of response.data) { 
          var thumbnail = `${ "{{ asset('storage/images/') }}" +`/`+ blog.thumbnail }`;
          var slug = blog.slug;
          var title = blog.title;
          var createdAt = moment(blog.created_at).local().format('YYYY-MM-DD');
          var description = blog.description;
          var authorName = blog.name;

          html +=`
            <div class="col-md-6 col-lg-4 mb-8 mb-lg-8">
              <div class="card border-light no-border">
                <img src="`+thumbnail+`" alt="thumbnail" class="card-img-top d-block mx-auto mb-3 card-image">
                <h5 class="card-title"><a href="/blog/`+slug+`" class="font-weight-bold">`+title+`</a></h5>
                <p class="card-text">`+description+`</p>
                <div class="row no-gutters">
                  <div class="col-12 mb-5 mb-lg-5">
                    <div class="row align-items-center">
                      <div class="col-2">
                        <i class="fas fa-user-circle" style="font-size:40px"></i>
                      </div>
                      <div class="col-10">
                        <div class="row">
                          <div class='font-weight-bold'>`+authorName+`</div>
                        </div>
                        <div class="row">
                          <div class="text-muted">`+createdAt+`</div>
                        </div>
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
            </div>
            `;
        }
        $('#blog-list').html(html);
      }
    });
  }
</script>
@endsection