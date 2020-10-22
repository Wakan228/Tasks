<?php 
$sign_in ='<button type="button" class="btn sign_in" data-toggle="modal" data-target="#Modal_in">Sign in</button>'.
					'<button type="button" class="btn sign_up" data-toggle="modal" data-target="#Modal_up">Sign up</button>';
$account = '<button type="button" class="btn account_customization" data-toggle="modal" data-target="#Modal_customization">'.
					'<img src="../img/op.png" alt="">'.
				'</button>'.
				'<div class="account_exit"><a href="../regestration/exit.php">Exit</a></div>'; ?>
<header>
	<div class="row space-between header_main">
		<div class="col-6">
			<div class="logo_box">
				<div class="img_box">
					<a href="../index.php"><img src="../img/logo.png" alt=""></a>
				</div>
			</div>
		</div>
		<div class="col-6 account_box">
			<div class="sing-in_box">
			<div class="row sign-in_box_main">
				<?php if(empty($_SESSION['user_id'])){
								echo $sign_in;
									}else{
									echo $account;
							} ?> 
			</div>
			</div>
		</div>
	</div>
</header>