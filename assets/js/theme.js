(function($) {

	$window = $(window);

	/*================================= SCROLL TO HASH ===============================*/

	$('a[href*="#"]:not([href="#"])').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });

	/*================================= PREVENT DEFAULT ACTION ON LINKS ===============================*/

	$('.void').on('click', function(e) {
		e.preventDefault();
	});

	/*================================= LAZY LOAD ===============================*/

	/**
	 * [bLazy Lazy load]
	 * @file {[blazy.js]}
	 */
	var bLazy = new Blazy({
		loadInvisible: true,
		offset: 500,
	});

	/**
	 * Reinit lazy loading of the hidden images due to the carousel display: none;
	 */
	$('.news-feed-carousel, .added-benefits-carousel').on('afterChange', function(event, slick, direction){
	  bLazy.revalidate();
	});


	/*================================= STYLE DROPDOWNS WITH CHOSEN PLUGIN ===============================*/

	$("select:not(.no-chosen)").chosen({
		no_results_text: "Oops, nothing found!",
		allow_single_deselect: true,
		width: "100%",
		disable_search_threshold: 10
	});

	/*================================= SOCIAL POPUP JS ===============================*/
	function windowPopup(url, width, height) {
	  // Calculate the position of the popup so
	  // it’s centered on the screen.
	  var left = (screen.width / 2) - (width / 2),
	      top = (screen.height / 2) - (height / 2);

	  window.open(
	    url,
	    "",
	    "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,width=" + width + ",height=" + height + ",top=" + top + ",left=" + left
	  );
	}
	$(".js-social-share").on("click", function(e) {
	  e.preventDefault();

	  windowPopup($(this).attr("href"), 500, 300);
	});







/**
  * Modified from this artice on treehouse
  * http://blog.teamtreehouse.com/building-custom-controls-for-html5-videos
*/

window.onload = function() {
	// Video
	var video = document.getElementById("video");

	if(video) {
		// Info
		var infoPlay = document.getElementById("info-play");
		var initialPlayButton = document.getElementById("play-pause-info");
		// Controls wrapper
		var videoControls = document.getElementById("video-controls");
		// Buttons
		var playButton = document.getElementById("play-pause");
		var muteButton = document.getElementById("mute");
		var fullScreenButton = document.getElementById("full-screen");
		// Sliders
		var seekBar = document.getElementById("seek-bar");


		// Event listener for the play/pause button
		infoPlay.addEventListener("click", function() {
			videoControls.classList.remove('control-hide');
			infoPlay.classList.add('control-hide');
			// Play the video
			video.play();
			// Add the paused class
			playButton.classList.add('paused');
		  
		});

		// Event listener for the play/pause button
		playButton.addEventListener("click", function() {
		if (video.paused == true) {
			// Play the video
			video.play();
			// Add the paused class
			playButton.classList.add('paused');
		  } else {
			// Pause the video
			video.pause();
			// Remove the paused class 
			playButton.classList.remove('paused');
		  }
		});

		// Event listener for the mute button
		muteButton.addEventListener("click", function() {
		  if (video.muted == false) {
			// Mute the video
			video.muted = true;
			// Add the mute class
			muteButton.classList.add('mute');
		  } else {
			// Unmute the video
			video.muted = false;
			// Remove the mute class
			muteButton.classList.remove('mute');
		  }
		});
		// Event listener for the full-screen button
		fullScreenButton.addEventListener("click", function() {
			if (video.requestFullscreen) {
				video.requestFullscreen();
			} else if (video.mozRequestFullScreen) {
				video.mozRequestFullScreen(); // Firefox
			} else if (video.webkitRequestFullscreen) {
				video.webkitRequestFullscreen(); // Chrome and Safari
			}
		});
		// Event listener for the seek bar
		seekBar.addEventListener("change", function() {
			// Calculate the new time
			var time = video.duration * (seekBar.value / 100);
			// Update the video time
			video.currentTime = time;
		});
		// Update the seek bar as the video plays
		video.addEventListener("timeupdate", function() {
			// Calculate the slider value
			var value = (100 / video.duration) * video.currentTime;
			// Update the slider value
			seekBar.value = value;
		});
		// Pause the video when the slider handle is being dragged
		// Add paused to the play button
		seekBar.addEventListener("mousedown", function() {
			video.pause();
			playButton.classList.remove('paused');
		});
		// Play the video when the slider handle is dropped
		// Remove paused from the play button
		seekBar.addEventListener("mouseup", function() {
			video.play();
			playButton.classList.add('paused');
		});
	}
}
})( jQuery );