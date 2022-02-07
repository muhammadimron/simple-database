// Jalankan script ketika document siap
$(document).ready(function(){

	// Sembunyikan tombol cari
	$(".cari").hide();

	// Jalankan event keyword
	$("#keyword").on("keyup", function(){

		// Munculkan loader.gif
		$(".loader").show();

		// Ajax menggunakan load		
		// $(".container").load("ajax/live.php?keyword=" + $("#keyword").val());

		// Ajax menggunakan $.get()
		$.get("ajax/live.php?keyword=" + $("#keyword").val(), function(data){

			// mengirimkan data ke container
			$(".tabel_column").html(data);

			// Sembunyikan loader.gif saat event selesai
			$(".loader").hide();
		})
	})

});