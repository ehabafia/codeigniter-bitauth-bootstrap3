		<footer class="row">
			<div class="col col-lg-12">
				<div class="site-footer"><small><?php echo t('copyright')?></small></div>
			</div>
		</footer>
	
		
		<?php if(isset($javascriptFile)):
		foreach($javascriptFile as $file){ ?>
			<script src="<?php echo base_url();?>_/ajax/<?php echo $file?>"></script>
		<?php } ?>
		<?php endif; ?>

			</div>
		</section>
	</body>
</html>
