<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create Product</h1>
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
                        <?php echo form_open_multipart('admin/product_admin/post_product'); ?>
                        <div class="form-group">
                            <label>Product Name</label>

                            <input type="text" class="form-control" name="pro_name">

                        </div>
                        <div class="form-group input-group">
                            <label>Product Price</label>
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="text" class="form-control input-sm" name="pro_price">
                            </div>

                        </div>
                        <div class="form-group input-group">
                            <label>Product SKU</label>
                            <input type="text" class="form-control input-sm" name="pro_sku">
                        </div>
                        <div class="form-group">
                            <label>Product Details</label>
                            <textarea class="form-control" name="pro_details"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Product Category</label>
                            <select multiple class="form-control" name="pro_cate[]">
                                <option value="0">No Category</option>
                                <?php $cat_list = category_list();
                                foreach ($cat_list as $cat_item):?>
                                    <option
                                        value="<?php echo $cat_item->id; ?>"><?php echo $cat_item->cate_name; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Upload Product Images</label>
                            <?php echo form_upload('uploadedimages[]', '', 'multiple'); ?>
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