<?php

class WCFM_Elementor_Widget_StoreTabs extends WCFM_Elementor_Widget_StoreInfo {

    /**
     * Widget name
     *
     * @since 1.0.0
     *
     * @return string
     */
    public function get_name() {
        return 'wcfmem-store-tabs';
    }

    /**
     * Widget title
     *
     * @since 1.0.0
     *
     * @return string
     */
    public function get_title() {
        return __( 'Store Tabs', 'wc-frontend-manager-elementor' );
    }

    /**
     * Widget icon class
     *
     * @since 1.0.0
     *
     * @return string
     */
    public function get_icon() {
        return 'eicon-editor-list-ul';
    }
		

    /**
     * Widget keywords
     *
     * @since 1.0.0
     *
     * @return array
     */
    public function get_keywords() {
        return [ 'wcfm', 'store', 'vendor', 'tab', 'menu', 'items' ];
    }

		public function get_inline_css_depends() {
			return [
				[
					'name' => 'icon-list',
					'is_core_dependency' => true,
				],
			];
		}

    /**
     * Register widget controls
     *
     * @since 1.0.0
     *
     * @return void
     */
    protected function register_controls() {
    	  global $WCFM, $WCFMem;
    	  
        parent::register_controls();

        $this->remove_control( 'store_info' );

        $this->update_control(
            'icon_list',
            [
                'default' => json_decode(
                    $WCFMem->wcfmem_elementor()->dynamic_tags->get_tag_data_content( null, 'wcfmem-store-tabs' ),
                    true
                ),
            ]
        );

        $this->add_control(
            'tab_items',
            [
                'type'    => WCFM_Elementor_Control_DynamicHidden::CONTROL_TYPE,
                'dynamic' => [
                    'active'  => true,
                    'default' => $WCFMem->wcfmem_elementor()->dynamic_tags->tag_data_to_tag_text( null, 'wcfmem-store-tabs' )
                ]
            ],
            [
                'position' => [ 'of' => 'icon_list' ]
            ]
        );
    }

    /**
     * Set wrapper classes
     *
     * @since 1.0.0
     *
     * @return void
     */
    protected function get_html_wrapper_class() {
        return parent::get_html_wrapper_class() . ' wcfmem-store-tabs elementor-widget-' . parent::get_name();
    }

    /**
     * Render icon list widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @return void
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'icon_list', 'class', 'elementor-icon-list-items' );
        $this->add_render_attribute( 'list_item', 'class', 'elementor-icon-list-item' );

        if ( 'inline' === $settings['view'] ) {
            $this->add_render_attribute( 'icon_list', 'class', 'elementor-inline-items' );
            $this->add_render_attribute( 'list_item', 'class', 'elementor-inline-item' );
        }
        ?>
        <?php if ( ! empty( $settings['icon_list'] ) && ! empty( $settings['tab_items'] ) ): ?>
            <?php $tab_items = json_decode( $settings['tab_items'], true ); ?>
            <?php if ( is_array( $tab_items ) ): ?>
                <ul <?php echo $this->get_render_attribute_string( 'icon_list' ); ?>>
                    <?php
                    foreach ( $settings['icon_list'] as $index => $item ) :
                        $repeater_setting_key = $this->get_repeater_setting_key( 'text', 'icon_list', $index );

                        $this->add_render_attribute( $repeater_setting_key, 'class', 'elementor-icon-list-text' );

                        $this->add_inline_editing_attributes( $repeater_setting_key );

                        if ( $item['show'] ):
                            $tab_item = array_filter( $tab_items, function ( $list_item ) use ( $item ) {
                                return $list_item['key'] === $item['key'];
                            } );

                            if ( empty( $tab_item ) ) {
                                continue;
                            }

                            $tab_item = array_pop( $tab_item );

                            $text = $tab_item['text'];
                            $url  = $tab_item['url'];

                            if ( ! $text || ! $url ) {
                                continue;
                            }

                            $link_key = 'link_' . $index;

                            $this->add_render_attribute( $link_key, 'href', $url );
                        ?>
                            <li class="elementor-icon-list-item" >
                                <a <?php echo $this->get_render_attribute_string( $link_key ); ?>>
                                    <?php
                                    if ( ! empty( $item['icon'] ) ) :
                                        ?>
                                        <span class="elementor-icon-list-icon">
                                            <i class="<?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
                                        </span>
                                    <?php endif; ?>
                                    <span <?php echo $this->get_render_attribute_string( $repeater_setting_key ); ?>><?php echo $text; ?></span>
                                </a>
                            </li>
                        <?php
                        endif;
                    endforeach;
                    ?>
                </ul>
            <?php endif; ?>
        <?php endif; ?>
        <?php
    }

    /**
     * Render icon list widget output in the editor.
     *
     * Written as a Backbone JavaScript template and used to generate the live preview.
     *
     * @since 1.0.0
     *
     * @return void
     */
    protected function content_template() {
        ?>
        <#
            view.addRenderAttribute( 'icon_list', 'class', 'elementor-icon-list-items' );
            view.addRenderAttribute( 'list_item', 'class', 'elementor-icon-list-item' );

            if ( 'inline' == settings.view ) {
                view.addRenderAttribute( 'icon_list', 'class', 'elementor-inline-items' );
                view.addRenderAttribute( 'list_item', 'class', 'elementor-inline-item' );
            }
        #>
        <# if ( settings.icon_list && settings.tab_items ) { #>
            <# var tab_items = JSON.parse( settings.tab_items ); #>
            <ul {{{ view.getRenderAttributeString( 'icon_list' ) }}}>
            <# _.each( settings.icon_list, function( item, index ) {
                    var iconTextKey = view.getRepeaterSettingKey( 'text', 'icon_list', index );

                    view.addRenderAttribute( iconTextKey, 'class', 'elementor-icon-list-text' );

                    view.addInlineEditingAttributes( iconTextKey ); #>

                    <# if ( item.show ) { #>
                        <#
                            var tab_item = _.findWhere( tab_items, { key: item.key } );
                        #>
                        <li {{{ view.getRenderAttributeString( 'list_item' ) }}}>
                            <a href="{{ tab_item.url || '#' }}">
                                <# if ( item.icon ) { #>
                                <span class="elementor-icon-list-icon">
                                    <i class="{{ item.icon }}" aria-hidden="true"></i>
                                </span>
                                <# } #>
                                <span {{{ view.getRenderAttributeString( iconTextKey ) }}}>{{{ tab_item.text }}}</span>
                            </a>
                        </li>

                    <# } #>
                <#
                } ); #>
            </ul>
        <#  } #>
        <?php
    }
}
