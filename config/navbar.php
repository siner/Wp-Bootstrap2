<?php 
class WPBootstrap2_Walker_Nav_Menu extends Walker_Nav_Menu {
  
  function walk($elements,$to_depth)
  {
  	$menu = array();
		foreach ($elements as $element):
			$item = array(
				'url' => $element->url,
				'title' => $element->title,
				'classes' => $element->classes
			);
			
			if (in_array('current-menu-parent',$element->classes) || in_array('current-menu-item',$element->classes)):
				$item['classes'][]='active';
			endif;
			
			if ($element->menu_item_parent != 0):
				$menu[$element->menu_item_parent]['classes'][]='dropdown';
				$menu[$element->menu_item_parent]['a_class']='dropdown-toggle';
				$menu[$element->menu_item_parent]['a_data-toggle']='dropdown';
				$menu[$element->menu_item_parent]['caret']='<b class="caret"></b>';
				$menu[$element->menu_item_parent]['container_class']='dropdown-menu';
				$menu[$element->menu_item_parent]['childs'][] = $item;
			else:
				$menu[$element->ID] = $item;
			endif;
			
		endforeach;


		echo '<ul class="nav">';
		foreach ($menu as $item):
		
				$classes='';
				foreach ($item['classes'] as $class): $classes.=$class.' '; endforeach; trim($classes);
				
				echo '<li class="'.$classes.'">';
					if ($item['a_class']):
						echo '<a href="'.$item['url'].'" class="'.$item['a_class'].'" data-toggle="'.$item['a_data-toggle'].'">'.$item['title'].' '.$item['caret'].'</a>';
					else:
						echo '<a href="'.$item['url'].'">'.$item['title'].'</a>';					
					endif;
				
					if ($item['container_class']): 
						echo '<ul class="'.$item['container_class'].'">';
							
							foreach($item['childs'] as $child):
							
								$classes2='';
								foreach ($child['classes'] as $class): $classes2.=$class.' '; endforeach; trim($classes);
								
								echo '<li class="'.$classes2.'"><a href="'.$child['url'].'">'.$child['title'].'</a>';
							
							endforeach;
						
						echo '</ul>'; 
					endif;
				
				echo '</li>';
		
		endforeach;
		echo '</ul>';		
	}
}



function wpbootstrap2_topnavbar_search_form() {

    echo '
		    <form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" class="navbar-search pull-right">
			    <input class="search-query" type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search' , 'nakeme' ) . '" />
		    </form>
    ';
}
