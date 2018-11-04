<?php
$action = home_url();
if(pll_current_language( 'slug' ) == 'en'){
    $action .= '/en';
}
?>
<!-- search -->
<form class="form-inline" method="get" action="<?php echo $action; ?>" role="search">
    <div class="form-group search-input-reveal">
        <label for="main-search-input">
            <input id="main-search-input" class="search-input form-control" type="search" name="s">
        </label>
    </div>
    <button type="button" class="search-trigger hidden-form fas fa-search"></button>
</form>
<!-- /search -->
