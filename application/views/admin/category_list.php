<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Category List</h1>
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
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Child Categories</th>
                        <th>Active</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $cate_list = category_list(); ?>
                    <?php foreach ($cate_list as $cat_item): ?>
                        <tr class="odd gradeX">
                            <td><?php echo $cat_item->id; ?></td>
                            <td><?php echo $cat_item->cate_name; ?></td>
                            <td>
                                <?php
                                $child_cate = get_child_category($cat_item->cate_parent);
                                if (empty($child_cate)) {
                                    echo '<i>--Parent--</i>';
                                } else {
                                    echo $child_cate->cate_name;
                                }
                                ?>
                            </td>
                            <td class="center"><?php echo $cat_item->cate_active; ?></td>
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
