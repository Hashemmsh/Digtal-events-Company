

<style>
    .category-box img {
    transition: all 0.3s ease-in-out;
    width: 100%;
    height: 200px;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    object-fit: cover;
}

.product-item .product-thumb img {
    width: 100%;
    height: 242px;
    object-fit: cover;
}
 </style>
<div class="product-item">
    <div class="product-thumb">
        @if ($product->sale_price)
            <span class="bage">Sale</span>
        @endif
        <img  class="" src="{{ asset('uploads/products/'.$product->image) }}" alt="product-img" />
        {{-- <div class="preview-meta">
            <ul>
                <li>
                    <span  data-toggle="modal" data-target="#product-modal-{{ $product->id }}">
                        <i class="tf-ion-ios-search-strong"></i>
                    </span>
                </li>
                <li>
                    <a href="#!" ><i class="tf-ion-ios-heart"></i></a>
                </li>
                <li>
                    <a href="#!"><i class="tf-ion-android-cart"></i></a>
                </li>
            </ul>
          </div> --}}
    </div>
    <div class="product-content">
        <h4><a href="{{ route('site.product', $product->id) }}">{{ $product->trans_name }}</a></h4>
        @if ($product->sale_price)
        <small class="text-muted"><del class="price">${{ $product->price }}</del></small>
        <span class="price">${{ $product->sale_price }}</span>
        @else
        <p class="price">${{ $product->price }}</p>
        @endif

    </div>
</div>
