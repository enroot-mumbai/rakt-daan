<!DOCTYPE html>
<html lang='en'>
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
						<li><a href="organisation/login.php">Organisation</a></li>
						<!--<li><a href="organisation/branch/login.php">Branch</a></li>-->
						<li><a href="member/login.php">Individual</a></li>
					</ul>
				</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>
	<!-- Hero unit -->
	<div class="hero">
		<div class="hero__overlay hero__overlay--gradient"></div>
		<div class="hero__mask"></div>
		<div class="hero__inner">
			<div class="container">
				<div class="hero__content">
					<div class="hero__content__inner" id='navConverter'>
						<h1 class="hero__title">Ek se Anek - Together we Rise</h1>
						<p>Collecting plastic waste from root level and recycling it.</p>
						<!-- <p>Our activity "Ek Se Aneek" is based on human psychology and our personal experience and observation during our social activity and we strongly believe in human nature and try to bring a change which is a long-lasting solution and it will become part of their lifestyle.</p> -->
						<p>Resolving any problem is only possible by active participation with clear understanding, not as a compulsion.  Every individual has a desire to contribute their best towards society, they always look forward to an opportunity to the best of their capacity to contribute towards the environment.</p>
						<a href="member/register.php" class="button button__accent">Register and Donate</a>
						<a href="#scrollToNext" class="button hero__button scroll">Learn more</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero__sub">
		<span id="scrollToNext" class="scroll">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class='hero__sub__down' fill="currentColor" width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path d="M256,298.3L256,298.3L256,298.3l174.2-167.2c4.3-4.2,11.4-4.1,15.8,0.2l30.6,29.9c4.4,4.3,4.5,11.3,0.2,15.5L264.1,380.9c-2.2,2.2-5.2,3.2-8.1,3c-3,0.1-5.9-0.9-8.1-3L35.2,176.7c-4.3-4.2-4.2-11.2,0.2-15.5L66,131.3c4.4-4.3,11.5-4.4,15.8-0.2L256,298.3z"/></svg>
		</span>
	</div>
	<!-- Steps -->
	<div id="learnmore" class="steps landing__section">
		<div class="container">
			<h2>How can you help?</h2>
			<p>We have made it very simple for you.</p>
		</div>
		<div class="container">
			<div class="steps__inner">
				<div class="step">
					<div class="step__media">
						<img src="./images/undraw_designer.svg" class="step__image">
					</div>
					<h4>Register</h4>
					<p class="step__text" style="text-align:center">Register with your organisation and fill a form to let us know where are you from and how much waste you can submit.</p>
				</div>
				<div class="step">
					<div class="step__media">
						<img src="./images/home/bustbin.svg" class="step__image">
					</div>
					<h4>Collect</h4>
					<p class="step__text" style="text-align:center">Collect as much waste as you can, and make sure next time you consume less.</p>
				</div>
				<div class="step">
					<div class="step__media">
						<img src="./images/home/recycle.png" class="step__image">
					</div>
					<h4>Recycle</h4>
					<p class="step__text" style="text-align:center">Our team members will come to your registered address and collect all the waste for you.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Expanded sections -->
	 <div class="expanded landing__section">
		<div class="container">
			<div class="expanded__inner">
				<div class="expanded__media">
					<img src="./images/home/organisation.svg" class="expanded__image">
				</div>
				<div class="expanded__content">
					<h2 class="expanded__title">Participate as Organisation</h2>
					<p class="expanded__text">Your organisation can be in the forefront of defeating the plastic pollution together with all the members in your organisation. Organisation can be a group of any number of people - Schools, Colleges, Societies, Corporates, MNCs, etc.</p>
					<a href="./organisation/register.php" class="button button__accent">Register</a>
				</div>
			</div>
		</div>
	</div>
	<!--<div class="expanded landing__section">-->
	<!--	<div class="container">-->
	<!--		<div class="expanded__inner">-->
	<!--			<div class="expanded__media">-->
	<!--				<img src="./images/home/branch.svg" class="expanded__image">-->
	<!--			</div>-->
	<!--			<div class="expanded__content">-->
	<!--				<h2 class="expanded__title">Participate as Branch of an Organisation</h2>-->
	<!--				<p class="expanded__text">Bigger the organisation, better the contribution towards society is required. Register the branches of your organisation and let your members participate from their local branches.</p>-->
	<!--				<a href="./organisation/branch/register.php" class="button button__accent">Register</a>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->
	<div class="expanded landing__section">
		<div class="container">
			<div class="expanded__inner">
				<div class="expanded__media">
					<img src="./images/home/individual.svg" class="expanded__image">
				</div>
				<div class="expanded__content">
					<h2 class="expanded__title">Participate as a Member</h2>
					<p class="expanded__text">You can be a member of any organisation, all you need to do is register with your organisation and we'll come to collect waste from you.</p>
					<a href="./member/register.php" class="button button__accent">Register</a>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Call To Action -->
	<div class="cta cta--reverse">
		<div class="container">
			<div class="cta__inner">
				<h2 class="cta__title">Get started now</h2>
				<p class="cta__sub cta__sub--center">Grab some plastic waste around you and get it recycled.</p>
				<a href="./member/register.php" class="button button__accent">Register</a>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<div class="footer footer--dark">
		<div class="container">
			<div class="footer__inner">
				<a href="index.html" class="footer__textLogo">Ek se Anek</a>
				<div class="footer__data">
					<div class="footer__data__item">
						<div class="footer__row">
							Initiative of  <a href="#" target="_blank" class="footer__link">Vesac India</a>
						</div>
						<div class="footer__row">
						Developed By <a href="http://enrootmumbai.in" target="_blank" class="footer__link">Enroot Mumbai</a>
						</div>
					</div>
					<!-- <div class="footer__data__item">
						<div class="footer__row">Created for <a href="https://undraw.co" target="_blank" class="footer__link">unDraw</a>
						</div>
					</div>
					<div class="footer__data__item">
					<div class="footer__row">
						<a href="https://github.com/anges244/evie" target="_blank" class="footer__link">GitHub</a>
					</div>
					<div class="footer__row">
						<a href="https://twitter.com/undraw_co" target="_blank" class="footer__link">Twitter</a>
					</div>
					<div class="footer__row">
						<a href="https://www.facebook.com/undraw.co/" target="_blank" class="footer__link">Facebook</a>
					</div>
					<div class="footer__row">
						<a href="./additional.html" class="footer__link">MIT license</a>
					</div> -->
				</div>
			</div>
		</div>
	</div>
<script src='js/app.min.js'></script>
</body>
</html>