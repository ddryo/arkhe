<h3><?php esc_html_e( 'Information about the theme', 'arkhe' ); ?></h3>
<?php

$info_json = \Arkhe::$is_ja ? 'information.json' : 'information_en.json';
// delete_transient( 'arkhe_informations' );
$json = get_transient( 'arkhe_informations' );
if ( ! $json ) {
	$response = wp_remote_get( 'https://looscdn.com/cdn/arkhe/' . $info_json );
	$json     = wp_remote_retrieve_body( $response );
	set_transient( 'arkhe_informations', $json, 1 * DAY_IN_SECONDS );
}
$info_data = json_decode( $json, true );

?>
<ul class="arkhe-info">
	<?php foreach ( $info_data as $date => $info ) : ?>
		<li>
			<span class="__date"><?php echo esc_html( $date ); ?></span>
			<?php if ( $info['url'] ) : ?>
				<a class="__title" href="<?php echo esc_url( $info['url'] ); ?>" target="_blank" rel="noopener">
					<?php echo esc_html( $info['text'] ); ?>
				</a>
			<?php else : ?>
				<span class="__title"><?php echo esc_html( $info['text'] ); ?></span>
			<?php endif; ?>
		</li>
	<?php endforeach; ?>
</ul>

<?php if ( \Arkhe::$is_ja ) : ?>
	<h3><?php esc_html_e( 'Arkhe plugin', 'arkhe' ); ?></h3>
	<div class="arkhe-page__plugins">
		<a class="__plugin" target="_blank" rel="noopener" href="https://arkhe-theme.com/ja/product/arkhe-toolkit/">
			<img class="__img" src="<?php echo esc_url( ARKHE_THEME_URI . '/assets/img/arkhe-toolkit.jpg' ); ?>" alt="">
			<div class="__title">Arkhe Toolkit</div>
			<div class="__desc">Arkheの機能を拡張し、便利な設定項目を追加するプラグインです。</div>
		</a>
		<a class="__plugin" target="_blank" rel="noopener" href="https://arkhe-theme.com/ja/product/arkhe-blocks-pro/">
			<img class="__img" src="<?php echo esc_url( ARKHE_THEME_URI . '/assets/img/arkhe-blocks.jpg' ); ?>" alt="">
			<div class="__title">Arkhe Blocks</div>
			<div class="__desc">Arkhe専用のブロック機能を拡張できるプラグインです。</div>
		</a>
		<a class="__plugin" target="_blank" rel="noopener" href="https://arkhe-theme.com/ja/product/arkhe-wookit/">
			<img class="__img" src="<?php echo esc_url( ARKHE_THEME_URI . '/assets/img/arkhe-wookit.jpg' ); ?>" alt="">
			<div class="__title">Arkhe Wookit</div>
			<div class="__desc">ArkheWOWooCommerceへ対応させることができるプラグインです。</div>
		</a>
	</div>
<?php endif; ?>
