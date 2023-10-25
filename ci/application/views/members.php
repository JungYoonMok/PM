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
      <?php foreach($members as $member) :?>
        <tr>
          <td><?=$member->id?></td>
          <td><?=$member->name?></td>
          <td><?=$member->python?></td>
          <td><?=$member->java?></td>
          <td><?=$member->c?></td>
          <td><?=$member->etc?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>
</html>