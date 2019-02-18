$('#regEmpresa').change(function() {
	var empresa = $(this).val();

	if (empresa === "nvaEmpresa") {
		$('#modalEmpresa').modal('show');
	}
});