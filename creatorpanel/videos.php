<?php
include_once('connection.php');
$listdata = $db->get("videos");


?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box"><!-- /.box-header -->
                <div class="box-body">
<a href="javascript:;" onclick="showAjaxModal('videos-add.php?cmd=<?=$_GET['cmd']?>');" 
    class="btn btn-primary pull-right">
        <i class="entypo-plus-circled"></i>
        Add New </a>
                    <table id="data" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>S No</th>
                                <th>Title</th>
                                 <th># Tags</th>
                                 <th>Src</th>
                                <th>Action</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$i=0;
							
							foreach($listdata as $row) {
								$i = $i+1;
                            ?>
                            
                            <tr>
                            
                                <td><?=$i?></td>
                                <td><?=$row['Title'] ?></td>
                                <td><?=$row['Tags'] ?></td>
                                <td><?=$row['Src'] ?></td>
                                 <td class="col-md-1"><div class="btn-group">
            <button typ e="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"> Action <span class="caret"></span> </button>
            <ul class="dropdown-menu dropdown-default pull-right" role="menu">
              
              <li> <a href="#" onclick="showAjaxModal('videos-add.php?id=<?=$row['id']?>&cmd=<?=$_GET['cmd']?>');"> <i class="entypo-pencil"></i> Edit </a> </li>
              
              <!-- STUDENT DELETION LINK -->
              <li> <a href="#" onclick="confirm_modal('delete.php?tbl=category&kfld=id&kval=<?=$row['id']?>&cmd=<?=$_GET['cmd'];?>');"> <i class="entypo-trash"></i> Delete </a> </li>
              
              <!-- STUDENT DELETION LINK -->
              
            </ul>
        </div></td>
                                
                               
                            </tr>
                            <?php }?>
                        </tbody>
                       
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

           
                
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
