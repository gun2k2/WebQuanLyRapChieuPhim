$(document).ready(function() {

	var btn = document.getElementById("popup");

	btn.addEventListener("click", turnOff);

	
	$('a.back-to-top').on('click', function(event) {
		event.preventDefault();
		/* Act on the event */
		$('html, body').animate({
			scrollTop: 0
		}, 1000);
	});

	function turnOff(){;
		btn.classList.add('hidden');
	}

});