<?php
$_type = $_type ?? [];
?>
{{--js--}}
@if (true)
    {!! Html::script('assets/libs/boot/app.min.js?v=2025-04-29') !!}
@endif
{{--layui--}}
@if(in_array('layui', $_type, true))
    {!! Html::style('assets/libs/layui/css/layui.css?v=2.11.0') !!}
    {!! Html::script('assets/libs/layui/layui.js?v=2.11.0') !!}
@endif

@if (true)
    {!! Html::style('assets/libs/boot/style.css?v=2025-01-19') !!}
@endif

@once
    @vite(['resources/js/app.js','resources/assets/style/style.less'])
@endonce