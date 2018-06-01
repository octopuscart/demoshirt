


ClassApartStore.controller('customizationShirt', function ($scope, $http, $location) {
    $scope.fabricurl = "http://api.octopuscart.com/output/";

    $scope.cartFabrics1 = [
        {"sku": "AM697"},
        {"sku": "AM661"},
        {"sku": "AM64A"},
        {"sku": "WF81"},
        {"sku": "D1576"},
        {"sku": "L884"}
    ];


    $scope.cartFabrics = [
        {"sku": "AM697"},
        {"sku": "AM661"},
    ];





//shirt implementation

    $scope.parents = 'Body Fit';
    $scope.selecteElements = {};

    for (i in $scope.cartFabrics) {
        var fb = $scope.cartFabrics[i];
        $scope.selecteElements[fb.sku] = {'sleeve': 'back_full_sleeve0001.png',
            'collar_buttons': 'buttonsh1.png',
            'show_buttons': 'true',
            "Monogram Initial": "ABC",
            "Collar Insert": "No",
            "Cuff Insert": "No",
            "Monogram Color": "white",
            "Monogram Background": "black",
        };
    }


    $scope.shirtimplement = function () {
        var url = baseurl + "Api/customeElements";
        $http.get(url).then(function (rdata) {
            $scope.data_list = rdata.data.data;
            $scope.cuff_collar_insert = rdata.data.cuff_collar_insert;
            $scope.keys = rdata.data.keys;
            $scope.monogram_colors = rdata.data.monogram_colors;
            $scope.monogram_style = rdata.data.monogram_style;
            $scope.category_item($scope.data_list[$scope.keys[0]])
            $scope.parents = 'Body Fit';
            for (i in $scope.keys) {
                var temp = $scope.data_list[$scope.keys[i].title];
                for (j in temp) {
                    if (temp[j]['status'] == 1) {
                        for (f in $scope.cartFabrics) {
                            var fb = $scope.cartFabrics[f];
                            $scope.selecteElements[fb.sku][$scope.keys[i].title] = temp[j];

                        }
                    }
                }
            }
        });
        console.log($scope.selecteElements)
    }




    $scope.shirtimplement()



    $scope.category_item = function (rdata, parents) {

        $scope.selectedProfile = "";
        $scope.parents = parents;
        $scope.category_data = rdata;

    }

//end of shirt implemantation

    setTimeout(function () {
        $('.images-slider').flexslider({
            animation: "fade",
            controlNav: "thumbnails"
        });
    }, 500)


    $scope.screencustom = {
        'view_type': 'front',
        "fabric": $scope.cartFabrics[0].sku,
    };


    //select fabric
    $scope.selectFabric = function (fabric) {
        $scope.screencustom.fabric = fabric.sku;
    }
    //

    //monogram style color
    $scope.monogramColor = function (monoobj) {
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram Background'] = monoobj.backcolor;
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram Color'] = monoobj.color;
    }
    
    $scope.monogramFont = function(mfobj){
          $scope.selecteElements[$scope.screencustom.fabric]['Monogram Font'] = mfobj;
          $scope.selecteElements[$scope.screencustom.fabric]['Monogram Style'] = mfobj.title;
    }
    
    // monogram style 


    $scope.selectElement = function (obj, element) {

        $scope.screencustom.view_type = obj.viewtype;
        $scope.selecteElements[$scope.screencustom.fabric][obj.title] = element;
        if (obj.title == 'Cuff & Sleeve') {
            $scope.selecteElements[$scope.screencustom.fabric].sleeve = element.sleeve;
        }
        if (obj.title == 'Collar') {
            $scope.selecteElements[$scope.screencustom.fabric].collar_buttons = element.buttons;
        }
        if (obj.title == 'Front') {
            $scope.selecteElements[$scope.screencustom.fabric].show_buttons = element.show_buttons;
        }

        if (element.monogram_change_css) {
            if ($scope.selecteElements[$scope.screencustom.fabric]['Monogram'].title != 'No')
                $scope.selecteElements[$scope.screencustom.fabric]['Monogram'] = element.monogram_position;
        }

        console.log($scope.selecteElements[$scope.screencustom.fabric]['Monogram']);

        $("html, body").animate({scrollTop: 0}, "slow")
    }


    $scope.selectCollarCuffInsert = function (cctype, insfab) {

        $scope.selecteElements[$scope.screencustom.fabric][cctype] = insfab;
    }


    $scope.rotateModel = function () {


        if ($scope.screencustom.view_type == "front") {
            $scope.screencustom.view_type = "back";
        }
        else {
            $scope.screencustom.view_type = "front";
        }


    }





    setTimeout(function () {
        $('.custom_block_slide').owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 3
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })


        $('.custom_block_elements').owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });

        $('#accordion1').on('shown.bs.collapse', function () {
            $("[aria-controls=" + ($(".elementItemBox.in")[0].id) + "] i").removeClass("fa-plus").addClass("fa-minus")
        })


        $('#accordion1').on('hidden.bs.collapse', function () {
            $(".button-expand i").removeClass("fa-minus").addClass("fa-plus")
        })

    }, 1500)




});

