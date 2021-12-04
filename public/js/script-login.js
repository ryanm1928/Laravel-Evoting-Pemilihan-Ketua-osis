$(document).ready(function() {
    $('#btn-login').attr('disabled', 'true');
    $('#gantipw').click(function(event) {

        $('#form-login').slideUp(1000);

        $('#form-ganti').slideDown(3000);


    });

    $('#cancel').click(function(event) {
        $('#form-ganti').slideUp(1000);
        $('#form-login').slideDown(2000);


    });
    $('#gantisandi-form').on('submit', function() {
        $('#btn-ganti').attr('disabled', 'true');
        $('#cancel').css('display', 'none');

    });

    $('#form-login').on('submit', function() {
        $('#btn-login').attr('disabled', 'true');

    });

});

function choiceClass() {
    $('#btn-login').removeAttr('disabled');

    if ($('#choiceKelas').val() == "") {
        
        $('#btn-login').attr('disabled', 'true');
        $('#username').attr('disabled', 'true');

    } else {

        const idkelas = $('#choiceKelas').val();
        $('#username').removeAttr('disabled');
        $("#kelas").val(idkelas);

        const id = $("#kelas").val();
        $("#username").empty();
        ajaxKelas(id);
    }


}

function ajaxKelas(id) {

    $.ajax({
        url: '/login/getkelas/' + id,
        type: 'post',
        data: {
            _token: $("input[name=_token]").val()
        },
        success: function(response, success) {
            //called when successful
            const data = response['success'];
            // console.log(obj);
            $("#username").append('<option value="">--Pilih Nama--</option>');
            $.each(data, function(i, val) {
                $("#username").append(`
                            <option value="${data[i].id}">${data[i].username}</option>
                        `);

            });


        },
        error: function(response) {
            //called when there is an error
            console.log('error');
        }
    });
}

function getName() {
    const idName = $("#username").val();
    $.ajax({
        url: '/login/getname/' + idName,
        type: 'post',
        data: {
            _token: $("input[name=_token]").val()

        },
        success: function(response) {
            for (let i = 0; i < response['success'].length; i++) {
                $("#usernameid").val(response['success'][i].name);
            }
        },
        error: function(response) {
            console.log("error");
        }
    });



}
