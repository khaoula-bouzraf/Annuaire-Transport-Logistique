<?php $city_list = $this->crud_model->get_city_list_by_country_id($country_id)->result_array(); ?>
<?php foreach ($city_list as $city): ?>
    <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?></option>
<?php endforeach; ?>
