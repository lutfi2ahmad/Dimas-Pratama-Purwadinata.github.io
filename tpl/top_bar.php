<div id="top-bar"style="background:#262626">
		<div class="page-full-width cf" >
			<ul id="nav" class="fl">
				<li class="v-sep"><a href="dashboard.php" class="round button menu-logo image-left"  style="  color: #ffffff; background-image: url("../images/icons/menu/menu-logo.png"><strong>PURE NATURE SHOP</strong></a>
				</li>
				<li><a href="#" class="round button dark menu-user image-left">Welcome <?php echo $POSNIC['username'] ?></a>
					<ul>
						<li><a href="change_password.php">Ubah Password</a></li>
						<li><a href="logout.php">Log out</a></li>
					</ul>
				</li>
			<li><a href="update_details.php" class="round button dark menu-settings image-left">Update Data Toko</a></li>
				<li><a href="logout.php" class="round button dark menu-logoff image-left">Log out</a></li>
			</ul>
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Cari..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>
		</div>
	</div>
<!-- style="position:fixed; width:100%;z-index: 9; -->
