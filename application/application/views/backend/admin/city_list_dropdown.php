<?php
    $city_list = $this->crud_model->get_city_list_by_country_id($country_id)->result_array();
 ?>

<select class="form-control" name="city_id" id = "city_list" required>
    <?php foreach ($city_list as $city): ?>
        <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
    <?php endforeach; ?>
</select>
<script src="<?php echo base_url('assets/backend/js/selectboxit/jquery.selectBoxIt.min.js');?>"></script>
