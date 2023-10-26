<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Member</title>
</head>

<body>
  <table border="1" style="margin : 0 auto;">
    <thead>
      <tr style='background-color: #D8D8D8; text-align : content;'>
        <th style='width : 70px; padding : 5px;'>ID</th>
        <th style='width : 70px; padding : 5px;'>Name</th>
        <th style='width : 70px; padding : 5px;'>Python</th>
        <th style='width : 70px; padding : 5px;'>Java</th>
        <th style='width : 70px; padding : 5px;'>C/C#</th>
        <th style='width : 70px; padding : 5px;'>ETC</th>
        <th style='width : 70px; padding : 5px;'>수정</th>
      </tr>
    </thead>
    <tbody>
      <? foreach($members as $member) :?>
        <tr style="text-align : center;">
          <td style="padding : 5px;"><?=$member->id?></td>
          <td style="padding : 5px;"><?=$member->name?></td>
          <td style="padding : 5px;"><?=$member->python?></td>
          <td style="padding : 5px;"><?=$member->java?></td>
          <td style="padding : 5px;"><?=$member->c?></td>
          <td style="padding : 5px;"><?=$member->etc?></td>
          <td>
            <input type="button" value="수정" style="padding : 5px; width: 100%; background-color : yellowgreen;">
          </td>
        </tr>
      <? endforeach ?>
    </tbody>
  </table>
</body>
</html>