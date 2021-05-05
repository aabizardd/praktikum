const flashData = $('.flash-data').data('flashdata');
const flashDataError = $('.flash-data-error').data('flashdata');

// console.log(flashData);

if(flashData){
	Swal.fire({
		icon: 'success',
		title: 'Berhasil!',
		text: flashData
	  });
}

if(flashDataError){
	Swal.fire({
		icon: 'error',
		title: 'Gagal!',
		text: flashDataError
	  });
}




//tombol hapus modul

$('.tombol-hapus').on('click', function(e){

	e.preventDefault();
	const href = $(this).attr('href');

	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
		  confirmButton: 'btn btn-success',
		  cancelButton: 'btn btn-danger mr-2'
		},
		buttonsStyling: false
	  })
	  
	  swalWithBootstrapButtons.fire({
		title: 'Apakah kamu yakin?',
		text: "Menghapus data modul",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, hapus data!',
		cancelButtonText: 'Jangan, batalkan!',
		reverseButtons: true
	  }).then((result) => {
		if (result.isConfirmed) {

			document.location.href = href;
		  
		} else if (
		  /* Read more about handling dismissals below */
		  result.dismiss === Swal.DismissReason.cancel
		) {
		  swalWithBootstrapButtons.fire(
			'Dibatalkan',
			'Data modul tidak dihapus',
			'error'
		  )
		}
	  });

});


$('.hapusbahan').on('click', function(e){

	e.preventDefault();
	const href = $(this).attr('href');

	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
		  confirmButton: 'btn btn-success',
		  cancelButton: 'btn btn-danger mr-2'
		},
		buttonsStyling: false
	  })
	  
	  swalWithBootstrapButtons.fire({
		title: 'Apakah kamu yakin?',
		text: "Menghapus data modul",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Ya, hapus data!',
		cancelButtonText: 'Jangan, batalkan!',
		reverseButtons: true
	  }).then((result) => {
		if (result.isConfirmed) {

			document.location.href = href;
		  
		} else if (
		  /* Read more about handling dismissals below */
		  result.dismiss === Swal.DismissReason.cancel
		) {
		  swalWithBootstrapButtons.fire(
			'Dibatalkan',
			'Data modul tidak dihapus',
			'error'
		  )
		}
	  });

});









