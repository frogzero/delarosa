<?php if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){ ?>

<div class="carousel-holder" style="padding-top: 50px;">
<?php }else{ ?>

<div class="carousel-holder">
<?php }?>

                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">

                                <div class="item active">
                                    <img src="<?php echo base_url()."assets/web/" ?>images/b2.png">
                                </div>
                                <?php foreach ($slider as $num_rows => $row) {?>
                                <div class="item">
                                    <img src="<?php echo base_url()."upload/" ?><?=$row->gambar?>">
                                </div>
                                <?php }?>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>



    <!-- Page Content -->