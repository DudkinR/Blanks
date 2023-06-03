<option 
value="<?php echo  $optionValue?>" 
class="icofont-<?php if(isset($name)) echo $name; else echo 'simple-smile';?>"
style="font-size: <?php if(isset($size)) echo $size;else echo 3;?>em; color: <?php if(isset($color)) echo $color;else echo 'black';?>;"
>
<?php echo $name?>
</option>