$('#form-delete').on('submit',function(){
		$('#btn-delete').attr('disabled', 'true');
		$('#btn-cancel').css('display', 'none');
	});
function hapus(id) {
	$('.title').html(`<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>`);
		$('#btn-delete').attr('disabled', 'true');
    jQuery.ajax({
        url: '/polldelete/' + id,
        type: 'POST',
        data: {
            _token: $("input[name=_token]").val()
        },
        complete: function(xhr, textStatus) {
            //called when complete
        },
        success: function(response, success) {
            //called when successful
            $('#btn-delete').removeAttr('disabled');
            const data = response['success'];
            $.each(data, function(index, val) {    
                $('.title').html(data[index].title);
                $('#id_voting').val(data[index].id);

            });
        },
        error: function(xhr, textStatus, errorThrown) {
            //called when there is an error
            console.log('error')
        }
    });
}
