<div class="col-md-3 col-sm-6 col-xs-12 m-t-40">
    <h5>ADVERTISEMENT</h5>
    <hr>    
        <div class="row m-t-20">
            <?php
                $q = $this->db->get_where('shop_product',array('type'=>1,'quantity >'=>0))->result();
            
                foreach($q as $q1){
                    $this->db->limit(1);
                    $this->db->order_by('id','DESC');
                    $image = $this->db->get_where('product_images',array('product_id'=>$q1->id))->row()->image;
            ?>
            <div class="col-xs-6">
                <a href="<?php echo base_url(); ?>shop/details/<?php echo $q1->id; ?>/<?php echo strtolower(str_replace(' ', '-', $q1->name)); ?>"><img src="<?php echo URL; ?>assets/products/<?php echo $image; ?>" class="img-responsive center-block" width="100%" height="150px"/></a>
            </div>
            <?php } ?>
        </div>        
    </div>
</div>
<div class="elements_desc">
    <hr>
</div>