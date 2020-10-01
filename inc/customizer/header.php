<?php
use \ARKHE_THEME\Customizer;
if ( ! defined( 'ABSPATH' ) ) exit;

$arkhe_section = 'arkhe_section_header';

/**
 * セクション : ヘッダー
 */
$wp_customize->add_section(
	$arkhe_section,
	array(
		'title'    => __( 'Header', 'arkhe' ),
		'priority' => 21,
	)
);


// ヘッダーロゴの設定
Customizer::big_title(
	$arkhe_section,
	'header_logo',
	array(
		'label'       => __( 'Header logo settings', 'arkhe' ),
		'description' => __( 'You can set the image to use from the "Site Identity" menu.', 'arkhe' ),
	)
);


// ヘッダーがブロックで管理されているかどうか
if ( ! defined( 'ARKHE_TMPID_KEY' ) ) {
	// 画像サイズ（PC）
	Customizer::add(
		$arkhe_section,
		'logo_size_pc',
		array(
			'label'       => __( 'Image size', 'arkhe' ) . ' (PC)',
			'description' => '32~120px',
			'type'        => 'number',
			'input_attrs' => array(
				'step'    => '1',
				'min'     => '32',
				'max'     => '120',
			),
			'sanitize'    => array( '\ARKHE_THEME\Customizer\Sanitize', 'int' ),
		)
	);

	// 画像サイズ（SP）
	Customizer::add(
		$arkhe_section,
		'logo_size_sp',
		array(
			'label'       => __( 'Image size', 'arkhe' ) . ' (SP)',
			'description' => '32~80px',
			'type'        => 'number',
			'input_attrs' => array(
				'step'    => '1',
				'min'     => '32',
				'max'     => '80',
			),
			'sanitize'    => array( '\ARKHE_THEME\Customizer\Sanitize', 'int' ),
		)
	);

	// レイアウト設定
	Customizer::big_title(
		$arkhe_section,
		'header_layout',
		array(
			'label' => __( 'Layout setting', 'arkhe' ),
		)
	);

	// 検索ボタンをSPで表示する
	Customizer::add(
		$arkhe_section,
		'show_search_btn_sp',
		array(
			'label'       => __( 'Show search btn on SP', 'arkhe' ),
			'type'        => 'checkbox',
		)
	);

	// 検索ボタンをPCで表示する
	Customizer::add(
		$arkhe_section,
		'show_search_btn_pc',
		array(
			'label'       => __( 'Show search btn on PC', 'arkhe' ),
			'type'        => 'checkbox',
		)
	);

	// ドロワーメニューをPCでも表示する
	Customizer::add(
		$arkhe_section,
		'show_drower_pc',
		array(
			'label'       => __( 'Show drawer menu on PC', 'arkhe' ),
			'type'        => 'checkbox',
		)
	);

	// グローバルナビを下側に移動する
	Customizer::add(
		$arkhe_section,
		'move_gnav_under',
		array(
			'label'       => __( 'Move global navigation down', 'arkhe' ),
			'type'        => 'checkbox',
		)
	);

} else {

	$tmplink = '<a href="' . esc_url( admin_url( 'edit.php?post_type=arkhe_template' ) ) . '" target="_blank" rel="noopener">' . __( 'テンプレート一覧ページ', 'arkhe' ) . '</a>';

	// translators: %s is $tmplink.
	$message = __( '現在、ヘッダーの内容はブロックで管理されています。', 'arkhe' ) . sprintf( __( '%sから編集してください。', 'arkhe' ), $tmplink );

	// ヘッダーの固定設定
	Customizer::big_title(
		$arkhe_section,
		'is_header_block',
		array(
			'label'       => __( 'ブロックで管理中...', 'arkhe' ),
			'description' => $message,
		)
	);
}


// ヘッダーの固定設定
Customizer::big_title(
	$arkhe_section,
	'fix_head',
	array(
		'label' => __( 'Fixed header setting', 'arkhe' ),
	)
);

// ヘッダーを画面上部に固定する （PC）
Customizer::add(
	$arkhe_section,
	'fix_header_pc',
	array(
		'label'       => __( 'Fixed header at top of screen', 'arkhe' ) . ' (PC)',
		'type'        => 'checkbox',
	)
);

// ヘッダーを画面上部に固定する (SP)
Customizer::add(
	$arkhe_section,
	'fix_header_sp',
	array(
		'label'       => __( 'Fixed header at top of screen', 'arkhe' ) . ' (SP)',
		'type'        => 'checkbox',
	)
);

// グローバルナビを画面上部に固定する
Customizer::add(
	$arkhe_section,
	'fix_gnav',
	array(
		'label'       => __( 'Fixed global navigation at top of screen', 'arkhe' ),
		'description' => ARKHE_NOTE . __( 'Only valid when below the header.', 'arkhe' ),
		'type'        => 'checkbox',
	)
);


// オーバーレイ設定
Customizer::big_title(
	$arkhe_section,
	'top_header',
	array(
		'label' => __( 'Overlay settings', 'arkhe' ),
	)
);
Customizer::add(
	$arkhe_section,
	'header_overlay',
	array(
		'type'        => 'select',
		'choices'     => array(
			'off' => 'OFF',
			'on'  => 'ON',
		),
	)
);

// 固定ページでも有効化する
Customizer::add(
	$arkhe_section,
	'header_overlay_on_page',
	array(
		'classname'   => '-header-overlay',
		'label'       => __( 'Enable on Pages', 'arkhe' ),
		'type'        => 'checkbox',
	)
);

// オーバーレイ時のロゴ画像
Customizer::add(
	$arkhe_section,
	'head_logo_overlay',
	array(
		'classname'   => '-header-overlay',
		'label'       => __( 'Logo image when overlaying', 'arkhe' ),
		'type'        => 'media',
		'mime_type'   => 'image',
	)
);
