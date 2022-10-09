<?php $i = 0; ?>
<div class="news">
    <h2 class="title"> News </h2>
    <div class="row" style="min-height: 300px">
        @foreach ($products as $product)
            <?php $discount = doubleval($product->getDiscount()) * 100;
            $price = $product->getPrice();
            $price2 = doubleval($product->getPrice()) * (1 - doubleval($product->getDiscount())); ?>
            <div class="disable-select product-item col-6 col-md-4 col-lg-2 mb-4">
                <div class="card card-product h-100" role="button">
                    <div class="card-quick-cart">
                        <svg class="card-quick-add" data-name="{{ $product->getName() }}" version="1.0"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200.000000 200.000000"
                            preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,200.000000) scale(0.100000,-0.100000)" fill="white"
                                stroke="none">
                                <path
                                    d="M773 1875 c-320 -83 -567 -331 -649 -652 -34 -135 -34 -311 0 -446 82 -322 331 -571 653 -653 135 -34 311 -34 446 0 322 82 571 331 653 653 34 135 34 311 0 446 -82 322 -331 571 -653 653 -134 34 -317 33 -450 -1z m394 -160 c264 -62 480 -278 547 -546 21 -86 21 -252 0 -338 -67 -268 -277 -478 -545 -545 -86 -21 -252 -21 -338 0 -268 67 -484 283 -546 547 -19 81 -19 254 0 337 9 36 37 108 62 160 40 80 61 109 137 186 77 76 106 98 186 137 52 26 122 53 155 61 80 19 263 20 342 1z" />
                                <path
                                    d="M890 1290 l0 -180 -180 0 -180 0 0 -110 0 -110 180 0 180 0 0 -180 0 -180 110 0 110 0 0 180 0 180 180 0 180 0 0 110 0 110 -180 0 -180 0 0 180 0 180 -110 0 -110 0 0 -180z" />
                            </g>
                        </svg>
                    </div>
                    <a class="h-100 d-flex flex-column" href="/game/product?name={{ $product->getName() }}">
                        <img id="product-news-image-{{ $i }}"
                            src="{{ url('./game/' . $product->getImage()) }}" alt="" class="card-img">
                        <div>
                            <div class="card-text text-truncate text-white font-weight-bold">
                                {{ $product->getDisplay() }} </div>
                            <div class="card-text text-truncate text-white-50"> {{ $product->getDeveloper() }} </div>
                            <div class="card-text mt-2">
                                @if ($discount > 0)
                                    <span
                                        class="product-discount float-left badge bg-primary text-white">-{{ $discount }}
                                        % </span>'
                                @endif
                                <span class="float-right badge">
                                    @if ($discount > 0)
                                        <span
                                            class="product-discount-price text-decoration-line-through text-secondary mr-1">${{ number_format($price, 2, '.', '') }}</span>
                                    @endif
                                    <span class="product-final-price text-white">
                                        ${{ number_format($price2, 2, '.', '') }}
                                    </span>
                                    <span class="clearfix"> </span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php
            if ($i != 11) {
                $i++;
            } else {
                break;
            } ?>
        @endforeach
    </div>
</div>
{{-- <script>
    $(".card-quick-add").click(function(e) {
        let name = e.currentTarget.dataset.name;

        $.ajax({
            url: "/game/product/add_cart.php",
            method: "POST",
            data: {
                "name": name
            },
            success: function(result) {
                if (result == 0) {
                    callSuccessNotice("Successful add to cart!");
                } else {
                    callDangerNotice("Out of stock!");
                }
            }
        });
    })
</script> --}}
