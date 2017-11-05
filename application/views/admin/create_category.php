<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create Category</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php $error = $this->session->flashdata("error"); ?>
                <div class="alert alert-<?php echo $error ? 'warning' : 'hide' ?> alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <?php echo $error ? validation_errors() : '' ?>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <?php echo form_open('admin/category_admin/post_category'); ?>
                            <div class="form-group">
                                <label>Category Name</label>
                                    <input class="form-control" name="cate_name">
                            </div>
                            <div class="form-group">
                                <label>Child Category</label>
                                    <select multiple class="form-control" name="cate_parent[]">
                                        <option value="0" selected>Parent</option>
                                        <?php $parent_list = get_parent_categories_list();
                                    foreach ($parent_list as $parent):?>
                                        <option value="<?php echo $parent->id; ?>"><?php echo $parent->cate_name; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Active</label>
                                <label class="radio-inline">
                                    <input type="radio" name="active_cate" id="optionsRadiosInline1" value="1" checked>Yes
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="active_cate" id="optionsRadiosInline2" value="0">No
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default" name="submit" value="submit">Save</button>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- /.col-lg-6  -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>