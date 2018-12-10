var save_method;

$(document).ready(function(){

});

function new_role()
{
    //$('.hideshowdiv').hide();
    save_method = 'add';
    $('#role_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#role_modal').modal('show'); // show bootstrap modal
    $('.modal-title').text('New Role'); // Set Title to Bootstrap modal title
}

$('#role_form').submit(function (e){
    e.preventDefault();

    if(save_method == 'add') {
        url = base_url + "Role/save_role/";
    }else{
        url = base_url + "Role/update_role/";
    }

    $('#save_role').text('Saving...'); //change button text
    $('#save_role').attr('disabled',true); //set button enable

    $.ajax({
        url : url,
        type: "POST",
        data: $('#role_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#role_modal').modal('hide');
                location.reload();
            }

            $('#save_role').text('Save'); //change button text
            $('#save_role').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $('#role_modal').modal('hide');
            //alert('Error adding / update data');
            $('#save_role').text('Save'); //change button text
            $('#save_role').attr('disabled',false); //set button enable
        }
    });
});

function save_access(id)
{
    var chkArray = [];
    $(".chk:checked").each(function() {
        chkArray.push($(this).val());
    });
    var selected;
    selected = chkArray.join('-') ;
    if(selected.length > 0){
        $.ajax({
            url : base_url + "Role/save_access/",
            type: "POST",
            dataType: "JSON",
            data: {id: id, access: selected},
            success: function(data){
                // alert('Success.');
                $('.alert').show();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error saving access.');
            }
        });
    }else{
        alert("Please at least check one");
    }
}
function closealert()
{
    $('.alert').hide('slow');
}



