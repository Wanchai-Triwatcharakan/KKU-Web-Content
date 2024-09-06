{{-- <div class="swiper">
    <div class="swiper-wrapper">
        @foreach ($ad_slide as $ad)
            <div class="swiper-slide">
                <img src="/{{$ad->ad_image}}" alt="{{$ad->ad_description}}">
            </div>
        @endforeach
    </div>
    <div class="swiper-button-prev" style="display: none;"></div>
    <div class="swiper-button-next" style="display: none;"></div>
    <button class="next" onclick="document.querySelector('.swiper-button-prev').click()"><i class="fa-solid fa-angle-left"></i></button>
    <button class="prev" onclick="document.querySelector('.swiper-button-next').click()"><i class="fa-solid fa-angle-right"></i></button>
    <div class="swiper-pagination"></div>
</div> --}}

<style>
    html,
    body {
      position: relative;
      height: 100%;
    }

    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    swiper-container {
      width: 100%;
      height: 700px;
    }

    swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>

<swiper-container class="mySwiper" direction="vertical" pagination="true" pagination-clickable="true">
    {{-- @foreach ($ad_slide as $ad)
        <swiper-slide><img src="/{{ $ad->ad_image }}" alt="{{ $ad->ad_description }}"></swiper-slide>
    @endforeach --}}
    <swiper-slide class="bg-black"></swiper-slide>
    <swiper-slide class="bg-red-500"></swiper-slide>
    <swiper-slide class="bg-green-500"></swiper-slide>
</swiper-container>
