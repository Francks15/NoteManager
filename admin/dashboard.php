<?php
include('includes/header.php');
if(!isset($_SESSION['admin'])){
  header("location:login.php");
}
$query = "SELECT * FROM articles";
if(mysqli_query($con,$query)){
  $result = mysqli_query($con,$query);
  $articles = $result->num_rows;
}
$query = "SELECT * FROM categories";
if(mysqli_query($con,$query)){
  $result = mysqli_query($con,$query);
  $categories = $result->num_rows;
}
$query = "SELECT * FROM admins";
if(mysqli_query($con,$query)){
  $result = mysqli_query($con,$query);
  $admins = $result->num_rows;
}
$query = "SELECT * FROM users";
if(mysqli_query($con,$query)){
  $result = mysqli_query($con,$query);
  $users = $result->num_rows;
}
$query = "SELECT * FROM comments";
if(mysqli_query($con,$query)){
  $result = mysqli_query($con,$query);
  $comments = $result->num_rows;
}
$query = "SELECT * FROM contacts";
if(mysqli_query($con,$query)){
  $result = mysqli_query($con,$query);
  $contacts = $result->num_rows;
}
$query = "SELECT * FROM users";
if(mysqli_query($con,$query)){
  $result = mysqli_query($con,$query);
  $users = $result->num_rows;
}
?>
<div class="container-fluid">
    <div class="row" style="margin-top: 30px;">
        <div class="col-sm-3 col-md-2 sidebar">
           <?php include('includes/sidebar.php');?>
        </div>
        <div class="col-sm-6 col-md-8 col-md-offset-1 col-sm-offset-1 main">
          <h2 class="text-info">Stats</h2>
          <hr>
          <body>
            <div id="chart"></div>
          </body>      
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Topping');
      data.addColumn('number', 'Slices');
      data.addRows([
        ['Posts', <?php echo $articles; ?>],
        ['Categories',  <?php echo $categories; ?>],
        ['Comments',  <?php echo $comments; ?>],
        ['Admins', <?php echo $admins; ?>],
        ['users',  <?php echo $users; ?>],
        ['Messages',  <?php echo $contacts; ?>],
      ]);
      // Set chart options
      var options = {'title':'PHP CMS STATS',
                     'width':900,
                     'height':700};
      // Instantiate and draw our chart, passing in some options.
      var chart = new google.visualization.PieChart(document.getElementById('chart'));
      chart.draw(data, options);
    }
</script>