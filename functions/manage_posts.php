<?php
/**
 * 管理画面->投稿一覧->表示列の変更
 */
function manage_posts_columns($columns) {
    $columns['post_views_count'] = __('PV');
    return $columns;
}
add_filter( 'manage_posts_columns', 'manage_posts_columns' );
 
/**
 * 管理画面->投稿一覧->表示列の変更
 */
function add_column($column_name, $post_id) {
    if( $column_name == 'post_views_count' ) {
        $value = getPostViews($post_id);
    }
    if ( isset($value) && $value ) {
        echo $value;
    } else {
        echo __('None');
    }
}
add_action( 'manage_posts_custom_column', 'add_column', 10, 2 );
 
/**
 * 管理画面->投稿記事編集->カスタムフィールドの表示、保存
 */
add_action('admin_menu', 'post_views_count_hooks');
add_action('save_post', 'save_post_views_count');
function post_views_count_hooks() {
    add_meta_box('post_views_count', __('PV'), 'post_views_count_input', 'post', 'normal', 'high');
}
function post_views_count_input() {
    global $post;
    echo '<input type="hidden" name="post_views_count_noncename" id="post_views_count_noncename" value="'.wp_create_nonce('post_views_count').'" />';
    echo '<input name="post_views_count" id="post_views_count" style="width:100%;" value="'.get_post_meta($post->ID,'post_views_count',true).'">';
}
function save_post_views_count($post_id) {
    if (!wp_verify_nonce($_POST['post_views_count_noncename'], 'post_views_count')) return $post_id;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;
    $post_views_count = $_POST['post_views_count'];
    update_post_meta($post_id, 'post_views_count', $post_views_count);
}

// ソートする項目を登録
function myfield_register_sortable( $sortable_column ) {
   $sortable_column['post_views_count'] = 'post_views_count';
  return $sortable_column;
}
 
add_filter( 'manage_edit-post_sortable_columns', 'myfield_register_sortable' );