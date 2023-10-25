<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Member</title>
</head>
<body>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($members as $id => $name) :?>
        <tr>
          <td><?=$id?></td>
          <td><?=$name?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>
</html>