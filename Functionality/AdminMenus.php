<?php

namespace ProtectMyContent\Functionality;

class AdminMenus
{

	protected $plugin_name;
	protected $plugin_version;

	public function __construct($plugin_name, $plugin_version)
	{
		$this->plugin_name = $plugin_name;
		$this->plugin_version = $plugin_version;

		add_action('admin_menu', [$this, 'add_admin_menus']);
	}

	public function add_admin_menus()
	{

		add_options_page(
			__('Content Protection', 'protect-my-content'),
			__('Content Protection', 'protect-my-content'),
			'manage_options',
			'protect-my-content',
			function () {
				$this->display_template('settings');
			},
			6
		);
	}

	private function display_template(string $template)
	{
?>
		<div class="wrap">
			<h1><?php esc_html_e('Content Protection', 'protect-my-content'); ?></h1>

			<form method="POST" action="options.php">
				<?php
				settings_fields('protect-my-content');
				do_settings_sections('protect-my-content');
				submit_button();
				?>
			</form>
		</div>
<?php
	}
}
