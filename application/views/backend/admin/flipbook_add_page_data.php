<?php
if (isset($_GET['order']) && isset($_GET['id'])) {
    $type = 'edit';
    $url = site_url("addons/ebook_manager/page_data/{$_GET['id']}/edit/{$_GET['order']}");
    $ebook = $this->db->where('ebook_id', $_GET['id'])->get('ebook')->row_array();

    $flipbookContent = json_decode($ebook['flipbook_content'], true);

    $value =  $flipbookContent['pages'][$_GET['order']];


} elseif(isset($_GET['id'])) {
    $type = 'add';
    $url = site_url("addons/ebook_manager/page_data/{$_GET['id']}/add");
    $value='';
}else {
    return "___false___";
}

?>
<form action="<?= $url ?>" method="post">
    <div class="row">
        <!-- <div class="col-12">
            <label for="order" class="form-label">Order(num de page)</label>
            <input type="number" class="form-control" id="order" name="order">
        </div> -->
        <div class="col-12">
            <label for="content" class="form-label">content</label>
            <textarea name="content" class="form-control" id="content" cols="30"><?= html_entity_decode($value) ?></textarea>
        </div>
        <div class="col-12 mt-3">
            <button class="btn btn-md btn-info">save</button>
        </div>
    </div>
</form>


<script type="text/javascript">
    $(document).ready(function() {
        initSummerNote(['#content']);
    });
</script>