<?php
$this->db->where('message_thread.receiver', $this->session->userdata('user_id'));
$this->db->where('message.sender !=', $this->session->userdata('user_id'));
$this->db->where('message.read_status', 0);
$this->db->from('message_thread');
$this->db->join('message', 'message_thread.message_thread_code = message.message_thread_code');
$unreaded_message = $this->db->get()->num_rows();
?>

<div class="wish-list-search mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="student-profile-info">
                <img class="profile-image" src="<?php echo $this->user_model->get_user_image_url($this->session->userdata('user_id')); ?>">
                <h4><?php echo $user_details['first_name'].' '.$user_details['last_name']; ?></h4>
                <span><?php echo $user_details['email']; ?></span>
            </div>
        </div>
    </div>
    <div class="wish-list-course">
        <?php if(addon_status('ebook')): ?>
            <a class="btn-profile-menu <?php if($page_name == 'my_ebooks') echo 'active'; ?>" href="<?php echo site_url('home/my_ebooks'); ?>">
                <i class="fas fa-book me-2"></i>
                <?php echo get_phrase('My Ebooks'); ?>
            </a>
        <?php endif; ?>


        <a class="btn-profile-menu <?php if($page_name == 'my_notifications') echo 'active'; ?>" href="<?php echo site_url('home/my_notifications'); ?>">
            <i class="fa-regular fa-comment-dots me-2"></i>
            <?php echo get_phrase('Notification'); ?>
            <?php if($number_of_unread_notification > 0): ?>
                <span class="badge bg-danger"><?php echo $number_of_unread_notification; ?></span>
            <?php endif; ?>
        </a>
        <?php if (addon_status('affiliate_course')) :
            $CI    = &get_instance();
            $CI->load->model('addons/affiliate_course_model');
            $is_affilator = $CI->affiliate_course_model->is_affilator($this->session->userdata('user_id'));
            if ($is_affilator == 1) : ?>
                <a class="btn-profile-menu <?php if ($page_name == 'affiliate_course_history') echo 'active'; ?>" href="<?php echo site_url('addons/affiliate_course/affiliate_course_history'); ?>">
                    <i class="fas fa-poll me-2"></i>
                    <?php echo site_phrase('Affiliate History '); ?>
                </a>
            <?php endif; ?>
        <?php else: ?>
            <?php $is_affilator = 0; ?>
        <?php endif;?>

        <?php if($is_affilator == 1 || $user_details['is_instructor'] == 1): ?>
            <a class="btn-profile-menu <?php if ($page_name == 'payment_settings') echo 'active'; ?>" href="<?php echo site_url('home/payout_settings'); ?>">
                <i class="fa-solid fa-gear me-2"></i>
                <?php echo site_phrase('Payout Settings'); ?>
            </a>
        <?php endif; ?>

        <a class="btn-profile-menu <?php if($page_name == 'purchase_history') echo 'active'; ?>" href="<?php echo site_url('home/purchase_history'); ?>">
            <i class="fas fa-history me-2"></i>
            <?php echo get_phrase('Purchase history'); ?>
        </a>

        <a class="btn-profile-menu <?php if($page_name == 'user_profile') echo 'active'; ?>" href="<?php echo site_url('home/profile/user_profile'); ?>">
            <i class="fa-regular fa-user me-2"></i>
            <?php echo get_phrase('Profile'); ?>
        </a>

        <a class="btn-profile-menu <?php if($page_name == 'user_credentials') echo 'active'; ?>" href="<?php echo site_url('home/profile/user_credentials'); ?>">
            <i class="fas fa-key me-2"></i>
            <?php echo get_phrase('Account credentials'); ?>
        </a>
    </div>
</div>