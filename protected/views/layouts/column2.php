<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="grid grid-cols-12 relative">
		
	<div class="col-span-2 h-fit sticky left-0 top-0">
		<?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); //Added ?>
	</div>

	<div class="span-19 col-span-8">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>

	<div class="span-5 last col-span-2 py-6 sticky right-0 top-0 h-fit">
		<div id="sidebar" class=" w-64 bg-[#fffef7] shadow-lg border-l border-stone-300 p-6 rounded-lg space-y-8">
			<!-- 🔖 Sort by Tags -->
			<div>
				<h2 class="text-lg font-semibold text-stone-700 flex items-center space-x-2 mb-3">
					<i class="ph ph-tag text-xl text-blue-500"></i>
					<span>Sort by Tags</span>
				</h2>
				<?php if ($this->beginCache('tagCloud', array('duration' => 3600))) { ?>
					<div class="flex flex-wrap gap-2">
						<?php $this->widget('TagCloud', array('maxTags' => Yii::app()->params['tagCloudCount'])); ?>
					</div>
				<?php $this->endCache(); } ?>
			</div>

			<!-- 💬 Recent Comments -->
			<div class="h-full">
				<h2 class="text-lg font-semibold text-stone-700 flex items-center space-x-2 mb-3">
					<i class="ph ph-chat-circle-dots text-xl text-green-500"></i>
					<span>Recent Comments</span>
				</h2>
				<div class="space-y-4 h-96 overflow-y-auto">
					<?php $this->widget('RecentComments', array('maxComments' => Yii::app()->params['recentCommentCount'])); ?>
				</div>
			</div>

		</div> <!-- sidebar -->
	</div>
</div>

<?php $this->endContent(); ?>