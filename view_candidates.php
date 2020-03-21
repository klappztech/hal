<html>

<head>
  <title>Inline Table Insert Update Delete in PHP using jsGrid</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
  <style>
    .hide {
      display: none;
    }
  </style>
</head>

<body>
  <div class="container">
    <br />
    <div class="table-responsive">
      <h3 align="center">Inline Table Insert Update Delete in PHP using jsGrid</h3><br />
      <div id="grid_table"></div>
    </div>
  </div>
</body>

</html>
<script>
  $('#grid_table').jsGrid({

    width: "100%",
    height: "600px",

    filtering: true,
    inserting: true,
    editing: true,
    sorting: true,
    paging: true,
    autoload: true,
    pageSize: 10,
    pageButtonCount: 5,
    deleteConfirm: "Do you really want to delete data?",

    controller: {
      loadData: function(filter) {
        return $.ajax({
          type: "GET",
          url: "view_candidates_fetch_data.php",
          data: filter,
          success: function(response) {

            console.log(response);
          }
        });
      },
      insertItem: function(item) {
        return $.ajax({
          type: "POST",
          url: "view_candidates_fetch_data.php",
          data: item
        });
      },
      updateItem: function(item) {
        alert("hello");
        console.log(item);

        return $.ajax({
          type: "PUT",
          url: "view_candidates_fetch_data.php",
          data: item,
          success: function(response) {

            console.log(response);
          }
        });
      },
      deleteItem: function(item) {
        return $.ajax({
          type: "DELETE",
          url: "view_candidates_fetch_data.php",
          data: item
        });
      },
    },

    fields: [{
        name: "id",
        type: "hidden",
        css: 'hide'
      },
      {
        name: "name",
        type: "text",
        width: 150,
        validate: "required"
      },
      {
        name: "name",
        type: "text",
        width: 150,
        validate: "required"
      },
      {
        name: "name",
        type: "text",
        width: 50,
        validate: "required"
      },
      {
        type: "control"
      }
    ]

  });
</script>