@extends('misc::web.tpl.base')
@section('title', $_title ?? '')
@section('description', $_description ?? '')
@section('head-content')
    @include('misc::tpl._js_css', [
        '_type' => ['layui']
    ])
@endsection
@section('body-class', 'new_ui')
@section('body-main')
    @include('weiran-mgr-page::tpl._toastr')
    <div class="layui-fluid" data-pjax pjax-ctr="#main" id="main">
        <div class="layui-card" >
            @yield('backend-main')
        </div>
    </div>
    <style>
	    /* 弹窗美化样式 */
	    #importModal {
		    border-radius: 8px;
		    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
	    }

	    .modal-header {
		    border-bottom: 1px solid #f0f0f0;
		    padding-bottom: 20px;
	    }

	    .file-selector-container {
		    border: 2px dashed #e6e6e6;
		    border-radius: 6px;
		    transition: all 0.3s;
		    background: #fafafa;
		    position: relative;
	    }

	    .file-selector-container:hover {
		    border-color: #1E9FFF;
		    background: #f5f9ff;
	    }

	    .file-info-display {
		    background: #fff;
		    border-radius: 6px;
		    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
	    }

	    #submitImportBtn[disabled] {
		    opacity: 0.6;
		    cursor: not-allowed;
		    background-color: #c2c2c2 !important;
		    border-color: #c2c2c2 !important;
	    }

    </style>
@endsection