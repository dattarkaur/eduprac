<?php
  /* Template name: searchbar template*/
  get_header();
?>
<form id="searchForm" class="search-bar mt-5 mb-5" 
    style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 50%; margin: auto;">
    
    <input type="text" id="searchInput" placeholder="Search Pages..." autocomplete="off" 
        style="width: 100%; max-width: 400px; padding: 10px; font-size: 16px; margin-bottom: 10px;">
   
    <button type="submit" style="padding: 10px 20px; font-size: 16px; background-color:rgb(76, 168, 97); color: white; border: none; cursor: pointer;">
        Search
    </button>

    <!-- Where results will be displayed -->
    <ul id="searchResults" style="list-style-type: none; padding: 0; width: 100%; max-width: 400px; text-align: left; margin-top: 10px;"></ul>
</form>

<?php
get_footer();
?>
