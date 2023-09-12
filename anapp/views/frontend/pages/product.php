<?php
    $arrCategory        = array();
    $i                  = 1;
    if(!empty($category))
    {
        foreach($category as $row)
        {
            $id             = an_encrypt($row->id);
            $category_name  = an_strong(ucwords($row->name));
    
            $arrCategory[$row->id]  = array(
                'id'            => $row->id,
                'name'          => $category_name,
                'slug'          => $row->slug,
                'status'        => $row->status,
                'type'          => "item".$i,
                'type_number'   => $i,
            );
    
            $i++;
        }
    }
    
    $arrColor   = array(
        '1' => 'danger',
        '2' => 'warning',
        '3' => 'success',
        '4' => 'info',
        '5' => 'default',
    );
?>

<!-- Banner Page -->
<?php 
    $home_list  = $this->Model_Home->get_home_detail();
    $img_src    = an_page_home_image($home_list['productpage']->image, true);
?>
<?php if(!empty($home_list['productpage']->image)) : ?>
<div class="banner banner__product" style="background: url(<?php echo $img_src; ?>) center;"></div>
<?php else : ?>
<div class="banner banner__product"></div>
<?php endif; ?>

<!-- Product-->
<section class="product">
    <div class="container">
      <div class="title-main">
        <h1>Produk Kami</h1>
      </div>
      <!--Tab-->
      <div class="tab-wrapper">
        <button class="tab active" data-filter="*">All</button>
        <?php if(!empty($arrCategory)) : ?>
            <?php foreach($arrCategory AS $idx => $value) : ?>
                <?php
                    echo $strButton = "<button class='tab' data-filter='.".$value['type']."'>".$value['name']."</button>";   
                ?>
            <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <div class="tab-content row">
        <?php if(!empty($products)) : ?>
            <?php foreach($products AS $row) : ?>
                <?php
                    $id             = an_encrypt($row->id);
                    $id_category    = $row->id_category;
                    $category       = an_strong(ucwords($row->category));
                    $img_src        = an_product_image($row->image, true);
                    $type           = isset($arrCategory[$id_category]['type']) ? $arrCategory[$id_category]['type'] : 'item1';
                    $type_number    = isset($arrCategory[$id_category]['type_number']) ? $arrCategory[$id_category]['type_number'] : '1';
                    $status         = isset($arrCategory[$id_category]['status']) ? $arrCategory[$id_category]['status'] : '1';

                    if(empty($arrCategory[$id_category])) continue;

                    if($status == 0) continue;

                    if($type_number > 5){
                        $type_number = 5;
                    }

                    $label          = $arrColor[$type_number];
                    echo $strProduct     = "
                    <a href='".base_url()."product/detail/".$id."' class='tab-content__item ".$type."' data-category='".$type."'>
                        <div class='card'>
                            <div class='card__image'><img src='".$img_src."' alt='".$row->slug."'></div>
                                <div class='card__name'>
                                    <div class='card__name--title'>".$row->name."</div>
                                    <div class='card__name--desc'>
                                        ".$row->short_description."               
                                    </div>
                                </div>
                                <div class='card__foot'>
                                <div class='label label--".$label."'>".$category."</div>
                            </div>
                        </div>
                    </a>
                    ";
               ?>
            <?php endforeach; ?>
        <?php endif; ?>         
      </div>
    </div>
</section>