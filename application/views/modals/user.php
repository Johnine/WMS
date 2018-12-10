<?php
/**
 * Created by John Richard Quitaneg.
 * User: JOQUITAN
 * Email: johnrichardq@gmail.com
 * Date: 12/02/2018
 * Time: 8:21 PM
 */
?>

<!-- Bootstrap modal -->
<div class="modal fade" id="user_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="#" id="user_form" class="form-horizontal">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title">New User</h3>
                </div>
                <div class="modal-body form">
                    <input type="hidden" value="1" id="rowcount" name="rowcount"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Username" minlength="8" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Name</label>
                            <div class="col-md-9">
                                <input type="text" name="name" id="name" class="form-control input-sm" placeholder="Name" minlength="8" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Role</label>
                            <div class="col-md-9">
                                <select id="role" name="role" class="form-control">

                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="email" name="email" id="email" class="form-control input-sm" placeholder="juandelacruz@gmail.com" minlength="8" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contact No</label>
                            <div class="col-md-9">
                                <input type="text" name="contactno" id="contactno" class="form-control input-sm" placeholder="+639171234567" minlength="8" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-9">
                                <select id="status" name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Upload Picture</label>
                            <div class="col-md-9">
                                <input id="picture" name="picture" placeholder="Picture" class="form-control" type="file">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save_user" class="btn btn-primary btn-sm" style="margin-left: 10px;">&nbsp;<i class="fa fa-save"></i>&nbsp; Save &nbsp;</button>
                    <button type="submit" class="btn btn-danger  btn-sm" data-dismiss="modal">&nbsp;<i class="fa fa-close"></i>&nbsp; Cancel &nbsp; </button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
