<?php 

$config = array(
        'brand' => array(
                array(
                        'field' => 'brand_name',
                        'label' => 'Marka Adı',
                        'rules' => 'required'
                ),

        ),
        'category' => array(
                array(
                       'field' => 'kategori_adi',
                        'label' => 'Kategori Adı',
                        'rules' => 'required'
                ),
                
        ),

        'subcategory' => array(
                array(
                       'field' => 'altkategori_adi',
                        'label' => 'Alt Kategori Adı',
                        'rules' => 'required'
                ),
                
        ),

        'property' => array(
                array(
                       'field' => 'ozellik_adi',
                        'label' => 'Özellik Adı',
                        'rules' => 'required'
                ),
                
        ),

        'subproperty' => array(
                array(
                       'field' => 'altozellik_adi',
                        'label' => 'Alt Özellik Adı',
                        'rules' => 'required'
                ),
                
        ),

        'comment' => array(
                array(
                       'field' => 'yorum_icerik',
                        'label' => 'Yorum İçerik',
                        'rules' => 'required'
                ),
                
        ),

        'item' => array(
                array(
                        'field' => 'item_name',
                        'label' => 'Ürün Adı',
                        'rules' => 'required'
                ),

       
                array(
                        'field' => 'price',
                        'label' => 'Fiyatı',
                        'rules' => 'required|is_natural_no_zero'
                ),
                array(
                        'field' => 'brand_id',
                        'label' => 'Marka Adı',
                        'rules' => 'required|greater_than[0]'
                ),
                array(
                        'field' => 'category_id',
                        'label' => 'Kategori Adı',
                        'rules' => 'required|greater_than[0]'
                ),
                array(
                        'field' => 'description',
                        'label' => 'Açıklama',
                        'rules' => 'required'
                ),
                
        ),
);


 ?>