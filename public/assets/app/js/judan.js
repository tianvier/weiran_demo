$(function () {
	const $body = $('body');
	$body.on('click', '.J_closeParent', function (e) {
		e.preventDefault();
		const index = parent.layer.getFrameIndex(window.name);
		parent.layer.close(index);
	})
})