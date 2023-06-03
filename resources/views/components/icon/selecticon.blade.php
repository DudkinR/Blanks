<!-- Define a function to generate the icon option -->
<?php
function generateIconOption($name = 'simple-smile',$iconid=1, $size = 3, $color = 'black', $isSelected = false)
{
    $iconClass = "icofont-$name";
    $selected = $isSelected ? 'selected' : '';
    $optionValue = "icofont-$name-$size-$color"; // Generate a unique option value based on the icon properties
    return "<option value=\"$iconid\"  $selected class=\"$iconClass\" data-icon=\"$iconClass\" style=\"color: $color; font-size: {$size}em;\">$name</option>";
}
?>
<!-- Generate the select dropdown with icon options -->
<select class="form-select is-invalid" id="<?php echo $idname;?>" name="<?php echo $idname;?>" required="">
    @foreach($icons as $index =>$icon)
    <?php 
      $isSelected = $index === 0; // check if it's the first icon
    ?>
      <?php echo generateIconOption($icon->name,$icon->id, $size, $color, $isSelected);?>
    @endforeach
</select>
