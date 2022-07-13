<div class="pannel">
	<div class="pannel-head">
		<legend style="color:blue;font-weight:bold">Comments: 
			<span class="pull-right">
				<i id="closeview" class="fa fa-close" style="cursor: pointer;"></i>
			</span>
		</legend>
	</div>
	<?php if(is_array($comments2)): ?>
		<?php for($j=0;$j <= $co2-4; $j+=4): ?>
				<div class="pannel-body">
					<label style="color:blue"><?php echo $comments2[$j+1]; ?></label>
					<pre><?php echo $comments2[$j+2]; ?></pre>
					<i><?php echo $comments2[$j+3]; ?></i>
				</div>
				<hr style="border-color:red;" />
		<?php endfor; ?>
	<?php else: ?>
		<div class="pannel-footer"><span class="pull-right">No Comment Yet</span></div>
	<?php endif; ?>
</div>