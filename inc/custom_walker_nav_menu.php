<?php 
class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {

  /**
   * Unique id for dropdowns
   */
  public $submenu_unique_id = '';

  /**
   * Starts the list before the elements are added.
   * @see Walker::start_lvl()
   */
  public function start_lvl( &$output, $depth = 0, $args = array() ) {
      if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
          $t = '';
          $n = '';
      } else {
          $t = "\t";
          $n = "\n";
      }
      $indent = str_repeat( $t, $depth );

      $before_start_lvl = '<div class="megamenu">sssss';

      if($depth==0){
          $output .= "{$n}{$indent}{$before_start_lvl}<ul id=\"$this->submenu_unique_id\" class=\"container megamenu-background sub-menu dropdown-content\">{$n}";
      }
      else{
          $output .= "{$n}{$indent}s<ul id=\"$this->submenu_unique_id\" class=\"sub-menu dropdown-content\">{$n}";
      }

  }

  /**
   * Ends the list of after the elements are added.
   * @see Walker::end_lvl()
   */
  public function end_lvl( &$output, $depth = 0, $args = array() ) {
      if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
          $t = '';
          $n = '';
      } else {
          $t = "\t";
          $n = "\n";
      }
      $indent = str_repeat( $t, $depth );
      $after_end_lvl = '</div>asdadasd';

      if($depth==0){
          $output .= "$indent</ul>{$after_end_lvl}{$n}";
      }
      else{
          $output .= "$indent</ul>{$n}";
      }

  }

  /**
   * @see Walker::start_el()
   */
  public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
      if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
          $t = '';
          $n = '';
      } else {
          $t = "\t";
          $n = "\n";
      }
      $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;

      // set active class for current nav menu item
      if( $item->current == 1 ) {
          $classes[] = 'active';
      }

      // set active class for current nav menu item parent
      if( in_array( 'current-menu-parent' ,  $classes ) ) {
          $classes[] = 'active';
      }

      /**
       * Filters the arguments for a single nav menu item.
       */
      $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

      // add a divider in dropdown menus
      if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
          $output .= $indent . '<li class="divider">';
      } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
          $output .= $indent . '<li class="divider">';
      } else {
          $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

          //adding col-md-3 class to column
          if( in_array('menu-item-has-children', $classes ) ) {
              if( $depth === 1 ) {                    
                  $class_names = $class_names ? ' class="col-md-3 mega-menucolumn '.esc_attr( $class_names ) . '"' : '';
              } else {
                  $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
              }
          }else{
              $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
          }

          $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
          $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

          $output .= $indent . '<li' . $id . $class_names .'>';

          $atts = array();
          $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
          $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
          $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';

          if( in_array('menu-item-has-children', $classes ) ) {
              $atts['href']   = ' ';
              $this->submenu_unique_id = 'dropdown-'.$item->ID;
          } else {
              $atts['href']   = ! empty( $item->url ) ? $item->url  : '';
              $atts['class'] = '';
          }

          $atts['class'] .= 'menu-item-link-class ';

          $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

          $attributes = '';
          foreach ( $atts as $attr => $value ) {
              if ( ! empty( $value ) ) {
                  $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                  $attributes .= ' ' . $attr . '="' . $value . '"';
              }
          }

          if( ! in_array( 'icon-only' , $classes ) ) {

              $title = apply_filters( 'the_title', $item->title, $item->ID );

              $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
          }

          $item_output = $args->before;
          $item_output .= '<a'. $attributes .'>';

          // set icon on left side
          if( !empty( $classes ) ) {
              foreach ($classes as $class_name) {
                  if( strpos( $class_name , 'fa' ) !== FALSE ) {
                      $icon_name = explode( '-' , $class_name );
                      if( isset( $icon_name[1] ) && !empty( $icon_name[1] ) ) {
                          $item_output .= '<i class="fa fa-'.$icon_name[1].'" aria-hidden="true"></i> ';
                      }
                  }
              }
          }

          $item_output .= $args->link_before . $title . $args->link_after;

          if( in_array('menu-item-has-children', $classes) ){
              if( $depth == 0 ) {
                  $item_output .= ' <i class="fa fa-bolt" aria-hidden="true"></i>';
              }
          }

          $item_output .= '</a>';
          $item_output .= $args->after;

          $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
      }
  }

  /**
   * Ends the element output, if needed.
   *
   */
  public function end_el( &$output, $item, $depth = 0, $args = array() ) {
      if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
          $t = '';
          $n = '';
      } else {
          $t = "\t";
          $n = "\n";
      }
      $output .= "</li>{$n}";
  }

} //