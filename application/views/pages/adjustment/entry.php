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
            SKU List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">SKU</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary no-margin" style="padding: 5px;">
                    <button type="button" id="new_sku" onclick="new_sku()" class="btn btn-sm btn-primary">New</button>
                </div>
                <div class="box box-primary">
                    <div class="box-body table-responsive">
                        <table id="sku_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Customer Key</th>
                                <th>SKU</th>
                                <th>Description</th>
                                <th>Add Date</th>
                                <th>Add Who</th>
                                <th>Edit Date</th>
                                <th>Edit Who</th>
                                <th>Action <a id="reload_sku" title="Reload Customer List" class="btn btn-xs btn-default pull-right" onclick="reload_sku()"><i class="fa fa-refresh"> </i> </a></th>
                            </tr>
                            </thead>
                            <tbody>

<!--                            --><?php //foreach ($cust_list as $cust) { ?>
<!--                            <tr>-->
<!--                                <td>--><?//=$cust->customerkey?><!--</td>-->
<!--                                <td>--><?//=$cust->name?><!--</td>-->
<!--                                <td>--><?//=$cust->address?><!--</td>-->
<!--                                <td>--><?//=$cust->email?><!--</td>-->
<!--                                <td>--><?//=$cust->phone?><!--</td>-->
<!--                                <td>-->
<!--                                    <button>Edit</button>-->
<!--                                    <button>Delete</button>-->
<!--                                </td>-->
<!--                            </tr>-->
<!--                            --><?php //} ?>

                            </tbody>
<!--                            <tfoot>-->
<!--                            <tr>-->
<!--                                <th>Customer Key</th>-->
<!--                                <th>Name</th>-->
<!--                                <th>Address</th>-->
<!--                                <th>Email</th>-->
<!--                                <th>Phone</th>-->
<!--                                <th>Action</th>-->
<!--                            </tr>-->
<!--                            </tfoot>-->
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
    </section> <!--&lt;!&ndash; /.content &ndash;&gt;-->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->