 <!-- =========index-classic-color====================== -->
<?php if(count($componentes) > 0): ?>

<section class="section section-primary border-top-0 mb-0">
	<div class="container">
		<div class="row counters counters-sm counters-text-light">

		<?php foreach ($componentes as $comp): ?>

			<div class="col-sm-6 col-lg-3 mb-5 mb-lg-0">
				<div class="counter">
					<strong data-to="<?php echo $comp->texto1; ?>" data-append="+">0</strong>
					<label class="opacity-5 text-4 mt-1"><?php echo $comp->texto2; ?></label>
				</div>
			</div>

		<?php endforeach; ?>

		</div>
	</div>
</section>

<?php endif; ?>