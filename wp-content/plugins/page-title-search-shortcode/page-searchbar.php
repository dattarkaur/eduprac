<?php
/*
Plugin Name:  Searching pages
Description:  A short little description of the plugin. It will be displayed on the Plugins page in WordPress admin area.
Version:      1.0
Author:       Page-search
*/
?>
<?php
function my_custom_shortcode() {
    return "<h3 style='color:green;'>Hello, this is my custom plugin!</h3>";
}
add_shortcode('custom_hello', 'my_custom_shortcode');
?>

<?php
function testing_shortcode() {
    ob_start(); // Start output buffering

    ?>
<!-- //html code -->
<form id="searchForm" class="search-bar mt-5 mb-5"
    style="display: flex; flex-direction: column; align-items: center; justify-content: center; width: 50%; margin: auto;">

    <input type="text" id="searchInput" placeholder="Search Pages..." autocomplete="off"
        style="width: 100%; max-width: 400px; padding: 10px; font-size: 16px; margin-bottom: 10px;">

    <button type="submit"
        style="padding: 10px 20px; font-size: 16px; background-color:rgb(76, 168, 97); color: white; border: none; cursor: pointer;">
        Search
    </button>

    <!-- Where results will be displayed -->
    <ul id="searchResults"
        style="list-style-type: none; padding: 0; width: 100%; max-width: 400px; text-align: left; margin-top: 10px;">
    </ul>
</form>

<!-- //ajax code-->

<script>
    jQuery(document).ready(function ($) {
        $("#searchForm").on("keyup", function (e) {
            e.preventDefault();
            var searchQuery = $("#searchInput").val().trim();
            $.ajax({
                type: "POST",
                url: ajaxurl,
                data: { action: "search_pages", query: searchQuery },
                success: function (response) {
                    $("#searchResults").empty(); // Clear previous results

                    if (response.success) {
                        response.data.results.forEach(function (item) {
                            $("#searchResults").append('<li><a href="#" class="search-item" data-link="' + item.page_link + '">' + item.page_title + '</a></li>');
                        });
                    } else {
                        $("#searchResults").html("<li>No pages found</li>");
                    }
                }
            });
        });

        //  Capture Click Event on Search Results
        $(document).on("click", ".search-item", function (e) {
            e.preventDefault();
            var selectedPage = $(this).text();
            var selectedLink = $(this).data("link");

            $("#searchInput").val(selectedPage); // Set input value
            $("#searchForm").attr("data-selected-link", selectedLink); // Store link in form
            $("#searchResults").empty(); // Clear results after selection
        });

        //  Redirect on Form Submission
        $("#searchForm").submit(function (e) {
            e.preventDefault();
            var selectedLink = $(this).attr("data-selected-link");

            if (selectedLink) {
                window.location.href = selectedLink; // Redirect to selected page
            } else {
                alert("Please select a page before submitting."); // Prevent empty search submission
            }
        });
    });
</script>




<?php
    return ob_get_clean(); // Return the buffered output as a string
}




//  Register the shortcode outside of the function
add_shortcode('just_test', 'testing_shortcode');
?>