<style>
   
</style>
<div id="wrapper">

{!! Theme::partial('header') !!}

<div id="content">
    <div class="container">
        {!!Theme::partial('sidebar')!!}
        {!! Theme::content() !!}
    </div>
</div>

{!! Theme::partial('footer') !!}
</div>
