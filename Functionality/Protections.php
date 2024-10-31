<?php
namespace ProtectMyContent\Functionality;

use ProtectMyContent\Components\Data;
class Protections
{

	protected $plugin_name;
	protected $plugin_version;

	public function __construct($plugin_name, $plugin_version)
	{
		$this->plugin_name = $plugin_name;
		$this->plugin_version = $plugin_version;

		$this->maybe_activate_protections();
	}

	private function maybe_activate_protections()
	{
		$settings = (array) Data::get_data('settings');

		if (!$settings) {
			return false;
		}

		foreach ($settings as $setting) {

			/**
			 * For each setting, look for their class and start it
			 */

			$setting_slug = $setting['slug'] ?? false;

			if (!$setting_slug) {
				return false;
			}

			$protections = get_option(PROTECTMYCONTENT_OPTIONS_GROUP);

			$protection_is_active = isset($protections[$setting_slug]) ? (bool) $protections[$setting_slug] : false;

			if (!$protection_is_active) {
				continue;
			}

			$class_name = '\\ProtectMyContent\Protections\\' . basename(str_replace('-', '', ucwords($setting_slug, '-')), '.php');

			if (class_exists($class_name)) {
				try {
					new $class_name($this->plugin_name, $this->plugin_version);
				} catch (\Throwable $e) {
					continue;
				}
			}
		}

	}
}
