<?php if ( Arkhe::is_show_sidebar() ) get_sidebar(); // サイドバー ?>
	</div><!-- // l-content__body -->
</div><!-- // l-content -->
<?php

	do_action( 'arkhe_before_footer' );

	// パンくずリスト
	if ( 'bottom' === Arkhe::get_breadcrumbs_position() ) {
		Arkhe::get_parts( 'others/breadcrumb' );
	}

	// フッターコンテンツ
	Arkhe::get_parts( 'footer' );
	Arkhe::get_parts( 'footer/after' );
?>
</div><!--/ #wrapper-->
<?php wp_footer(); ?>
</body></html>
