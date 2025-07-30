<?php

if ( class_exists( 'QuadLayers\\WP_Plugin_Table_Links\\Load' ) ) {
	add_action('init', function() {
		new \QuadLayers\WP_Plugin_Table_Links\Load(
			QLWAPP_PLUGIN_FILE,
			array(
				array(
					'text' => esc_html__( 'Settings', 'wp-whatsapp-chat' ),
					'url'  => admin_url( 'admin.php?page=wp-whatsapp-chat&tab=button' ),
					'target' => '_self',
				),
				array(
					'text' => esc_html__( 'Premium', 'wp-whatsapp-chat' ),
					'url'  => 'https://quadlayers.com/products/whatsapp-chat/?utm_source=qlwapp_plugin&utm_medium=plugin_table&utm_campaign=premium_upgrade&utm_content=premium_link',
					'color' => 'green',
					'target' => '_blank',
				),
				array(
					'place' => 'row_meta',
					'text'  => esc_html__( 'Support', 'wp-whatsapp-chat' ),
					'url'   => 'https://quadlayers.com/account/support/?utm_source=qlwapp_plugin&utm_medium=plugin_table&utm_campaign=support&utm_content=support_link',
				),
				array(
					'place' => 'row_meta',
					'text'  => esc_html__( 'Documentation', 'wp-whatsapp-chat' ),
					'url'   => 'https://quadlayers.com/documentation/whatsapp-chat/?utm_source=qlwapp_plugin&utm_medium=plugin_table&utm_campaign=documentation&utm_content=documentation_link',
				),
			)
		);
	});

}
