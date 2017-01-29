<?php

namespace Drupal\drupal_ng\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'jQueryBlock' block.
 *
 * @Block(
 *  id = "j_query_block",
 *  admin_label = @Translation("J query block"),
 * )
 */
class jQueryBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['j_query_block']['#markup'] = 
            
            '<div id="accordion1">
    
<h3><a href="#">Section 1</a></h3>

    <div>
        <p>Section 1 Content
            <br />This is the jQuery Accordion Widget.
            <br />See Section 3 to find out why this is so tall.
            <br />Or we could have set the autoheight option to false $("#accordion").accordion({ autoHeight: false});
            <br />
            <br />Documentation: <a href="http://docs.jquery.com/UI/Accordion#option-autoHeight">see the autoheight parameter</a>

        </p>
    </div>
    	<h3><a href="#">Section 2</a></h3>

    <div>
        <p>Section 2 Content
            <br />Use this when you have multiple sections and want only one visible at a time.
            <br />
            <br />In this example you can close all the sections because the collapsible option is set to true
            <br />
            <br />$("#accordion").accordion({ collapsible: true });
            <br />
            <br />Try it. Click the bar above that says "Section 2"</p>
    </div>
    	<h3><a href="#">Section 3</a></h3>

    <div>
        <p>Section 3 Content
            <br />Use caution - and notice that if you have really long content it may be difficult to see the accordion section links. And the longest section sets the height for all of the sections.
            <br /><a href="http://huwshimi.com/comic/"><img src="http://dotnet.tech.ubc.ca/CourseWiki/images/a/a5/You_must_be_this_tall.png" style="border:none;width:300px"/></a>

        </p>
    </div>
    	<h3><a href="#">Section 4</a></h3>

    <div>
        <p>Section 4 Content
            <br />Thanks for reading all four sections.</p>
    </div>
</div>' ; 
    
    $build['j_query_block']['#attached']['library'][] = 'drupal_ng/angularjs';
    $build['j_query_block']['#attached']['library'][] = 'drupal_ng/drupal_ng';
    $build['j_query_block']['#attached']['library'][] = 'drupal_ng/angular.angularjs';

    return $build;
  }

}
