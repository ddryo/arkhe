<h3>Arkhe専用プラグイン</h3>
<div class="arkhe-page__plugins">
	<a class="__plugin" target="_blank" rel="noopener" href="https://arkhe-theme.com/ja/plugins/">
		<img class="__img" src="<?php echo esc_url( ARKHE_NOIMG_URL ); ?>" alt="">
		<div class="__title">Arkhe Toolkit</div>
		<div class="__desc">Arkheの機能を拡張するプラグイン。</div>
	</a>
	<a class="__plugin" target="_blank" rel="noopener" href="https://arkhe-theme.com/ja/plugins/">
		<img class="__img" src="<?php echo esc_url( ARKHE_NOIMG_URL ); ?>" alt="">
		<div class="__title">Arkhe Blocks</div>
		<div class="__desc">Arkhe専用のブロック拡張プラグイン</div>
	</a>
</div>

<h3>テーマに関するお知らせ情報</h3>
<?php

// delete_transient( 'arkhe_informations' );
$json = get_transient( 'arkhe_informations' );
if ( ! $json ) {
	$response = wp_remote_get( 'https://looscdn.com/cdn/curltest/json/info.json' );
	$json     = wp_remote_retrieve_body( $response );
	set_transient( 'arkhe_informations', $json, 1 * DAY_IN_SECONDS );
}

$info_data = json_decode( $json, true );

?>
<ul class="arkhe-info">
	<?php foreach ( $info_data as $date => $info ) : ?>
		<li>
			<span class="__date"><?php echo esc_html( $date ); ?></span>
			<a href="<?php echo esc_url( $info['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $info['text'] ); ?></a>
		</li>
	<?php endforeach; ?>
</ul>


<h3>アップデート情報</h3>

<a class="button button-primary" target="_blank" rel="noopener" href="https://arkhe-theme.com/ja/update/">アップデート情報を見る</a>
