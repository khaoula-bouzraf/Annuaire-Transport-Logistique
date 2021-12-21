<?php
$months = array('january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december');
$month_wise_income = array();

for ($i = 0; $i < 12; $i++) {
    $first_day_of_month = "1 ".ucfirst($months[$i])." ".date("Y").' 00:00:00';
    $last_day_of_month = cal_days_in_month(CAL_GREGORIAN, $i+1, date("Y"))." ".ucfirst($months[$i])." ".date("Y").' 00:00:00';
    $this->db->select_sum('amount_paid');
    $this->db->where('purchase_date >=' , strtotime($first_day_of_month));
    $this->db->where('purchase_date <=' , strtotime($last_day_of_month));
    $total_amount = $this->db->get('package_purchased_history')->row()->amount_paid;
    $total_amount > 0 ? array_push($month_wise_income, $total_amount) : array_push($month_wise_income, 0);
}

$number_of_active_listing = 0;
$number_of_pending_listing = 0;
$listings = $this->db->get('listing')->result_array();
foreach ($listings as $key => $listing) {
    if(!has_package($listing['user_id']) > 0)
    continue;
    if ($listing['status'] == 'active') {
        $number_of_active_listing++;
    }
    if ($listing['status'] != 'active') {
        $number_of_pending_listing++;
    }
}
?>


<!-- Chart code -->
<script>
am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    var chart = am4core.create("chartdiv", am4charts.XYChart);

    var data = [];

    chart.data = [
        <?php for ($i = 0; $i < 12; $i++): ?>
        {
            "month" : "<?php echo ucfirst($months[$i]); ?>",
            "income": "<?php echo $month_wise_income[$i]; ?>",
            "lineColor": chart.colors.next()
        },
        <?php endfor; ?>
    ];
    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.ticks.template.disabled = true;
    categoryAxis.renderer.line.opacity = 0;
    categoryAxis.renderer.grid.template.disabled = true;
    categoryAxis.renderer.minGridDistance = 40;
    categoryAxis.dataFields.category = "month";
    categoryAxis.startLocation = 0.4;
    categoryAxis.endLocation = 0.6;


    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.tooltip.disabled = true;
    valueAxis.renderer.line.opacity = 0;
    valueAxis.renderer.ticks.template.disabled = true;
    valueAxis.min = 0;

    var lineSeries = chart.series.push(new am4charts.LineSeries());
    lineSeries.dataFields.categoryX = "month";
    lineSeries.dataFields.valueY = "income";
    lineSeries.tooltipText = "income: {valueY.value}";
    lineSeries.fillOpacity = 0.5;
    lineSeries.strokeWidth = 3;
    lineSeries.propertyFields.stroke = "lineColor";
    lineSeries.propertyFields.fill = "lineColor";

    var bullet = lineSeries.bullets.push(new am4charts.CircleBullet());
    bullet.circle.radius = 6;
    bullet.circle.fill = am4core.color("#fff");
    bullet.circle.strokeWidth = 3;

    chart.cursor = new am4charts.XYCursor();
    chart.cursor.behavior = "panX";
    chart.cursor.lineX.opacity = 0;
    chart.cursor.lineY.opacity = 0;

    //chart.scrollbarX = new am4core.Scrollbar();
    //chart.scrollbarX.parent = chart.bottomAxesContainer;

}); // end am4core.ready()
</script>

<!-- Pie Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("pieChartdiv", am4charts.PieChart);

// Add and configure Series
var pieSeries = chart.series.push(new am4charts.PieSeries());
pieSeries.dataFields.value = "litres";
pieSeries.dataFields.category = "country";

// Let's cut a hole in our Pie chart the size of 30% the radius
chart.innerRadius = am4core.percent(30);

// Put a thick white border around each Slice
pieSeries.slices.template.stroke = am4core.color("#fff");
pieSeries.slices.template.strokeWidth = 2;
pieSeries.slices.template.strokeOpacity = 1;
pieSeries.slices.template
  // change the cursor on hover to make it apparent the object can be interacted with
  .cursorOverStyle = [
    {
      "property": "cursor",
      "value": "pointer"
    }
  ];

pieSeries.alignLabels = false;
pieSeries.labels.template.bent = true;
pieSeries.labels.template.radius = 3;
pieSeries.labels.template.padding(0,0,0,0);

pieSeries.ticks.template.disabled = true;

// Create a base filter effect (as if it's not there) for the hover to return to
var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
shadow.opacity = 0;

// Create hover state
var hoverState = pieSeries.slices.template.states.getKey("hover"); // normally we have to create the hover state, in this case it already exists

// Slightly shift the shadow and make it more prominent on hover
var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
hoverShadow.opacity = 0.7;
hoverShadow.blur = 5;

// Add a legend
chart.legend = new am4charts.Legend();

chart.data = [{
  "country": "<?php echo get_phrase('active_listing'); ?>",
  "litres": "<?php echo $number_of_active_listing; ?>"
},{
  "country": "<?php echo get_phrase('pending_listing'); ?>",
  "litres": "<?php echo $number_of_pending_listing; ?>"
}];

}); // end am4core.ready()
</script>
