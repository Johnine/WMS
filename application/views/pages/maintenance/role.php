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
            Roles Access
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">User List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <i class="fa fa-plus"></i> New
                        </h3>
                        <p>
                            Define a new role
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-plus"></i>
                    </div>
                    <a style="cursor: pointer;" onclick="new_role();" class="small-box-footer">
                        New Role <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        <?php foreach ($roles as $role) { ?>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?php echo $role->role; ?>
                        </h3>
                        <p>
                            10000<?php echo $role->id; ?>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person"></i>
                    </div>
                    <a href="Role/ViewAccess/<?=$role->id?>/<?=$role->role?>" style="cursor: pointer;" class="small-box-footer">
                        View Access <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        <?php } ?>
        </div>
    </section> <!--&lt;!&ndash; /.content &ndash;&gt;-->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->