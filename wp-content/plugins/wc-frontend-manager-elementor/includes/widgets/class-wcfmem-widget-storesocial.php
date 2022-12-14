<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;
use Elementor\Widget_Social_Icons;
use ElementorPro\Base\Base_Widget_Trait;

class WCFM_Elementor_Widget_StoreSocial extends Widget_Social_Icons {

  use PositionControls;
  use Base_Widget_Trait;
  /**
   * Widget name
   *
   * @since 1.0.0
   *
   * @return string
   */
  public function get_name() {
    return 'wcfmem-store-social';
  }
  

  /**
   * Widget title
   *
   * @since 1.0.0
   *
   * @return string
   */
  public function get_title() {
    return __( 'Store Social', 'wc-frontend-manager-elementor' );
  }

  /**
   * Widget icon class
   *
   * @since 1.0.0
   *
   * @return string
   */
  public function get_icon() {
    return 'eicon-social-icons';
  }

  public function get_inline_css_depends() {
		return [
			[
				'name' => 'social-icons',
				'is_core_dependency' => true,
			],
		];
	}

  

  /**
   * Widget categories
   *
   * @since 1.0.0
   *
   * @return array
   */
  public function get_categories() {
    return [ 'wcfmem-store-elements-single' ];
  }

  /**
   * Widget keywords
   *
   * @since 1.0.0
   *
   * @return array
   */
  public function get_keywords() {
    return [ 'wcfm', 'store', 'vendor', 'social', 'profile', 'icons' ];
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
    
    $this->add_control(
      'store_social_links',
      [
        'type'    => WCFM_Elementor_Control_DynamicHidden::CONTROL_TYPE,
        'dynamic' => [
          'default' => $WCFMem->wcfmem_elementor()->dynamic_tags->tag_data_to_tag_text( null, 'wcfmem-store-social-tag' ),
          'active'  => true,
        ]
      ],
      [
        'position' => [ 'of' => 'social_icon_list' ],
      ]
    );

    $this->add_position_controls();
  }

  /**
   * Set wrapper classes
   *
   * @since 1.0.0
   *
   * @return void
   */
  protected function get_html_wrapper_class() {
    return parent::get_html_wrapper_class() . ' wcfmem-store-social elementor-widget-' . parent::get_name();
  }

  /**
   * Frontend render method
   *
   * @since 1.0.0
   *
   * @return void
   */
  protected function render() {
    $settings = $this->get_settings_for_display();
    //print_r($settings); die;
    $store_social_links = json_decode( $settings['store_social_links'], true );
    
    if ( wcfmmp_is_store_page() && empty( $store_social_links ) ) {
      //echo '<div></div>';
      return;
    }

    $class_animation = '';

    if ( ! empty( $settings['hover_animation'] ) ) {
      $class_animation = ' elementor-animation-' . $settings['hover_animation'];
    }
    ?>
    <div class="elementor-social-icons-wrapper elementor-grid">
      <?php
      foreach ( $settings['social_icon_list'] as $index => $item ) {
        if ( wcfmmp_is_store_page() && empty( $store_social_links[ $item['social_icon']['value'] ] ) ) {
            continue;
        }

        $social = str_replace( 'fab fa-', '', $item['social_icon']['value'] );

        $link_key = 'link_' . $index;

        $this->add_render_attribute( $link_key, 'href', $store_social_links[ $item['social_icon']['value'] ] );

        if ( $item['link']['is_external'] ) {
          $this->add_render_attribute( $link_key, 'target', '_blank' );
        }

        if ( $item['link']['nofollow'] ) {
          $this->add_render_attribute( $link_key, 'rel', 'nofollow' );
        }
        ?>
        <span class="elementor-grid-item">
          <a class="elementor-icon elementor-social-icon elementor-social-icon-<?php echo $social . $class_animation; ?>" <?php echo $this->get_render_attribute_string( $link_key ); ?>>
            <span class="elementor-screen-only"><?php echo ucwords( $social ); ?></span>
            <i class="<?php echo $item['social_icon']['value']; ?>"></i>
          </a>
        </span>
      <?php } ?>
    </div>
    <?php
  }

  /**
   * Elementor builder content template
   *
   * @since 1.0.0
   *
   * @return void
   */
  protected function content_template() {
    parent::content_template();
  }

  /**
   * Render widget plain content
   *
   * @since 1.0.0
   *
   * @return void
   */
  public function render_plain_content() {}
}
