<div class="container">
    <h2 class="text-center">
        <?php echo($title); ?>
    </h2>

    <?php echo(validation_errors()); ?>

    <?php echo (form_open_multipart('menu_items/create')); ?>
        <div class="form-group">
            <label for="food_item">Name of the food item</label>
            <input type="text" name='name' required class="form-control" id="food_item" placeholder="Food item name">
        </div>
        <div class="form-group">
            <label for="food_description">Food Description</label>
            <textarea minlength="170" name='description' required class="form-control" id="food_description" rows="3" 
            placeholder="Minimum 170 characters"></textarea>
        </div>
        <div class="form-group">
            <label for="food_type">Type of food (Veg / Non-Veg)</label>
            <select class="form-control" id="food_type" required name='type'>
                <option value="Veg">Veg</option>
                <option value="Non-Veg">Non-Veg</option>
            </select>
        </div>
        <div class="form-group">
            <label for="food_price">Set the price for your food item</label>
            <input type="number" name='price' required class="form-control" id="food_price" placeholder="Food item price">
        </div>
        <div class="form-group">
            <label for="food_image">Upload Image</label>
            <input type="file" class="form-control-file" id="food_image" name='image'>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>