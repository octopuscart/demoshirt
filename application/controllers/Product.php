<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('session');
        $this->user_id = $this->session->userdata('logged_in')['login_id'];
    }

    public function index() {
        redirect('/');
    }

    //function for product list
    function ProductList($cat_id) {
        $categories = $this->Product_model->productListCategories($cat_id);
        $data["categorie_parent"] = $this->Product_model->getparent($cat_id);
        $data["categories"] = $categories;
        $data["category"] = $cat_id;
        $this->load->view('Product/productList', $data);
    }

    //function for details
    function ProductDetails($product_id) {
        $prodct_details = $this->Product_model->productDetails($product_id);
        if ($prodct_details) {
            $pquery = "SELECT pa.attribute, cav.attribute_value FROM product_attribute as pa
      join category_attribute_value as cav on cav.id = pa.attribute_value_id
      where pa.product_id = $product_id";
            $attr_products = $this->Product_model->query_exe($pquery);
            $data["product_attr"] = $attr_products;
            $categorie_parent = $this->Product_model->getparent($prodct_details['category_id']);
            $data["categorie_parent"] = $categorie_parent;
            $data["product_details"] = $prodct_details;



            $this->config->load('seo_config');
            $this->config->set_item('seo_title', $prodct_details['title']);
            $this->config->set_item('seo_desc', $prodct_details['short_description']);
            $this->config->set_item('seo_keywords', $prodct_details['keywords']);
            $this->config->set_item('seo_imgurl', imageserver . $prodct_details['file_name']);




            $this->load->view('Product/productDetails', $data);
        } else {
            $this->load->view('errors/html/error_404');
        }
    }

    //customization shirt


    function customizationShirt() {
        $session_cart = $this->Product_model->cartData();
        $data = [];
        $this->load->view('Product/customization_shirt', $data);
    }

    //end of customization shrit





    function test() {
//        $this->session->unset_userdata('session_cart');
        //$session_cart = $this->Product_model->cartOperation(214, 1);
        $session_cart = $this->Product_model->cartData();
        echo "<pre>";
        print_r($session_cart);
    }

    function unsetData() {
        $this->session->unset_userdata('session_cart');
    }

    function testlist() {
        $listproduct = [
            'AM138',
            'AM122',
            'AM159',
            'AM247',
            'AM861',
            'AM864',
            'AM865',
            'AM868',
            'AM867',
            'AM866',
            'AM393',
            'AM397',
            'AM588',
            'AM590',
            'AM697',
            'AM613',
            'AM796',
            'AM409',
            'AM660',
            'AM661',
            'AM938',
            'AM143',
            'AM164',
            'AM162',
            'AM354',
            'AM902',
            'AM263',
            'AM262',
            'AM405',
            'AM403',
            'AM616',
            'AM661',
            'AM699',
            'AM664',
            'AM843',
            'AM906',
            'AM905',
            'AM912',
            'AM911',
            'AM910',
            'AM908',
            'AM845',
            'D2342',
            'D2351',
            'D1689',
            'D3107',
            'D3108',
            'D1137',
            'D2386',
            'D2390',
            'D1576',
            'D1549',
            'D3347',
            'D1371',
            'D2572',
            'D163',
            'D3364',
            'D148',
            'D889',
            'D123',
            'D2572',
            'D3341',
            'D3358',
            'D1224',
            'D3363',
            'D2278',
            'WF111',
            'WF105',
            'WF87',
            'WF89',
            'WF51',
            'WF149',
            'WF45',
            'WF103',
            'WF179',
            'WF174',
            'WF180',
            'L841',
            'L884',
            'L878',
            'L874',
            'L884',
            'L892',
        ];

        foreach ($listproduct as $key => $value) {
            $vl = $value;
            echo "<a style='width:100px;width:110px;float:left;border:1px solid red;padding:5px;margin:5px;' href='https://nitafashions.com/nfw/large/$vl.jpg' >"
            . "<img src='https://nitafashions.com/nfw/small/$vl.jpg' style='height:100px;'><br/><b>$vl<b>"
            . "</a>";
        }
    }

}
