<style>
 
</style>
<div id="body">
        <h5>{{$cate->name}}</h5>
        @php
        @endphp
        {!!Theme::partial('list_products',['data'=>$cate->products])!!}

</div>

