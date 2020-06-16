<fieldset>
    <div class="form-group">
        <label for="item_name">Item Name *</label>
          <input type="text" name="item_name" value="<?php echo htmlspecialchars($edit ? $item['item_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Item Name" class="form-control" required="required" id = "f_name">
    </div> 

    <div class="form-group">
        <label for="address">Item Description</label>
          <textarea name="item_description" placeholder="For example: Steak is usually grilled, but can be pan-fried." class="form-control" id="item_description"><?php echo htmlspecialchars(($edit) ? $item['item_description'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div class="form-group">
        <label for="item_price">Item Price (per serving in '$')</label>
        <input type="text" name="item_price" value="<?php echo htmlspecialchars($edit ? $item['item_price'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Item Price" class="form-control" required="required" id="item_price">
    </div>

    <div class="form-group">
        <label for="item_image_url">Item Image URL</label>
        <input type="item_image_url" name="item_image_url" value="<?php echo htmlspecialchars($edit ? $item['item_image_url'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="https://example-recipe.com/Steak.jpg" class="form-control" required="required" id="item_image_url">
    </div>

    <div class="form-group">
        <label for="item_rating">Item Rating</label>
        <input name="item_rating" value="<?php echo htmlspecialchars($edit ? $item['item_rating'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Item Rating" class="form-control"  type="text" id="item_rating">
    </div>

    <div class="form-group">
        <label for="item_stock">Item Stock (available)</label>
        <input name="item_stock" value="<?php echo htmlspecialchars($edit ? $item['item_stock'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Item Stock" class="form-control" required="required" type="text" id="item_stock">
    </div>
    <br>
    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-success" >Submit <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>
