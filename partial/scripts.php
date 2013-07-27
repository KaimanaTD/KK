
<!-- //-beg- concat_js -->

<script>
	Modernizr.load([
		{
			load: '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
			complete: function() {
				if ( !window.jQuery ) {Modernizr.load('js/vendor/jquery-1.10.2.min.js')}
			}
		},
		{
			test: Modernizr.cssremunit,
			nope: 'js/conditional/js/rem.min.js'
		}
	]);
</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- //-end- concat_js -->

