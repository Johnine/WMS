var save_method, loc;

$(document).ready(function(){
    $('#reload_loc').tooltip();
});

loc = $('#loc_table').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        "url": base_url + "Loc/loc_list",
        "type": "POST"
    },
    "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false //set not orderable
        }
    ]
});
function reload_loc()
{
    loc.ajax.reload();
}
function new_loc()
{
    //$('.hideshowdiv').hide();
    save_method = 'add';
    $('#loc_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#loc_modal').modal('show'); // show bootstrap modal
    $('.modal-title').text('New loc'); // Set Title to Bootstrap modal title
}

$('#loc_form').submit(function (e){
    e.preventDefault();

    if(save_method == 'add') {
        url = base_url + "Loc/save_loc/";
    }else{
        url = base_url + "Loc/update_loc/";
    }

    $('#save_loc').text('Saving...'); //change button text
    $('#save_loc').attr('disabled',true); //set button enable

    $.ajax({
        url : url,
        type: "POST",
        data: $('#loc_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#loc_modal').modal('hide');
                reload_loc();
            }

            $('#save_loc').text('Save'); //change button text
            $('#save_loc').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $('#loc_modal').modal('hide');
            //alert('Error adding / update data');
            $('#save_loc').text('Save'); //change button text
            $('#save_loc').attr('disabled',false); //set button enable
        }
    });
});