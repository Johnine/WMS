var save_method, sku;

$(document).ready(function(){
    $('#reload_sku').tooltip();
});

sku = $('#sku_table').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        "url": base_url + "sku/sku_list",
        "type": "POST"
    },
    "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false //set not orderable
        }
    ]
});
function reload_sku()
{
    sku.ajax.reload();
}
function new_sku()
{
    //$('.hideshowdiv').hide();
    save_method = 'add';
    $('#sku_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#sku_modal').modal('show'); // show bootstrap modal
    $('.modal-title').text('New SKU'); // Set Title to Bootstrap modal title
}

$('#sku_form').submit(function (e){
    e.preventDefault();

    if(save_method == 'add') {
        url = base_url + "sku/save_sku/";
    }else{
        url = base_url + "sku/update_sku/";
    }

    $('#save_sku').text('Saving...'); //change button text
    $('#save_sku').attr('disabled',true); //set button enable

    $.ajax({
        url : url,
        type: "POST",
        data: $('#sku_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#sku_modal').modal('hide');
                reload_sku();
            }

            $('#save_sku').text('Save'); //change button text
            $('#save_sku').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $('#sku_modal').modal('hide');
            //alert('Error adding / update data');
            $('#save_sku').text('Save'); //change button text
            $('#save_sku').attr('disabled',false); //set button enable
        }
    });
});