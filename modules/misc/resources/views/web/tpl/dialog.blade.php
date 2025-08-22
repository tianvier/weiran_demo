@extends('weiran-mgr-page::tpl.default')
@section('title', $_title ?? '')
@section('description', $_description ?? '')
@section('head-css')
    @vite(['resources/assets/style/style.less', 'resources/assets/style/app.css'])
@endsection
@section('head-content')
    @include('misc::tpl._js_css', [
        '_type' => ['layui']
    ])
    <script src="/assets/app/js/jquery.slimscroll.min.js"></script>
    {!! Weiran\MgrPage\Classes\Widgets\FormWidget::assetsAppendHead('builder') !!}
@endsection
@section('body-class', 'new_ui')
@section('body-main')
    @include('weiran-mgr-page::tpl._toastr')
    <main class="backend--main pd10" style="background: #fff">
        @yield('backend-main')
    </main>
    {!! Weiran\MgrPage\Classes\Widgets\FormWidget::assetsStrAppendBody('builder') !!}
    <script>
	layui.form.render();
    </script>
    <style>
		.layui-form-selectup dl {
			top    : auto;
			bottom : 42px;
		}
    </style>
    <script>
	layui.use(['form', 'layer'], function () {
		let form = layui.form;
		var $    = layui.$;
		// 定义验证规则
		form.verify({
			// 此处以必填项为例
			required : function (value, item) {
				var othis = $(item);
				console.log(value, item)
				if (!value) {

					// 添加一个标签提示
					// othis.next().remove(); // 删除之前的提示
					if (othis.next('.layui-font-red').length === 0) {
						othis.after('<span class="layui-font-red layui-form-error">必填项不能为空</span>');
					}
					// othis.next().html(othis.attr('lay-msg') || '必填项不能为空');					//othis.next().html(othis.attr('lay-msg') || '必填项不能为空'); // 在表单旁边给出提示语
					return true; // 返回 true 阻止 form 组件内部默认的提示方式
				}
				othis.next().empty();
			}
		});

		// 避免 submit 事件被多次触发
		form.on('submit(submitBtn)', function (obj) {
			console.log(obj)

			let btn         = obj.elem; // 获取当前按钮元素
			let currentForm = $(obj.form); // 获取当前表单元素
			let index       = layer.load(0, {shade : [0.1, '#000000']});
			Util.buttonInteraction(btn, 5);
			currentForm.ajaxSubmit({
				success : function (data) {
					layer.close(index);
					Util.splash(data);
					Util.buttonInteraction(btn, data)
					form.render();
				}
			});
		});

	});
    </script>
@endsection