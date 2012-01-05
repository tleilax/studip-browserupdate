<?php
/**
 * BrowserUpdatePlugin.class.php
 *
 * To show the information bar in current browsers and reset css, supply
 * parameter ?buforce
 *
 * Browser images (c) morcha.net
 *
 * @author    Jan-Hendrik Willms <tleilax+studip@gmail.com>
 * @copyright UOL
 * @version   1.0.1
 */

class BrowserUpdatePlugin extends StudIPPlugin implements SystemPlugin {

	const CONFIG_KEY = 'PLUGIN_BROWSERUPDATE_HIDDEN';
	const CSS        = '/assets/browser-update.css';

	private static $browser_tests = array(
		'~Chrome/(\d+(?:\.\d+)*)~'          => '15',
		'~Firefox/(\d+(?:\.\d+)*)~'         => '8',
		'~MSIE (\d+(?:\.\d+)*)~'            => '8',
		'~Opera/(\d+(?:\.\d+)*)~'           => '11',
		'~Version/(\d+(?:\.\d+)*).*Safari~' => '5.1',
	);

	private $config;

	public function __construct() {
		parent::__construct();

		// Get user config
		$this->config = UserConfig::get($GLOBALS['auth']->auth['uid']);
		$hidden = $this->config[self::CONFIG_KEY];
		if ($force = isset($_GET['buforce'])) {
			$this->config->delete(self::CONFIG_KEY);
		}

		// If not hidden by config, test for outdated browser
		$valid = false;
		if (!(bool)$hidden) {
			foreach (self::$browser_tests as $regexp => $min_version) {
				// Test regexp against user agent, returns version on match
				if (preg_match($regexp, $_SERVER['HTTP_USER_AGENT'], $match)) {
				    $valid = true;
					$hidden = version_compare($match[1], $min_version, '>=');
					break;
				}
			}
		}

		// Leave if browser is not outdated
		if (!$force and $valid and $hidden) {
			return;
		}

		// Inject the information bar
		$factory = new Flexi_TemplateFactory($this->getPluginPath().'/templates/');
		PageLayout::addBodyElements($factory->render('browser-update', array(
			'image_dir'  => $this->getPluginURL().'/assets/images/',
			'plugin_url' => PluginEngine::getLink($this, array(), 'hide'),
		)));

		// Add css to site header (create if neccessary)
		if ($force or !file_exists($this->getPluginPath().self::CSS)) {
			$css = $factory->render('css');
			file_put_contents($this->getPluginPath().self::CSS, $css);
		}
		PageLayout::addStylesheet($this->getPluginURL().self::CSS);
	}

	public function perform($unconsumed_path) {
		$this->config->store(self::CONFIG_KEY, 'hidden');

		$url = Request::get('return', URLHelper::GetURL('index.php'));
		Header('Location: '.$url);
		die;
	}
}
