<style>
			.loader-page{
				position: fixed;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				z-index: 1000;
				background: #242f3f;
			}
			
			.loader-logo {
                position: absolute;
                width: 30rem;
                left: 50%;
                margin-left: -5rem;
                top: 40%;
			}
		</style>
		<div class="loader-page">
			<div data-aos="zoom-out-down" class="loader-logo">
				<img src="{{ asset('media/logo/logo_white_miniature.svg') }}">
			</div>
		</div>
		<script>
			$( document ).ready(function() {
				setInterval(function(){ 
					$(".loader-page").slideUp(150, "linear"); 
				},1000);
			});
		</script>