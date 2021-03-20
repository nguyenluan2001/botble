@php
$cates=get_list_cates();
@endphp

<div id="sidebar">
    <div id="title">
        <span>Category</span>
    </div>
    <ul>
        @foreach($cates as $cate)
        <li>
            <a href="{{route('category.detail',$cate->id)}}">
                {{$cate->name}}
            </a>
        </li>
        @endforeach
    </ul>
</div>