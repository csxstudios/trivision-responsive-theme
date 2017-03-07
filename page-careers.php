<?php get_header(); ?>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/themes/start/jquery-ui.css" rel="stylesheet" />
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<style>
    #progress-bar,#upload-frame {display: none;}
	#progress-bar span{position:absolute;text-align:center;margin-left:100px;margin-top:4px;}
</style>
<script>
(function ($) {
	var pbar;
	var started = false;
	$(function () {
		$('.wpcf7-form').submit(function() {
		 if($('input[name=attached]:checked').val()=='Yes'){
			$('.wpcf7-form').attr('target','upload-frame');
		
			$('.wpcf7-form').hide();

			pbar = $('#progress-bar');
			
			$('#upload-frame').after('<p class="wait">Please wait while your file is uploading…</p>');
			$('#progress-bar').focus();

			pbar.show().progressbar();

			$('#upload-frame').load(function () {
				started = true;
				$('#upload-frame').hide();
				$('#progress-bar').hide();
				$('.wait').hide();
				$('.wpcf7-form').show();
				$('.wpcf7-response-output').focus();
			});
			setTimeout(function () {
				if(!updateProgress($('#uid').val())){
					clearTimeout(this);
			
				} 
			}, 1000);

		} else {
		this.submit();
		}
		});

	});

	function updateProgress(id) {
		var time = new Date().getTime();
		$.get('/getprogress.php', { uid: id, t: time }, function (data) {
			var progress = parseInt(data, 10);
			if (progress < 100 || progress < 100 && !started) {
				started = progress < 100;
				started && pbar.progressbar('value', progress);
				$('#pv').html(progress+'%');
				updateProgress(id);
				return true;
			} else if(progress == 100 && started || progress == 100 && !started) {
				$('#upload-frame').hide();
				$('#progress-bar').hide();
				$('.wait').hide();
				$('.wpcf7-form').show();
				$('.wpcf7-response-output').focus();
				return false;
			}
		});
	}

}(jQuery));
  
$(document).ready(function() {
  $("#uid").val("<?php echo md5(uniqid(mt_rand())); ?>");
  $('#clearUpload').click(function(){
	$(".wpcf7-file").wrap("<span id='fileWrapper'/>");
	$("#fileWrapper").html('');
	$("#fileWrapper").html('<input type="file" name="file-01" class="wpcf7-form-control  wpcf7-file" size="40" value="" />');
  });
});
</script>
			<div id="body">
			<?php while (have_posts()) : the_post()?>
				<?php the_content(); ?>
			<?php endwhile; ?>
			</div>
			<?php if ($post->post_name !== 'contact-us') {?><div class="pad-100"></div><?php } ?>
<?php get_footer(); ?>