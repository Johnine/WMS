var save_method, pid;

$(document).ready(function(){
    $('#reload_pid').tooltip();
});

pid = $('#pid_table').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        "url": base_url + "pid/pid_list",
        "type": "POST"
    },
    "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false //set not orderable
        }
    ]
});
function reload_pid()
{
    pid.ajax.reload();
}
function new_pid()
{
    //$('.hideshowdiv').hide();
    save_method = 'add';
    $('#pid_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#pid_modal').modal('show'); // show bootstrap modal
    $('.modal-title').text('New Pallet ID'); // Set Title to Bootstrap modal title
}

$('#pid_form').submit(function (e){
    e.preventDefault();

    if(save_method == 'add') {
        url = base_url + "pid/save_pid/";
    }else{
        url = base_url + "pid/update_pid/";
    }

    $('#save_pid').text('Saving...'); //change button text
    $('#save_pid').attr('disabled',true); //set button enable

    $.ajax({
        url : url,
        type: "POST",
        data: $('#pid_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#pid_modal').modal('hide');
                reload_pid();
            }

            $('#save_pid').text('Save'); //change button text
            $('#save_pid').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $('#pid_modal').modal('hide');
            //alert('Error adding / update data');
            $('#save_pid').text('Save'); //change button text
            $('#save_pid').attr('disabled',false); //set button enable
        }
    });
});