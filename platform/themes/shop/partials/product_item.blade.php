<style>
    .product_item{
        width: 20%;
        padding: 0px 10px;
    }
    .product_item .product_img a img{
        width: 100%;
    }
</style>
<div class="product_item">
    <div class="product_img">

        <a href="">
            <img src="https://diennuochoangkhoi.com/wp-content/uploads/2014/09/550x550.gif" alt="">
        </a>
    </div>
    <div class="product_info">
        <a href="{{route('product.detail',$item->id)}}">{{$item->product_name}}</a>
        <p>{{number_format($item->price)}}</p>
    </div>
</div>