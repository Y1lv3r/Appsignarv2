$(document).ready(function() {
  
  
  //Toggle fullscreen
  $(".fullscreen-btn").click(function(e) {
    e.preventDefault();

    var $this = $(this);
    $this
      .children("i")
      .toggleClass("fa-expand")
      .toggleClass("fa-arrows-alt");
    $(this)
      .closest(".card")
      .toggleClass("panel-fullscreen");
    $($(this).parents()[3])
      .find(".card-body")
      .toggleClass("row-200");

    var chartInfo =
      $this.attr("id") === "panel-fullscreen" ? chart1Info : chart2Info;
    drawChart(chartInfo);
  });

  drawChart(chart1Info);
  drawChart(chart2Info);
});