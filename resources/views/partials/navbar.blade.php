<nav class="navbar navbar-default" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="{{ route('article.index') }}">Simple Blog</a>
	</div>

	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="{{ route('article.create') }}">New Articles</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
            <li class="active">

                <a class="button button--primary button--withChrome" href="/">Sign in / Sign up</a>
            </li>
        </ul>
	</div><!-- /.navbar-collapse -->
</nav>