<?php
if (!isAuthenticated())
	return false;
?>
<nav>
	<button id="main-nav-button" class="peer">
		<svg class="h-8 w-8" id="menu-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
			<style>
				#menu-icon {
					--menu-icon-duration: 300ms;
					cursor: pointer
				}

				#menu-icon:active #lines,
				#menu-icon:focus #lines,
				#menu-icon:hover #lines {
					stroke-dashoffset: 0;
					stroke: #000
				}

				#menu-icon:active circle,
				#menu-icon:focus circle,
				#menu-icon:hover circle {
					opacity: 0;
				}

				#menu-icon #lines {
					transition-duration: var(--menu-icon-duration);
					stroke-dasharray: 50;
					stroke-dashoffset: 49.99999;
					stroke: #000
				}

				#menu-icon circle {
					transition-duration: calc(var(--menu-icon-duration) * 3);
					fill: #000
				}
			</style>
			<g id="column-one">
				<circle cx="25" cy="25" r="10" />
				<circle cx="25" cy="50" r="10" />
				<circle cx="25" cy="75" r="10" />
			</g>
			<g id="column-two">
				<circle cx="50" cy="25" r="10" />
				<circle cx="50" cy="50" r="10" />
				<circle cx="50" cy="75" r="10" />
			</g>
			<g id="lines" stroke-width="20.1" stroke-linecap="round">
				<path d="M75 25H25" />
				<path d="M75 50H25" />
				<path d="M75 75H25" />
			</g>
		</svg>
	</button>
	<ul id="main-nav-menu" class="opacity-0 pointer-events-none peer-hover:opacity-100 peer-hover:pointer-events-auto hover:opacity-100 hover:pointer-events-auto">
		<li class="main-nav-menu-item">
			<a class="text-orange-800" href="<?php echo APP_ROOT; ?>workout/new.php" hx-get="<?php echo APP_ROOT; ?>workout/new.php" hx-select="main" hx-target="main" hx-swap="outerHTML" hx-push-url="true">New Workout</a>
		</li>
		<li class="main-nav-menu-item">
			<a class="text-orange-800" href="<?php echo APP_ROOT; ?>workout/history.php" hx-get="<?php echo APP_ROOT; ?>workout/history.php" hx-select="main" hx-target="main" hx-swap="outerHTML" hx-push-url="true">Workout History</a>
		</li>
		<li class="main-nav-menu-item">
			<a class="text-orange-800" href="<?php echo APP_ROOT; ?>administration/" hx-get="<?php echo APP_ROOT; ?>administration/" hx-select="main" hx-target="main" hx-swap="outerHTML" hx-push-url="true">Administration</a>
		</li>
		<li class="main-nav-menu-item">
			<a class="text-orange-800" href="<?php echo APP_ROOT; ?>account/" hx-get="<?php echo APP_ROOT; ?>account/" hx-select="main" hx-target="main" hx-swap="outerHTML" hx-push-url="true">Account</a>
		</li>
		<li class="main-nav-menu-item">
			<a class="text-orange-800" href="<?php echo APP_ROOT; ?>account/logout.php" hx-get="<?php echo APP_ROOT; ?>account/logout.php" hx-select="main" hx-target="main" hx-swap="outerHTML" hx-push-url="true">Logout</a>
		</li>
	</ul>
</nav>