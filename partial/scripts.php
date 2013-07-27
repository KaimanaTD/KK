
<!-- //-beg- concat_js -->

<script>
	Modernizr.load([
		{
			load: [
				'js/conditional/small-adapt.js',
				'js/unsemantic/assets/stylesheets/unsemantic-grid-base-no-ie7.css'
			],
			complete: function() {
				Modernizr.load({ load: ['ielt8!js/conditional/big-adapt.js', 'ielt8!js/unsemantic/assets/stylesheets/unsemantic-grid-base.css'] });
			}
		},
		{ load: 'js/unsemantic/assets/javascripts/adapt.min.js' },
		{
			load: '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
			complete: function() {
				if ( !window.jQuery ) {Modernizr.load('js/vendor/jquery-1.10.2.min.js')}
			}
		},
		{
			test: Modernizr.cssremunit,
			nope: 'js/conditional/REM-unit-polyfill/js/rem.min.js'
		}
	]);
</script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

<!-- //-end- concat_js -->

