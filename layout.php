<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $this->title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo ($this->description() != '') ? $this->description() : 'Default description goes here'; ?>">
	<meta name="keywords" content="<?php echo ($this->keywords() != '') ? $this->keywords() : 'default, keywords, here'; ?>">
	<meta name="robots" content="index, follow">
	<meta name="author" content="Howl theme">
	<meta name="generator" content="Wolfcms">
	<!-- Styles -->
	<link rel="shorcut icon" href="<?php echo THEMES_URI; ?>howl/images/favicon.ico">
	<link rel="stylesheet" href="<?php echo THEMES_URI; ?>howl/screen.css">
	<!-- RSS -->
	<link rel="alternate" type="application/rss+xml" title="Wolf Default RSS Feed" href="<?php echo URL_PUBLIC.((USE_MOD_REWRITE)?'':'/?'); ?>rss.xml" />
</head>
<body>
	<div id="page">
		<header>
			<div class="logo">
				<h1><a href="<?php echo URL_PUBLIC; ?>">Howl theme</a></h1>
				<p class="headline">Wolfcms, content managed simplified</p>
			</div>
			<nav class="navigation">
				<ul>
					<li><a<?php echo url_match('/') ? ' class="current"': ''; ?> href="<?php echo URL_PUBLIC; ?>">Home</a></li>
					<?php foreach($this->find('/')->children() as $menu): ?>
					<li><?php echo $menu->link($menu->title, (in_array($menu->slug, explode('/', $this->path())) ? ' class="current"': null)); ?></li>
					<?php endforeach; ?>
				</ul>
			</nav>
		</header>
		<div class="main-content">
			<div class="content">
				<h2><?php echo $this->title(); ?></h2>
				<?php echo $this->content(); ?> 
		  		<?php if ($this->hasContent('extended')) echo $this->content('extended'); ?>
		  		<div class="comments">
		  			<?php
					    if (Plugin::isEnabled('comment'))
					    {
					        if ($this->comment_status != Comment::NONE)
					            $this->includeSnippet('comment-each');
					        if ($this->comment_status == Comment::OPEN)
					            $this->includeSnippet('comment-form');
					    }
					?>
		  		</div> 
			</div>
			<aside class="sidebar">
				<?php echo $this->content('sidebar', true); ?>
			</aside>
		</div>
		<footer>
			<div class="footer">
				<p>&copy;<?php echo date('Y'); ?> <a href="http://www.wolfcms.org/" title="Wolf">Wolfcms</a> Inside</p>
			</div>
		</footer>
	</div>
</body>
</html>