<?php
if(isset($_GET['status'])){
    $category_id=$_GET['id'];
    if($_GET['status']=='unpublish'){
        $message=$obj_category->unpublish_category_info_by_category_id($category_id);
    }else if ($_GET['status']=='publish') {
        $message=$obj_category->publish_category_info_by_category_id($category_id);
    }
}
$query_result = $obj_category->select_all_category_info();
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin_master.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Show category</a></li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 style="font-weight: 800"><i class="halflings-icon user"></i><span class="break"></span>Show category</h2>
            <h2 style="font-weight: 800"><i class="halflings-icon user"></i><span class="break"></span>
            <?php 
            if(isset($message)){
                echo $message;
            }
            ?>
            </h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Category name</th>
                        <th>Category description</th>
                        <th>Publication satus</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($category_info = mysqli_fetch_assoc($query_result)) { ?>

                        <tr>

                            <td class="center">
                                <?php echo $category_info['category_name'] ?>
                            </td>

                            <td class="center">
                                <?php echo $category_info['category_description'] ?>
                            </td>

                            <td class="center">
                                <?php
                                if ($category_info['publication_status'] == 1) {
                                    echo 'Published';
                                } else {
                                    echo 'Unpublished';
                                }
                                ?>
                            </td>

                            <td class="center">
                                <?php if ($category_info['publication_status'] == 1) { ?>
                                    <a class="btn btn-success" href="?status=unpublish&&id=<?php echo $category_info['category_id'] ?>" title="Unpublish it">
                                        <i class="halflings-icon white arrow-up" ></i>
                                    </a>
                                <?php } else { ?>
                                <a class="btn btn-danger" href="?status=publish&&id=<?php  echo $category_info['category_id'] ?>" title="Publish it">
                                        <i class="halflings-icon white arrow-down" ></i>  
                                    </a>
                                <?php } ?>
                                <a class="btn btn-info" href="#" title="Update it">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="#" title="Delete info">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div>

