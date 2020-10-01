<?php
namespace Arkhe_Theme;

use \Arkhe_Theme\Data\Default_Data;
if ( ! defined( 'ABSPATH' ) ) exit;

class Data {

	/**
	 * インスタンス
	 */
	private static $instance;

	/**
	 * テーマバージョン
	 */
	public static $arkhe_version = '';

	/**
	 * カスタマイザーの設定データ
	 */
	protected static $settings         = '';
	protected static $default_settings = '';

	/**
	 * DB名
	 */
	const DB_NAME_CUSTOMIZER = 'arkhe_settings';

	/**
	 * パンくずリストのデータを保持する変数
	 */
	public static $bread_json_data = array();

	/**
	 * 外部からインスタンス化させない
	 */
	private function __construct() {}


	/**
	 * init()
	 */
	public static function init() {

		// テーマバージョンを取得
		self::get_theme_version();

		// テーマバージョンを定数化しておく(wp_enqueue_ のクエリ付与用)
		if ( ! defined( 'ARKHE_VERSION' ) ) {
			define( 'ARKHE_VERSION', ( defined( 'WP_DEBUG' ) && WP_DEBUG ) ? date_i18n( 'mdGis' ) : self::$arkhe_version );
		}

		// 設定データのデフォルト値をセット
		self::set_default();

		// 設定データのセット
		add_action( 'after_setup_theme', array( '\Arkhe_Theme\Data', 'set_settings' ), 9 );
		if ( is_customize_preview() ) {
			// wp_loaded : カスタマイザーのデータが反映されるタイミング。
			add_action( 'wp_loaded', array( '\Arkhe_Theme\Data', 'set_settings' ), 10 );
		}
	}


	/**
	 * SWELLバージョンをセット
	 */
	private static function get_theme_version() {
		$theme_data          = wp_get_theme( 'arkhe' );
		self::$arkhe_version = $theme_data->get( 'Version' );
	}


	/**
	 * デフォルト値をセット
	 */
	private static function set_default() {

		// self::$default_options = Default_Data::options();
		self::$default_settings = Default_Data::settings();

	}

	/**
	 * [カスタマイザーのデータ] 初期セット
	 */
	public static function set_settings() {
		$db_data        = get_option( self::DB_NAME_CUSTOMIZER ) ?: array();
		self::$settings = array_merge( self::$default_settings, $db_data );
	}

	/**
	 * [カスタマイザーのデータ] データを個別でセット
	 */
	public static function set_setting( $key = null, $val = '' ) {
		if (  null === $key ) return;
		self::$settings[ $key ] = $val;
	}

	/**
	 * [カスタマイザーのデータ] 取得
	 *   キーが指定されていればそれを、指定がなければ全てを返す。
	 */
	public static function get_setting( $key = null ) {
		if ( null !== $key ) {
			return self::$settings[ $key ] ?: '';
		}
		return self::$settings;
	}

	/**
	 * [カスタマイザーのデータ] デフォルト値の取得
	 *   キーが指定されていればそれを、指定がなければ全てを返す。（カスタマイザーから使われる。）
	 */
	public static function get_default_setting( $key = null ) {
		if ( null !== $key ) {
			return self::$default_settings[ $key ] ?: '';
		}
		return self::$default_settings;
	}

}
