// scrolling navbar
var scrollTop = 0;
$(window).scroll(function(){
  scrollTop = $(window).scrollTop();

  if (scrollTop >= 50) {
    $('.header').addClass('scrolled-nav');
  } else if (scrollTop < 50) {
    $('.header').removeClass('scrolled-nav');
  }
});


 

// Video player
const video = document.getElementById("video");
const circlePlayButton = document.getElementById("circle-play-b");

function togglePlay() {
	if (video.paused || video.ended) {
		video.play();
	} else {
		video.pause();
	}
}


 

// scroll animation
//   function reveal() {
// 	var reveals = document.querySelectorAll(".reveal");

// 	for (var i = 0; i < reveals.length; i++) {
// 	  var windowHeight = window.innerHeight;
// 	  var elementTop = reveals[i].getBoundingClientRect().top;
// 	  var elementVisible = 20;

// 	  if (elementTop < windowHeight - elementVisible) {
// 		reveals[i].classList.add("current");
// 	  } else {
// 		reveals[i].classList.remove("current");
// 	  }
// 	}
//   }
//   window.addEventListener("scroll", reveal);