<?php
$this->load->view('layout/header');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-lazyload/8.7.1/lazyload.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Bungee|Orbitron|Six+Caps|Wallpoet" rel="stylesheet">

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/bootstrap.vertical-tabs.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/theme/css/style_custome.css">
<style>
    .product_image_back {
        background-size: contain!important;
        background-repeat: no-repeat!important;
        height: 300px!important;
        background-position-x: center!important;
        background-position-y: center!important;
    }

    .productblock{
        padding: 10px;
        border: 1px solid rgba(0, 0, 0, 0.07);
        margin-bottom: 30px;
        box-shadow: 0px 0px 5px #00000017;
    }

</style>


<div class="" ng-controller="customizationShirt">
    <!-- Slider -->
<!--    <section class="sub-bnr" data-stellar-background-ratio="0.5" style="font-weight: 300;
             font-size: 20px;">
        <div class="position-center-center">
            <div class="container">
                <div  class="row">

                </div>
            </div>
        </div>
    </section>-->

    <!-- Content -->
    <div id="content"> 

        <!--======= PAGES INNER =========-->
        <section class="item-detail-page padding-top-30 padding-bottom-30">
            <div class="container" style="width: 100%">
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="row">
                            <div class='custom_block_slide'> 
                                <div class="item"   ng-repeat="fab in cartFabrics">
                                    <div class=" fabricblockmobile ">
                                        <a href="#fabric_{{fab.sku}}" class="fabricblock_a" aria-controls="collars_area" role="tab" data-toggle="tab" ng-click="selectFabric(fab)">
                                            <div class="elementStyle customization_box_elements fabricblock {{  fab.sku == screencustom.fabric?'active' :'noselected' }}" style="background:url('<?php echo custome_image_server; ?>/output/{{fab.sku}}/cloth0001.png');" > </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--======= IMAGES SLIDER =========-->


                    <div class="col-sm-5 large-detail shirtcontainer  " >
                        <div class="col-sm-3 col-xs-12 fabricblockdesktop customization_items " style="padding: 0">
                            <ul class="nav nav-tabs tabs-left">
                                <li role="presentation" class="{{$index === 0?'active':''}} " ng-repeat="fab in cartFabrics" >
                                    <a href="#fabric_{{fab.sku}}" class="fabricblock_a" aria-controls="collars_area" role="tab" data-toggle="tab" ng-click="selectFabric(fab)">
                                        <div class="elementStyle customization_box_elements fabricblock {{  fab.sku == screencustom.fabric?'active' :'noselected' }}" style="background:url('<?php echo custome_image_server; ?>/output/{{fab.sku}}/cloth0001.png');" > </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-9 col-xs-12"  style="padding: 0">
                            <div class="tab-content">
                                <div class="tab-pane {{$index === 0?'active':''}}" ng-repeat="fab in cartFabrics" id="fabric_{{fab.sku}}">
                                    <button class="btn btn-default btn-lg custom_rotate_button" ng-click="rotateModel()">
                                        <i class="icon ion-refresh"></i>
                                    </button>
                                    <div class="fontview_custom customization_block animated " ng-if="screencustom.view_type == 'front'">
                                        <div ng-if="selecteElements[screencustom.fabric]['Monogram Initial']">
                                            <div class="monogramtext_posistion
                                                 {{selecteElements[fab.sku]['Cuff & Sleeve'].monogram_change_css?selecteElements[fab.sku]['Cuff & Sleeve'].monogram_change_css :selecteElements[fab.sku]['Monogram'].css_class}} 
                                                 monogramcss_main"
                                                 style="
                                                 background: {{selecteElements[fab.sku]['Monogram Background']}};
                                                 color: {{selecteElements[fab.sku]['Monogram Color']}};
                                              
                                                 {{selecteElements[fab.sku]['Monogram'].title=='Collar'?selecteElements[fab.sku]['Collar'].monogram_style:''}} ;
                                                 margin-left: {{(-1) * (2 * (selecteElements[screencustom.fabric]['Monogram Initial'].length - 3))}}px;
                                                    {{selecteElements[screencustom.fabric]['Monogram Font'].font_style}};
                                                 " 
                                                 ng-if="selecteElements[fab.sku]['Monogram'].title != 'No'">
                                                {{selecteElements[screencustom.fabric]['Monogram Initial']}}
                                            </div>
                                        </div>
                                        <!--cuff section-->
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.sku}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.sku]['Cuff & Sleeve'].elements">
                                        <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.sku]['Cuff Insert']}}/{{selecteElements[fab.sku]['Cuff & Sleeve'].insert_style}}" class="fixpos animated" style="{{selecteElements[fab.sku]['Cuff & Sleeve'].insert_style_css}}"    ng-if="selecteElements[fab.sku]['Cuff Insert'] != 'No'">
                                        <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.sku]['Cuff & Sleeve'].insert_overlay}}" class="fixpos animated" style="{{selecteElements[fab.sku]['Cuff & Sleeve'].insert_overlay_css}}"   ng-if="selecteElements[fab.sku]['Cuff Insert'] != 'No'"   >
                                        <img src="<?php echo custome_image_server; ?>/output/{{selecteElements[fab.sku]['Cuff & Sleeve'].buttons}}" class="fixpos animated" ng-if="selecteElements[fab.sku]['Cuff & Sleeve'].buttons" >

                                        <!--back-->
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.sku}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.sku]['Bottom'].elements">

                                        <!--front-->
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.sku}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.sku]['Front'].elements">

                                        <!--pocket-->
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.sku}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.sku]['Pocket'].elements">

                                        <!--collar section-->
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.sku}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.sku]['Collar'].elements" style="{{selecteElements[fab.sku]['Collar'].style}}">
                                        <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.sku]['Collar Insert']}}/{{selecteElements[fab.sku]['Collar'].insert_style}}" class="fixpos animated" style="{{selecteElements[fab.sku]['Collar'].insert_style_css}}"    ng-if="selecteElements[fab.sku]['Collar Insert'] != 'No'">
                                        <img src="<?php echo custome_image_server; ?>/output_insert/{{selecteElements[fab.sku]['Collar'].insert_overlay}}" class="fixpos animated" style="{{selecteElements[fab.sku]['Collar'].insert_overlay_css}}"   ng-if="selecteElements[fab.sku]['Collar Insert'] != 'No'"   >
                                        <img src="<?php echo custome_image_server; ?>/output/{{selecteElements[fab.sku].collar_buttons}}" class="fixpos animated" style="margin-top: -3px;margin-left: 0px;" ng-if="selecteElements[fab.sku].show_buttons == 'true'">
                                        <img src="<?php echo custome_image_server; ?>/output/{{selecteElements[fab.sku]['Collar'].button_down}}" class="fixpos animated" style="margin-left: -3px;" ng-if="selecteElements[fab.sku]['Collar'].button_down">
                                    </div>   
                                    <div class="backview_custom customization_block  animated " ng-if="screencustom.view_type == 'back'">
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.sku}}/{{selecteElements[fab.sku].sleeve}}" class="fixpos animated" >
                                        <img src="<?php echo custome_image_server; ?>/output/{{fab.sku}}/{{img}}" class="fixpos animated" ng-repeat="img in selecteElements[fab.sku]['Back'].elements" >
                                        <img src="<?php echo custome_image_server; ?>/output/{{selecteElements[fab.sku]['Back'].overlay}}" class="fixpos animated" ng-if="selecteElements[fab.sku]['Back'].overlay">
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--======= ITEM DETAILS =========-->
                    <div class="col-sm-7 col-xs-12">
                        <!--shirt customization-->
                        <div class="row" style="margin-top: -10px;padding: 5px;">
                            <?php
                            $this->load->view('Product/custome_support');
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
    <!-- End Content --> 

</div>

<scirpt></scirpt>

<!--angular controllers-->
<script src="<?php echo base_url(); ?>assets/theme/angular/ng-shirtcustomization.js"></script>


<?php
$this->load->view('layout/footer');
?>