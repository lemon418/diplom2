let sound = document.querySelectorAll('a.lcolor');
let modal = document.querySelector('.pl_sound');
let exit = document.querySelector('.pl_closer');
let show = document.querySelector('.pl_show');
console.log(exit);
play();

function play() {
	sound.forEach(result => 	
		result.onclick = function() {
			modal.style.display = "block";

	});
}

exit.onclick = function() {
	modal.style.display = "none";
	show.style.display = "block";

}

show.onclick = function() {
	modal.style.display = "block";
	show.style.display = "none";
}



