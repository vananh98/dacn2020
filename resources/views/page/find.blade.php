@extends('layout.index2')
@section('content')
<style>
    .attachment-shop_catalog {
        height: 246px;
    }
    .item-detail{
        height: 380px;
    }
</style>
<div id="sw_deal_01" class="sw-hotdeal ">
    <div class="sw-hotdeal-content">
        @if(count($prd)>0)
        @foreach($prd as $item)
        <div class="item-product col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <input type="text" name="token" value="{{csrf_token()}}" hidden>
            <div class="item-detail">
                <div class="item-img products-thumb">
                    <span class="onsale">Sale!</span>
                    <a href="simple_product/{{$item->MaSP}}">
                        <div class="product-thumb-hover"><img width="300" height="300" src="img/{{$item->Hinh}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" title="{{$item->Hinh}}" ></div>
                    </a>

                    <!-- add to cart, wishlist, compare -->
                    <div class="item-bottom clearfix">
                        <a id="{{$item->MaSP}}" rel="nofollow" href="javascript:" class="button addcart" title="Giỏ hàng">Add to cart</a>

                        <!-- <a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a> -->

                        <!-- <div class="yith-wcwl-add-to-wishlist ">
                            <div class="yith-wcwl-add-button show" style="display:block">
                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
                                <img src="images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                            </div>

                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                <span class="feedback">Product added!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                <span class="feedback">The product is already in the wishlist!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div style="clear:both"></div>
                            <div class="yith-wcwl-wishlistaddresponse"></div>
                        </div> -->

                        <div class="clear"></div>
                        <a href="simple_product/{{$item->MaSP}}" class="sm_quickview_handler-list fancybox" title="Chi tiết">Chi tiết </a>
                    </div>


                    @if($item->KhuyenMai>0)
                    <div class="sale-off">
                        {{-$item->KhuyenMai."%"}}
                    </div>
                    @endif
                </div>

                <div class="item-content">
                    <!-- rating  -->
                    <div class="reviews-content">
                        <div class="star"></div>
                        <div class="item-number-rating">
                            {{$item->DanhGia}} Review(s)
                        </div>
                    </div>
                    <!-- end rating  -->

                    <h4><a href="simple_product.html" title="nisi ball tip">{{$item->TenSP}}</a></h4>

                    <!-- price -->
                    <div class="item-price">
                        @if(($item ->KhuyenMai)>0)
                        <del>
                            {{(number_format($item->Gia)).'Đ'}}
                        </del>
                        <ins>
                            {{ number_format(($item->Gia)-($item->Gia)*($item->KhuyenMai)/100 ).'Đ'}}
                        </ins>
                        @else
                        <ins>
                            {{number_format($item->Gia).'Đ'}}
                        </ins>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="item-product col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <h2>Chưa có sản phẩm</h2>
        </div>
        @endif

        <!-- <div class="item-product col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <div class="item-detail">
                <div class="item-img products-thumb">
                    <span class="onsale">Sale!</span>
                    <a href="simple_product.html">
                        <div class="product-thumb-hover"><img width="300" height="300" src="images/1903/22-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/22-300x300.jpg 300w, images/1903/22-150x150.jpg 150w, images/1903/22-180x180.jpg 180w, images/1903/22.jpg 600w" sizes="(max-width: 300px) 100vw, 300px"></div>
                    </a> -->

        <!-- add to cart, wishlist, compare -->
        <!-- <div class="item-bottom clearfix">
                        <a rel="nofollow" href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

                        <a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

                        <div class="yith-wcwl-add-to-wishlist ">
                            <div class="yith-wcwl-add-button show" style="display:block">
                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
                                <img src="images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                            </div>

                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                <span class="feedback">Product added!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                <span class="feedback">The product is already in the wishlist!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div style="clear:both"></div>
                            <div class="yith-wcwl-wishlistaddresponse"></div>
                        </div>

                        <div class="clear"></div>
                        <a href="ajax/fancybox/example.html" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
                    </div>

                    <div class="sale-off">
                        -10%
                    </div>
                </div> -->

        <!-- <div class="item-content"> -->
        <!-- rating  -->
        <!-- <div class="reviews-content">
                        <div class="star"><span style="width:63px"></span></div>
                        <div class="item-number-rating">
                            2 Review(s)
                        </div>
                    </div> -->
        <!-- end rating  -->

        <!-- <h4><a href="simple_product.html" title="Cleaner with bag">Cleaner with bag</a></h4> -->

        <!-- price -->
        <!-- <div class="item-price">
                        <del>
                            $390.00
                        </del>

                        <ins>
                            $350.00
                        </ins>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="item-product col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <div class="item-detail">
                <div class="item-img products-thumb">
                    <span class="onsale">Sale!</span>
                    <a href="simple_product.html">
                        <div class="product-thumb-hover"><img width="300" height="300" src="images/1903/26-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/26-300x300.jpg 300w, images/1903/26-150x150.jpg 150w, images/1903/26-180x180.jpg 180w, images/1903/26.jpg 600w" sizes="(max-width: 300px) 100vw, 300px"></div>
                    </a> -->

        <!-- add to cart, wishlist, compare -->
        <!-- <div class="item-bottom clearfix">
                        <a rel="nofollow" href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

                        <a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

                        <div class="yith-wcwl-add-to-wishlist ">
                            <div class="yith-wcwl-add-button show" style="display:block">
                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
                                <img src="images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                            </div>

                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                <span class="feedback">Product added!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                <span class="feedback">The product is already in the wishlist!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div style="clear:both"></div>
                            <div class="yith-wcwl-wishlistaddresponse"></div>
                        </div>

                        <div class="clear"></div>
                        <a href="ajax/fancybox/example.html" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
                    </div>

                    <div class="sale-off">
                        -26%
                    </div>
                </div> -->

        <!-- <div class="item-content"> -->
        <!-- rating  -->
        <!-- <div class="reviews-content">
                        <div class="star"><span style="width:52.5px"></span></div>
                        <div class="item-number-rating">
                            4 Review(s)
                        </div>
                    </div>
                    end rating  -->

        <!-- <h4><a href="simple_product.html" title="Vacuum cleaner">Vacuum cleaner</a></h4> -->

        <!-- price -->
        <!-- <div class="item-price">
                        <del>
                            $350.00
                        </del>

                        <ins>
                            $260.00
                        </ins>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="item-product col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <div class="item-detail">
                <div class="item-img products-thumb">
                    <span class="onsale">Sale!</span>
                    <a href="simple_product.html">
                        <div class="product-thumb-hover"><img width="300" height="300" src="images/1903/62-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/62-300x300.jpg 300w, images/1903/62-150x150.jpg 150w, images/1903/62-180x180.jpg 180w, images/1903/62.jpg 600w" sizes="(max-width: 300px) 100vw, 300px"></div>
                    </a> -->

        <!-- add to cart, wishlist, compare -->
        <!-- <div class="item-bottom clearfix">
                        <a rel="nofollow" href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

                        <a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

                        <div class="yith-wcwl-add-to-wishlist ">
                            <div class="yith-wcwl-add-button show" style="display:block">
                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
                                <img src="images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                            </div>

                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                <span class="feedback">Product added!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                <span class="feedback">The product is already in the wishlist!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div style="clear:both"></div>
                            <div class="yith-wcwl-wishlistaddresponse"></div>
                        </div>

                        <div class="clear"></div>
                        <a href="ajax/fancybox/example.html" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
                    </div>

                    <div class="sale-off">
                        -17%
                    </div>
                </div> -->

        <!-- <div class="item-content"> -->
        <!-- rating  -->
        <!-- <div class="reviews-content">
                        <div class="star"></div>
                        <div class="item-number-rating">
                            0 Review(s)
                        </div>
                    </div> -->
        <!-- end rating  -->

        <!-- <h4><a href="simple_product.html" title="philips stand">philips stand</a></h4> -->

        <!-- price -->
        <!-- <div class="item-price">
                        <del>
                            $300.00
                        </del>

                        <ins>
                            $250.00
                        </ins>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="item-product col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <div class="item-detail">
                <div class="item-img products-thumb">
                    <span class="onsale">Sale!</span>
                    <a href="simple_product.html">
                        <div class="product-thumb-hover"><img width="300" height="300" src="images/1903/50-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/50-300x300.jpg 300w, images/1903/50-150x150.jpg 150w, images/1903/50-180x180.jpg 180w, images/1903/50.jpg 600w" sizes="(max-width: 300px) 100vw, 300px"></div>
                    </a> -->

        <!-- add to cart, wishlist, compare -->
        <!-- <div class="item-bottom clearfix">
                        <a rel="nofollow" href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

                        <a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

                        <div class="yith-wcwl-add-to-wishlist ">
                            <div class="yith-wcwl-add-button show" style="display:block">
                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
                                <img src="images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                            </div>

                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                <span class="feedback">Product added!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                <span class="feedback">The product is already in the wishlist!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div style="clear:both"></div>
                            <div class="yith-wcwl-wishlistaddresponse"></div>
                        </div>

                        <div class="clear"></div>
                        <a href="ajax/fancybox/example.html" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
                    </div>

                    <div class="sale-off">
                        -13%
                    </div>
                </div> -->

        <!-- <div class="item-content"> -->
        <!-- rating  -->
        <!-- <div class="reviews-content">
                        <div class="star"></div>
                        <div class="item-number-rating">
                            0 Review(s)
                        </div>
                    </div> -->
        <!-- end rating  -->

        <!-- <h4><a href="simple_product.html" title="MacBook Air">MacBook Air</a></h4> -->

        <!-- price -->
        <!-- <div class="item-price">
                        <del>
                            $800.00
                        </del>

                        <ins>
                            $700.00
                        </ins>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="item-product col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <div class="item-detail">
                <div class="item-img products-thumb">
                    <span class="onsale">Sale!</span>
                    <a href="simple_product.html">
                        <div class="product-thumb-hover"><img width="300" height="300" src="images/1903/45-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/45-300x300.jpg 300w, images/1903/45-150x150.jpg 150w, images/1903/45-180x180.jpg 180w, images/1903/45.jpg 600w" sizes="(max-width: 300px) 100vw, 300px"></div>
                    </a> -->

        <!-- add to cart, wishlist, compare -->
        <!-- <div class="item-bottom clearfix">
                        <a rel="nofollow" href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

                        <a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

                        <div class="yith-wcwl-add-to-wishlist ">
                            <div class="yith-wcwl-add-button show" style="display:block">
                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
                                <img src="images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                            </div>

                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                <span class="feedback">Product added!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                <span class="feedback">The product is already in the wishlist!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div style="clear:both"></div>
                            <div class="yith-wcwl-wishlistaddresponse"></div>
                        </div>

                        <div class="clear"></div>
                        <a href="ajax/fancybox/example.html" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
                    </div>

                    <div class="sale-off">
                        -24%
                    </div>
                </div> -->

        <!-- <div class="item-content"> -->
        <!-- rating  -->
        <!-- <div class="reviews-content">
                        <div class="star"><span style="width:35px"></span></div>
                        <div class="item-number-rating">
                            2 Review(s)
                        </div>
                    </div> -->
        <!-- end rating  -->

        <!-- <h4><a href="simple_product.html" title="veniam dolore">veniam dolore</a></h4> -->

        <!-- price -->
        <!-- <div class="item-price">
                        <del>
                            $250.00
                        </del>

                        <ins>
                            $190.00
                        </ins>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="item-product col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <div class="item-detail">
                <div class="item-img products-thumb">
                    <span class="onsale">Sale!</span>
                    <a href="simple_product.html">
                        <div class="product-thumb-hover"><img width="300" height="300" src="images/1903/51-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/51-300x300.jpg 300w, images/1903/51-150x150.jpg 150w, images/1903/51-180x180.jpg 180w, images/1903/51.jpg 600w" sizes="(max-width: 300px) 100vw, 300px"></div>
                    </a> -->

        <!-- add to cart, wishlist, compare -->
        <!-- <div class="item-bottom clearfix">
                        <a rel="nofollow" href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

                        <a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

                        <div class="yith-wcwl-add-to-wishlist ">
                            <div class="yith-wcwl-add-button show" style="display:block">
                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
                                <img src="images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                            </div>

                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                <span class="feedback">Product added!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                <span class="feedback">The product is already in the wishlist!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div style="clear:both"></div>
                            <div class="yith-wcwl-wishlistaddresponse"></div>
                        </div>

                        <div class="clear"></div>
                        <a href="ajax/fancybox/example.html" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
                    </div>

                    <div class="sale-off">
                        -8%
                    </div>
                </div> -->

        <!-- <div class="item-content"> -->
        <!-- rating  -->
        <!-- <div class="reviews-content">
                        <div class="star"></div>
                        <div class="item-number-rating">
                            0 Review(s)
                        </div>
                    </div> -->
        <!-- end rating  -->

        <!-- <h4><a href="simple_product.html" title="ipsum esse nisi">ipsum esse nisi</a></h4> -->

        <!-- price -->
        <!-- <div class="item-price">
                        <del><span class="woocommerce-Price-amount amount">$600.00</span></del> <ins><span class="woocommerce-Price-amount amount">$550.00</span></ins> </span>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="item-product col-lg-3 col-md-3 col-sm-4 col-xs-6">
            <div class="item-detail">
                <div class="item-img products-thumb">
                    <span class="onsale">Sale!</span>
                    <a href="simple_product.html">
                        <div class="product-thumb-hover"><img width="300" height="300" src="images/1903/39-300x300.jpg" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/39-300x300.jpg 300w, images/1903/39-150x150.jpg 150w, images/1903/39-180x180.jpg 180w, images/1903/39.jpg 600w" sizes="(max-width: 300px) 100vw, 300px"></div>
                    </a> -->

        <!-- add to cart, wishlist, compare -->
        <!-- <div class="item-bottom clearfix">
                        <a rel="nofollow" href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

                        <a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

                        <div class="yith-wcwl-add-to-wishlist ">
                            <div class="yith-wcwl-add-button show" style="display:block">
                                <a href="wishlist.html" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
                                <img src="images/wpspin_light.gif" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
                            </div>

                            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                                <span class="feedback">Product added!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                                <span class="feedback">The product is already in the wishlist!</span>
                                <a href="#" rel="nofollow">Browse Wishlist</a>
                            </div>

                            <div style="clear:both"></div>
                            <div class="yith-wcwl-wishlistaddresponse"></div>
                        </div>

                        <div class="clear"></div>
                        <a href="ajax/fancybox/example.html" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
                    </div>

                    <div class="sale-off">
                        -3%
                    </div>
                </div> -->

        <!-- <div class="item-content"> -->
        <!-- rating  -->
        <!-- <div class="reviews-content">
                        <div class="star"></div>
                        <div class="item-number-rating">
                            0 Review(s)
                        </div>
                    </div> -->
        <!-- end rating  -->

        <!-- <h4><a href="simple_product.html" title="iPad Mini 2 Retina">iPad Mini 2 Retina</a></h4> -->

        <!-- price -->
        <!-- <div class="item-price">
                        <del>
                            $300.00
                        </del>

                        <ins>
                            $290.00
                        </ins>
                    </div> -->
        <!-- </div>
            </div>
        </div> -->
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $(".addcart").click(function() {
            var id = $(this).attr("id");
            var token = $("input[name='token']").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: 'addlive',
                type: 'post',
                cache: false,
                data: {
                    "id": id
                },
                success: function(dt) {
                    if (dt == "false") {
                        window.location = 'login'
                    } else {
                        $(".minicart-number").text(dt)
                        console.log(dt)
                    }

                }
            });
        });
    });
</script>
@endsection