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
        height: 100%;

    }

    swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    swiper-slide-mobile img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    @media (max-width: 720px) {
        swiper-slide img {
            width: 100%;
            height: 150px;
        }
    }
</style>


<swiper-container class="mySwiper mt-[4.5rem] max-xl:mt-[3rem] cursor-pointer relative z-50" pagination="true"
    pagination-dynamic-bullets="true" loop="true" autoplay-delay="6000"> 

    @foreach($adslide as $as)
        <swiper-slide class=""><img src="{{url($as->ad_image)}}" alt="" class="w-full h-auto"></swiper-slide>
    @endforeach
   
</swiper-container>


<!-- mobile swiper -->



<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
