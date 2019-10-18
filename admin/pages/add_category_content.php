<?php

if(isset($_POST['btn'])){
    $message=$obj_category->save_category_info($_POST);
}
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Add category</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2 style="font-weight: 800"><i class="halflings-icon edit"></i><span class="break"></span>Add category</h2>
            <h2 style="font-weight: 800"><span class="break"></span>
            <?php
            if(isset($message)){
                echo $message;
            }
            ?>
            </h2>
        </div>
        <div class="box-content">
            <form class="form-horizontal" method="post" action="">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead" style="font-weight: 800">Category name </label>
                        <div class="controls">
                            <input type="text" name="category_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">
                        </div>
                    </div>
                        
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2" style="font-weight: 800">Category description</label>
                        <div class="controls">
                            <textarea name="category_description" class="cleditor" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" style="font-weight: 800">Publication status</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="publication_status" id="optionsRadios1" value="1" checked="">
                                Published
                            </label>
                            <div style="clear:both"></div>
                            <label class="radio">
                                <input type="radio" name="publication_status" id="optionsRadios2" value="0">
                                Unpublished
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Save your category info here</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div>
</div>

