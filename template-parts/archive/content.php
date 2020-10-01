<?php
/**
 * ターム系以外のアーカイブページ
 */

// アーカイブページのデータ
$archive_data = Arkhe_Theme::get_archive_data();

// リストタイプ
$list_type = apply_filters( 'arkhe_list_type_on_archive', ARKHE_LIST_TYPE, $archive_data );
?>
<div <?php post_class( Arkhe_Theme::main_body_class( false ) ); ?>>
<?php
	// タイトル
	Arkhe_Theme::get_parts( 'archive/title', $archive_data );

	// 投稿リスト
	Arkhe_Theme::get_parts( 'post_list/main_query', array( 'list_type' => $list_type ) );

	// ページャー
	the_posts_pagination(
		array(
			'mid_size'           => 2,
			'screen_reader_text' => null,
		)
	);
?>
</div>
