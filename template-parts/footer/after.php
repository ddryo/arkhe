<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * フッターの後にあるコンテンツ
 */

ARKHE_THEME::get_parts( 'footer/fix_btns' );
?>

<?php // 検索モーダル ?>
<div id="search_modal" class="c-modal p-searchModal">
	<div class="c-overlay" data-onclick="toggleSearch"></div>
	<div class="p-searchModal__inner">
		<?php echo get_search_form(); ?>
	</div>
</div>

<?php // ドロワーメニュー用のオーバーレイヤー ?>
<div class="p-drawerOverlayer c-overlay -drawer" data-onclick="toggleMenu"></div>
