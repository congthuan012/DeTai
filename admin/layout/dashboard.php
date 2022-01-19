<div class="menu-content">
    <!--Chart Component [2] -->
    <div id="myChart"></div>
</div>
<script>
    let myConfig = {
      type: 'bar',
      title: {
        text: 'Data Basics',
        fontSize: 22,
      },
      legend: {
        draggable: true,
      },
      scaleX: {
        label: { text: 'Days' },
        labels: [ 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun' ]
      },
      scaleY: {
        label: { text: 'Temperature (°F)' }
      },
      plot: {
        animation: {
          effect: 'ANIMATION_EXPAND_BOTTOM',
          method: 'ANIMATION_STRONG_EASE_OUT',
          sequence: 'ANIMATION_BY_NODE',
          speed: 275,
        }
      },
      series: [
        {
          values: [23,20,27,29,25,17,15],
          text: 'Week 1',
        },
      ]
    };

    // Render Method[3]
    zingchart.render({
      id: 'myChart',
      data: myConfig,
    });
  </script>