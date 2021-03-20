<style>
    #detail_product {
        padding-left: 20px;
    }

    #wp {
        display: flex;
    }

    #image {
        width: 30%;
    }

    #image img {
        width: 100%;
    }

    #info {
        width: 70%;
        padding-left: 30px;
    }

    #detail {
        width: 100%;
    }
</style>
<div id="detail_product">
    <div id="wp">

        <div id="image">

            <img src="https://diennuochoangkhoi.com/wp-content/uploads/2014/09/550x550.gif" alt="">
        </div>
        <div id="info">
            <h1>{{$product->product_name}}</h1>
            <h3>Price: {{number_format($product->price)}}</h3><br>
            <form action="{{route('cart.add')}}" method="post">
                @csrf
                <input type="number" name="qty" value="0" min="0" max="{{$product->qty}}"><br>
                <button type="submit" class="btn btn-success mt-3">Add cart</button>
            </form>
        </div>
    </div>
    <div id="detail">
        {!!$product->product_detail!!}
    </div>
</div>