
		<!-- styles specific to demo site -->

		<!-- styles needed by jScrollPane - include in your own sites -->
		<link type="text/css" href="http://<?php echo $_SERVER['SERVER_NAME'];?>/header/scrollbar/style/jquery.jscrollpane.css" rel="stylesheet" media="all" />

		<style type="text/css" id="page-css">
			/* Styles specific to this particular page */
			body
			{
				background: #fff;
				overflow: auto;
				height: 98%;
			}
			#content
			{
			}
		</style>

		<!-- latest jQuery direct from google's CDN -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!-- the mousewheel plugin -->
		<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/header/scrollbar/script/jquery.mousewheel.js"></script>
		<!-- the jScrollPane script -->
		<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME'];?>/header/scrollbar/script/jquery.jscrollpane.min.js"></script>


		<script type="text/javascript" id="sourcecode">
			$(function()
			{
				var win = $(window);
				// Full body scroll
				var isResizing = false;
				win.bind(
					'resize',
					function()
					{
						if (!isResizing) {
							isResizing = true;
							var container = $('#content');
							// Temporarily make the container tiny so it doesn't influence the
							// calculation of the size of the document
							container.css(
								{
									'width': 1,
									'height': 1
								}
							);
							// Now make it the size of the window...
							container.css(
								{
									'width': win.width(),
									'height': win.height()
								}
							);
							isResizing = false;
							container.jScrollPane(
								{
									'showArrows': true
								}
							);
						}
					}
				).trigger('resize');

				// Workaround for known Opera issue which breaks demo (see
				// http://jscrollpane.kelvinluck.com/known_issues.html#opera-scrollbar )
				$('body').css('overflow', 'hidden');

				// IE calculates the width incorrectly first time round (it
				// doesn't count the space used by the native scrollbar) so
				// we re-trigger if necessary.
				if ($('#full-page-container').width() != win.width()) {
					win.trigger('resize');
				}
			});
		</script>
	
