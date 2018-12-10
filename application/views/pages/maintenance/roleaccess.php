<?php
/**
 * Created by John Richard Quitaneg.
 * User: JOQUITAN
 * Email: johnrichardq@gmail.com
 * Date: 12/02/2018
 * Time: 6:57 PM
 */

$user = false;
$roles = false;
$customer=false;
$sku=false;
$loc=false;
$rec=false;
$recen=false;
$iss=false;
$issen=false;
$put=false;
$sto=false;
$adj=false;
$adjen=false;
$invrep=false;
$invexp=false;
$invname=false;
$invloc=false;
$recrep=false;
$inviss=false;
$dmgrep=false;
$delrec=false;
$picklst=false;
$ageing=false;

foreach ($access as $accss){
if($accss->access=='user'){$user=true;}
if($accss->access=='roles'){$roles=true;}
if($accss->access=='customer'){$customer=true;}
if($accss->access=='sku'){$sku=true;}
if($accss->access=='loc'){$loc=true;}
if($accss->access=='receiving'){$rec=true;}
if($accss->access=='receiving entry'){$recen=true;}
if($accss->access=='issuance'){$iss=true;}
if($accss->access=='issuance entry'){$issen=true;}
if($accss->access=='putaway'){$put=true;}
if($accss->access=='stock transfer entry'){$sto=true;}
if($accss->access=='adjustments'){$adj=true;}
if($accss->access=='adjustment entry'){$adjen=true;}
if($accss->access=='inventory report'){$invrep=true;}
if($accss->access=='inventory per expiry'){$invexp=true;}
if($accss->access=='inventory per product name'){$invname=true;}
if($accss->access=='inventory per loc'){$invloc=true;}
if($accss->access=='receiving report'){$recrep=true;}
if($accss->access=='inventory issuance'){$inviss=true;}
if($accss->access=='damaged report'){$dmgrep=true;}
if($accss->access=='delivery receipt'){$delrec=true;}
if($accss->access=='picklist'){$picklst=true;}
if($accss->access=='ageing per client'){$ageing=true;}
}
?>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
    <section class="content-header">
        <h1>
            <?=$role?> Access
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Access List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="container">
                <div class="alert alert-success fade in" style="display: none;">
                    <a href="#" onclick="closealert();" class="close">&times;</a>
                    <strong>Success!</strong> Access saved successfully.
                </div>
                <div class="box box-primary no-margin" style="padding: 5px;">
                    <a href="<?=base_url()?>Role" class="btn btn-sm btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>
                    <button type="button" id="save_access" onclick="save_access(<?=$id?>)" class="btn btn-sm btn-primary">Save Access</button>
                </div>
                <label class="control-label">Maintenance</label>
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="auser" type="checkbox" <?php if($user){echo 'checked';}?> value="1">
                                    </span>
                            <input type="text" class="form-control" value="User" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="aroles" type="checkbox" <?php if($roles){echo 'checked';}?> value="24">
                                    </span>
                            <input type="text" class="form-control" value="Roles" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="acustomer" type="checkbox" <?php if($customer){echo 'checked';}?> value="2">
                                    </span>
                            <input type="text" class="form-control" value="Customer" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="asku" type="checkbox" <?php if($sku){echo 'checked';}?> value="3">
                                    </span>
                            <input type="text" class="form-control" value="SKU" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="aloc" type="checkbox" <?php if($loc){echo 'checked';}?> value="4">
                                    </span>
                            <input type="text" class="form-control" value="Location" readonly>
                        </div>
                    </div>
                    <div class="clearfix">
                    </div>
                </div>
                <label class="control-label">Receiving</label>
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="areceiving" type="checkbox" <?php if($rec){echo 'checked';}?> value="6">
                                    </span>
                            <input type="text" class="form-control" value="Receiving" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="arecentry" type="checkbox" <?php if($recen){echo 'checked';}?> value="7">
                                    </span>
                            <input type="text" class="form-control" value="Receiving Entry" readonly>
                        </div>
                    </div>
                </div>
                <label class="control-label">Issuance</label>
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="aissuance" type="checkbox" <?php if($iss){echo 'checked';}?> value="8">
                                    </span>
                            <input type="text" class="form-control" value="Issuance" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="aissentry" type="checkbox" <?php if($issen){echo 'checked';}?> value="9">
                                    </span>
                            <input type="text" class="form-control" value="Issuance Entry" readonly>
                        </div>
                    </div>
                </div>
                <label class="control-label">Stock Transfer</label>
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="aputaway" type="checkbox" <?php if($put){echo 'checked';}?> value="10">
                                    </span>
                            <input type="text" class="form-control" value="Putaway" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="asto" type="checkbox" <?php if($sto){echo 'checked';}?> value="11">
                                    </span>
                            <input type="text" class="form-control" value="Stock Transfer Entry" readonly>
                        </div>
                    </div>
                </div>
                <label class="control-label">Adjsutment</label>
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="aadjust" type="checkbox" <?php if($adj){echo 'checked';}?> value="23">
                                    </span>
                            <input type="text" class="form-control" value="Adjustments" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="aadjustentry" type="checkbox" <?php if($adjen){echo 'checked';}?> value="12">
                                    </span>
                            <input type="text" class="form-control" value="Adjustment Entry" readonly>
                        </div>
                    </div>
                </div>
                <label class="control-label">Reports</label>
                <div class="form-group">
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="ainvrep" type="checkbox" <?php if($invrep){echo 'checked';}?> value="13">
                                    </span>
                            <input type="text" class="form-control" value="Inventory Report" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="ainvrepexp" type="checkbox" <?php if($invexp){echo 'checked';}?> value="14">
                                    </span>
                            <input type="text" class="form-control" value="Inventory per Expiry Date" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="ainvrepname" type="checkbox" <?php if($invname){echo 'checked';}?> value="15">
                                    </span>
                            <input type="text" class="form-control" value="Inventory per Product Name" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" type="checkbox" <?php if($invloc){echo 'checked';}?> value="16">
                                    </span>
                            <input type="text" id="ainvloc" class="form-control" value="Inventory per Location" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="arecrep" type="checkbox" <?php if($recrep){echo 'checked';}?> value="17">
                                    </span>
                            <input type="text" class="form-control" value="Receiving Report" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="ainviss" type="checkbox" <?php if($inviss){echo 'checked';}?> value="18">
                                    </span>
                            <input type="text" class="form-control" value="Inventory Issuance" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="admgrep" type="checkbox" <?php if($dmgrep){echo 'checked';}?> value="19">
                                    </span>
                            <input type="text" class="form-control" value="Damaged Report" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="adelrep" type="checkbox" <?php if($delrec){echo 'checked';}?> value="20">
                                    </span>
                            <input type="text" class="form-control" value="Delivery Receipt" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="apicklist" type="checkbox" <?php if($picklst){echo 'checked';}?> value="21">
                                    </span>
                            <input type="text" class="form-control" value="Pick List" readonly>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                    <span class="input-group-addon">
                                        <input class="chk" id="aageing" type="checkbox" <?php if($ageing){echo 'checked';}?> value="22">
                                    </span>
                            <input type="text" class="form-control" value="Ageing Report per Client" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!--&lt;!&ndash; /.content &ndash;&gt;-->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->