<?php include "breadcrumb.php"; ?>

<!---------  Motivetional Speech Start ---------------->
<div class="mb-5">
    <?php $motivational_speechs = json_decode(get_frontend_settings('motivational_speech'), true);
    $motivational = false;
    foreach ($motivational_speechs[$this->session->userdata('language')] as $item) {
        if (($item['status'] == '1') && (($item['place'] == 'page') || ($item['place'] == 'both'))) {
            $motivational = true;
            break;
        }
    }
    if ($motivational) : ?>
        <section class="expert-instructor top-categories pb-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-12">
                        <h1 class="text-center mt-4"><?php echo get_phrase('Think more clearly'); ?></h1>
                        <p class="text-center mt-4 mb-4"><?php echo get_phrase('Gather your thoughts, and make your decisions clearly') ?></p>
                    </div>
                    <div class="col-lg-3"></div>
                </div>
                <ul class="speech-items">
                    <?php
                    foreach ($motivational_speechs[$this->session->userdata('language')] as $key => $motivational_speech) : ?>
                        <?php if (($motivational_speech['status'] == '1') && (($motivational_speech['place'] == 'page') || ($motivational_speech['place'] == 'both'))) : ?>
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
                                                <div class="">
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
    <p class="text-center">
     <a href="<?= site_url('login') ?>" class="text-center btn btn-md btn-primary"><?= site_phrase("join_now") ?></a>
    </p>
</div>
<!---------  Motivetional Speech end ---------------->