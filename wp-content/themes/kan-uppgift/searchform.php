<form role="search" method="get" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="<?php echo esc_attr( 'Search…', 'presentation' ); ?>" name="s" id="search-input" value="<?php echo esc_attr( get_search_query() ); ?>">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="search-submit" value="Search">Search</button>
</form>