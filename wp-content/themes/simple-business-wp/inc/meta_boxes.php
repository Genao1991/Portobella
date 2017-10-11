<?php

/* **************************************************************************************************** */
// METABOX - SIDEBAR +++ START
/* **************************************************************************************************** */

$meta_box_options['simple_business_wp_sidebar_meta_box']['id'] = 'sidebar_meta_box';
$meta_box_options['simple_business_wp_sidebar_meta_box']['title'] = 'Nimbus Sidebar Options';
$meta_box_options['simple_business_wp_sidebar_meta_box']['callback'] = 'simple_business_wp_call_sidebar_meta_box'; #create
$meta_box_options['simple_business_wp_sidebar_meta_box']['post_type'] = 'post,page';
$meta_box_options['simple_business_wp_sidebar_meta_box']['context'] = 'side';
$meta_box_options['simple_business_wp_sidebar_meta_box']['priority'] = 'high';
$meta_box_options['simple_business_wp_sidebar_meta_box']['fields']['sidebar_select']
    = array('type'=>'radio',
            'options'=>array('left'=>'Left', 'right'=>'Right', 'none'=>'None'),
            'default'=>'none',
            'script'=>'',
            'help'=>'Sidebar Display Options:');
$meta_box_options['simple_business_wp_sidebar_meta_box']['fields']['sidebar_number']
    = array('type'=>'textbox',
            'default'=>'',
            'script'=>'',
            'label'=>'Sidebar #:',
            'help'=>'Enter the number of the alternate sidebar you would like to apply. Leave blank to use default.',
            'size'=>2);
add_action("admin_init", "simple_business_wp_sidebar_meta_box");
add_action('save_post', 'simple_business_wp_save_sidebar_meta_box');


function simple_business_wp_sidebar_meta_box() {
    $key = 'simple_business_wp_sidebar_meta_box';
    global $meta_box_options;
    $id = $meta_box_options[$key]['id'];
    $title = $meta_box_options[$key]['title'];
    $callback = $meta_box_options[$key]['callback'];
    $post_type = $meta_box_options[$key]['post_type'];
    $context = $meta_box_options[$key]['context'];
    $priority = $meta_box_options[$key]['priority'];
    $arr = explode(',', $post_type);
    foreach($arr as $v){
        add_meta_box($id, $title, $callback, $v, $context, $priority);
    }
}

function simple_business_wp_call_sidebar_meta_box() {
    $key = 'simple_business_wp_sidebar_meta_box';
    global $meta_box_options;
    global $post;
    $fields = $meta_box_options[$key]['fields'];
    simple_business_wp_output_metabox_style($meta_box_options['simple_business_wp_sidebar_meta_box']['id'], $meta_box_options['simple_business_wp_sidebar_meta_box']['context']);
    simple_business_wp_metabox_nonce();
    simple_business_wp_draw_fields($fields, $post->ID);
}

function simple_business_wp_save_sidebar_meta_box($post_id) {

    $key = 'simple_business_wp_sidebar_meta_box';
    global $meta_box_options;
    global $post;

    // verify nonce
    if (isset($_POST['meta_box_nonce'])) {
        $pid = simple_business_wp_verify_nonce($_POST['meta_box_nonce'], $post_id);
        if($pid) return $pid;
    }

    // check autosave
    $pid = simple_business_wp_check_autosave($post_id);
    if($pid) return $pid;

    // check permissions
    if (isset($_POST['post_type'])) {
        $pid = simple_business_wp_verify_permissions($post_id, $_POST['post_type']);
        if($pid) return $pid;
    }

    $fields = $meta_box_options[$key]['fields'];
    foreach($fields as $k=>$f){
        $field_name = $k;
        if(isset($_POST[$field_name])) {
            $raw_value=$_POST[$field_name];
            $type=$f['type'];
            $value=sanitize_meta_field_value($type,$raw_value);
            update_post_meta($post_id, $field_name, $value);
        }
    }

}



/* **************************************************************************************************** */
// METABOX - FEATURED IMAGES +++ START
/* **************************************************************************************************** */


$meta_box_options['simple_business_wp_featured_img_meta_box']['id'] = 'featured_img_meta_box';
$meta_box_options['simple_business_wp_featured_img_meta_box']['title'] = 'Nimbus Featured Images';
$meta_box_options['simple_business_wp_featured_img_meta_box']['callback'] = 'simple_business_wp_call_featured_img_meta_box'; #create
$meta_box_options['simple_business_wp_featured_img_meta_box']['post_type'] = 'page,post';
$meta_box_options['simple_business_wp_featured_img_meta_box']['context'] = 'side';
$meta_box_options['simple_business_wp_featured_img_meta_box']['priority'] = 'high';


$meta_box_options['simple_business_wp_featured_img_meta_box']['fields']['toggle_featured']
    = array('type'=>'radio',
            'options'=>array('show'=>'Show', 'hide'=>'Hide'),
            'default'=>'show',
            'script'=>'',
            'help'=>'Show/Hide Featured Image Banner');


add_action("admin_init", "simple_business_wp_featured_img_meta_box");
add_action('save_post', 'simple_business_wp_save_featured_img_meta_box');



function simple_business_wp_featured_img_meta_box() {
    $key = 'simple_business_wp_featured_img_meta_box';
    global $meta_box_options;
    $id = $meta_box_options[$key]['id'];
    $title = $meta_box_options[$key]['title'];
    $callback = $meta_box_options[$key]['callback'];
    $post_type = $meta_box_options[$key]['post_type'];
    $context = $meta_box_options[$key]['context'];
    $priority = $meta_box_options[$key]['priority'];
    $arr = explode(',', $post_type);
    foreach($arr as $v){
        add_meta_box($id, $title, $callback, $v, $context, $priority);
    }
}

function simple_business_wp_call_featured_img_meta_box() {

    wp_register_script('jscolor', get_template_directory_uri() . '/nimbus/assets/js/jscolor/jscolor.js', array('jquery'), '1.0');
    wp_enqueue_script('jscolor');

    $key = 'simple_business_wp_featured_img_meta_box';
    global $meta_box_options;
    global $post;

    $fields = $meta_box_options[$key]['fields'];
    simple_business_wp_output_metabox_style($meta_box_options['simple_business_wp_featured_img_meta_box']['id'], $meta_box_options['simple_business_wp_featured_img_meta_box']['context']);
    simple_business_wp_metabox_nonce();
    simple_business_wp_draw_fields($fields, $post->ID);
}

function simple_business_wp_save_featured_img_meta_box($post_id) {

    $key = 'simple_business_wp_featured_img_meta_box';
    global $meta_box_options;
    global $post;

    // verify nonce
    if (isset($_POST['meta_box_nonce'])) {
        $pid = simple_business_wp_verify_nonce($_POST['meta_box_nonce'], $post_id);
        if($pid) return $pid;
    }

    // check autosave
    $pid = simple_business_wp_check_autosave($post_id);
    if($pid) return $pid;

    // check permissions
    if (isset($_POST['post_type'])) {
        $pid = simple_business_wp_verify_permissions($post_id, $_POST['post_type']);
        if($pid) return $pid;
    }

    $fields = $meta_box_options[$key]['fields'];
    foreach($fields as $k=>$f){
        $field_name = $k;
        if(isset($_POST[$field_name])) {
            $raw_value=$_POST[$field_name];
            $type=$f['type'];
            $value=sanitize_meta_field_value($type,$raw_value);
            update_post_meta($post_id, $field_name, $value);
        }
    }

}


/*** HELPER FUNCTIONS ***/


// Sanitize all input

function sanitize_meta_field_value($type,$raw_value) {
    switch($type){
                case 'radio':
                            $value = sanitize_key($raw_value);
                            return $value;
                            break;
                case 'textbox':
                            $value = sanitize_text_field($raw_value);
                            return $value;
                            break;
                case 'textarea':
                            $value = wp_kses_post($raw_value);
                            return $value;
                            break;
                case 'select':
                            $value = sanitize_key( $raw_value );
                            return $value;
                            break;
                case 'colorbox':
                            $value = sanitize_hex_color($raw_value);
                            return $value;
                            break;
    }
}


### FORM FIELDS ###

function simple_business_wp_draw_fields($fields, $post_id){
    foreach($fields as $k=>$f){
        $field_name = $k;
        $field_value = get_post_meta($post_id, $field_name, true);
        echo '<p>' . $f['help'] .'</p>';
        echo $f['script'];
        switch($f['type']){
            case 'radio':
                        simple_business_wp_draw_radio_buttons($f['options'], $f['default'], $field_name, $field_value);
                        break;
            case 'textbox':
                        simple_business_wp_draw_textbox($f['label'], $field_name, $field_value, $f['size']);
                        break;
            case 'textarea':
                        simple_business_wp_draw_textarea($f['label'], $field_name, $field_value, $f['cols'], $f['rows']);
                        break;
            case 'select':
                        simple_business_wp_draw_select($f['options'], $f['default'], $field_name, $field_value);
                        break;
            case 'colorbox':
                        simple_business_wp_draw_colorbox($f['label'], $field_name, $field_value, $f['size']);
                        break;
        }
    }
}


function simple_business_wp_metabox_nonce(){
    echo '<input type="hidden" name="meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
}


function simple_business_wp_draw_radio_buttons($options, $default, $field_name, $field_value){
    $checked_option = $default;
    foreach($options as $val=>$lab){
        if($field_value == $val && $field_value != $default)
            $checked_option = $val;
    }
    foreach($options as $val=>$lab){
        $checked = $val == $checked_option ? 'checked' : '';
        $id = $field_name . '-' . $val;
        echo '<input class="" type="radio" name="'.$field_name.'" id="'.$id .'" value="'.$val.'" ' . $checked . '><label style="float:none;" for="'.$id.'">'.$lab.'</label><br />';
    }
}

function simple_business_wp_draw_select($options, $default, $field_name, $field_value){
    echo '<select name="'.$field_name.'">';
    foreach($options as $val=>$lab){
        $selected = $field_value == $val ? 'selected' : '';
        if($checked == '') $checked = $val == $default ? 'selected' : '';
        echo '<option value="'.$val.'" ' . $selected . '>'.$lab.'</option>';
    }
    echo '</select>';
}

function simple_business_wp_draw_textbox($label, $field_name, $field_value, $size){
    echo '<label>' . $label . ' </label>';
    echo '<input type="text" id="'.$field_name.'" name="'.$field_name.'" value="'.$field_value.'" size="'.$size.'" />';
}

function simple_business_wp_draw_colorbox($label, $field_name, $field_value, $size){
    echo '<label>' . $label . ' </label>';
    echo '<input type="text" class="color {required:false}" id="colorbox_'.$field_name.'" name="'.$field_name.'" value="'.$field_value.'" size="'.$size.'" />';
}

function simple_business_wp_draw_textarea($label, $field_name, $field_value, $cols, $rows){
    echo '<label>' . $label . '</label><br />';
    echo '<textarea name="'.$field_name.'" id="'.$field_name.'" cols="'.$cols.'" rows="'.$rows.'">' . $field_value . '</textarea>';
}

### VERIFICATION FUNCTIONS ###

function simple_business_wp_verify_nonce($meta_box_nonce, $post_id){
    if (isset($meta_box_nonce)) {
        if (!wp_verify_nonce($meta_box_nonce, basename(__FILE__))) {
            return $post_id;
        }
    }
    return false;
}

function simple_business_wp_check_autosave($post_id){
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
    return false;
}

function simple_business_wp_verify_permissions($post_id, $post_type){
     if (isset($post_type)) {
        if ('page' == $post_type) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
        return false;
    }
    return false;
}

function simple_business_wp_output_metabox_style($meta_box_id, $context='normal'){

    if(!is_admin()) return;

$str_normal =
'<style>
form .counter{ font-size:13px; font-weight:normal; display:block; padding-left:26%; }
form .warning{ color:#600; }
form .exceeded{ color:#e00; }
#[META_BOX_ID] { background:#e9f7ff!important; }
#[META_BOX_ID] h3.hndle { background-color:#90c9e9;background-image:-ms-linear-gradient(top,#abdaf4,#90c9e9)!important; background-image:-moz-linear-gradient(top,#abdaf4,#90c9e9)!important; background-image:-o-linear-gradient(top,#abdaf4,#90c9e9)!important; background-image:-webkit-gradient(linear,left top,left bottom,from(#abdaf4),to(#90c9e9))!important; background-image:-webkit-linear-gradient(top,#abdaf4,#90c9e9)!important; background-image:linear-gradient(top,#abdaf4,#90c9e9)!important; color:#000; }
#[META_BOX_ID] label {float:left; width:25%; margin-right:0.5em; padding-top:0.2em; font-weight:bold;}}
</style>';

$str_side =
'<style>
form .counter{ font-size:13px; font-weight:normal; display:block; padding-left:26%; }
form .warning{ color:#600; }
form .exceeded{ color:#e00; }
#[META_BOX_ID] { background:#e9f7ff!important; }
#[META_BOX_ID] h3.hndle { background-color:#90c9e9;background-image:-ms-linear-gradient(top,#abdaf4,#90c9e9)!important; background-image:-moz-linear-gradient(top,#abdaf4,#90c9e9)!important; background-image:-o-linear-gradient(top,#abdaf4,#90c9e9)!important; background-image:-webkit-gradient(linear,left top,left bottom,from(#abdaf4),to(#90c9e9))!important; background-image:-webkit-linear-gradient(top,#abdaf4,#90c9e9)!important; background-image:linear-gradient(top,#abdaf4,#90c9e9)!important; color:#000; }
</style>';
$str = $context == 'normal' ? $str_normal : $str_side;
echo str_replace('[META_BOX_ID]', $meta_box_id, $str);
}
?>