<?php
/**
 * Created by John Richard Quitaneg.
 * User: JOQUITAN
 * Email: johnrichardq@gmail.com
 * Date: 12/01/2018
 * Time: 8:13 PM
 */
$this->load->library('session');

if(!$this->session->userdata('loginuser')){
    redirect(base_url());
}

$sql = "select a.role,b.access from
                role a, access b, roleaccess c
                where a.id = c.role and b.id = c.access
                and a.id = " . $this->session->userdata('roleid');
$query = $this->db->query($sql);
$access = $query->result();

$user = false;
$roles = false;
$customer=false;
$sku=false;
$loc=false;
$pid=false;
$stra=false;
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
    if($accss->access=='pid'){$pid=true;}
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

<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="<?=base_url()?>" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        John Company
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i>
                        <?php echo $this->session->userdata('name'); ?>
                        <i class="caret"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="<?=base_url()?>assets/pic/<?=$this->session->userdata('picture')?>" class="img-circle" alt="User Image" />
                            <p style="color:#FFFFFF">
                                <?php echo $this->session->userdata('name'); ?>
                                <small><?php echo $this->session->userdata('role'); ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                            <a href="#" class="btn btn-default btn-flat">Change Password</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?=base_url()?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
<!--            <div class="user-panel">-->
<!--                <div class="pull-left image">-->
<!--                    <img src="--><?//=base_url()?><!--assets/img/avatar04.png" class="img-circle" alt="User Image" />-->
<!--                </div>-->
<!--                <div class="pull-left info">-->
<!--                    <p>Hello, John</p>-->
<!---->
<!--                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
<!--                </div>-->
<!--            </div>-->
<!--            <!-- search form -->
<!--            <form action="#" method="get" class="sidebar-form">-->
<!--                <div class="input-group">-->
<!--                    <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
<!--                    <span class="input-group-btn">-->
<!--                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>-->
<!--                            </span>-->
<!--                </div>-->
<!--            </form>-->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <?php if($user || $roles || $customer || $sku || $loc || $stra){ ?>
                <li class="treeview <?php if($page=='user'|| $page=='role'|| $page=='customer'||$page=='sku'||$page=='loc'||$page=='strategy'){echo 'active';}?> ">
                    <a href="#">
                        <i class="fa fa-hdd-o"></i>
                        <span>Maintenance</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if($user){ ?><li><a href="<?=base_url()?>User"><i class="fa fa-angle-double-right"></i> User</a></li><?php } ?>
                        <?php if($roles){ ?><li><a href="<?=base_url()?>Role"><i class="fa fa-angle-double-right"></i> Roles</a></li><?php } ?>
                        <?php if($customer){ ?><li><a href="<?=base_url()?>Customer"><i class="fa fa-angle-double-right"></i> Customer</a></li><?php } ?>
                        <?php if($sku){ ?><li><a href="<?=base_url()?>SKU"><i class="fa fa-angle-double-right"></i> Product Definition (SKU)</a></li><?php } ?>
                        <?php if($loc){ ?><li><a href="<?=base_url()?>Loc"><i class="fa fa-angle-double-right"></i> Location</a></li><?php } ?>
                        <?php if($pid){ ?><li><a href="<?=base_url()?>PID"><i class="fa fa-angle-double-right"></i> PID</a></li><?php } ?>
                    </ul>
                </li>
                <?php } if($rec || $recen){ ?>
                <li class="treeview <?php if($page=='main'||$page=='receiving'){echo 'active';}?>">
                    <a href="#">
                        <i class="fa fa-truck"></i>
                        <span>Receiving</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if($rec){ ?><li><a href="<?=base_url()?>Receiving"><i class="fa fa-angle-double-right"></i> Receiving </a></li><?php } ?>
                        <?php if($recen){ ?><li><a href="<?=base_url()?>Main"><i class="fa fa-angle-double-right"></i> Receiving Entry</a></li><?php } ?>
                    </ul>
                </li>
                <?php } if($iss || $issen){ ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-dolly"></i>
                        <span>Issuance</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if($iss){ ?><li><a href="<?=base_url()?>Issuance"><i class="fa fa-angle-double-right"></i> Issuance </a></li><?php } ?>
                        <?php if($issen){ ?><li><a href="<?=base_url()?>IssuanceEntry"><i class="fa fa-angle-double-right"></i> Issuance Entry</a></li><?php } ?>
                    </ul>
                </li>
                <?php } if($put || $sto){ ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-people-carry"></i>
                        <span>Stock Transfer Module</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if($put){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Putaway</a></li><?php } ?>
                        <?php if($sto){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Stock Transfer Entry</a></li><?php } ?>
                    </ul>
                </li>
                <?php } if($adj || $adjen){ ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-equals"></i>
                        <span>Adjustment</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if($adj){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Adjustments</a></li><?php } ?>
                        <?php if($adjen){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Adjustment Entry</a></li><?php } ?>
                    </ul>
                </li>
                <?php } if($invrep || $invexp || $invname || $invloc || $recrep || $inviss || $dmgrep || $delrec || $picklst || $ageing){ ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-file-invoice"></i> <span>Reports</span>
                        <i class="fa fa-angle-right pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if($invrep){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Inventory Report</a></li><?php } ?>
                        <?php if($invexp){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Inventory Per Expiry Date</a></li><?php } ?>
                        <?php if($invname){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Inventory Per Product Name</a></li><?php } ?>
                        <?php if($invloc){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Inventory Per Location</a></li><?php } ?>
                        <?php if($recrep){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Receiving Report</a></li><?php } ?>
                        <?php if($inviss){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Inventory Issuance</a></li><?php } ?>
                        <?php if($dmgrep){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Damaged Report</a></li><?php } ?>
                        <?php if($delrec){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Delivery Receipt</a></li><?php } ?>
                        <?php if($picklst){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Pick List</a></li><?php } ?>
                        <?php if($ageing){ ?><li><a href="<?=base_url()?>Blank"><i class="fa fa-angle-double-right"></i> Ageing Report per Client</a></li><?php } ?>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

