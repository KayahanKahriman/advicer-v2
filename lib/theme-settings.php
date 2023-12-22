<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

  // Set a unique slug-like ID
  $yoda = 'yoda';

  // Create options
  CSF::createOptions($yoda, array(
    'menu_title' => 'Yoda Settings',
    'menu_slug'  => 'yoda',
  ));

  // Create a section
  CSF::createSection($yoda, array(
    'title'  => 'Header',
    'icon'   => 'fa fa-window-maximize',
    'fields' => array(
      array(
        'id'    => 'logo',
        'type'  => 'upload',
        'title' => 'Logo',
      ),
    )
  ));


  // İletişim sayfası için metabox oluştur
  $contactPage = 'contact-page';

  CSF::createMetabox($contactPage, array(
    'title'          => __('Contact Page Layouts', 'yoda'),
    'post_type'      => 'page',
    'page_templates' => 'contact.php',
    'data_type'      => 'serialize',
  ));

  CSF::createSection($contactPage, array(
    'title'  => __('Contact Layout', 'yoda'),
    'icon'   => 'fa fa-envelope',
    'fields' => array(
      array(
        'id'      => 'contact_layout',
        'type'    => 'image_select',
        'title'   => __('Page Layout', 'yoda'),
        'options' => array(
          'contact-layout-1' => get_template_directory_uri() . '/assets/codestar-assets/contact-1.png',
          'contact-layout-2' => get_template_directory_uri() . '/assets/codestar-assets/contact-1.png'
        ),
        'default' => 'contact-layout-1'
      )
    )
  ));

  CSF::createSection($contactPage, array(
    'title' => __('Contact Info', 'yoda'),
    'icon' => 'fa fa-envelope',
    'fields' => array(
      /** General Contact Info */
      array(
        'type'  => 'heading',
        'title' => __('Company Info', 'yoda')
      ),
      array(
        'id'    => 'address',
        'type'  => 'textarea',
        'title' => __('Address', 'yoda')
      ),
      array(
        'id'    => 'phone',
        'type'  => 'text',
        'title' => __('Phone', 'yoda')
      ),
      array(
        'id'    => 'mobile',
        'type'  => 'text',
        'title' => __('Mobile', 'yoda')
      ),
      array(
        'id'    => 'email',
        'type'  => 'text',
        'title' => __('Email', 'yoda')
      ),
      array(
        'id'    => 'fax',
        'type'  => 'text',
        'title' => __('Fax', 'yoda'),
      ),
      /** Social Media */
      array(
        'type'  => 'heading',
        'title' => __('Social Media Accounts', 'yoda')
      ),
      array(
        'id'     => 'social_accounts',
        'type'   => 'group',
        'title'  => __('Social Media Accounts', 'yoda'),
        'fields' => array(
          array(
            'id'    => 'social_icon',
            'type'  => 'icon',
            'title' => __('Social Media Name', 'yoda'),
          ),
          array(
            'id'    => 'social_url',
            'type'  => 'text',
            'title' => __('URL', 'yoda'),
          ),
        ),
      ),
      /** Map Options */
      array(
        'type'  => 'heading',
        'title' => __('Location Info', 'yoda')
      ),
      array(
        'id'          => 'map_coordinates',
        'type'        => 'text',
        'title'       => __('Coordinates', 'yoda'),
        'placeholder' => 'e.g: 41.0244612,29.1216063'
      ),
      array(
        'id'          => 'map_height',
        'type'        => 'text',
        'title'       => __('Map Height', 'yoda'),
        'placeholder' => __('e.g: 400px', 'yoda')
      ),
      array(
        'id'    => 'map_color',
        'type'  => 'color',
        'title' => __('Map Color', 'yoda'),
      ),
      array(
        'id'    => 'map_icon',
        'type'  => 'upload',
        'title' => __('Custom Map Icon', 'yoda'),
      ),
      array(
        'id'      => 'map_zoom',
        'type'    => 'select',
        'title'   => __('Map Zoom', 'yoda'),
        'options' => array(
          '1'  => '1',
          '2'  => '2',
          '3'  => '3',
          '4'  => '4',
          '5'  => '5',
          '6'  => '6',
          '7'  => '7',
          '8'  => '8',
          '9'  => '9',
          '10' => '10',
          '11' => '11',
          '12' => '12',
          '13' => '13',
          '14' => '14',
          '15' => '15',
          '16' => '16',
          '17' => '17',
        ),
        'default' => '16'
      ),
    )
  ));

  //Kategori Görseli
  $categoryImg = 'category-img';

  CSF::createTaxonomyOptions($categoryImg, array(
    'taxonomy'  => 'product_categories',
    'post_type' => 'products',
    'data_type' => 'serialize',
  ));

  CSF::createSection($categoryImg, array(
    'fields' => array(

      array(
        'id'    => 'category_img',
        'type'  => 'upload',
        'title' => 'Görsel',
      ),

    )
  ));
}
