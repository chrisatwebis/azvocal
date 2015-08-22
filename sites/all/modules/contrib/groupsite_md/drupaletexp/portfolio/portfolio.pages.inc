<?php
function portfolio_default_page($type = NULL) {
    global $user;
    $default_portfolio = $type;
    if (empty($type)) {
        $default_portfolio = theme_get_setting('default_portfolio', 'hoxa');
    }
    $portfolio_type_arr = array('3col', '4col', '2col');
    $build = array();
    if (in_array($default_portfolio, $portfolio_type_arr)) {
        $query = db_select('node', 'n')->extend('PagerDefault');
		//print "Test: ".theme_get_setting('default_nodes_portfolio', 'hoxa');
		if(theme_get_setting('default_nodes_portfolio', 'hoxa')=='ALL'){
			$nids = $query
					->fields('n', array('nid', 'sticky', 'created'))
					->condition('type', 'portfolio')
					->condition('status', 1)
					->orderBy('sticky', 'DESC')
					->orderBy('created', 'DESC')
					->limit(99999999)
					->addTag('node_access')
					->execute()
					->fetchCol();
		}else{
			$nids = $query
					->fields('n', array('nid', 'sticky', 'created'))
					->condition('type', 'portfolio')
					->condition('status', 1)
					->orderBy('sticky', 'DESC')
					->orderBy('created', 'DESC')
					->limit(theme_get_setting('default_nodes_portfolio', 'hoxa'))
					->addTag('node_access')
					->execute()
					->fetchCol();
			
		}
        if (isset($nids) && !empty($nids)) {
            $nodes = node_load_multiple($nids);
            $build += array('nodes' => array(
                    '#theme' => 'portfolio_' . $default_portfolio,
                    '#nodes' => $nodes,
                    )); //theme('portfolio_' . $default_portfolio, array('nodes' => $nodes));
            $build['pager'] = array(
                '#theme' => 'pager',
                '#weight' => 5,
            );

        } else {
 drupal_set_message(t('No project entries have been created.'));
        }
    } else {

 drupal_set_message(t('No project entries have been created 2.'));
    }

return $build; //return data
}