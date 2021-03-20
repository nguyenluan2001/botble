<style>
    #list_products{
        display: flex;
    }
</style>
<div id="list_products">
    @foreach($data as $item)
    {!!Theme::partial('product_item',['item'=>$item])!!}
    @endforeach
</div>