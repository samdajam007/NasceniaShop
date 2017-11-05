<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product SKU</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $pro_list = product_list(0); ?>
                    <?php foreach ($pro_list as $pro_item): ?>
                        <?php $image_arr = unserialize($pro_item->pro_images); ?>
                        <tr class="odd">
                            <td class="pro_list_img_td">
                                <?php if (!empty($image_arr)): ?>
                                    <div class="pro_list_img_div">
                                    <img class="pro_list_img" src="<?php echo base_url('upload/') . $image_arr[0]; ?>" width="50" />
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $pro_item->id; ?></td>
                            <td><?php echo $pro_item->pro_name; ?></td>
                            <td><?php echo '$'.$pro_item->pro_price; ?></td>
                            <td><?php echo $pro_item->pro_sku; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
