var save_method, customer;

$(document).ready(function(){
    $('#reload_cust').tooltip();
});

customer = $('#cust_table').DataTable({
    "processing": true,
    "serverSide": true,
    "order": [],
    "ajax": {
        "url": base_url + "Customer/customer_list",
        "type": "POST"
    },
    "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false //set not orderable
        }
    ]
});
function reload_cust()
{
    customer.ajax.reload();
}
function new_cust()
{
    //$('.hideshowdiv').hide();
    save_method = 'add';
    $('#customer_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#customer_modal').modal('show'); // show bootstrap modal
    $('.modal-title').text('New Customer'); // Set Title to Bootstrap modal title
}

$('#customer_form').submit(function (e){
    e.preventDefault();

    if(save_method == 'add') {
        url = base_url + "Customer/save_customer/";
    }else{
        url = base_url + "Customer/update_order/";
    }

    $('#save_customer').text('Saving...'); //change button text
    $('#save_customer').attr('disabled',true); //set button enable

    $.ajax({
        url : url,
        type: "POST",
        data: $('#customer_form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#customer_modal').modal('hide');
                reload_cust();
            }

            $('#save_customer').text('Save'); //change button text
            $('#save_customer').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            $('#customer_modal').modal('hide');
            //alert('Error adding / update data');
            $('#save_customer').text('Save'); //change button text
            $('#save_customer').attr('disabled',false); //set button enable
        }
    });
});