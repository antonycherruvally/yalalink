<?php
	/**
	 *	Alert types
	 *	-> success
	 *	-> info
	 *	-> warning
	 *	-> danger
	 *	-> brand
	 *	-> primary
	 */
$board = Core::getModel('board')->hasAlert();
if(! $board ) {
	return false;
}
?>
<div class="alert alert-<?= $_SESSION[$board]['type'] ?> alert-dismissible fade show" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
<strong>
	<?= ucfirst($_SESSION[$board]['type']) ?>:
</strong>
	<?= $_SESSION[$board]['msg'] ?>
</div>
<?php
# unset the alert
unset($_SESSION[$board]);
?>