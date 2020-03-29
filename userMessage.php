<!DOCTYPE html>
<html lang='en'>
    <?php 

if(isset($_GET['msg']) && !empty($_GET['msg']) AND isset($_GET['msg2']) && !empty($_GET['msg2'])){
    $msg1 = $_GET['msg'];
    $msg2 = $_GET['msg2'];
}
else {
    echo '<script>window.location="index.php"</script>';
}
?>
<head>
	<meta class="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Ek se Anek</title>
	<!-- Don't forget to add your metadata here -->
	<link rel='stylesheet' href='css/style.min.css' />
</head>
<body>
	<!-- Hero(extended) navbar -->
	<div class="navbar navbar--extended">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="index.html" class="navbar__logo">Ek se Anek</a>
				<nav class="navbar__menu">
					<ul>
						<li><a href="/organisation/index.php">Organisation</a></li>
						<li><a href="/organisation/branch/index.php">Branch</a></li>
						<li><a href="/member/index.php">Individual</a></li>
					</ul>
				</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>
	<!-- Hero unit -->
	<div class="hero" style="min-height:100vh">
		<div class="hero__overlay hero__overlay--gradient"></div>
		<div class="hero__mask"></div>
		<div class="hero__inner">
			<div class="container">
				<div class="hero__content">
					<div class="hero__content__inner" id='navConverter'>
						<h1 class="hero__title" style="line-height:2"><?php echo $msg1 ?></h1>
						<h1 class="hero__title" style="line-height:2"><?php echo $msg2 ?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>

<script src='js/app.min.js'></script>
</body>
</html>