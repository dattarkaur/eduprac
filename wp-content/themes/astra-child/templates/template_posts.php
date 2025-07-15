<?php
  /* Template name: Posts template*/
  get_header();

$countries = get_field_object('field_680b66db2ef1c');

?>
<div id="message"></div> <!-- Response Message -->
<form method="post" id="ajaxPostForm" class="container mt-5 mb-5 p-5 border rounded shadow w-50 ">
    <div class="mb-3">
        <label for="post_title" class="form-label fw-bold h6">Job Title:</label>
        <input type="text" class="form-control" id="post_title" placeholder="Web Developer"
            style="width: 100%; height: 50px; ">
    </div>
    <div class="mb-3">
        <label for="post_content" class="form-label fw-bold h6">Job Description:</label>
        <textarea class="form-control" name="post_content" id="post_content" rows="4"
            placeholder="Write Job Description"></textarea>
    </div>
    <div class="mb-3">
        <label for="post_image" class="form-label"><b class="h5 fw-bold">Upload Profile<b></label>
        <input type="file" class="form-control" id="feature_image" name="feature_image">
    </div>

    <div class="row">
        <!-- Service Category Dropdown -->
        <div class="col-6 mb-3">
            <label for="service_category" class="form-label fw-bold h6">Category:</label>
            <select id="service_category" name="service_category" class="form-control "
                style="width: 100%; height: 50px; ">
                <option value="">Select Category </option>
                <?php
            $terms = get_terms(array(
                'taxonomy' => 'service_category',
                'hide_empty' => false
            ));
            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                }
            }
            ?>
            </select>
        </div>

        <!-- Job Type Dropdown -->
        <div class="col-6 mb-3">
            <label for="job-type" class="form-label fw-bold h6 ">Job Type:</label>
            <select id="job-type" name="job-type" class="form-control" style="width: 100%; height: 50px; ">
                <option value="">Select</option>
                <?php
            $terms = get_terms(array(
                'taxonomy' => 'job-type',
                'hide_empty' => false
            ));

            if (!empty($terms) && !is_wp_error($terms)) {
                foreach ($terms as $term) {
                    echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                }
            }
            ?>
            </select>
        </div>
    </div>

    <div class="mb-3">
        <label for="post_skills" class="form-label fw-bold h6">Skills:</label>
        <input type="text" class="form-control" name="post_skills" id="post_skills" placeholder="Skills"
            style="width: 100%; height: 50px; ">
    </div>

    <div class="row">
        <div class="col-6 mb-3">
            <label for="post_qualifications" class="form-label fw-bold h6">Qualifications:</label>
            <input type="text" class="form-control" name="post_qualifications" id="post_qualifications"
                placeholder="Qualifications" style="width: 100%; height: 50px; ">
        </div>
        <div class="col-6 mb-3">
            <label for="post_experience" class="form-label fw-bold h6">Experience:</label>
            <input type="text" class="form-control" name="post_experience" id="post_experience"
                placeholder="Your Experience" style="width: 100%; height: 50px; ">
        </div>
    </div>


    <label for="industry" class="form-label fw-bold h6">Industry:</label>
    <select id="industry" name="industry" class="form-control" style="width: 100%; height: 50px; ">
        <option value="">Select</option>
        <?php
            $terms = get_terms(array(
                'taxonomy' => 'industries',
                'hide_empty' => false
            ));

            if (!empty($terms) && !is_wp_error($terms)) {

                foreach ($terms as $term) {
                    echo '<option value="' . esc_attr($term->term_id) . '">' . esc_html($term->name) . '</option>';
                }
            }
            ?>
    </select>
    </div>

    <div class="row">
        <!-- Address Field -->
        <div class="col-6 mb-3">
            <label for="post_address" class="form-label fw-bold h6 mt-4">Address:</label>
            <input type="text" class="form-control" name="post_address" id="post_address" placeholder="Enter Address"
                style="width: 100%; height: 50px; ">
        </div>
        
<!-- country field -->

        <div class="col-6 mb-3">
            <label for="post_country" class="form-label fw-bold h6 mt-4">Country</label>
          <select name="post_country" id="post_country" style="width: 100%; height: 50px;">
            <?php
                $post_id = get_the_ID();
        

                if ($countries && !empty($countries['choices'])) {
                foreach ($countries['choices'] as $key => $label) {
                $selected = ($value == $key) ? 'selected' : '';
                echo "<option value=\"$key\" $selected>$label</option>";
                }
                } else {
                echo '<option disabled>No countries found or ACF field not set up correctly.</option>';
                }

            ?>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success w-50 mt-5" id="submitPostButton">Submit</button>
        </div>
</form>