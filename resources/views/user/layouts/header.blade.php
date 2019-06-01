<!-- Page Header -->
<header class="masthead" style="background-image: url(@yield('bg-img'))">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h3>@yield('title')</h3>
            <span class="subheading">@yield('subtitle')</span>
          </div>
        </div>
      </div>
    </div>
    @section('footer')
                    @show
  </header>