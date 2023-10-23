<!---------- Banner Section Start ---------------->
<section class="h-1-banner h-2-banner mt-5">
    <div class="container">
        <div class="h-2-banner-text">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <?php
                    $banner_title = site_phrase(get_frontend_settings('banner_title'));
                    $banner_title_arr = explode(' ', $banner_title);
                    ?>
                    <h1>
                        <?php
                        foreach ($banner_title_arr as $key => $value) {
                            if ($key == count($banner_title_arr) - 1) {
                                echo '<span>' . $value . '</span>';
                            } else {
                                echo $value . ' ';
                            }
                        }
                        ?>
                    </h1>
                    <p><?php echo site_phrase(get_frontend_settings('banner_sub_title')); ?></p>
                    <div class="h-2-search-bar">
                        <form action="<?php echo site_url('ebook'); ?>" method="get">
                            <input class="form-control" type="text" placeholder="<?php echo get_phrase('What do you want to learn'); ?>" name="search">
                            <button class="search-btn" type="submit"><i class="fa fa-search"></i><?php echo get_phrase('Search') ?></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
            <div class="banner-image">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <div class="image-1">
                            <img src="<?php echo site_url('assets/frontend/default-new/'); ?>image/banner-man-1.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <div class="image-1 image-bottom">
                            <img src="<?php echo site_url('assets/frontend/default-new/'); ?>image/banner-man-2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <div class="image-3 image-bottom">
                            <img src="<?php echo site_url('assets/frontend/default-new/'); ?>image/banner-man-3.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6">
                        <div class="image-3">
                            <img src="<?php echo site_url('assets/frontend/default-new/'); ?>image/banner-man-4.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="world-class mb-0">
    <div class="container">
        <div class="world-class-content">
            <div class="row">
                <div class="col-lg-3">
                    <h1>
                        <?php
                        $we_provides = explode(' ', get_phrase('We Provides you World Class Performance'));
                        foreach ($we_provides as $key => $value) {
                            if ($key == 0) {
                                echo '<span>' . $value . '</span>';
                            } else {
                                echo ' ' . $value;
                            }
                        }
                        ?>
                        <span>.</span>
                    </h1>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-4">
                    <div class="world-cls-card">
                        <div class="image-1">
                            <img src="<?php echo site_url('assets/frontend/default-new/'); ?>image/1.png" alt="">
                        </div>
                        <?php
                        //$status_wise_courses = $this->crud_model->get_status_wise_courses_front();
                        $number_of_courses = $this->ebook_model->get_status_wise_ebooks_for_instructor(1, true)->num_rows();
                        ?>
                        <h4><?php echo $number_of_courses . ' ' . site_phrase('online_courses'); ?></h4>
                        <h6><?php echo site_phrase('explore_a_variety_of_fresh_topics'); ?></h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-4">
                    <div class="world-cls-card">
                        <div class="image-2">
                            <img src="<?php echo site_url('assets/frontend/default-new/'); ?>image/2.png" alt="">
                        </div>
                        <h4><?php echo site_phrase('expert_instruction'); ?></h4>
                        <h6><?php echo site_phrase('find_the_right_course_for_you'); ?></h6>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-4">
                    <div class="world-cls-card">
                        <div class="image-3">
                            <img src="<?php echo site_url('assets/frontend/default-new/'); ?>image/3.png" alt="">
                        </div>
                        <h4><?php echo site_phrase('Smart solution'); ?></h4>
                        <h6><?php echo site_phrase('learn_on_your_schedule'); ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!---------- Banner Section End ---------------->

<!-- Start Upcoming Courses -->

<!-- End Upcoming Courses -->

<!---------- Top Categories Start ------------->
<section class="courses h-2-courses pb-2 pt-2">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <h1 class="text-center mt-4"><?php echo site_phrase('top_categories'); ?></h1>
                <p class="text-center mt-4 mb-4"><?php echo site_phrase('These_are_the_most_popular_courses_among_Listen_Courses_learners_worldwide') ?></p>
            </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="h-2-top-full">
            <div class="row justify-content-center">
                <?php $top_categories = $this->ebook_model->get_top_categories(12); ?>
                <?php foreach ($top_categories as $category) : ?>
                    <?php $category_details = $this->ebook_model->get_category_details_by_id($category['category_id'])->row_array(); ?>
                    <div class="col-lg-2 col-md-3 col-sm-3 col-4 mb-3">
                        <div class="h-2-top-body" onclick="redirectTo('<?php echo site_url('ebook?category=' . $category_details['slug']); ?>')">
                            <div class="h-2-top" style="width: 150px !important;height: 150px !important;">
                                <a href="<?php echo site_url('ebook?category=' . $category_details['slug']); ?>">
                                    <img  style="width: 100px !important;height: 100px !important;" src="<?php echo base_url('uploads/ebook/thumbnails/category_thumbnails/' . $category_details['thumbnail']); ?>" alt="<?php echo $category_details['title']; ?>">
                                </a>
                            </div>
                            <a href="<?php echo site_url('ebook?category=' . $category_details['slug']); ?>"><?php echo $category_details['title']; ?></a>
                            <p><?php echo $category['ebook_number'] . ' ' . site_phrase('Ebooks'); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>
<!---------- Top Categories end ------------->
<!---------- Top courses Section start --------------->

<!---------- Top courses Section End --------------->

<!---------- Latest courses Section start --------------->
<!---------- Latest courses Section End --------------->

<!---------  Expert Instructor Start ---------------->

<!---------  Expert Instructor end ---------------->

<!---------  Motivetional Speech Start ---------------->
<?php $motivational_speechs = json_decode(get_frontend_settings('motivational_speech'), true);
$motivational = false;
foreach ($motivational_speechs[$this->session->userdata('language')] as $item) {
    if ($item['status'] == '1') {
        $motivational = true;
        break;
    }
}
if ($motivational) : ?>
    <section class="expert-instructor top-categories pb-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <h1 class="text-center mt-4"><?php echo get_phrase('Think more clearly'); ?></h1>
                    <p class="text-center mt-4 mb-4"><?php echo get_phrase('Gather your thoughts, and make your decisions clearly') ?></p>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <ul class="speech-items">
                <?php $i = 0;
                foreach ($motivational_speechs[$this->session->userdata('language')] as $key => $motivational_speech) : ?>
                    <?php if ($motivational_speech['status'] == '1') : ?>
                        <li>
                            <div class="speech-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-md-5">
                                        <div class="speech-item-img">
                                            <img src="<?php echo site_url('uploads/system/motivations/' . $motivational_speech['image']) ?>" alt="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-7">
                                        <div class="speech-item-content">
                                            <p class="no"><?php echo ++$i; ?></p>
                                            <div class="inner">
                                                <h4 class="title">
                                                    <?php echo $motivational_speech['title']; ?>
                                                </h4>
                                                <p class="info">
                                                    <?php echo nl2br($motivational_speech['description']); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>
<!---------  Motivetional Speech end ---------------->

<?php $website_faqs = json_decode(get_frontend_settings('website_faqs'), true); ?>
<?php if ($website_faqs[$this->session->userdata('language')][0]['question'] != '') : ?>
    <!---------- Questions Section Start  -------------->
    <section class="faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <h1 class="text-center mt-4"><?php echo get_phrase('Frequently Asked Questions') ?></h1>
                    <p class="text-center mt-4 mb-5"><?php echo get_phrase('Have something to know?') ?> <?php echo get_phrase('Check here if you have any questions about us.') ?></p>
                </div>
                <div class="col-lg-2"></div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center pb-5">
                    <img width="450px" src="<?php echo site_url('assets/frontend/default-new/image/faq2.jpg') ?>">
                </div>
                <div class="col-md-6">
                    <div class="faq-accrodion mb-0">
                        <div class="accordion" id="accordionFaq">
                            <?php foreach ($website_faqs[$this->session->userdata('language')] as $key => $faq) : ?>
                                <?php if ($key > 4) break; ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="<?php echo 'faqItemHeading' . $key; ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#<?php echo 'faqItempanel' . $key; ?>" aria-expanded="true" aria-controls="<?php echo 'faqItempanel' . $key; ?>">
                                            <?php echo $faq['question']; ?>
                                        </button>
                                    </h2>
                                    <div id="<?php echo 'faqItempanel' . $key; ?>" class="accordion-collapse collapse" aria-labelledby="<?php echo 'faqItemHeading' . $key; ?>" data-bs-parent="#accordionFaq">
                                        <div class="accordion-body">
                                            <p><?php echo nl2br($faq['answer']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if (count($website_faqs) > 5) : ?>
                            <a href="<?php echo site_url('home/faq') ?>" class="btn btn-primary mt-5"><?php echo get_phrase('See More'); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---------- Questions Section End  -------------->
<?php endif; ?>


<!------------- Blog Section Start ------------>
<?php $latest_blogs = $this->crud_model->get_latest_blogs(3); ?>
<?php if (get_frontend_settings('blog_visibility_on_the_home_page') && $latest_blogs->num_rows() > 0) : ?>
    <section class="courses blog">
        <div class="container">
            <h1 class="text-center"><span><?php echo site_phrase('Visit our latest blogs') ?></span></h1>
            <p class="text-center"><?php echo site_phrase('Visit our valuable articles to get more information.') ?>
            <div class="courses-card">
                <div class="row">
                    <?php foreach ($latest_blogs->result_array() as $latest_blog) :
                        $user_details = $this->user_model->get_all_user($latest_blog['user_id'])->row_array();
                        $blog_category = $this->crud_model->get_blog_categories($latest_blog['blog_category_id'])->row_array(); ?>
                        <div class="col-lg-4 col-md-6 mb-3">
                            <a href="<?php echo site_url('blog/details/' . slugify($latest_blog['title']) . '/' . $latest_blog['blog_id']); ?>" class="courses-card-body">
                                <div class="courses-card-image">
                                    <?php $blog_thumbnail = 'uploads/blog/thumbnail/' . $latest_blog['thumbnail'];
                                    if (!file_exists($blog_thumbnail) || !is_file($blog_thumbnail)) :
                                        $blog_thumbnail = base_url('uploads/blog/thumbnail/placeholder.png');
                                    endif; ?>
                                    <div class="courses-card-image">
                                        <img src="<?php echo $blog_thumbnail; ?>">
                                    </div>
                                    <div class="courses-card-image-text">
                                        <h3><?php echo $blog_category['title']; ?></h3>
                                    </div>
                                </div>
                                <div class="courses-text">
                                    <h5><?php echo $latest_blog['title']; ?></h5>
                                    <p class="ellipsis-line-2"><?php echo ellipsis(strip_tags(htmlspecialchars_decode_($latest_blog['description'])), 150); ?></p>
                                    <div class="courses-price-border">
                                        <div class="courses-price">
                                            <div class="courses-price-left">
                                                <img class="rounded-circle" src="<?php echo $this->user_model->get_user_image_url($user_details['id']); ?>">
                                                <h5><?php echo  substrFuction($user_details['last_name'], $user_details['first_name']); ?></h5>
                                            </div>
                                            <div class="courses-price-right ">
                                                <p><?php echo get_past_time($latest_blog['added_date']); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


<!------------- Become Students Section start --------->
<section class="student">
    <div class="container">
        <div class="row">
            <div class="col-lg-6  <?php if (get_settings('allow_instructor') != 1) echo 'w-100'; ?>">
                <div class="student-body-1">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                            <div class="student-body-text">
                                <img src="<?php echo base_url('assets/frontend/default-new/image/2.png') ?>">
                                <h1><?php echo site_phrase('Learn from our quality instructors!'); ?></h1>
                                <p><?php echo site_phrase('Learn_from_the_best_teachers!') ?> </p>
                                <a href="<?php echo site_url('sign_up'); ?>"><?php echo site_phrase('get_started'); ?></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                            <img class="man" src="<?php echo base_url('assets/frontend/default-new/image/student-1.png') ?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php if (get_settings('allow_instructor') == 1) : ?>
                <div class="col-lg-6 ">
                    <div class="student-body-2">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-8 ">
                                <div class="student-body-text">
                                    <img src="<?php echo base_url('assets/frontend/default-new/image/2.png') ?>">
                                    <h1><?php echo site_phrase('become_a_new_instructor'); ?></h1>
                                    <p><?php echo site_phrase('Teach_thousands_of_students_and_earn_money!') ?> </p>
                                    <?php if ($this->session->userdata('user_id')) : ?>
                                        <a href="<?php echo site_url('user/become_an_instructor'); ?>"><?php echo site_phrase('join_now'); ?></a>
                                    <?php else : ?>
                                        <a href="<?php echo site_url('sign_up?instructor=yes'); ?>"><?php echo site_phrase('join_now'); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                <img class="man" src="<?php echo base_url('assets/frontend/default-new/image/student-2.png') ?>">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!------------- Become Students Section End --------->