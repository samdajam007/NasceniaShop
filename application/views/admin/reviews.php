<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Reviews & Ratings</h1>
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
                        <th>Reviewer</th>
                        <th>Comments</th>
                        <th>For Product</th>
                        <th>Ratings</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $reviews = get_reviews(); ?>
                    <?php foreach ($reviews as $review): ?>
                        <tr class="odd gradeX">
                            <td><?php echo $review->review_from; ?></td>
                            <td><?php echo $review->comments; ?></td>
                            <td><?php echo get_product($review->pro_id)->pro_name; ?></td>
                            <td class="center"><?php echo $review->ratings; ?></td>
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