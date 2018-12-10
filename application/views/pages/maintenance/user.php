<?php
/**
 * Created by John Richard Quitaneg.
 * User: JOQUITAN
 * Email: johnrichardq@gmail.com
 * Date: 12/02/2018
 * Time: 6:57 PM
 */
 
?>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <section class="content-header">
        <h1>
            User List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">User List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary no-margin" style="padding: 5px;">
                    <button type="button" id="new_user" onclick="new_user()" class="btn btn-sm btn-primary">New</button>
                </div>
                <div class="box box-primary">
                    <div class="box-body table-responsive">
                        <table id="user_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Picture</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>Status</th>
                                <th>Action <a id="reload_user" title="Reload User List" class="btn btn-xs btn-default pull-right" onclick="reload_user()"><i class="fa fa-refresh"> </i> </a></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section> <!--&lt;!&ndash; /.content &ndash;&gt;-->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->