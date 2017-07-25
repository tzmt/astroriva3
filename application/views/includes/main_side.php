<div class="col-md-3 col-sm-6 col-xs-12 m-t-40">
                <h5>ADVERTISEMENT</h5>
                <hr>
                <div class="row">
                    <?php
                        $this->db->order_by('id','RANDOM');
                        $q = $this->db->get_where('ads',array('point'=>1))->row();
                    ?>
                    <?php if(isset($q->image) && $q->image != ""){ ?>
                    <div class="col-sm-12 m-t-10">
                        <a href="<?php echo $q->url; ?>"><img src="<?php echo URL; ?>assets/ads/<?php echo $q->image; ?>" alt="ad" class="img-responsive center-block"/></a>
                    </div>
                    <?php } ?>
                </div>
                <div class="row m-t-20">
                    <?php
                        $this->db->order_by('id','RANDOM');
                        $q = $this->db->get_where('ads',array('point'=>2))->row();
                    ?>
                    <?php if(isset($q->image) && $q->image != ""){ ?>
                    <div class="col-xs-6">
                        <a href="<?php echo $q->url; ?>"><img src="<?php echo URL; ?>assets/ads/<?php echo $q->image; ?>" alt="ad" class="img-responsive center-block"/></a>
                    </div>
                    <?php } ?>

                    <?php
                        $this->db->order_by('id','RANDOM');
                        $q = $this->db->get_where('ads',array('point'=>3))->row();
                    ?>
                    <?php if(isset($q->image) && $q->image != ""){ ?>
                    <div class="col-xs-6">
                        <a href="<?php echo $q->url; ?>"><img src="<?php echo URL; ?>assets/ads/<?php echo $q->image; ?>" alt="ad" class="img-responsive center-block"/></a>
                    </div>
                    <?php } ?>
                </div>
                <div class="row m-t-20">
                    <?php
                        $this->db->order_by('id','RANDOM');
                        $q = $this->db->get_where('ads',array('point'=>4))->row();
                    ?>
                    <?php if(isset($q->image) && $q->image != ""){ ?>
                    <div class="col-xs-6">
                        <a href="<?php echo $q->url; ?>"><img src="<?php echo URL; ?>assets/ads/<?php echo $q->image; ?>" alt="ad" class="img-responsive center-block"/></a>
                    </div>
                    <?php } ?>
                    <?php
                        $this->db->order_by('id','RANDOM');
                        $q = $this->db->get_where('ads',array('point'=>5))->row();
                    ?>
                    <?php if(isset($q->image) && $q->image != ""){ ?>
                    <div class="col-xs-6">
                        <a href="<?php echo $q->url; ?>"><img src="<?php echo URL; ?>assets/ads/<?php echo $q->image; ?>" alt="ad" class="img-responsive center-block"/></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="elements_desc">
            <hr>
        </div>