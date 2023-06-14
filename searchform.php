<form class="d-flex" action="<?php esc_url(home_url("/")) ?>" role="search">
    <div class="input-group">
        <input class="form-control" name="s" type="search" placeholder="Search..."
            value="<?php esc_attr(get_search_query()) ?>">
        <button class="btn btn-outline-secondary" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img"
                viewBox="0 0 24 24">
                <title>Search</title>
                <circle cx="10.5" cy="10.5" r="7.5"></circle>
                <path d="M21 21l-5.2-5.2"></path>
            </svg>
        </button>
    </div>
</form>