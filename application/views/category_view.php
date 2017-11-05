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
        <h1 class="page-header"><?php echo get_category($category_id)->cate_name; ?></h1>
        <?php $products = product_list_by_cat_id($category_id); ?>
        <div class="row">
            <?php foreach ($products as $pro_item): ?>
                <?php $image_arr = unserialize($pro_item->pro_images); ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <a href="<?php echo base_url('product/?pro=') . $pro_item->id; ?>"><img
                                class="card-img-top pro_view_list_img"
                                src="<?php echo (!empty($image_arr[0])) ? base_url('upload/') . $image_arr[0] : 'http://placehold.it/700x400'; ?>"
                                alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="<?php echo base_url('product/?pro=') . $pro_item->id; ?>"><?php echo $pro_item->pro_name; ?></a>
                            </h4>
                            <h5><?php echo '$' . $pro_item->pro_price; ?></h5>
                            <p class="card-text"><?php echo $pro_item->pro_details; ?></p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if(count($products) == 0): ?>
            <div class="col-lg-6 col-md-6 mb-4">
                <p>No Products in this category.</p>
            </div>
            <?php endif; ?>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.col-lg-9 -->

</div>
<!-- /.row -->