<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor employee widget.
 *
 * Elementor widget that displays the basic details of employees.
 *
 * @since 1.0.0
 */
class Bizworx_Employee extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve employee widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bizworx-employee';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve employee widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Employee', 'elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve employee widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-person';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the employee widget belongs to.
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
	 * Register employee widget controls.
	 *
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_timeline',
			[
				'label' => __( 'Employee', 'elementor' ),
			]
		);
		
		if ( \Bizworx_Tools::is_pro() ){
			$this->add_control(
				'style',
				[
					'label' => __( 'Style', 'elementor' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'style1' => __( 'Style 1', 'elementor' ),
						'style2' => __( 'Style 2', 'elementor' ),
					],
					'default' => 'style2',
				]
			);
		}		

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elementor' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'name',
			[
				'label' => __( 'Employee name', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Steve Smith', 'elementor' ),
				'placeholder' => __( 'Enter the name', 'elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'position',
			[
				'label' => __( 'Designation', 'elementor' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Web Developer', 'elementor' ),
				'placeholder' => __( 'Enter the designation', 'elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'facebook',
			[
				'label' => __( 'Facebook link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'twitter',
			[
				'label' => __( 'Twitter link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor' ),
				'separator' => 'before',
			]
		);
		$this->add_control(
			'linkedin',
			[
				'label' => __( 'Linkedin link', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor' ),
				'separator' => 'before',
			]
		);


		$this->add_control(
			'link',
			[
				'label' => __( 'Link (for person\'s name)', 'elementor' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor' ),
				'separator' => 'before',
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

		//General styles
		$this->start_controls_section(
			'section_general_style',
			[
				'label' => __( 'General', 'elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'event_title_color',
			[
				'label' 	=> __( 'Color', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .type-team.type-b.style2 .avatar::after,{{WRAPPER}} .type-team.type-b.style1 .team-thumb .team-social li:hover a' => 'background-color: {{VALUE}};',	
					'{{WRAPPER}} .type-team.type-b.style2 .team-thumb .team-social li:hover a,{{WRAPPER}} .type-team.type-b.style1 .team-social li a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .type-team.type-b.style1 .team-social li a' => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .type-team.type-b.style1 .team-social li a:hover' => 'color: #fff;',
				],
			]
		);

		$this->end_controls_section();
		//End general styles	

		//Employee name styles
		$this->start_controls_section(
			'section_employee_name_style',
			[
				'label' => __( 'Employee name', 'elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'employee_name_color',
			[
				'label' 	=> __( 'Color', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .type-team .team-content .name, {{WRAPPER}} .type-team .team-content .name a' => 'color: {{VALUE}};',				
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'employee_name_typography',
				'selector' 	=> '{{WRAPPER}} .type-team .team-content .name',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
		//End event date styles	


		//Employee position styles
		$this->start_controls_section(
			'section_employee_position_style',
			[
				'label' => __( 'Employee position', 'elementor' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'employee_position_color',
			[
				'label' 	=> __( 'Color', 'elementor' ),
				'type' 		=> Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .type-team .team-content .pos' => 'color: {{VALUE}};',				
				],
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'employee_position_typography',
				'selector' 	=> '{{WRAPPER}} .type-team .team-content .pos',
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();
		//End employee position styles	

	}

	/**
	 * Render employee widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings 	= $this->get_settings();
		( ( ! empty( $settings['style'] ) ) ? $style = $settings['style'] : $style = "" );
		
		?>

		<div class="type-team type-b <?php echo $style; ?>">
			<div class="team-thumb">
			    <div class="team-inner">
					<?php
					if ( ! empty( $settings['image']['url'] ) ) {
						$this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
						$this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
						$this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
					?>
					<div class="avatar">
						<img <?php echo $this->get_render_attribute_string( 'image' ); ?>/>
					</div>
					<?php
					}
					?>				
			    </div>
			    <div class="team-content">
			        <div class="name">
						<?php if ( ! empty( $settings['link']['url'] ) ) {
							$this->add_render_attribute( 'link', 'href', $settings['link']['url'] );

							if ( $settings['link']['is_external'] ) {
								$this->add_render_attribute( 'link', 'target', '_blank' );
							}

							if ( ! empty( $settings['link']['nofollow'] ) ) {
								$this->add_render_attribute( 'link', 'rel', 'nofollow' );
							}
							?>
							<a <?php echo $this->get_render_attribute_string( 'link' ); ?>><?php echo esc_html( $settings['name'] ); ?></a>
							<?php
						} else {
							echo esc_html( $settings['name'] );
						}
						?>
			        </div>
			        <div class="des"><?php echo esc_html( $settings['position'] ); ?></div>		
					<ul class="team-social">
						<li><a class="facebook" href="<?php echo esc_url( $settings['facebook']['url'] ); ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
						<li><a class="twitter" href="<?php echo esc_url( $settings['twitter']['url'] ); ?>" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
						<li><a class="linkedin" href="<?php echo esc_url( $settings['linkedin']['url'] ); ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
					</ul>	
			    </div>
			</div><!-- /.team-item -->
		</div>		

		<?php
	}

	/**
	 * Render employee widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _content_template() {
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Bizworx_Employee() );