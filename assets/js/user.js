var save_method, user;

$(document).ready(function(){
    $('#reload_user').tooltip();

    $(function() {
        var name;
        var url;

        //user
        $('#user_form').submit(function (e) {
            $('#save_user').text('Saving...'); //change button text
            $('#save_user').attr('disabled', true); //set button disable
            e.preventDefault();
            $.ajaxFileUpload({
                url: base_url + "User/upload_pic",
                secureuri: false,
                fileElementId: 'picture',
                dataType: 'json',
                data: {},
                success: function (data, status) {
                    if (data.status) {
                        var pic = data.name;
                        console.log('...................---'+data.name+'---..................');
                        if (pic == '' || pic == null) {
                            pic = 'default.png';
                        }
                        save_user(pic);
                    }
                }
            });
        });
    });
});

user = $('#user_table').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        "url": base_url + "User/user_list",
        "type": "POST"
    },
    "columnDefs": [
        {
            "targets": [ -1,0 ], //last column
            "orderable": false //set not orderable
        }
    ]
});
function reload_user()
{
    user.ajax.reload();
}
function new_user()
{
    //$('.hideshowdiv').hide();
    get_roles();
    save_method = 'add';
    $('#user_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#user_modal').modal('show'); // show bootstrap modal
    $('.modal-title').text('New User'); // Set Title to Bootstrap modal title
}

function get_roles() {
    $.ajax({
        url : base_url + "User/get_roles",
        type: "GET",
        dataType: "JSON",
        success: function(data){
            var options = '';
            for (var x = 0; x < data.length; x++) {
                options += '<option value = "' + data[x]['id'] + '">' + data[x]['role'] + '</option>';
            }
            $('#role').html(options);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get account list from ajax');
        }
    });
}

function save_user(pic){

    if(save_method == 'add') {
        url = base_url + "User/save_user/"+pic;
    } else {
        url = base_url + "User/update_user/"+pic;
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#user_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#user_modal').modal('hide');
                reload_user();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#save_user').text('Save'); //change button text
            $('#save_user').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $('#save_user').modal('hide');
            $('#save_user').text('Save'); //change button text
            $('#save_user').attr('disabled',false); //set button enable
        }
    });
}