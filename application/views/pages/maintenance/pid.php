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
            PID List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Pallet ID</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary no-margin" style="padding: 5px;">
                    <button type="button" id="new_pid" onclick="new_pid()" class="btn btn-sm btn-primary">New</button>
                </div>
                <div class="box box-primary">
                    <div class="box-body table-responsive">
                        <table id="pid_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Pallet ID</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Last Modified</th>
                                <th>Last Modified By</th>
                                <th>Action <a id="reload_pid" title="Reload Customer List" class="btn btn-xs btn-default pull-right" onclick="reload_pid()"><i class="fa fa-refresh"> </i> </a></th>
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