jQuery(document).ready(function($) {
    $('#uploadButton').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("action", "update_user_profile");
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
            // console.log(response.data.message);
                $('#message').html(response.data.message); // Display success message
            },
        });
    })


    //reset password


    $('#reset-password-form').submit(function(e) {
        e.preventDefault(); // Prevent page reload
        var formData = new FormData(this);
        formData.append('action', 'reset_user_password'); // WordPress AJAX action
        $.ajax({
            type: 'POST',
            url: ajaxurl, // Defined in functions.php
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // console.log(response);
                $('#message').html(response.data.message);
            },
        });
    });

// posts

    $('#ajaxPostForm').submit(function(e) {
        e.preventDefault(); // Prevent page reload
        var formData = new FormData(); 
        formData.append("action", "create_custom_post");
        formData.append("post_title", $("#post_title").val().trim());
        formData.append("post_content", $("#post_content").val().trim());
        formData.append("feature_image", $("#feature_image")[0].files[0]);
        formData.append("service_category",$("#service_category").val().trim());
        formData.append("job-type",$("#job-type").val().trim());
        formData.append("post_skills", $("#post_skills").val().trim());
        formData.append("post_qualifications", $("#post_qualifications").val().trim());
        formData.append("post_experience", $("#post_experience").val().trim());
        formData.append("industry",$("#industry").val().trim());
        formData.append("post_address", $("#post_address").val().trim());
        formData.append("post_country", $("#post_country").val().trim());
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                //  console.log(response);
                $('#message').html(response.data.message);
                $("#ajaxPostForm")[0].reset();
                $("#feature_image").val("");
                },           
        });
    });


// searchbar

    $("#searchForm").on("keyup", function(e) {
        e.preventDefault();
        var searchQuery = $("#searchInput").val().trim();
        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: { action: "search_pages", query: searchQuery },
            success: function(response) {
                $("#searchResults").empty(); // Clear previous results

                if (response.success) {
                    response.data.results.forEach(function(item) {
                        $("#searchResults").append('<li><a href="#" class="search-item" data-link="' + item.page_link + '">' + item.page_title + '</a></li>');
                    });
                } else {
                    $("#searchResults").html("<li>No pages found</li>");
                }
            }
        });
    });

//  Capture Click Event on Search Results
    $(document).on("click", ".search-item", function(e) {
        e.preventDefault();
        var selectedPage = $(this).text();
        var selectedLink = $(this).data("link");

        $("#searchInput").val(selectedPage); // Set input value
        $("#searchForm").attr("data-selected-link", selectedLink); // Store link in form
        $("#searchResults").empty(); // Clear results after selection
    });

    //  Redirect on Form Submission
    $("#searchForm").submit(function(e) {
        e.preventDefault();
        var selectedLink = $(this).attr("data-selected-link");

        if (selectedLink) {
            window.location.href = selectedLink; // Redirect to selected page
        } else {
            alert("Please select a page before submitting."); // Prevent empty search submission
        }
    });


// search bar list

$('#searchFormList').submit(function(e) {
    e.preventDefault();
    let searchValue = $('#searchInput').val();

    $.ajax({
        url: ajaxurl,
        type: 'POST',
        data: {
            action: 'filter_services',
            category: searchValue
        },
        success: function(response) {
            if (response.success) {
                $('.service-list').html(response.data.html);
            } else {
                $('.service-list').html(response.data.message);
            }
        },
      
    });
});


//post practice

$('#PostPractice').submit(function(e) {
    e.preventDefault(); // Prevent page reload
    var formData = new FormData(); 
    formData.append("action", "custom_post");
    formData.append("post_title", $("#post_title").val().trim());
    formData.append("post_content", $("#post_content").val().trim());
    formData.append("post_image", $("#post_image")[0].files[0]);
    formData.append("products_category",$("#products_category").val().trim());
    formData.append("post_skills", $("#post_skills").val().trim());
    formData.append("post_qualifications", $("#post_qualifications").val().trim());
    formData.append("technology",$("#technology").val().trim());
    formData.append("post_address", $("#post_address").val().trim());
    formData.append("post_country", $("#post_country").val().trim());
    $.ajax({
        type: "POST",
        url: ajaxurl,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            //  console.log(response);
            $('#message').html(response.data.message);
            $("#PostPractice")[0].reset();
            $("#post_image").val("");
            },           
    });
});


$('#searchFormListPrac').submit(function(e) {
    e.preventDefault();
    let searchValue = $('#searchInput').val();

    $.ajax({
        url: ajaxurl,
        type: 'POST',
        data: {
            action: 'filter_Products',
            category: searchValue
        },
        success: function(response) {
            if (response.success) {
                $('.service-list').html(response.data.html);
            } else {
                $('.service-list').html(response.data.message);
            }
        },
      
    });
});


$('#edit-post-form').modal('show');


});

