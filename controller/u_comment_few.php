<?php 
if(isset($post_id)){
	$getter = new posts;
	$comments = $getter->getComments($post_id,5);
	$comments2 = $getter->getComments($post_id,"all");
}
$co = count($comments);
$co2 = count($comments2);
		//$this->items = array("email","comment","date");
?>

<div class="pannel">
	<div class="pannel-head"><legend style="color:blue;font-weight:bold">Comments:</legend></div>
	<?php if(is_array($comments)): ?>
		<?php for($i=0;$i <= $co-4; $i+=4): ?>
				<div class="pannel-body">
					<label style="color:blue"><?php echo $comments[$i+1]; ?></label>
					<pre><?php echo $comments[$i+2]; ?></pre>
					<i><?php echo $comments[$i+3]; ?></i>
				</div>
				<hr style="border-color:red;" />
		<?php endfor; ?>
	<?php else: ?>
		<div class="pannel-footer"><span class="pull-right">No Comment Yet</span></div>
	<?php endif; ?>
</div>
<?php $ch = intval(bcdiv($co2,4)); ?>
<?php if( $ch > 5): ?>
    <input type="button" class="btn btn-style-one" id="viewall" value="viewall" />
<?php endif; ?>
                    <hr style="border-width: 2em; width:100%"/>