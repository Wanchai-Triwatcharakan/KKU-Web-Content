<style>
    html,
    body {
        /* position: relative; */
        height: 100%;
    }

    body {
        background: #ffffff;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 600px;

    }

    swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /*
    swiper-slide-mobile img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    } */


    @media (max-width: 1281px) {
        swiper-slide {
            max-height: 460px;
          
        }
      
    }

    @media (max-width: 1023px) {
        swiper-slide {
            max-height: 300px;
          
        }
      
    }

    @media (max-width: 720px) {
        swiper-slide {
            height: 180px;
        }
        swiper-slide img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
    }
</style>

{{-- autoplay-delay="6000" --}}
<swiper-container class="mySwiper mt-[4.5rem] max-xl:mt-[3.5rem] cursor-pointer relative z-50 " pagination="true"
    pagination-dynamic-bullets="true" loop="true" >

    @foreach ($adslide as $as)
        <swiper-slide class="">
            <img src="{{ url($as->ad_image) }}" alt=""
                class="w-full h-full"></swiper-slide>
    @endforeach

</swiper-container>


<!-- mobile swiper -->



<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
