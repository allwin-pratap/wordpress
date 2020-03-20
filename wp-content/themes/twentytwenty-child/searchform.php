<form role="search" method="get" class="searchform group" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group search-box">
        <input type="search" class="search-field" 
                placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder' ) ?>"
                value="<?php echo get_search_query() ?>" name="s"
                title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>"/>
        <button class="btn btn-color btn-hover" type="button"><i class="fa fa-search " aria-hidden="true"></i></button>
    </div>
</form>
