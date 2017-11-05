<?php
$product = null;
if (!empty($product_id_data)) {
    $product = get_product($product_id_data);
} elseif (!empty($product_id)) {
    $product = get_product($product_id);
}
?>

<div class="row">
    <div class="col-2 collapse d-md-flex bg-faded pt-2 h-100" id="sidebar">
        <ul class="nav flex-column">
            <li><h5>Categories</h5></li>
            <?php $cate_list = get_parent_categories_list();
            $i = 0; ?>
            <?php foreach ($cate_list as $parent_item): ?>
                <?php $child_cat_obj = get_child_cateogries($parent_item->id); ?>
                <?php if (count($child_cat_obj) == 0) : ?>
                    <li class="nav-item"><a class="nav-link"
                                            href="<?php echo base_url('category/?cat=') . $parent_item->id; ?>"><?php echo $parent_item->cate_name; ?></a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#submenu<?php echo $i; ?>" data-toggle="collapse"
                           data-target="#submenu<?php echo $i; ?>"><?php echo $parent_item->cate_name; ?></a>
                        <div class="collapse" id="submenu<?php echo $i; ?>" aria-expanded="false">
                            <ul class="flex-column pl-2 nav">
                                <?php foreach ($child_cat_obj as $child_cat): ?>
                                    <li class="nav-item"><a class="nav-link py-0"
                                                            href="<?php echo base_url('category/?cat=') . $child_cat->id; ?>"><?php echo $child_cat->cate_name; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php $i++; endforeach; ?>
        </ul>
    </div>

    <div class="col pt-2">
        <a href="" data-target="#sidebar" data-toggle="collapse" class="hidden-md-up"><i class="fa fa-bars"></i></a>

        <?php $error = $this->session->flashdata("error"); ?>
        <?php $wrong_captcha = $this->session->flashdata("wrong_captcha"); ?>
        <div class="alert alert-<?php echo $error ? 'warning' : 'hide' ?> alert-dismissible"
             role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <?php echo $error ? validation_errors() : '' ?>
            <?php echo ($wrong_captcha) ? $wrong_captcha : ''; ?>
        </div>

        <div class="card mt-4">
            <?php $image_arr = unserialize($product->pro_images); ?>
            <?php if (count($image_arr) > 1): ?>
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php for ($i = 0; $i < count($image_arr); $i++): ?>
                            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"
                                class="<?php echo ($i == 0) ? 'active' : '' ?>"></li>
                        <?php endfor; ?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <?php for ($i = 0; $i < count($image_arr); $i++): ?>
                            <div class="carousel-item <?php echo ($i == 0) ? 'active' : ''; ?>">
                                <img class="slider_img d-block img-fluid"
                                     src="<?php echo (!empty($image_arr[0])) ? base_url('upload/') . $image_arr[$i] : 'http://placehold.it/900x350'; ?>"
                                     height="200">
                            </div>
                        <?php endfor; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            <?php else: ?>
                <img class="card-img-top slider_img d-block img-fluid"
                     src="<?php echo (!empty($image_arr[0])) ? base_url('upload/') . $image_arr[0] : 'http://placehold.it/900x350'; ?>"
                     alt="">
            <?php endif; ?>
            <div class="card-body">
                <h3 class="card-title"><?php echo $product->pro_name; ?></h3>
                <h4><?php echo '$' . $product->pro_price; ?></h4>
                <h6><?php echo 'SKU: ' . $product->pro_sku; ?></h6>
                <p class="card-text"><?php echo $product->pro_details; ?></p>
                <?php $rating = get_ratings($product->id); ?>
                <span class="text-warning">
                    <?php
                    $x = 0;
                    while ($x < floor($rating)) {
                        echo '&#9733';
                        $x++;
                    }
                    $y = 0;
                    while ($y < (5 - $x)) {
                        echo '&#9734';
                        $y++;
                    }
                    ?>
                </span>
                <?php echo number_format($rating, 1, '.', ' '); ?> stars
            </div>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
            <div class="card-header">
                Product Reviews
            </div>
            <div class="card-body">
                <?php $reviews = get_reviews($product->id); ?>
                <?php foreach ($reviews as $review): ?>
                    <p><?php echo $review->comments ?></p>
                    <div class="text-warning">
                        <?php
                        $x = 0;
                        while ($x < $review->ratings) {
                            echo '&#9733';
                            $x++;
                        }
                        $y = 0;
                        while ($y < (5 - $x)) {
                            echo '&#9734';
                            $y++;
                        }
                        ?>
                    </div>
                    <small class="text-muted">Posted by <?php echo $review->review_from; ?> on <?php echo date('d/m/Y',
                            strtotime($review->created_at)); ?></small>
                    <hr>
                <?php endforeach; ?>
                <?php if (count($reviews) == 0): ?>
                    <div class="col-lg-12 col-md-6 mb-4">
                        <p>No Reviews for this product. Leave one.</p>
                    </div>
                <?php endif; ?>
                <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success">Leave a
                    Review
                </button>
            </div>
        </div>
        <!-- /.card -->

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog h-100 d-flex flex-column justify-content-center my-0">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Leave a Review</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php echo form_open('product/post_review'); ?>
                        <div class="form-group">
                            <label>Your Name</label>
                                <input type="text" class="form-control" name="sender_name">
                        </div>
                        <div class="form-group">
                            <label>Feedback</label>
                                <textarea class="form-control" name="comments"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Rating</label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" id="optionsRadiosInline1" value="1">&nbsp;1
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" id="optionsRadiosInline2" value="2">&nbsp;2
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" id="optionsRadiosInline2" value="3">&nbsp;3
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" id="optionsRadiosInline2" value="4">&nbsp;4
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="rating" id="optionsRadiosInline2" value="5" checked>&nbsp;5
                            </label>
                        </div>
                        <input type="hidden" name="pro_id" value="<?php echo $product->id; ?>">
                        <input type="hidden" name="honey_pot" value="">
                        <div class="form-group">
                            <?php echo $captchaHtml; ?>
                            <label for="CaptchaCode"></label><input type="text" name="CaptchaCode" id="CaptchaCode"
                                                                    value=""/>
                        </div>
                        <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary"'); ?>
                        <?php echo form_close(); ?>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <!-- /.col-lg-9 -->

</div>
