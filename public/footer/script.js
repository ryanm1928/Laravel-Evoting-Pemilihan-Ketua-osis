$(document).ready(function () {
	$('#sidebarCollapse').on('click', function () {
		$('#sidebar').toggleClass('active');
	});

});


function berubah(){
	const sampul = document.querySelector('#sampul');
	const sampulLabel = document.querySelector('#namafile');
	const img = document.querySelector('#gambar');


	sampulLabel.textContent = sampul.files[0].name;

	const fileSampul = new FileReader();
	fileSampul.readAsDataURL(sampul.files[0]);

	fileSampul.onload = function(e){
		img.src = e.target.result;
	}


}