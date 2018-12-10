<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Receiving Entry
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <li class="active">Receiving Entry</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="box box-primary no-margin" style="padding: 5px;">
                        <button type="button" id="save_order" onclick="save_order()" class="btn btn-sm btn-primary">Retrieve</button>
                        <button type="button" id="save_order" onclick="save_order()" class="btn btn-sm btn-primary">Save</button>
                        <button type="button" id="save_order" onclick="save_order()" class="btn btn-sm btn-primary">New</button>
                        <button type="button" id="save_order" onclick="save_order()" class="btn btn-sm btn-primary">Cancel</button>
                    </div>
                    <div class="panel-container-vertical scrollbar" id="addscroll">
                        <form action="#" id="receiving_form" class="form-horizontal" novalidate>
                        <div class="panel-top">
                            <div class="box box-primary">
                                <div class="container">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col">
                                                        <label class="control-label">Customer</label>
                                                        <select id="customer" name="customer" class="form-control">

                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label class="control-label">PO Number</label>
                                                        <input type="text" class="form-control" placeholder="PO Number">
                                                    </div>
                                                    <div class="col">
                                                        <label class="control-label">DR Number</label>
                                                        <input type="text" class="form-control" placeholder="DR Number">
                                                    </div>
                                                    <div class="col">
                                                        <label class="control-label">Waybill No</label>
                                                        <input type="text" class="form-control" placeholder="Waybill No">
                                                    </div>
                                                    <div class="col">
                                                        <label class="control-label">Warehouse Ref</label>
                                                        <input type="text" class="form-control" placeholder="Warehouse Ref">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="splitter-horizontal">
                        </div>

                        <div class="panel-bottom">
                            <div class="box box-primary no-margin" style="padding: 5px;">
                                <button type="button" id="add_row" class="btn btn-xs btn-primary">Add Row</button>
                            </div>
                            <input type="hidden" value="1" id="rowcount" name="rowcount"/>
                            <div class="box box-primary">
                                <div style="padding: 0 20px 0 20px;">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <div style="padding: 0 10px 0 10px;">
                                                <div class="row" style="padding: 0 10px 0 10px;">
                                                    <div class="col-xs-1 no-padding">
                                                        <label class="control-label labeler">NO</label>
                                                        <input type="text" value="00001" class="form-control round-input input-sm">
                                                    </div>
                                                    <div class="col no-padding">
                                                        <label class="control-label labeler">SKU</label>
                                                        <select id="sku" name="sku" class="form-control round-input input-sm">

                                                        </select>
                                                    </div>
                                                    <div class="col no-padding">
                                                        <label class="control-label labeler">Description</label>
                                                        <input type="text" class="form-control round-input input-sm" placeholder="Description">
                                                    </div>
                                                    <div class="col-xs-1 no-padding">
                                                        <label class="control-label labeler">Qty Expected</label>
                                                        <input type="number" class="form-control round-input input-sm" placeholder="Qty Expected">
                                                    </div>
                                                    <div class="col-xs-1 no-padding">
                                                        <label class="control-label labeler">Qty Receive</label>
                                                        <input type="number" class="form-control round-input input-sm" placeholder="Qty Receive">
<!--                                                        <div class="row">-->
<!--                                                            <div class="col-xs-12">-->
<!--                                                                -->
<!--                                                            </div>-->
<!--                                                        </div>-->
                                                    </div>
                                                    <div class="col-xs-1 no-padding">
                                                        <label class="control-label labeler">UOM</label>
                                                        <input type="text" class="form-control round-input input-sm" placeholder="Unit of Measurement">
                                                    </div>
                                                    <div class="col no-padding">
                                                        <label class="control-label labeler">PID</label>
                                                        <input type="text" class="form-control round-input input-sm" placeholder="Pallet ID">
                                                    </div>
                                                    <div class="col no-padding">
                                                        <label class="control-label labeler">Batch No/ Lot No</label>
                                                        <input type="text" class="form-control round-input input-sm" placeholder="Batch No/Lot No">
                                                    </div>
                                                    <div class="col no-padding">
                                                        <label class="control-label labeler">Expiry Date</label>
                                                        <input type="text" class="form-control round-input input-sm" placeholder="Expiry Date">
                                                    </div>
                                                    <div class="no-padding">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                </div>
                                                <div id="addedRows"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </section> <!--&lt;!&ndash; /.content &ndash;&gt;-->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

