<html>
  <head>
    <title>Fake Street Realty</title>
  </head>
  <style>
    button {height:50px;width:300px;font-size: 20px; margin: 10px;color: black ;background-color: #1F70C1;}
    body {background-color: #f5f5dc;}
  </style>

  <center>
    <h1>Fake Street Realty</h1>
    <body>
      <h3>Select from one of the following operations:</h3>
      <button onclick="window.location.href='insert_person.php';">Insert a new Client or Agent</button>
      <button onclick="window.location.href='select_agent.php';">List Agents</button>
      <button onclick="window.location.href='select_client.php';">List Clients</button>
      <button onclick="window.location.href='insert_property.php';">Insert a Property</button>
      <button onclick="window.location.href='agent_properties.php';">List Properties by Agent</button>
      <button onclick="window.location.href='client_properties.php';">List Properties by Client</button>
      <button onclick="window.location.href='select_property.php';">List all Properties</button>
      <br>
      <button onclick="window.location.href='logout.php';">Logout</button>
    </body>
  </center>
</html>
