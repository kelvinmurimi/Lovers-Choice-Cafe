  <!-- ***** Main Banner Area Start ***** -->
  <div id="top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="left-content">
                    <div class="inner-content">
                        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
                        <h4>{{ config('app.name', 'LoversChoice') }}</h4>
                        <h6>THE BEST EXPERIENCE</h6>
                       
                        <div class="main-white-button scroll-to-section">
                            <a href="#reservation">Make A Reservation</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="main-banner header-text">
                    <div class="Modern-Slider">
                      <!-- Item -->
                      <div class="item">
                        <div class="img-fill">
                            <img src="{{ asset
                            ('frontend/assets/images/slide-01.jpg')}}" alt="">
                        </div>
                      </div>
                      <!-- // Item -->
                      <!-- Item -->
                      <div class="item">
                        <div class="img-fill">
                            <img src="{{ asset
                            ('frontend/assets/images/slide-02.jpg')}}" alt="">
                        </div>
                      </div>
                      <!-- // Item -->
                      <!-- Item -->
                      <div class="item">
                        <div class="img-fill">
                            <img src="{{ asset
                            ('frontend/assets/images/slide-03.jpg')}}" alt="">
                        </div>
                      </div>
                      <!-- // Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->