<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor testimonials widget.
 *
 * Elementor widget that displays a testimonials of the clients comments.
 *
 * @since 1.0.0
 */
class Bizworx_Testimonials extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve testimonials widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bizworx-testimonials';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve testimonials widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Testimonials', 'elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve testimonials widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-testimonial';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the testimonials widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'bizworx-tools' ];
	}

	/**
	 * Register testimonials widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_testimonials',
			[
				'label' => __( 'Testimonials', 'elementor' ),
			]
		);
		
		if ( \Bizworx_Tools::is_pro() ){
			$this->add_control(
				'style',
				[
					'label' => __( 'Style', 'elementor' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'style1' => __( 'Default', 'elementor' ),
						'style2' => __( 'Style 2', 'elementor' ),
					],
					'default' => 'style2',
				]
			);
		}
		
		$this->add_control(
			'testimonials_list',
			[
				'label' => __( 'Features list', 'elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'name' 			=> __( 'Steve Smith', 'elementor' ),
						'position' 		=> __( 'Developer', 'elementor' ),
						'testimonial' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id purus neque. Curabitur pulvinar elementum neque in dictum. Sed non lectus nec tortor iaculis tincidunt.', 'elementor' ),				
					],
					[
						'name' 			=> __( 'Clara Jhonson', 'elementor' ),
						'position' 		=> __( 'Manager', 'elementor' ),
						'testimonial' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id purus neque. Curabitur pulvinar elementum neque in dictum. Sed non lectus nec tortor iaculis tincidunt.', 'elementor' ),
					],
					[
						'name' 			=> __( 'Richard Walton', 'elementor' ),
						'position' 		=> __( 'Accounts', 'elementor' ),
						'testimonial' 	=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id purus neque. Curabitur pulvinar elementum neque in dictum. Sed non lectus nec tortor iaculis tincidunt.', 'elementor' ),
					],
				],
				'fields' => [
					[
						'name' => 'image',
						'label' => __( 'Client Image', 'elementor' ),
						'type' => Controls_Manager::MEDIA,
						'label_block' => true,
						'placeholder' => __( 'Client Image', 'elementor' ),
						'default' => [
										'url' => Utils::get_placeholder_image_src(),
									],
					],					
					[
						'name' => 'name',
						'label' => __( 'Client name', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Client name', 'elementor' ),
						'default' => __( 'Steve Smith', 'elementor' ),
					],
					[
						'name' => 'position',
						'label' => __( 'Client position', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
						'placeholder' => __( 'Client position', 'elementor' ),
						'default' => __( 'Developer', 'elementor' ),
					],
					[
						'name' => 'testimonial',
						'label' => __( 'Testimonial', 'elementor' ),
						'type' => Controls_Manager::WYSIWYG,
						'label_block' => true,
						'placeholder' => __( 'Testimonial', 'elementor' ),
						'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id purus neque. Curabitur pulvinar elementum neque in dictum. Sed non lectus nec tortor iaculis tincidunt.', 'elementor' ),
					],

				],
			]
		);

		$this->add_control(
			'view',
			[
				'label' => __( 'View', 'elementor' ),
				'type' => Controls_Manager::HIDDEN,
				'default' => 'traditional',
			]
		);

		$this->end_controls_section();

		//End name styles	

		//Name styles
		$this->start_controls_section(
			'section_name_style',
			[
				'label' => __( 'Name', 'elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'name_color',
			[
				'label' 	=> __( 'Color', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-content .client-name' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'name_typography',
				'selector' 	=> '{{WRAPPER}} .testimonials-content .client-name',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
		//End name styles	

		//Position styles
		$this->start_controls_section(
			'section_position_style',
			[
				'label' => __( 'Position', 'elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'position_color',
			[
				'label' 	=> __( 'Color', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-content .client-pos' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'position_typography',
				'selector' 	=> '{{WRAPPER}} .testimonials-content .client-pos',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
		//End position styles	

		//Position styles
		$this->start_controls_section(
			'section_testimonial_style',
			[
				'label' => __( 'Testimonial', 'elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'testimonial_color',
			[
				'label' 	=> __( 'Color', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonials-content .client-comment' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'testimonial_typography',
				'selector' 	=> '{{WRAPPER}} .testimonials-content .client-comment',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
		//End position styles	

	}

	/**
	 * Render testimonials widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings 	= $this->get_settings();
		( ( ! empty( $settings['style'] ) ) ? $style = $settings['style'] : $style = "" );
		(( \Bizworx_Tools::is_pro() ) ? $pro_class = " pro-testimonials owl-carousel" : $pro_class = " default-testimonials" );

		?>

		<div class="bizworx_testimonials <?php echo $style; ?> ">
			<div class="roll-testimonials owl-testimonials <?php echo $pro_class; ?>" data-autoplay="5000">
				<?php foreach ( $settings['testimonials_list'] as $testimonials => $item ) : ?>
					<div class="testimonials-content item">
						<div class="client-info">
							<div class="avatar">
								<img src="<?php echo esc_url( $item['image']['url'] ); ?>"/>
							</div>
							<div class="client">
								<h5 class="client-name"><?php echo esc_html( $item['name'] ); ?></h5>
								<div class="client-pos"><?php echo esc_html( $item['position'] ); ?></div>
							</div>
							<?php if ( $item['image']['url'] ) : ?>
							<?php endif; ?>
						</div>
						<div class="client-comment"><?php echo wp_kses_post( $item['testimonial'] ); ?></div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>	

		<?php
	}

	/**
	 * Render testimonials widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Bizworx_Testimonials() );