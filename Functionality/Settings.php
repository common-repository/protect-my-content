<?php
namespace ProtectMyContent\Functionality;

use ProtectMyContent\Components\Data;
class Settings
{

	protected $plugin_name;
	protected $plugin_version;

	protected $settings;

	protected $options_group = PROTECTMYCONTENT_OPTIONS_GROUP;

	public function __construct($plugin_name, $plugin_version)
	{
		$this->plugin_name = $plugin_name;
		$this->plugin_version = $plugin_version;

		$this->settings = (array) Data::get_data('settings');

		if ($this->settings) {
			add_action('admin_init', [$this, 'settings_init']);
		}

	}

	public function settings_init()
	{

		add_settings_section(
			'protect_my_content_section',
			'',
			[$this, 'protect_my_content_callback'],
			'protect-my-content'
		);

		if ($this->settings) {
			foreach ($this->settings as $setting) {
				add_settings_field(
					$setting['slug'],
					$setting['name'],
					[$this, "{$setting['type']}_field_callback"],
					'protect-my-content',
					'protect_my_content_section',
					[
						'slug' => $setting['slug'],
						'description' => $setting['description'],
						'checked'      => (!isset(get_option($this->options_group)[$setting['slug']]))
						? 0 : get_option($this->options_group)[$setting['slug']],
					]
				);

				register_setting('protect-my-content', $this->options_group);
			}
		}

	}

	public function protect_my_content_callback()
	{
		
	}

	public function checkbox_field_callback($args)
	{
		$options_group = $this->options_group;
		$slug = $args['slug'];
		$description = $args['description'];
		$checked = $args['checked'] ? 'checked="checked"' : '';

		echo sprintf(
			'<label for="%1$s"><input name="%1$s]" id="%1$s]" type="checkbox" value="1" %2$s} /> %3$s</label>',
			esc_attr("{$options_group}[{$slug}]"),
			esc_attr($checked),
			esc_attr($description),
		);

	}
}
