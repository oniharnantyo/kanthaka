@extends('home.layout.main')
@section('title', 'Blog')
@section('content')
<div class="site-section">
  <div class="container">
    <div class="row mb-5 mt-5">
      <div class="col-12 text-center">
        <h2 class="section-title mb-3">Blog</h2>
      </div>
    </div>
    <div id="blog-list" class="row mb-3 mb-lg-4">
    </div>
    <div class="row justify-content-center">
      <button type="button" class="btn btn-primary" id="btn-load-more" style="display: none;">Load More</button>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src={{ asset("js/moment.min.js") }}></script>
<script>
  var btnLoadMore = $('#btn-load-more');

  var pages = 2;
  var current_page = 0;
  var bool = false;
  var lastPage;

  btnLoadMore.click(function(){
    if (bool == false && lastPage > pages - 2) {
      bool = true;
      lazyLoad(pages)
      .then(() => {
        bool = false;
        pages++;

        if (pages - 1 == lastPage) {
          btnLoadMore.hide();
        }
      })
    }
  }); 
  
  function lazyLoad(page) {
    return new Promise((resolve, reject) => {
      $.ajax({
        url: '?page=' + page,
        type: 'GET',
        beforeSend: function() {
        },
        success: function(response) {
          var html = '';
          for (var blog of response.data) { 
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
                      <div class="col-3">
                        <i class="fas fa-user-circle" style="font-size:45px"></i>
                      </div>
                      <div class="col-9">
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
          $('#blog-list').append(html);
          resolve();
        }
      });
    })
  }
  
  loadData(1);
  
  function loadData(page) {
    $.ajax({
      url: '?page=' + page,
      type: 'GET',
      success: function(response) {        
        lastPage = response.last_page;
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

        if (response.next_page_url != '') {
          btnLoadMore.show();
        }
      }
    });
  }
</script>
@endsection