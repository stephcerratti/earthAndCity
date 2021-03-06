<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/23/2017
 * Time: 2:44 PM
 */
?>

<?php
$args =
$tax = get_object_taxonomies (array ('ourimpact', "impact"));
$terms = get_terms($tax, array('hide_empty' => false,
                               'order' => 'zero-waste','local-food-procurement','systems-settings'  ));
?>
<!--
=================
===   TERMS   ===
=================
-->
<div class="flex font-xl color-black padding-bottom-small">
    <?php foreach ($terms as $term) : ?>
        <a href="<?php echo get_term_link($term); ?>"><?php echo $term->name ?></a>
    <?php endforeach; ?>
</div>
<!--
================================
====  Horizontal Underline  ====
================================
-->
<div class="line-placement">
    <div class="side-line"> </div>
<?php
if(get_query_var('impact') == 'zero-waste'){ ?>
    <div class="triangle"> </div>

<?php     }

$terms = get_terms("impact");

if(get_query_var('impact') == 'local-food-procurement'){ ?>
<div class="triangle1"> </div>
<?php }

$terms = get_terms("impact");
if(get_query_var('impact') == 'systems-thinking') { ?>
<div class="triangle2"> </div>
<?php }?>

</div>

<?php if ( have_posts() ) : ?>
    <header class="page-header textCenter">
        <?php
        $taxonomies = $wp_query->get_queried_object();

        ?>
    </header><!-- .page-header -->
<?php endif; ?>


<!--
=====================
===   Accordion   ===
=====================
-->
<div class="wrap flex-container">
    <div class="panel-group impact-accordion" id="accordion">
    <?php while ( have_posts() ) : the_post();


    ?>

            <div class="panel panel-default panel-size">
                <div class="panel-heading  color-white feature-title" id="heading-<?php the_ID();?>">

                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php the_ID();?>">
                          <header class="entry-header">
                            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                            <div class="feature-image" style="background-image: url('<?php echo $thumb['0'];?>');">
                                <h1><?php echo get_the_title()?></h1>
                            </div>
                          </header>
                        </a>

                </div>


                <div class="panel-collapse collapse<?php echo($the_query->current_post ==0 ? '':'');?>"
                     id="collapse-<?php the_ID();?>">
                    <div class="panel-body flex-div-content">
                        <?php
                            if(get_query_var('impact') == 'zero-waste'){ ?>
                                <div class="side-image">
                                    <img src="<?php echo (get_field('image_1')['url']);?>">
                                </div>
                       <?php     } ?>
                            <div class="padding-content-med">
                                <h3><?php echo get_field("title");?></h3>
                                <p><?php echo wpautop(get_field("body"),true);?></p>

                                <?php $terms = get_terms("impact");

                                    if(get_query_var('impact') == 'zero-waste'){ ?>
                                        <h3><?php echo get_field("title_2");?></h3>
                                        <p><?php echo wpautop(get_field("body_2"),true);?></p>
                                    <?php     } ?>

                            </div>

                    </div><!-- panel body -->

                </div><!-- panel collapse -->
            </div><!-- .panel .panel-default -->

    <?php endwhile; ?>
    </div><!-- flex align center-->
</div><!-- flex container -->
