
<div class="row"><center>Catgory</center></div>
<section id="feature" class="section-p1">

   @foreach ( $data as $data )
    <div class="fe-box">
        <img src="{{ $data->getMedia("images")->first()?->getUrl()}}" height="120px">
    {{--  <img src="{{ $data->getFirstMediaUrl('avtar') }}" alt=""> --}}


    <h6>{{ $data->name }}</h6>
</div>

   @endforeach

</section>
<style>
    .spas-cart{
        width: 50px;
        height: 50px;
        color: red;
        float: left;
        margin-top: 0px;
        padding-top: 0px;
    }
</style>

<section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Modern Design</p>
    <div class="pro-container">
        @foreach ($pro as $showpr )
 <div class="pro" dir="rtl">
            <img src="{{ $showpr->getMedia("avtar")->first()?->getUrl() }}" alt="">
            <div class="des">
                <span >{{ $showpr->nameProduct }}</span>
                <h5>{{$showpr->discrtion }}</h5>

                <div style="padding: 4px; overflow: hidden;" >
                    <h4 style=" width: 50px;float: right; margin-top: 5px">السعر:{{ $showpr->price }}</h4>
               <h4><span class="spas-cart"><a href="{{ route('addSingleProduct',$showpr->id ) }}">
                <img src="images/cart.png" style="padding: 0px;margin: 0px; " width="50px" height="40px"></a></span></h4>
                </div>
            </div>

        </div>
        @endforeach




    </div>
</section>

<section id="banner" class="section-m1">
    <h4>Repair Services</h4>
    <h2>Up to <span>70% Off</span> - All t-Shirts & Accessories</h2>
    <button class="normal">Explore More</button>
</section>

<section id="product1" class="section-p1">
    <h2>New Arrivals</h2>
    <p>Summer Collection New Modern Design</p>
    <div class="pro-container">
        @foreach ($allpro as $allpro )
        <div class="pro" dir="rtl">
                   <img height="224px" src="{{ $allpro->getMedia("avtar")->first()?->getUrl() }}"  alt="" >
                   <div class="des">
                       <span >{{ $allpro->nameProduct }}</span>
                       <h5>{{$allpro->discrtion }}</h5>

                       <div style="padding: 4px; overflow: hidden;">
                           <h4 style=" width: 50px;float: right; margin-top: 5px">السعر:{{ $allpro->price }}</h4>
                      <h4><span class="spas-cart"><img src="images/cart.png" style="padding: 0px;margin: 0px; " width="50px" height="40px"></span></h4>
                       </div>
                   </div>

               </div>
               @endforeach


    </div>
</section>
