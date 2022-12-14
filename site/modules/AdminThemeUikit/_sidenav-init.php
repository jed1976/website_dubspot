<?php namespace ProcessWire;

if(!defined("PROCESSWIRE")) die(); 
	
/** @var AdminThemeUikit $adminTheme */
/** @var Paths $urls */
/** @var Config $config */
/** @var WireInput $input */
/** @var Sanitizer $sanitizer */
/** @var Page $page */

// whether or not page tree should be used for left sidebar 
$treePaneLeft = $adminTheme->layout == 'sidenav-tree';
$treePane = strpos($adminTheme->layout, 'sidenav-tree') === 0;

// define location of panes	
$treePaneLocation = $treePaneLeft ? 'west' : 'east';
$sidePaneLocation = $treePaneLeft ? 'east' : 'west';

// URL for main pane 
$mainURL = $page->url();
if($input->get('id')) $mainURL .= "?id=" . (int) $input->get('id');

// pane definition iframes
$panes = array(
	'main' => "<iframe id='pw-admin-main' name='main' class='pane ui-layout-center' " . 
		"src='$mainURL?layout=sidenav-main'></iframe>",
	'side' => "<iframe id='pw-admin-side' name='side' class='pane ui-layout-$sidePaneLocation' " . 
		"src='{$urls->admin}login/?layout=sidenav-side'></iframe>", 
	'tree' => "<iframe id='pw-admin-tree' name='tree' class='pane ui-layout-$treePaneLocation' " . 
		"src='{$urls->admin}page/?layout=sidenav-tree'></iframe>",
);
	
	
?><!DOCTYPE html> 
<html class="pw" lang="<?php echo $adminTheme->_('en');
	/* this intentionally on a separate line */ ?>">
<head>
	<title></title><?php /* this title is populated dynamically by JS */ ?>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<meta name="google" content="notranslate" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="<?php echo $config->urls->adminTemplates; ?>layout/source/stable/layout-default.css">
	
	<?php require(__DIR__ . '/_head.php'); ?>
	
	<style type='text/css'>
		html, body {
			width: 100%;
			height: 100%;
			padding: 0;
			margin: 0;
			overflow: auto; /* when page gets too small */
		}
		.pane {
			display: none; /* will appear when layout inits */
		}
		iframe {
			margin: 0;
			padding: 0;
		}
		.ui-layout-pane {
			padding: 0;
		}
	</style>
	
	<script src="<?php echo $config->urls->adminTemplates; ?>layout/source/stable/jquery.layout.js"></script>
</head>
<body class='pw-layout-sidenav-init'>	

	<?php if($treePane): ?>
	<div id='pw-admin-head' class='pane ui-layout-north'>
		<?php include(__DIR__ . '/_masthead.php'); ?>
	</div>
	<?php endif; ?>

	<?php
	echo $panes['main'];
	echo $treePane ? $panes['tree'] : $panes['side'] . $panes['tree'];
	if($adminTheme->isLoggedIn) include(__DIR__ . '/_offcanvas.php');
	?>
    
	<script>
		var isPresent = true; // required
		var mobileWidth = 959;
		
		function pwInitLayout() {
			var windowWidth = $(window).width();
			var sidePaneWidth = windowWidth / 4;
			var sidePaneMinWidth = 200;
			var treePaneWidth = windowWidth / 3;
			var treePaneMinWidth = 300;

			if(sidePaneWidth < sidePaneMinWidth) sidePaneWidth = sidePaneMinWidth;
			if(treePaneWidth < treePaneMinWidth) treePaneWidth = treePaneMinWidth;

			var layoutOptions = {
				resizable: true,
				slidable: true,
				closable: true,
				maskContents: true,
				applyDefaultStyles: false,
				fxName: 'none',
				north: {
					size: 80, // #pw-masthead height (in px) 
					resizable: false,
					slideable: false,
					closable: false,
					spacing_open: 0
				},
				<?php
				if($treePane) {
					echo "$treePaneLocation: { size: treePaneWidth, initClosed: false },";
					// echo "$sidePaneLocation: { size: sidePaneWidth, initClosed: true}";
				} else {
					echo "$sidePaneLocation: { size: sidePaneWidth, initClosed: false },";
					echo "$treePaneLocation: { size: treePaneWidth, initClosed: true }";
				}
				?>
			};

			// determine if panes should be open or closed by default (depending on screen width)
			if(windowWidth < mobileWidth) {
				<?php
				if($treePane) {
					echo "layoutOptions.$treePaneLocation.initClosed = true;";
				} else {
					echo "layoutOptions.$sidePaneLocation.initClosed = true;";
					echo "layoutOptions.$treePaneLocation.initClosed = true;";
				}
				?>
			}

			// initialize layout
			var layout = $('body').layout(layoutOptions);

			// populate title from main pane to this window 
			$('#pw-admin-main').on('load', function() {
				var title = $('#pw-admin-main')[0].contentWindow.document.title;
				$('title').text(title);
			});

			// window resize event to detect when sidebar(s) should be hidden for mobile
			var lastWidth = 0;
			$(window).resize(function() {
				var width = $(window).width();
				if(width <= mobileWidth && (!lastWidth || lastWidth > mobileWidth)) {
					<?php echo "if(!layout.state.$sidePaneLocation.isClosed) layout.close('$sidePaneLocation');"; ?>
					<?php echo "if(!layout.state.$treePaneLocation.isClosed) layout.close('$treePaneLocation');"; ?>
				} else if(lastWidth <= mobileWidth && width > mobileWidth) {
					<?php echo "if(layout.state.$sidePaneLocation.isClosed) layout.open('$sidePaneLocation');"; ?>
				}
				lastWidth = width;
			});

			// make any links in this file direct to the main pane
			$(document).on('mouseover', 'a', ProcessWireAdminTheme.linkTargetMainMouseoverEvent);

			// update the uk-active state of top navigation, since this pane doesn't reload
			$(document).on('mousedown', 'a', function() {
				var $a = $(this);
				$('li.uk-active').removeClass('uk-active');
				$a.parents('li').each(function() {
					$(this).addClass('uk-active');
					var $a = $(this).children('a');
					var from = $a.attr('data-from');
					if(from) $('#' + from).parent('li').addClass('uk-active');
				});
			});
	
			// collapse offcanvas nav when link within it clicked, if it changes the main pane URL
			$('#offcanvas-nav').on('click', 'a', function() {
				var t, w1 = $('#pw-admin-main')[0].contentWindow.document.location.href;
				if(!t) t = setTimeout(function() {
					var w2 = $('#pw-admin-main')[0].contentWindow.document.location.href;
					if(w1 != w2) $('#offcanvas-toggle').click(); // close
					t = false;
				}, 1000); 
			}); 
			
			return layout;
		}
		
		var layout;
		
		$(document).ready(function() {
			layout = pwInitLayout();
		});
		
		/**
		 * Are we currently at mobile width?
		 *
		 */
		function isMobileWidth() {
			var width = $(window).width();
			return width <= mobileWidth;
		}
		
		/**
		 * Toggle navigation sidebar pane open/closed
		 * 
		 */
		function toggleSidebarPane() {
			layout.toggle('<?php echo $sidePaneLocation; ?>');
		}
		
		/**
		 * Toggle tree sidebar pane open/closed
		 *
		 */
		function toggleTreePane() {
			layout.toggle('<?php echo $treePaneLocation; ?>');
		}

		/**
		 * Close the tree pane
		 * 
		 */
		function closeTreePane() {
			if(!layout.state.<?php echo $treePaneLocation; ?>.isClosed) {
				layout.close('<?php echo $treePaneLocation; ?>'); 	
			}
		}
		
		/**
		 * Open the tree pane
		 *
		 */
		function openTreePane() {
			if(layout.state.<?php echo $treePaneLocation; ?>.isClosed) {
				layout.open('<?php echo $treePaneLocation; ?>');
			}
		}
		
		/**
		 * Is the tree pane currently closed? 
		 * 
		 */
		function treePaneClosed() {
			<?php echo "return layout.state.$treePaneLocation.isClosed;"; ?>
		}
		
		/**
		 * Is the sidebar pane currently closed?
		 *
		 */
		function sidebarPaneClosed() {
			<?php echo "return layout.state.$sidePaneLocation.isClosed;"; ?>
		}

	</script>

</body>
</html>