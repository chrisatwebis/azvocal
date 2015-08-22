<?php
/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>



<div class="product grid_6">
    
    <?php $i = 0; ?>
    <?php foreach ($row->field_field_images as $value): ?>
        <?php
        if ($i == 0) {
            $pic_class = "product_img";
        } elseif ($i == 1) {
            $pic_class = "product_img_hover";
        }
        ?>
        <img class="<?php print $pic_class; ?>" src="<?php print image_style_url('shop',$row->field_field_images[$i]['raw']['uri']); ?>" alt="product">
        <?php $i++; ?>
    <?php endforeach; ?>   

    <?php if (!empty($fields['field_old_price']->content)): ?>
        <div class="sale">Sale</div>
    <?php endif; ?>
    <div class="product_inner">
        <?php print $fields['title']->content; ?>
        <div class="clearfix">
            <p class="price"> <?php print $fields['commerce_price']->content; ?> </p>
            <p class="rating"> <?php print $fields['field_five_start_voting']->content; ?> </p>
        </div>
    </div>
    <div class="product_meta clearfix">
        <a class="f_btn add_c"><span><i class="icon-shopping-cart"></i> <?php print $fields['add_to_cart_form']->content; ?></span></a>
        <a href="<?php print $fields['path']->content; ?>" class="f_btn"><span><i class="icon-align-justify"></i> Details </span></a>
    </div>
</div>