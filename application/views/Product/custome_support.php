<div class="col-md-4 col-xs-2 customization_items customization_items_title " style="padding: 0px 5px;">  
    <ul class="nav nav-tabs tabs-left"> 
        <li class="{{$index == 0?'active':''}}" ng-repeat="k in keys" ng-if="k.type == 'main'">
            <a href="#custome{{$index}}" data-toggle="tab"  >
                <div class="media"  style="cursor:pointer"> 
                    <div class="media-left media-middle mobile_view_element_tab">
                        <p class="elementItemImage" style="margin: 0px;background: url(<?php echo base_url(); ?>assets/images/customization/{{selecteElements[screencustom.fabric][k.title].image}})"></p>
                    </div>
                    <div class="media-body elementItemDesktop">
                        <h4 class="selected-element-title media-heading">{{k.title}}</h4>
                        <p class="selected-element-result">{{selecteElements[screencustom.fabric][k.title].title}}</p>
                        <span ng-if="k.title == 'Monogram'">
                            <span ng-if="selecteElements[screencustom.fabric][k.title].title != 'No'">
                                {{ selecteElements[screencustom.fabric][k.title].monogramstyle_text}} ,
                                {{ selecteElements[screencustom.fabric][k.title].monogramstyle_color}} ,
                                {{ selecteElements[screencustom.fabric][k.title].monogramstyle_title}}
                            </span>
                        </span>
                    </div>
                </div>
            </a>
        </li>
    </ul>
</div>


<div class="col-md-8 col-xs-10">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane {{$index == 0?'active':''}}" ng-repeat="k in keys" id="custome{{$index}}" ng-if="k.type == 'main'">
            <div class="row elementTabList">


                <div ng-switch="k.title">
                    <div ng-switch-when="Collar">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#collars_area" class="btn btn-inverse" aria-controls="collars_area" role="tab" data-toggle="tab">
                                    Collars
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#collar_insert" class="btn btn-inverse" aria-controls="collar_insert" role="tab" data-toggle="tab">
                                    Collar Insert
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--collars list-->
                            <div role="tabpanel" class="tab-pane active" id="collars_area">
                                <div class="customization_items customization_items_elements">
                                    <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                                        <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                            <div >
                                                <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/{{ele.image}}')" > </div>
                                                <div class='customization_title'>
                                                    {{ele.title}} 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--collar insert-->
                            <div role="tabpanel" class="tab-pane" id="collar_insert">

                                <div class="customization_items customization_items_elements">
                                    <div class="col-md-4 col-xs-6 custome_element_col">
                                        <div class="item elementItem  "  ng-click='selectCollarCuffInsert("Collar Insert", "No")'>
                                            <div >
                                                <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/{{selecteElements[screencustom.fabric]['Collar'].image}}')" > </div>
                                                <div class='customization_title'>
                                                    No Collar Insert
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="cci in cuff_collar_insert" >
                                        <div class="item elementItem"  ng-click='selectCollarCuffInsert("Collar Insert", cci)'>
                                            <div >
                                                <div class="elementStyle customization_box_elements {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('http://api.octopuscart.com/output_insert/fabrics_insert/{{cci}}.jpg')" > </div>
                                                <div class='customization_title'>
                                                    {{cci}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--cuff area-->
                    <div ng-switch-when="Cuff & Sleeve">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#cuff_area" class="btn btn-inverse" aria-controls="cuff_area" role="tab" data-toggle="tab">
                                    Cuff & Sleeve
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#cuff_insert" class="btn btn-inverse" aria-controls="cuff_insert" role="tab" data-toggle="tab">
                                    Cuff Insert
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--cuff list-->
                            <div role="tabpanel" class="tab-pane active" id="cuff_area">
                                <div class="customization_items customization_items_elements">
                                    <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                                        <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                            <div >
                                                <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/{{ele.image}}')" > </div>
                                                <div class='customization_title'>
                                                    {{ele.title}} 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="cuff_insert">
                                <div class="customization_items customization_items_elements">
                                    <!--Cuff insert-->
                                    <div class="col-md-4 col-xs-6 custome_element_col" >
                                        <div class="item elementItem  "  ng-click='selectCollarCuffInsert("Cuff Insert", "No")'>
                                            <div >
                                                <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/{{selecteElements[screencustom.fabric]['Cuff & Sleeve'].image}}')" > </div>
                                                <div class='customization_title'>
                                                    No Cuff Insert
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="cci in cuff_collar_insert" >
                                        <div class="item elementItem  "  ng-click='selectCollarCuffInsert("Cuff Insert", cci)'>
                                            <div >
                                                <div class="elementStyle customization_box_elements {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('http://api.octopuscart.com/output_insert/fabrics_insert/{{cci}}.jpg')" > </div>
                                                <div class='customization_title'>
                                                    {{cci}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--monogram area-->
                    <div ng-switch-when="Monogram">
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-12 customization_items customization_items_elements">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]"  ng-if="ele.not_show_when.indexOf(selecteElements[screencustom.fabric][ele.checkwith].title) == (-1)">
                                    <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                        <div >
                                            <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/{{ele.image}}')" > </div>
                                            <div class='customization_title' >
                                                {{ele.title}} 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="clear:both "></div>
                                <div class="row" ng-if="selecteElements[fab.sku]['Monogram'].title != 'No'">
                                    <div class="col-md-12 monogram_init">
                                        <h6>Monogram Initial</h6>
                                        <input type="text" maxlength="5"  ng-model="selecteElements[screencustom.fabric]['Monogram Initial']">
                                    </div>

                                    <div class="col-md-12 monogram_init">
                                        <h6>Monogram Colors</h6>
                                        <div class="col-md-2 col-xs-4 " ng-repeat="mgc in monogram_colors" ng-click="monogramColor(mgc)" >
                                            <div class="monogram_color_style" style="background: {{mgc.backcolor}};color:{{mgc.color}}">
                                                {{selecteElements[screencustom.fabric]['Monogram Initial']}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 monogram_init">
                                        <h6>Monogram Style</h6>
                                        <div class="col-md-2 col-xs-4 " ng-repeat="mgf in monogram_style" ng-click="monogramFont(mgf)" >
                                            <div class="monogram_color_style" style="
                                                 background:  {{selecteElements[screencustom.fabric]['Monogram Background']}};
                                                 color: {{selecteElements[screencustom.fabric]['Monogram Color']}};{{mgf.font_style}}">
                                                {{selecteElements[screencustom.fabric]['Monogram Initial']}}
                                            </div>
                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div ng-switch-default>
                        <h5 class="customization_heading">{{k.title}}</h5>
                        <div class="col-md-4 col-xs-6 custome_element_col" ng-repeat="ele in data_list[k.title]" >
                            <div class="item elementItem {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'' :'noselected' }} "  ng-click='selectElement(k, ele)'>
                                <div >
                                    <div class="elementStyle customization_box_element {{  ele.title == selecteElements[screencustom.fabric][k.title].title?'activestyle' :'noselected' }}" style="background:url('<?php echo base_url(); ?>assets/images/customization/{{ele.image}}')" > </div>
                                    <div class='customization_title'>
                                        {{ele.title}} 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


